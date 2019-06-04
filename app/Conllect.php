<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Input;


class Conllect extends Model
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
    public $table = 'conllect';

    //用户收藏
    public function getConllect($qid){
//        print_r($qid);die;
        $q = $qid['q_id'];
        $uid = auth::id();
//        print_r($uid);die;

        $data = DB::table('users')
            ->select('conllect_id')
            ->find($uid);
//        echo $data->conllect_id;die;
        if(empty($data->conllect_id)){
            $res = DB::table('users')
                ->where('id','=',$uid)
                ->update(['conllect_id'=>$qid['q_id']]);
        }else{
            $a = $data->conllect_id;
            $b = $a.",".$q;
//            echo $b;die;
            $res = DB::table('users')
                ->where('id','=',$uid)
                ->update(['conllect_id'=>$b]);
        }
//        dd($data);
        return $data;
//        $result->first()
    }

    //用户采纳
    public function getCollect($aid){
//        print_r($aid);die;
        $uid = auth::id();
////        print_r($uid);
        $data = DB::table('answer')->where('answer_id','=',$aid['a_id'])->increment('conllect_num');
        DB::table('intgral')->insertGetId(['user_id'=>$aid['a_us'],'intgral'=>'5','todo'=>'被采纳+5积分']);

//        print_r($data);die;
    }

}
