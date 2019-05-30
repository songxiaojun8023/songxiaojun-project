<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //提交答案
    public function addAnswer(){
        return ['code'=>200,'message'=>'ok'];
    }


    //采纳答案
    public function collect(){

        return ['code'=>200,'message'=>'ok'];
    }
}
