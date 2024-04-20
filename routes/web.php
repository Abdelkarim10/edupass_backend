<?php

use App\Http\Controllers\Admin\AnswersController;
use App\Http\Controllers\Admin\AssessmentsController;
use App\Http\Controllers\Admin\AssessmentsTakenController;
use App\Http\Controllers\Admin\ChatsController;
use App\Http\Controllers\Admin\ClassesController;
use App\Http\Controllers\Admin\ContactsUsController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\DictionaryController;
use App\Http\Controllers\Admin\GradesController;
use App\Http\Controllers\Admin\LessonsController;
use App\Http\Controllers\Admin\McqController;
use App\Http\Controllers\Admin\PartnersController;
use App\Http\Controllers\Admin\PdfsController;
use App\Http\Controllers\Admin\SponsorsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('login', function () {
//     return view('auth/login');
// });
// Route::get('/auth/passwords/register', function () {
//     return view('register');
// });

Route::redirect('/', 'login');

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource("/users", UserController::class);
    Route::get('/all-users/{role_id}', [UserController::class, "index"])->name('all-users.index');
    Route::get("/users-student-create", [UserController::class, "studentCreate"])->name("users.createStudent");
    Route::get("/users-assistant-create", [UserController::class, "assistantCreate"])->name("users.createAssistant");

    Route::resource("/contact-us", ContactsUsController::class);

    Route::resource("/partners", PartnersController::class);

    Route::resource("/sponsors", SponsorsController::class);

    Route::resource("/chats", ChatsController::class);

    Route::resource("/answers", AnswersController::class);
    Route::get("/answer/create/{mcq_id}", [AnswersController::class, "createAnswer"])->name("mcq.answer.create");

    Route::put("/answer/update/{mcq_id}", [AnswersController::class, "updateRightAnswer"])->name("mcq.update.rightanswer");

    Route::resource("/mcqs", McqController::class);
    Route::get("/mcqs/create/{assessment_id}", [McqController::class, "createMcq"])->name("assessment.mcq.create");

    Route::resource("/grades", GradesController::class);

    Route::resource("/courses", CoursesController::class);
    Route::get("/courses/create/{grade_id}", [CoursesController::class, "createGradeCourse"])->name("grade.courses.create");

    Route::resource("/assessments", AssessmentsController::class);
    Route::get("/assessments/lesson-create/{lesson_id}", [AssessmentsController::class, "createLesson"])->name("assessment.lesson.create");
    Route::get("/assessments/course-create/{course_id}", [AssessmentsController::class, "createCourse"])->name("assessment.course.create");

    Route::resource("/assessment_taken", AssessmentsTakenController::class);

    Route::resource("/lessons", LessonsController::class);
    Route::get("/lessons/create/{course_id}", [LessonsController::class, "createLesson"])->name("lesson.courses.create");

    Route::resource("/pdfs", PdfsController::class);

    Route::resource("/videos", VideosController::class);

    Route::get("/videos/create/{lesson_id}", [VideosController::class, "createVideo"])->name("lesson.video.create");

    Route::resource("/dictionary", DictionaryController::class);
    Route::get("/dictionary/create/{lesson_id}", [DictionaryController::class, "createLessonDict"])->name("lesson.dict.create");

    Route::get("/pdfs/create/{lesson_id}", [PdfsController::class, "createLessonPdf"])->name("lesson.pdf.create");
});





// Route::resource("/user", UserController::class, ['dashboard/index']);
// Route::resource("/crud/user", UserController::class, ['dashboard/index']);
// Route::get('/crud', function () {
//     Route::resource("/crud/user", UserController::class, 'dashboard/index');
// })->middleware('auth:admin');
