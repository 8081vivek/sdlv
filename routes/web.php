<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sdlvController;
use App\Http\Controllers\TelegramBotController;

Route::view('/','home');
Route::view('/header','header');
Route::view('/gallery','Gellary');
Route::view('/footer','footer');
Route::view('/facility','faclity');
Route::view('/about','about');
Route::view('/f','facilites');
Route::view('/Admin','Admin_login');
Route::view('/Teacher','Teacher_login');
Route::view('/boy','Student_login');
Route::get('/Admin_dashboard',[sdlvController::class,'admin_dashboard']);
Route::view('/Student_dashboard','Student_dashboard');
Route::view('/Teacher_management','Admin_teacher');
Route::view('/student_register','student_registration');
Route::view('/TTimetable','Teacher_timetable');
Route::view('/Student_result','Student_result');
Route::view('/Student_Attendance','Student_Attendance');
Route::get('/a',[sdlvController::class,'attendance_form']);
Route::view('/faculty','faculty_add');


Route::view('/admins','Admin_sidebar');
Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('Admin_dashboard');
Route::post("/teacher_login",[sdlvController::class,"teacher_login"]);
Route::post("/student_login",[sdlvController::class,"student_login"]);
Route::get('/admin_logout',[sdlvController::class,'admin_logout']);
Route::match(['get','post'], '/student_show', [sdlvController::class, 'student_show']);

Route::post('/teacher_registration',[sdlvController::class,'Teacher_register']);
Route::post('/admin_login',[sdlvController::class,'admin_login']);
Route::post('/student_registration',[sdlvController::class,'student_register']);
Route::post('/save_attendance',[sdlvController::class,'save_attendance']);
Route::controller(sdlvController::class)->group(function(){
 Route::get('/afaculty','add_teacher');
 Route::post('/type_code','type_code');
 Route::get('/Student_management','admin_student');
 Route::get('/smt','teacher_student');
 Route::get('/fee_pay','student_fee');
 
 Route::post('/pay_form', [sdlvController::class, 'pay_form'])
 ->name('pay.form');
 
 
 
 
} );

Route::get('/exportStudents', [sdlvController::class, 'exportStudents']);
Route::get('/exportTeachers', [sdlvController::class, 'exportTeachers']);
Route::post('/import-students', [sdlvController::class, 'importStudents']);
Route::view('/Admin_student',"Admin_student");
Route::post('/get-order-details', [sdlvController::class, 'createOrder'])->name('rzp.order');
