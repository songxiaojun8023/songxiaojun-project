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
    public function getMyQuestionList(){

        $id = Auth::id();
        $data = DB::table('question')->where('uid','=',$id)->get();
        return $data;
    }
    public function getMyAnswerQuestion(){
        $id = Auth::id();
        $data = DB::table('answer')
            ->leftJoin('question','answer.question_id','=','question.question_id')
            ->where('answer.uid','=',$id)
            ->get();
        return $data;
    }
}
