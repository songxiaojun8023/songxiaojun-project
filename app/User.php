<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class User extends Authenticatable
{

    use Notifiable;

    /**
     * 模型中日期字段的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //用户个人中心
    public function getmyCenter(){
        $id = Auth::id();
        $data = DB::table('intgral')->where(['user_id'=>$id])->get();
        return $data;
    }
    //我发布的问题列表
    public function getMyQuestionList(){

        $id = Auth::id();
        $data = DB::table('question')->where('uid','=',$id)->get();
        return $data;
    }
    //我回答过的问题列表
    public function getMyAnswerQuestion(){
        $id = Auth::id();
        $data = DB::table('answer')
            ->leftJoin('question','answer.question_id','=','question.question_id')
            ->where('answer.uid','=',$id)
            ->get();
        return $data;
    }
    public function getMyTest(){
        $id = Auth::id();
        $data = DB::table('test')->where('uid','=',$id)->get();
        return $data;
    }
    public function getMyCollect(){
        $id = Auth::id();
        $data = DB::table('conllect')
            ->leftJoin('question','conllect.question_id','=','question.question_id')
            ->leftJoin('answer','question.question_id','=','answer.question_id')
            ->where('conllect.uid','=',$id)
            ->get();
//        dd($data);
        return $data;
    }
}
