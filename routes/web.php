<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ClassChatController;
use App\Http\Controllers\DirectMessageController;
use App\Http\Controllers\ClassAssignmentController;

//register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

//login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');

//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//show Home/Welcome
Route::get('/', [HomeController::class, 'showHome'])->name('home.show');

//search
Route::get('/search', [SearchController::class, 'search'])->name('search');

//about
Route::get('/about', [IndexController::class, 'showAbout'])->name('about.show');

//students
Route::get('/students', [IndexController::class, 'showStudents'])->name('students.show');

//students pages
Route::get('/students/lessons', [IndexController::class, 'showLessons'])->name('lessons.show');

//parents
Route::get('/parents', [IndexController::class, 'showParents'])->name('parents.show');

//parents pages
Route::get('/parents/rules', [IndexController::class, 'showRules'])->name('rules.show');

//contacts
Route::get('/contacts', [IndexController::class, 'showContacts'])->name('contacts.show');

//feedback
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

//information
Route::get('/information', [IndexController::class, 'showInformation'])->name('information.show');

//information pages
Route::get('/information/basic-information', [IndexController::class, 'showBasicInformation'])->name('basic-information.show');
Route::get('/information/structures', [IndexController::class, 'showStructures'])->name('structures.show');
Route::get('/information/education', [IndexController::class, 'showEducation'])->name('education.show');
Route::get('/information/management', [IndexController::class, 'showManagement'])->name('management.show');
Route::get('/information/teaching-staff', [IndexController::class, 'showTeachingStaff'])->name('teaching-staff.show');
Route::get('/information/paid-education', [IndexController::class, 'showPaidEducation'])->name('paid-education.show');
Route::get('/information/internation-cooperation', [IndexController::class, 'showInternationalCooperation'])->name('international-cooperation.show');
Route::get('/information/student-support', [IndexController::class, 'showStudentSupport'])->name('student-support.show');
Route::get('/information/finances', [IndexController::class, 'showFinances'])->name('finances.show');
Route::get('/information/edustandart', [IndexController::class, 'showEdustandart'])->name('edustandart.show');
Route::get('/information/organization-of-food', [IndexController::class, 'showOrganizationOfFood'])->name('organization-of-food.show');
Route::get('/information/material', [IndexController::class, 'showMaterial'])->name('material.show');
Route::get('/information/vacations', [IndexController::class, 'showVacations'])->name('vacations.show');

//news
Route::get('/news-feed', [NewsController::class, 'showNewsFeed'])->name('news-feed.show');
Route::get('/news/{id}', [NewsController::class, 'showNews'])->name('news.show');

//documents
Route::get('/documents', [DocumentController::class, 'showDocuments'])->name('documents.show');
Route::get('/documents/download/{id}', [DocumentController::class, 'download'])->name('documents.download');
Route::get('/documents/view/{id}', [DocumentController::class, 'view'])->name('documents.view');

// routes/web.php
Route::get('/time', function () {
    return [
        'local_time' => now(),
        'timestamp' => time(),
        'timezone' => config('app.timezone'),
        'php_timezone' => date_default_timezone_get(),
    ];
});

//dashboards
Route::middleware('auth')->group(function () {
    Route::get('/dashboard/account', [AccountController::class, 'showAccount'])->name('account.show');
     Route::get('dashboard/class/{classId}/chat', [ClassChatController::class, 'showChat'])->name('class.chat');
    Route::post('/dashboard/class/{classId}/chat', [ClassChatController::class, 'sendMessage'])->name('message.send');
});

//directmessages
Route::middleware(['auth'])->group(function () {
    Route::get('/direct-messages/{chat}', [DirectMessageController::class, 'show'])
        ->name('direct.message.show');

    Route::post('/direct-message', [DirectMessageController::class, 'store'])
        ->name('direct.message.store');

    Route::get('/direct-messages', [DirectMessageController::class, 'index'])
        ->name('direct.messages.index');
    
    Route::post('/direct-messages/{chat}/reply', [DirectMessageController::class, 'reply'])
        ->name('direct.message.reply');
});

//classes
Route::middleware(['auth'])->group(function () {
    Route::post('/classes/self-assign', [ClassAssignmentController::class, 'store'])->name('class.self-assign.store');
    // ...
});