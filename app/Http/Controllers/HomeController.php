<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 后台首页
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //实例化试题模型
        $question = new Question();
        //无答案列表
        $data['question']=$question->getQuestionLists();
        //有答案类表
        $data['questionAnswer']=$question->getQuestionAnswerList();

        return view('home',$data);
    }
}
