<?php

use Illuminate\Support\Facades\Route;


//===========================================================
//=============admins route here ============================
//===========================================================





    //admin routes
    Route::namespace('Admins')->group(function (){
        Route::group(['middleware'=>'auth'],function (){

            //==========================================================
            //==========dashboard=========================================
            //==========================================================
               Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


            //==========================================================
            //==========patient=========================================
            //==========================================================
                //show
                Route::get('/patient', 'PatientsController@index')->name('patients');
                //view patient
                Route::get('/patient/view/{id?}','PatientsController@view')->name('patient.view');
                //create
                Route::get('/patient/create','PatientsController@create')->name('patient.create');
                //store created info
                Route::post('/patient/store','PatientsController@store')->name('patient.store');
                //edit
                Route::get('/patient/edit/{id?}','PatientsController@edit')->name('patient.edit');
                //update
                Route::post('/patient/update','PatientsController@update')->name('patient.update');
                //delete
                Route::get('/patient/delete/{id?}','PatientsController@delete')->name('patient.delete');


            //end========================================================


            //==========================================================
            //==========medicall staff =========================================
            //==========================================================
            //show
            Route::get('/medicalstaff', 'medicalStaffController@index')->name('medicalstaffs');
            //view patient
            Route::get('/medicalstaff/view/{id?}','medicalStaffController@view')->name('medicalstaff.view');
            //create
            Route::get('/medicalstaff/create','medicalStaffController@create')->name('medicalstaff.create');
            //store created info
            Route::post('/medicalstaff/store','medicalStaffController@store')->name('medicalstaff.store');
            //edit
            Route::get('/medicalstaff/edit/{id?}','medicalStaffController@edit')->name('medicalstaff.edit');
            //update
            Route::post('/medicalstaff/update','medicalStaffController@update')->name('medicalstaff.update');
            //delete
            Route::get('/medicalstaff/delete/{id?}','medicalStaffController@delete')->name('medicalstaff.delete');



            //end========================================================

            //==========================================================
            //==========News staff =========================================
            //==========================================================
            //show
            Route::get('/news', 'NewsController@index')->name('news');
            //view patient
            Route::get('/news/view/{id?}','NewsController@view')->name('news.view');
            //create
            Route::get('/news/create','NewsController@create')->name('news.create');
            //store created info
            Route::post('/news/store','NewsController@store')->name('news.store');
            //edit
            Route::get('/news/edit/{id?}','NewsController@edit')->name('news.edit');
            //update
            Route::post('/news/update','NewsController@update')->name('news.update');
            //delete
            Route::get('/news/delete/{id?}','NewsController@delete')->name('news.delete');



            //end========================================================






        });
    });








