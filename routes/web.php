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

Route::get('/', 'Frontend\PageController@index')->name('login');

Route::get('/tutor-login', 'Frontend\PageController@tutorlogin')->name('tutorlogin');

Route::get('/student-login', 'Frontend\PageController@studentlogin')->name('studentlogin');

Route::post('/signin', 'Auth\UserController@signin')->name('signin');

Route::get('/logout', 'Auth\UserController@logout')->name('logout');

//=======Tutor=======//

Route::group([ 'middleware' => 'auth', 'prefix' => 'tutor', 'before' => 'tutor' ], function(){

    Route::get('/dashboard', 'Tutor\PageController@dashboard')->name('tutordashboard');

    
    Route::post('/savelogin', 'Auth\UserController@savelogin')->name('savelogin');
    
    Route::post('/update-user/{id}', 'Auth\UserController@updateuser')->name('updateuser');

    Route::get('/delete-user/{id}', 'Auth\UserController@deleteuser')->name('deleteuser');
    

    Route::get('/classes', 'Tutor\PageController@classes')->name('tutorclasses');

    Route::post('/saveclass', 'Tutor\ClassController@saveclass')->name('saveclass');

    Route::post('/update-class/{id}', 'Tutor\ClassController@updateclass')->name('updateclass');

    Route::get('/delete-class/{id}', 'Tutor\ClassController@deleteclass')->name('deleteclass');


    Route::get('/students', 'Tutor\PageController@student')->name('tutorstudent');


    Route::get('/members', 'Tutor\PageController@member')->name('tutormember');

    Route::post('/savemember', 'Tutor\MemberController@savemember')->name('savemember');

    Route::get('/delete-member/{id}', 'Tutor\MemberController@deletemember')->name('deletemember');


    Route::get('/posts', 'Tutor\PageController@post')->name('tutorpost');

    Route::post('/savepost', 'Tutor\PostController@savepost')->name('savepost');

    Route::get('/edit-post/{id}', 'Tutor\PageController@editpost')->name('tutoreditpost');

    Route::post('/update-post/{id}', 'Tutor\PostController@updatepost')->name('tutorupdatepost');

    Route::get('/delete-post/{id}', 'Tutor\PostController@deletepost')->name('deletepost');


    Route::get('/message', 'Tutor\PageController@message')->name('tutormessage');

    Route::post('/sendmessage', 'Tutor\MessageController@sendmessage')->name('sendmessage');

    Route::get('/delete-message/{id}', 'Tutor\MessageController@deletemessage')->name('deletemessage');


    Route::get('/assignment/{id}', 'Tutor\PageController@assignment')->name('assignment');
    
    Route::get('/delete-assignment/{id}', 'Tutor\PageController@deleteassignment')->name('deleteassignment');


    Route::get('/video-status/{id}', 'Tutor\PageController@videostatus')->name('videostatus');

    Route::get('/delete-user-video-status/{id}', 'Tutor\PageController@deleteuservideostatus')->name('deleteuservideostatus');


    Route::get('/account', 'Tutor\PageController@account')->name('account');

});

Route::group([ 'middleware' => 'auth', 'prefix' => 'student', 'before' => 'student' ], function(){

    Route::get('/dashboard', 'Student\PageController@dashboard')->name('studentdashboard');

    Route::get('/class', 'Student\PageController@class')->name('studentclass');

    Route::get('/topics/{id}', 'Student\PageController@topic')->name('studenttopic');

    Route::get('/start-topics/{id}', 'Student\PageController@starttopic')->name('studentstarttopic');


    Route::get('/message', 'Student\PageController@message')->name('studentmessage');

    Route::post('/sendmessage', 'Student\PageController@sendmessage')->name('studentsendmessage');

    Route::get('/delete-message/{id}', 'Student\PageController@deletemessage')->name('deletemessage');


    Route::post('/sendassignment', 'Student\PageController@sendassignment')->name('studentsendassignment');

    Route::post('/savevideostatus', 'Student\PageController@savevideostatus')->name('savevideostatus');
});