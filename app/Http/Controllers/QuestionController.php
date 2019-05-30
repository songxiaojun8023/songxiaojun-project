<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;

class QuestionController extends Controller
{
    //分词搜索
    public function showQuestion(){

        return view('question.showQuestion');
    }

    //显示指定某个问题详情---问题，多个答案，作者，收藏，采纳
    public function showOneQuestion(){
        $question = new Question();
        $data = $question->showOneQuestion();
        return view('question.showOneQuestion',$data)->with('data',$data);
    }

    //有答案问题列表
    public function questionAnswerList(){
        $question = new Question();
        $data=$question->questionAnswerList();//return $data;
        return  view('question.questionAnswerList')->with('data',json_encode($data));
    }

    //无答案问题列表
    public function showQuestionList(){
        $question = new Question();
        $data = $question->showQuestionList();//return $data;
        return  view('question.showQuestionList')->with('data',json_encode($data));

    }

    //无答案问题详情页,一条问题
    public function showNoAnswerQuestion(){

        $question = new Question();
        $data = $question->showNoAnswerQuestion();
        return  view('question.showNoAnswerQuestion')->with('data',$data);
    }

    //发布问题--页面
    public function pushQuestion(){
        return  view('question.pushQuestion');
    }

    //图片识别
    public function PicQuestion(){

        return view('question.picQuestion');
    }

    //图片识别完成，编辑后上传试题
    public function addPicQuestion(){

        return ['code'=>200,'message'=>'ok'];
    }

    //form表单提交 录入试题
    public function pushFormQuestion(){

        $question = new Question();
        $question->addAnswer();
        return ['code'=>200,'message'=>'ok'];
    }



}