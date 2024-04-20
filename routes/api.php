<?php

use App\Http\Controllers\Api\AssessmentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CourseController;
use App\Http\Controllers\Api\DictionaryController;
use App\Http\Controllers\Api\LessonController;
use App\Http\Controllers\Api\OthersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/create-user', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/about-us', [OthersController::class, 'aboutUs']);

// get countries
Route::get('/countries', [OthersController::class, 'getCountries']);

    // get governorates
    Route::get('/governorates/{country_id}', [OthersController::class, 'getGovernorates']);

    // get districts
    Route::get('/districts/{governorate_id}', [OthersController::class, 'getDistricts']);

    // get cities
    Route::get('/cities/{district_id}', [OthersController::class, 'getCities']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/contact-us', [OthersController::class, 'contactUs']);
    Route::get('/user-info', [AuthController::class, 'userInfo']);
    Route::put('/user-update', [AuthController::class, 'updateUserProfile']);
    Route::get('/get-course-list', [CourseController::class, 'getCourseList']);
    Route::get('/courses/{id}', [CourseController::class, 'singleCourse']);

    Route::get('/lessons/{id}', [LessonController::class, 'singlelesson']);

    //grades
    Route::get('/grades', [CourseController::class, 'getGrades']);

    //Assessment
    Route::get('/get-assessment', [AssessmentController::class, 'getAssessment']);
    Route::post('/assessment-grading', [AssessmentController::class, 'AssessmentGrading']);
    Route::get('/assessment-taken', [AssessmentController::class, 'getAssessmentTaken']);

    Route::get("/lesson-dictionary/{lesson_id}",[DictionaryController::class,"index"]);

    Route::get("/search-lessons/{key}",[LessonController::class,'search']);
});
