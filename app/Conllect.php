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
    public function getConllect($qid)
    {
//        print_r($qid);die;
        $q = $qid['q_id']; //问题ID
        $uid = auth::id(); //当前用户ID
//        print_r($q);

        $aaa = DB::table('conllect')
            ->select('collect_id')
            ->where([
                ['question_id','=',$q],
                ['uid','=',$uid]
            ])
            ->get()->toArray();
//        dd($aaa);

        if($aaa == null){
            $data = DB::table('conllect')->insertGetId(['status'=>1,'uid'=>$uid,'question_id'=>$q]);
            print_r($data);die;
        }else{
            die;
        }

    }

//        $data = DB::table('users')
//            ->select('conllect_id')
//            ->find($uid);
//        $cid = $data->conllect_id;
////        print_r($cid);die;
////        print_r($data->conllect_id);die;
//        if(empty($data->conllect_id)){
//            DB::table('users')
//                ->where('id','=',$uid)
//                ->update(['conllect_id'=>$qid['q_id']]);
//        }
//        if($cid){
//            echo 1111111111;die;
//        }
//        else{
//                echo 2222222222;die;
//                $a = $data->conllect_id;
//                $b = $a.",".$q;
////            echo $b;die;
//                DB::table('users')
//                    ->where('id','=',$uid)
//                    ->update(['conllect_id'=>$b]);

//            print_r($res);die;

//        dd($data);
//        return $data;
//        $result->first()


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
