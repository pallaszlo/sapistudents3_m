<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

//use App\Http\Controllers\StudentController;

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


Route::get('/', function () {
    return view('welcome');
});


Route::get('students', [StudentController::class, 'index']);
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/edit/{id}',[StudentController::class, 'edit'])->name('students.edit');
Route::post('/students/edit/{id}',[StudentController::class, 'update'])->name('students.update');
Route::get('students/{id}', [StudentController::class, 'show']);
Route::delete('/students/delete/{id}',[StudentController::class, 'destroy'])->name('students.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\StudentController::class, 'index'])->name('home');

Route::get('/proba1', function(){

	$students = App\Models\Program::find(1)->students;
	foreach ($students as $stud) {
    	echo $stud->name. '<br>';
	}

	$student = App\Models\Student::find(1);
	echo $student->program->name;

});

Route::get('/proba2', function(){

	// Egy hallgató kurzusai
	$student = App\Models\Student::find(1);
	$courses = $student->courses;
	foreach ($courses as $course) {
    	echo $course->name. '<br>';
	}

	// Egy kurzus hallgatói
	$course = App\Models\Course::find(1);
	$students = $course->students;
	foreach ($students as $stud) {
    	echo $stud->name. '<br>';
	}

});
