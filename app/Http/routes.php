<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware'=>'web'],function(){

	Route::get('/','Home\IndexController@index'); //首页
	Route::get('news/{news_id}','Home\IndexController@news'); //番职新闻
	Route::get('stu/{stu_id}','Home\IndexController@study'); //教改科研
	Route::get('cou/{cou_id}','Home\IndexController@course'); //课程建设
	Route::get('pra/{pra_id}','Home\IndexController@practice'); //实践教学

	Route::get('department','Home\IndexController@department'); //部门介绍

	Route::get('teacherTeam','Home\IndexController@teacherTeam'); //师资队伍
	Route::get('tea/{tea_id}','Home\IndexController@teacherTeamList'); //师资队伍

	Route::get('study','Home\IndexController@studyList'); //教育教学
	Route::get('practice','Home\IndexController@practiceList'); //实践教学
	Route::get('course','Home\IndexController@courseList'); //课程建设

});

Route::group(['middleware' => ['web'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    
    Route::get('code','LoginController@code'); //显示验证码
    Route::get('crypt','LoginController@crypt'); //加密
	Route::any('login','LoginController@login'); //登陆

});

Route::group(['middleware'=>['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'],function(){

	Route::get('index','IndexController@index'); //显示后台管理界面
	Route::get('info','IndexController@info');  //显示系统信息
	Route::get('quit','IndexController@quit'); //退出登录
	Route::any('pass','IndexController@pass'); //修改密码
	Route::post('upload','IndexController@upload'); //图片上传

	Route::resource('news','NewsController');  //番职要闻
	Route::resource('study','StudyController'); //教改科研
	Route::resource('practice','PracticeController'); //实践教学
	Route::resource('course','CourseController'); //课程建设
	Route::resource('teacher','TeacherController'); //师资队伍

});
