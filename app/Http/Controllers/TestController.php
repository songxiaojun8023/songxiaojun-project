<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Test;

class TestController extends Controller
{
    //定义接口需要的常量
    const APP_ID = '16100280';
    const API_KEY = '8hsZqb0WhPer7qQQqcjVKrYY';
    const SECRET_KEY = 'UDZpw5XvTFYZSlUY6nri7qqPgUqNo2ze';
    //开始答题，随机5道
    public function startTest(){
        $question = new Test();
        $data=$question->getTest();
        return view('Test.startTest',['data'=>$data]);
    }

    //处理用户作答完毕的试卷
    public function addTest(){
        $question = new Test();
        $data=$question->getAddTest();
//        dd($data);
        return ['code'=>200,'message'=>'true'];
    }
}
