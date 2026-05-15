<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        // correct time
        $formStartedAt = Session::get('feedback_form_started');

        // Honeypot
        if (!empty($request->website)) {
            return response('OK', 200);
        }

        // Antispam
        if (!$formStartedAt) {
            return Redirect::back()
                ->withErrors(['time' => 'Не удалось определить время открытия формы.'])
                ->withInput();
        }

        if (now()->lt($formStartedAt)) {
            \Log::warning('Form started in the future', [
                'form_started_at' => $formStartedAt,
                'now' => now(),
            ]);
            return Redirect::back()
                ->withErrors(['time' => 'Ошибка проверки времени. Пожалуйста, обновите страницу.'])
                ->withInput();
        }

        // from start to now
        $secondsPassed = $formStartedAt->diffInSeconds(now());

        if ($secondsPassed < 3) {
            return Redirect::back()
                ->withErrors(['time' => 'Форма заполнена слишком быстро.'])
                ->withInput();
        }

        //Math Captcha
        $correctAnswer = Session::get('feedback_captcha_answer');
        $userAnswer = $request->input('math_answer');

        if (!$correctAnswer) {
            // generate new captcha
            $this->regenerateCaptcha();
            return Redirect::back()
                ->withErrors(['math_answer' => 'Сессия истекла. Пожалуйста, обновите страницу и попробуйте снова.'])
                ->withInput();
        }

        if ((int)$userAnswer !== (int)$correctAnswer) {
            // incorrect answer - generate new captcha
            $this->regenerateCaptcha();

            return Redirect::back()
                ->withErrors(['math_answer' => 'Неверный ответ. Проверка обновлена — введите новый ответ.'])
                ->withInput();
        }

        //Validation
        $validator = Validator::make($request->all(), [
            'feedback_name' => 'required|string|max:255',
            'feedback_email' => 'required|email|max:255',
            'feedback_message' => 'required|string'
        ], [
            'feedback_name.required' => 'Поле ФИО обязательно для заполнения.',
            'feedback_email.required' => 'Поле Email обязательно для заполнения.',
            'feedback_email.email' => 'Пожалуйста, введите корректный email-адрес.',
            'feedback_message.required' => 'Поле сообщение обязательно для заполнения.',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        //Save
        Feedback::create($request->only('feedback_name', 'feedback_email', 'feedback_message'));

        // Clear session
        Session::forget(['feedback_captcha_answer', 'feedback_captcha_question', 'feedback_form_started']);

        return Redirect::back()->with('success', 'Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.');
    }

    /**
    * Generate new captcha
    */
    private function regenerateCaptcha()
    {
        $a = rand(1, 10);
        $b = rand(1, 10);

        Session::put('feedback_captcha_question', "$a + $b");
        Session::put('feedback_captcha_answer', $a + $b);
        Session::put('feedback_form_started', now());
    }

}