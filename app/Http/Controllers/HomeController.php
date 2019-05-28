<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //支撑后台首页的数据 [ ‘question’=>[xxx10条]，’questionAndAnswer’=>[xxx10条] ]；

        $data['question']=[
                            ['question_id'=>1, 'question'=>'who are you ?', 'status'=>1, 'answer_id'=>'', 'uid'=>1, 'created_at'=>'1525251'],
                            ['question_id'=>2, 'question'=>'who 2 ?', 'status'=>1, 'answer_id'=>'', 'uid'=>1, 'created_at'=>'1525251'],
                            ['question_id'=>3, 'question'=>'who 3 ?', 'status'=>1, 'answer_id'=>'', 'uid'=>1, 'created_at'=>'1525251'],
        ];
        $data['questionAnswer']=[
                                [
                                'question_id'=>1,
                                'question'=>'who ?',
                                'status'=>1,
                                'answer_id'=>'12,110,3',
                                'uid'=>1,
                                'created_at'=>'1525251',
                                'answerList'=>[
                                        ['answer_id'=>12,'answer'=>'you goods !','question_id'=>1,'uid'=>1,'collect_num'=>3,'status'=>1,'created_at'=>'15232323'],
                                        ['answer_id'=>110,'answer'=>'no good !','question_id'=>2,'uid'=>1,'collect_num'=>0,'status'=>1,'created_at'=>'1523239'],
                                        ['answer_id'=>3,'answer'=>'very good !','question_id'=>3,'uid'=>1,'collect_num'=>13,'status'=>1,'created_at'=>'15232323'],

                                ]],
                                [
                                    'question_id'=>1,
                                    'question'=>'who ?',
                                    'status'=>1,
                                    'answer_id'=>'12,110,3',
                                    'uid'=>1,
                                    'created_at'=>'1525251',
                                    'answerList'=>[
                                        ['answer_id'=>12,'answer'=>'you goods !','question_id'=>1,'uid'=>1,'collect_num'=>3,'status'=>1,'created_at'=>'15232323'],
                                        ['answer_id'=>110,'answer'=>'no good !','question_id'=>2,'uid'=>1,'collect_num'=>0,'status'=>1,'created_at'=>'1523239'],
                                        ['answer_id'=>3,'answer'=>'very good !','question_id'=>3,'uid'=>1,'collect_num'=>13,'status'=>1,'created_at'=>'15232323'],
                                ]],
                                [
                                    'question_id'=>1,
                                    'question'=>'who ?',
                                    'status'=>1,
                                    'answer_id'=>'12,110,3',
                                    'uid'=>1,
                                    'created_at'=>'1525251',
                                    'answerList'=>[
                                        ['answer_id'=>12,'answer'=>'you goods !','question_id'=>1,'uid'=>1,'collect_num'=>3,'status'=>1,'created_at'=>'15232323'],
                                        ['answer_id'=>110,'answer'=>'no good !','question_id'=>2,'uid'=>1,'collect_num'=>0,'status'=>1,'created_at'=>'1523239'],
                                        ['answer_id'=>3,'answer'=>'very good !','question_id'=>3,'uid'=>1,'collect_num'=>13,'status'=>1,'created_at'=>'15232323'],

                                ]]
        ];

        return view('home',$data);
    }
}
