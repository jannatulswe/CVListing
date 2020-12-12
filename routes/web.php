<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Admin')->prefix('admin')->group(function (){

    //login
    Route::post('login', 'LoginController@login')->name('admin.login');
    Route::get('login', 'LoginController@showLoginForm');

    //forgot password
    Route::post('password/email ', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('password/reset ', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

    //reset password
    Route::post('password/reset ', 'ResetPasswordController@reset')->name('admin.password.update');
    Route::get('password/reset/{token} ', 'ResetPasswordController@showResetForm')->name('admin.password.reset');

    //register
    Route::get('register', 'RegisterController@showRegistrationForm')->name('admin.register.form');
    Route::post('register', 'RegisterController@register')->name('admin.register');

    //logout
    Route::post('logout', 'LoginController@logout')->name('admin.logout');

    //auth routes
    Route::namespace('Auth')->group(function (){
        Route::get('/home', 'HomeController@index')->name('admin.home');
    });


    //for admin
    Route::prefix('category')->group(function (){
        Route::get('/','CategoryController@index')->name('admin.category');
        Route::post('/', 'CategoryController@saveCategory')->name('admin.category-save');
        Route::get('/unpublished/{id}', 'CategoryController@unpublishedCategory')->name('admin.unpub-category');
        Route::get('/published/{id}', 'CategoryController@publishedCategory')->name('admin.pub-category');
        Route::get('/delete/{id}', 'CategoryController@deleteCategory')->name('admin.delete-category');
        Route::post('/update', 'CategoryController@updateCategory')->name('admin.update-category');
    });


    Route::prefix('cv-list')->group(function (){
        Route::get('/short-list', 'ManageCvController@shortlistedCv')->name('admin.shortlisted.cv');
        Route::get('/{id?}','ManageCvController@index')->name('admin.cv-list');
        Route::post('/', 'ManageCvController@index')->name('admin.view-cv');

    });

// for jobs criteria
    Route::get('/job-criteria','JobsCriteriaController@index')->name('admin.jobs-criteria');
    Route::post('/job-criteria','JobsCriteriaController@saveJobsCriteria')->name('admin.jobsCriteria-save');



//for jobDetails
    Route::get('/job-details','JobdetailsController@index')->name('admin.job-details');
    Route::post('/job-details','JobdetailsController@saveJobDetails')->name('admin.save-jobDetails');
    Route::get('/job-details/unpublished/{id}', 'JobdetailsController@unPublishJobDetails')->name('admin.unpub-jobDetails');
    Route::get('/job-details/published/{id}', 'JobdetailsController@publishJobDetails')->name('admin.pub-jobDetails');
    Route::post('/job-details/update', 'JobdetailsController@updateJobDetails')->name('admin.edit-jobDetails');
    Route::get('/job-details/delete/{id}', 'JobdetailsController@deleteJobDetails')->name('admin.delete-jobDetails');

//for Aptitude question
    Route::get('/aptitude','AptitudeQuesController@index')->name('admin.aptitude');

});


// candidate routes
Auth::routes();

Route::get('/', 'MainController@index')->name('home');
Route::get('category/{id}', 'CategoryController@index')->name('show.category');

//front end CV
// all auth route would be here.
Route::middleware('auth')->group(function (){
    Route::get('/myProfile','MyProfileController@index')->name('user.create-cv');
    Route::post('/myProfile','MyProfileController@saveCvDetails')->name('user.saveCvDetails');

    Route::prefix('cv')->group(function (){
        Route::get('profile','MyProfileController@showCV')->name('cv.profile');
        Route::post('add/experience','MyProfileController@addExperience')->name('cv.add.experience');
        Route::get('remove/experience/{id}','MyProfileController@removeExperience')->name('cv.remove.experience');
        Route::post('add/education','MyProfileController@addEducation')->name('cv.add.education');
        Route::get('remove/education/{id}','MyProfileController@removeEducation')->name('cv.remove.education');
        Route::post('add/skills','MyProfileController@addSkills')->name('cv.add.skills');
        Route::get('remove/skills/{id}','MyProfileController@removeSkills')->name('cv.remove.skills');
    });


    Route::get('/apply-job/{job_id}','MainController@apply')->name('apply.job');

    Route::get('/contact','ContactController@index')->name('contact');
    Route::post('/contact','ContactController@saveContact')->name('save-contact');

});




