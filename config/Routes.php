<?php
use vendor\zframework\Route;
use vendor\zframework\Request;
use vendor\zframework\Session;
use app\User;


Route::middleware("Auth")->post("/login","IndexController@doLogin");
Route::middleware("Auth")->get("/login","IndexController@login");
Route::middleware("Auth")->get("/logout","IndexController@logout");
Route::get("/","IndexController@login");
// for admin
Route::middleware("Admin")->prefix("/admin")->namespaces("Admin")->group(function(){
	Route::get("/","IndexController@index");

	Route::get("/student","StudentController@index");
	Route::get("/student/create","StudentController@create");
	Route::post("/student/insert","StudentController@insert");
	Route::post("/student/update","StudentController@update");
	Route::get("/student/edit/{NIS}","StudentController@edit");
	Route::get("/student/delete/{NIS}","StudentController@delete");
});

// for admin
Route::prefix("/student")->namespaces("Student")->group(function(){
	Route::get("/","IndexController@index");
});
