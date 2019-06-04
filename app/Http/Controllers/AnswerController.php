<?php

namespace App\Http\Controllers;

use App\Conllect;
use App\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    //提交答案
    public function addAnswer(Request $request){
        $ans = $request->all();
//        print_r($ans);die;
        $addans = new Answer();
        $data = $addans->Addanswer($ans);
//        return $data;
    }


    //采纳答案
    public function collect(Request $request){
        $aid = $request->all();
//        dd($aid);
        $conllect = new Conllect();
        $data = $conllect->getCollect($aid);
    }
}
