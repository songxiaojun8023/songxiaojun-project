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
        print_r($qid['q_id']);die;
        $data = DB::table('users')
            ->insert('users','conllect_id','=',$qid['q_id'])
            ->where()
            ->get();

        print_r($data);die;
        return $data;
    }
}
