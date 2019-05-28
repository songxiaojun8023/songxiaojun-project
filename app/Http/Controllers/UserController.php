<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //用户个人中心
    public function myCenter(){

        return view('user.myCenter');
    }

    //我发布的问题列表
    public function myQuestionList(){

        return view('user.myQuestionList');
    }

    //我回答过的问题列表
    public function  myAnswerQuestion(){

        return view('user.myAnswerQuestion');
    }

    //我的做过的试题列表
    public function myTest(){

        return view('user.myTest');
    }

    //我的试题详情
    public function myTestDetail(){
        return view('user.myTestDetail');
    }

    //删除指定试卷
    public function delMyTest(){
        return ['code'=>200,'message'=>'ok'];
    }

    //我的收藏问题列表
    public function myConllect(){

        return view('user.myConllect');
    }

    //删除我的收藏试题
    public function delMyConllect(){

        return ['code'=>200,'message'=>'ok'];
    }

    //我的积分
    public function editIntegral(){
        return ['code'=>200,'message'=>'ok'];
    }

    //用户基本信息
    public function myMessage(){
        return view('user.myMessage');
    }

    //修改个人信息
    public function editMyMessage(){
        return view('user.editMyMessage');
    }

    //处理修改
    public function doEditMyMessage(){
        return ['code'=>200,'message'=>'ok'];
    }

}
