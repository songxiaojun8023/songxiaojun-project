<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

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
    //获取有答案问题列表-----首页
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

    //获取无答案问题列表------首页
    public function getQuestionLists(){
        return  self::where('status','=','0')->get()->toArray();

    }

    //有答案问题详情页
    public function questionAnswerList(){

        $data = self::where('status','=','1')
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
                    $data[$k]['answerList']=$arr[0];
                }
            }
        }
        return $data;
    }

    //无答案试题列表
    public function showQuestionList(){

        return self::where('status','=','0')
                    ->get()
                    ->toArray();
    }

    //指定问题详情页--无答案
    public function showNoAnswerQuestion(){
        //伪数据，真实数据从get得到
        $question_id = 9;
        return self::where('question_id','=',$question_id)->first();
    }

    //显示指定某个问题详情---   一个问题，多个答案，作者，收藏，采纳
    public function showOneQuestion($qid){
        $user = new User();
        //伪数据，真实数据从get得到

        $data = self::where('question_id','=',$qid)->get()->toArray();
//      print_r($data);die;
//        echo trim();
        $answer_id_arr = explode(',',trim($data[0]['answer_id'],","));
//        unset($answer_id_arr[count($answer_id_arr-1)]);
//         print_r($answer_id_arr);die;
        foreach ($answer_id_arr as $key=>$val){
            //取3条
//            if($key < 3){
                $arr=DB::table('answer')
                    ->where('answer_id','=',$val)
                    ->orderBy('conllect_num','desc')//排序有问题，因为单条搜索导致
                    ->get()
                    ->map(function ($value) {
                        return (array)$value;
                    })
                    ->toArray();
//            print_r($arr);die;
                $data[0]['answerList'][]=$arr[0];
                $user_name = $user::find($arr[0]['uid']);
                $data['user_name']=$user_name['name'];
//            }

        }
//        print_r($data);die;
        return $data;
    }

    //提交问题答案
    public function addAnswer(){
        //数据是from
        $uid = Auth::id();
        $question_id = 1; //伪数据


    }





}
