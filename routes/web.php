<?php
use App\Http\Controllers\UserController;
use App\Models\Student;
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

Route::get('/form', function () {
    return view('form');
});
// Route::get('/form', function () {
//     $student = Student::all();
//     echo "<pre>";
//     print_r($student->toArray());
// });
Route::get('/form',[UserController::class, 'index']);
Route::post('/form',[UserController::class, 'store']);
Route::get('student-view/create/',[UserController::class, 'create'])->name('student-view.create');
Route::get('/student/view',[UserController::class, 'view']);
Route::get('student/delete/{id}',[UserController::class, 'delete']);
Route::get('student/edit/{id}',[UserController::class, 'edit'])->name('student.edit');
Route::post('student/update/{id}',[UserController::class, 'update'])->name('student.update');