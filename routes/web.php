<?php

use App\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LabAssistantController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DoctorDashboardController;
use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\AppointmentDoctorController;
use App\Http\Controllers\LabAssistantDashboardController;


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

Route::get('/add_bill', function () {
    return view('add_bill');
});

Route::get('/add_packege', function () {
    return view('add_packege');
});

Route::get('/add_service', function () {
    return view('add_service');
});

Route::get('/appointment_assign_by_all', function () {
    return view('appointment_assign_by_all');
});

Route::get('/appointment_assign_by_doctor', function () {
    return view('appointment_assign_by_doctor');
});

Route::get('/package_list', function () {
    return view('package_list');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/schedule_list', function () {
    return view('schedule_list');
});

Route::get('/send_email', function () {
    return view('send_email');
});

Route::get('/send_sms', function () {
    return view('send_sms');
});

Route::get('/service_list', function () {
    return view('service_list');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Route::get('/search',SearchController::class,'doctorSearch');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('appointments', AppointmentController::class);
    Route::resource('lab_assistants', LabAssistantController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('drugs', DrugController::class);

    Route::get('/add_user', [UserController::class, 'create']);
    Route::get('/add_patient', [PatientController::class, 'create']);
    Route::get('/add_doctor', [DoctorController::class, 'create']);
    Route::get('/add_appointment', [AppointmentController::class, 'create']);
    Route::get('/add_schedule', [ScheduleController::class, 'create']);
    Route::get('/add_lab_assistant', [LabAssistantController::class, 'create']);
    Route::get('/add_report', [ReportController::class, 'create']);
    Route::get('/add_drug', [DrugController::class, 'create']);

    Route::get('/patient_list', [PatientController::class, 'index'])->name('patient_list');
    Route::get('/user_list', [UserController::class, 'index'])->name('user_list');
    Route::get('/doctor_list', [DoctorController::class, 'index'])->name('doctor_list');
    Route::get('/schedule_list', [ScheduleController::class, 'index'])->name('schedule_list');
    Route::get('/appointment_list', [AppointmentController::class, 'index'])->name('appointment_list');
    Route::get('/lab_assistant_list', [LabAssistantController::class, 'index'])->name('lab_assistant_list');
    Route::get('/report_list', [ReportController::class, 'index'])->name('report_list');
    Route::get('/drug_list', [DrugController::class, 'index'])->name('drug_list');

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/patientDashboard', [PatientDashboardController::class, 'index'])->name('patientDashboard');
    Route::get('/doctorDashboard', [DoctorDashboardController::class, 'index'])->name('doctorDashboard');
    Route::get('/labassistantDashboard', [LabAssistantDashboardController::class, 'index'])->name('labassistantDashboard');

    //patient
    Route::get('/doctor_list-patient', [DoctorController::class, 'patientIndex'])->name('doctor_list-patient');
    Route::get('/add_appointment-patient', [AppointmentController::class, 'patientCreate'])->name('add_appointment-patient');
    Route::get('/show_doctor-patient', [AppointmentController::class, 'patientShow'])->name('show_doctor-patient');

    //lab assistant
    Route::get('/add_report-labassistant', [ReportController::class, 'labassistantCreate'])->name('add_report-labassistant');
    Route::get('/report_list-labassistant', [ReportController::class, 'labassistantIndex'])->name('report_list-labassistant');

    //appointment routes
    //Route::resource('appointment', 'AppointmentController');
    //Route::post('/appointment/check', 'AppointmentController@check')->name('appointment.check');
    //Route::post('/appointment/update', 'AppointmentController@updateTime')->name('update');


});

Route::post('/livesearch', [AppointmentController::class, 'livesearch'])->name('livesearch');
Auth::routes();





