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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




/**
 * 问题
 */
    //分词搜索后的页面
    Route::any('question/showQuest','QuestionController@showQuestion');
    //显示指定一条问题详情
    Route::any('question/showOneQuestion','QuestionController@showOneQuestion');
//————————————————————————————————————————————————————————————————————————————————————————————
    //有答案问题类表
    Route::any('question/questionAnswerList','QuestionController@questionAnswerList');
    //无答案问题类表
    Route::any('question/showQuestionList','QuestionController@showQuestionList');
    //无答案详情页
    Route::any('question/showNoAnswerQuestion','QuestionController@showNoAnswerQuestion');
    //提交问题答案
    Route::any('answer/addAnswer','AnswerController@addAnswer');

//————————————————————————————————————————————————————————————————————————————————————————————
    //发布问题
    Route::any('question/pushQuestion','QuestionController@pushQuestion');
    //图片识别请求地址
    Route::any('question/PicQuestion','QuestionController@picQuestion');
    //识别完成，编辑后提交地址
    Route::any('question/addPicQuestion','QuestionController@addPicQuestion');
    //form 表单上传试题
    Route::any('question/pushFormQuestion','QuestionController@pushFormQuestion');


/**
 * 试题
 */

//-------————————————————————————————————————————————————————————————————————————————————————
    //模拟答题  开始答题
    Route::any('test/startTest','TestController@startTest');
    //提交试题
    Route::any('test/addTest','TestController@addTest');


/**
 * 用户
 */
    //用户中心
    Route::any('user/myCenter','UserController@myCenter');
//-------————————————————————————————————————————————————————————————————————————————————————
    //我发布的问题列表
    Route::any('user/myQuestionList','UserController@myQuestionList');
    //我回回答过的问题列表
    Route::any('user/myAnswerQuestion','UserController@myAnswerQuestion');
//-------————————————————————————————————————————————————————————————————————————————————————
    //我的试卷列表
    Route::any('user/myTest','UserController@myTest');
    //试卷详情
    Route::any('user/myTestDetail','UserController@myTestDetail');
    //删除个人做过的指定试卷
    Route::any('user/delMyTest','UserController@delMyTest');
//-------————————————————————————————————————————————————————————————————————————————————————
    //我的收藏问题列表
    Route::any('user/myConllect','UserController@myConllect');
    //删除收藏的问题
    Route::any('user/delMyConllect','UserController@delMyConllect');
//-------————————————————————————————————————————————————————————————————————————————————————
    //用户个人信息展示
    Route::any('user/myMessage','UserController@myMessage');
    //修改个人信息地址
    Route::any('user/editMyMessage','UserController@editMyMessage');
    //提交修改信息地址
    Route::any('user/doEditMyMessage','UserController@doEditMyMessage');
//-------————————————————————————————————————————————————————————————————————————————————————
    //积分修改
    Route::any('user/editIntegral','UserController@editIntegral');

//-------————————————————————————————————————————————————————————————————————————————————————
    //点击收藏  conllect/conllectQuestion
    Route::any('conllect/conllectQuestion','ConllectController@conllectQuestion');
    //点击采纳
    Route::any('answer/collect','AnswerController@collect');

//-------————————————————————————————————————————————————————————————————————————————————————
    //积分
    Route::any('integral/myIntegral','IntegralController@myIntegral');

    //图片识别测试
    Route::any('ai/addTest','AiController@addTest');

//--------------------------------------------------------------------------------------------
    //移动端
    //搜索框显示
    Route::any('Iphone/index','IphoneController@index');

    //跳转图片识别搜索
    Route::any('Iphone/imgsearchQuestion','IphoneController@imgsearchQuestion');

    //搜索提交的控制器
    Route::any('Iphone/searchQuestion','IphoneController@searchQusetion');

    //图片识别搜索提交
    Route::any('Iphone/moresearchQuestion','IphoneController@moresearchQuestion');







