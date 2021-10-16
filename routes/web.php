<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(["auth"])->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('participants', 'ParticipansController');
    Route::resource('trainers', 'TrainersController');
    Route::resource('calendar', 'CalendarController');
    Route::get('calendario/all/', 'CalendarController@allCalendar');
    Route::get('course/all/', 'CalendarController@allCourse');
    Route::resource('categories', 'CategoriesController');
    Route::resource('courses', 'CoursesController');
    Route::resource('certificates', 'CertificatesController');
    //Route::post('participants/certificates/', 'ParticipansController@storeCertificate')->name('certificate.store');
    /*Import*/
    Route::get('import/{type}', 'Common\Import@create')->name('import.create');
    Route::post('certificates/import', 'CertificatesController@import')->name('certificates.import');


});


Route::prefix('cliente')->group(function() {
    Route::resource('participante', 'ClienteController');
    Route::resource('certificados', 'ClienteCertificatesController');
});
