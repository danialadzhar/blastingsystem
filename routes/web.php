<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*
|--------------------------------------------------------------------------
| Email Blasting
|--------------------------------------------------------------------------
*/

Route::get('email/template', 'EmailBlastingController@email_template');
Route::get('email/template/create', 'EmailBlastingController@create_template');
Route::get('email/blast', 'EmailBlastingController@email_blast');

Route::post('email/template/store', 'EmailBlastingController@email_template_store');
Route::post('email/send-mail', 'EmailBlastingController@send_mail');

Route::post('email/template/destroy/{id}', 'EmailBlastingController@email_template_destroy');



/*
|--------------------------------------------------------------------------
| User Email
|--------------------------------------------------------------------------
*/

Route::get('user-email', 'UserEmailController@create');
Route::get('user-email/group/create', 'UserEmailController@create_group');
Route::get('user-email/group/list', 'UserEmailController@list_group');

Route::post('user-email/upload', 'UserEmailControllerController@import_email');
Route::post('user-email/group/store', 'UserEmailControllerController@create_group_store');
Route::post('user-email/group/destroy/{id}', 'UserEmailController@user_email_destroy');

