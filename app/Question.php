<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use Illuminate\Support\Facades\DB;

class Question extends Model
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
    public $table = 'question';

    //获取home.php 所需要的展示数据，有答案列表，和无答案列表
    public function getQuestionList(){



    }


    //获取有答案问题列表
    public function getQuestionAnswerList(){

        $data = self::where('status','=','1')
                        ->limit(10)
                        ->get()
                        ->toArray();

        foreach ($data as $k=>$v){
          //转变数组
          $answer_id_arr = explode(',',$v['answer_id']);
          //弹出最后一位空值
          array_pop($answer_id_arr);
          foreach ($answer_id_arr as $key=>$val){
              //取3条
              if($key < 1){
                  $arr=DB::table('answer')
                      ->where('answer_id','=',$val)
                      ->orderBy('conllect_num','desc')
                      ->orderBy('created_at','desc')
                      ->get()
                      ->map(function ($value) {
                          return (array)$value;
                      })
                      ->toArray();
                  $data[$k]['answerList'][]=$arr[0];
              }
          }
        }

        return $data;



    }

    //获取无答案问题列表
    public function getQuestionLists(){
        return  self::where('status','=','0')->get()->toArray();


    }


}
