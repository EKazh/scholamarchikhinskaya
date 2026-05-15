<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Category;
use App\Models\Feedback;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    //show information
    public function showInformation()
    {
        return view('pages.information');
    }

    //show stundents
    public function showStudents()
    {
        return view('pages.students');
    }

    //students pages
    public function showLessons()
    {
        $category = Category::where('category_name', 'Расписание уроков')->first();
    
        if ($category) {
            $documents = Document::where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $documents = collect();
        }

        return view('pages.students.lessons', compact('documents'));
    }

    //show parents
    public function showParents()
    {
        return view('pages.parents');
    }

    //parents pages
    public function showRules()
    {
        return view('pages.parents.rules');
    }

    //show about
    public function showAbout()
    {
        return view('pages.about');
    }
    
    //information pages
    public function showBasicInformation()
    {
        return view('pages.information.basic-information');
    }

    //show contacts
    public function showContacts()
    {
        $a = rand(1, 10);
        $b = rand(1, 10);

        Session::put('feedback_captcha_question', "$a + $b");
        Session::put('feedback_captcha_answer', $a + $b);
        Session::put('feedback_form_started', now());

        return view('pages.contacts');
    }

    public function showStructures()
    {
        $documents = [];
        
        $category = Category::where('category_name', 'Структурные подразделения')->first();
        if ($category) {
            $documents = Document::where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $documents = collect();
        }
        
        return view('pages.information.structures', compact('documents'));
    }

    public function showPaidEducation()
    {
        return view('pages.information.paid-education');
    }

    public function showInternationalCooperation()
    {
        return view('pages.information.international-cooperation');
    }

    public function showTeachingStaff()
    {
        $category = Category::where('category_name', 'Педагогический состав')->first();
    
        if ($category) {
            $documents = Document::where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $documents = collect();
        }
    
        return view('pages.information.teaching-staff', compact('documents'));
    }

    public function showManagement()
    {
        return view('pages.information.management');
    }

    public function showStudentSupport()
    {
        return view('pages.information.student-support');
    }

    public function showFinances()
    {
        $category = Category::where('category_name', 'Финансово-хозяйственная деятельность')->first();
    
        if ($category) {
            $documents = Document::where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $documents = collect();
        }
    
        return view('pages.information.finances', compact('documents'));    
    }

    public function showMaterial()
    {
        $category = Category::where('category_name', 'Материально-техническое обеспечение')->first();
    
        if ($category) {
            $documents = Document::where('category_id', $category->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else {
            $documents = collect();
        }

        return view('pages.information.material', compact('documents'));
    }

    public function showEdustandart(){
        return view('pages.information.edustandart');
    }

    public function showOrganizationOfFood(){
        return view('pages.information.organization-of-food');
    }
}
