<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Answer extends Model
{
    /**
     * 模型中日期字段的存储格式
     *
     * @var string
     */
    protected $dateFormat = 'U';
    /**
     * 指定 table
     */
    public $table = 'answer';

    //用户提交答案
    public function Addanswer($ans){
//        print_r($ans);die;
        $a = $ans['ans']; //答案内容
        $q = $ans['qid']; //问题ID
        $id = auth::id(); //当前用户的ID
//        dd($q);
        $aid = DB::table('answer')
            ->insertGetId(['uid'=>$id,'question_id'=>$q,'answer'=>$a,'status'=>1]);
//        print_r($aid);die;

        $data = DB::table('question')
            ->select('answer_id')
            ->where('question_id','=',$q)
            ->get()
        ->map(function ($value) {
            return (array)$value;
        })
            ->toArray();

        $aaa = $data[0]['answer_id'];
//        dd($aaa);
//        dd($data[0]['answer_id']);
        if(empty($aaa)){
//            echo 1111111111;die;
            $res = DB::table('question')
                ->where('question_id','=',$q)
                ->update(['answer_id' => $aid,'status' => 1]);
            DB::table('intgral')->insertGetId(['user_id'=>$id,'intgral'=>'4','todo'=>'回答问题+4积分']);
        }else {
//            echo 2222222222;die;
            $l = $aaa;
            $k = $l . "," . $aid;
//            echo $b;die;
            $res = DB::table('question')
                ->where('question_id', '=', $q)
                ->update(['answer_id' => $k]);
            DB::table('intgral')->insertGetId(['user_id'=>$id,'intgral'=>'4','todo'=>'回答问题+4积分']);
        }
        return $data;

    }
}
