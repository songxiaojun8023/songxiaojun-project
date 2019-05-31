<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Test;

class TestController extends Controller
{
    //开始答题，随机5道
    public function startTest(){
        $question = new Test();
        $data=$question->getTest();
        return view('test.startTest',['data'=>$data]);
    }

    //处理用户作答完毕的试卷
    public function addTest(){

        return ['code'=>200,'message'=>'ok'];
    }
}
