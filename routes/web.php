<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;

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
    return view('login');
});
Route::get('/adminhome',[logincontroller::class,'adminhome']);
Route::get('/studentlogin', function () {
    return view('studentlogin');});
    Route::get('/teacherlogin', function () {
        return view('teacherlogin');});
Route::get('/studenthome',[logincontroller::class,'studenthome']);
Route::get('/studentsignup',[logincontroller::class,'studentsignup']);
Route::post('/studentstore',[logincontroller::class,'studentstore']);
Route::get('/teacherhome',[logincontroller::class,'teacherhome']);
Route::get('/teachersignup',[logincontroller::class,'teachersignup']);
Route::post('/teacherstore',[logincontroller::class,'teacherstore']);
Route::get('/teacheredit/{id?}',[logincontroller::class,'teacheredit']);
Route::post('/teacheredit/{id?}',[logincontroller::class,'teachereditentry']);
Route::post('/teacherdelete/{id?}',[logincontroller::class,'teacherdeleteentry']);
Route::post('/logincheck',[logincontroller::class,'logincheck']);
Route::get('/studedit/{id?}',[logincontroller::class,'studedit']);
//Route::get('/studdelete/{id?}',[logincontroller::class,'studdelete']);
Route::post('/studedit/{id?}',[logincontroller::class,'studeditentry']);
Route::post('/studdelete/{id?}',[logincontroller::class,'studdeleteentry']);

