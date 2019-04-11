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

	Route::get("/group","GroupController@index");
	Route::get("/group/create","GroupController@create");
	Route::post("/group/insert","GroupController@insert");
	Route::post("/group/update","GroupController@update");
	Route::get("/group/edit/{id}","GroupController@edit");
	Route::get("/group/show/{id}","GroupController@show");
	Route::get("/group/delete/{id}","GroupController@delete");

	Route::get("/group/{id}/create","GroupController@createMember");
	Route::post("/group/member/insert","GroupController@insertMember");
	Route::get("/group/{id}/delete/{NIS}","GroupController@deleteMember");

	Route::get("/question","QuestionController@index");
	Route::get("/question/create","QuestionController@create");
	Route::post("/question/insert","QuestionController@insert");
	Route::post("/question/update","QuestionController@update");
	Route::get("/question/edit/{id}","QuestionController@edit");
	Route::get("/question/delete/{id}","QuestionController@delete");

	Route::get("/examsession","ExamSessionController@index");
	Route::get("/examsession/create","ExamSessionController@create");
	Route::post("/examsession/insert","ExamSessionController@insert");
	Route::post("/examsession/update","ExamSessionController@update");
	Route::get("/examsession/show/{id}","ExamSessionController@show");
	Route::get("/examsession/{id}/finish","ExamSessionController@finish");
	Route::get("/examsession/edit/{id}","ExamSessionController@edit");
	Route::get("/examsession/delete/{id}","ExamSessionController@delete");


});

// for student
Route::prefix("/student")->namespaces("Student")->group(function(){
	Route::get("/","IndexController@index");
	Route::get("/exam","ExamController@index");
	Route::post("/answer","ExamController@answer");
});
