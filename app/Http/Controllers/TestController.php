<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //开始答题，随机5道
    public function startTest(){
        return view('test.startTest');
    }

    //处理用户作答完毕的试卷
    public function addTest(){
        return ['code'=>200,'message'=>'ok'];
    }
}
