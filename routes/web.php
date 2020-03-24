<?php

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

Auth::routes();

Route::post('/logins', 'Auth\LoginController@login')->name('logins');

Route::middleware('auth')->group(function () {
    Route::get('/', 'HomeController@index');
    Route::get('/logout', 'HomeController@logout');
    Route::resource('/device', 'DeviceController');
    Route::post('/device/updated', 'DeviceController@updated');
    Route::resource('/instructor', 'InstructorController');
    Route::post('/instructor/updated', 'InstructorController@updated');
    Route::resource('/customer', 'CustomerController');
    Route::post('/customer/updated', 'CustomerController@updated');
    Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
    Route::resource('/sales', 'SalesController');
    Route::resource('/modul', 'ModulController');
    Route::post('/modul/updated', 'ModulController@updated');
    Route::resource('/curiculum', 'CuriculumController');
    Route::resource('/silabus', 'SilabusController');
    Route::resource('/category-project', 'CategoryProjectController');
    Route::post('/category-project/updated', 'CategoryProjectController@updated');
    Route::resource('/information', 'InformationController');
    Route::post('/information/updated', 'InformationController@updated');
    Route::resource('/category-feedback', 'CategoryFeedBackController');
    Route::post('/category-feedback/updated', 'CategoryFeedBackController@updated');
    Route::resource('/feedback', 'FeedBackController');
    Route::resource('/app-setting', 'AppSettingController');
    Route::resource('/blog', 'BlogController');
    Route::resource('/event', 'EventController');
    Route::resource('/setting', 'SettingController');

    Route::prefix('/frontend')->group(function() {
        Route::resource('/home', 'Frontend\HomeController');
        Route::resource('/program', 'Frontend\ProgramController');        
        Route::resource('/teacher', 'Frontend\TeacherController');
        Route::post('/teacher/updated', 'Frontend\TeacherController@updated');
        Route::resource('/contact', 'Frontend\ContactController');
    });
});
