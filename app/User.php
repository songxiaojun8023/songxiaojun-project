<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;


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
    public $table = 'users';
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
        $data = DB::table('question')->where('uid','=',$id)->orderBy('question_id','desc')->get();
        return $data;
    }
    //我回答过的问题列表
    public function getMyAnswerQuestion(){
        $id = Auth::id();
        $data = DB::table('answer')
            ->leftJoin('question','answer.question_id','=','question.question_id')
            ->where('answer.uid','=',$id)
            ->orderBy('question.question_id','desc')
            ->get();
        return $data;
    }
    //试卷展示页
    public function getMyTest(){
        $id = Auth::id();
        $data = DB::table('test')->where('uid','=',$id)->orderBy('question_id','desc')->get();
        return $data;
    }
    public function getMyCollect(){
        $id = Auth::id();
        $data = DB::table('conllect')
            ->leftJoin('question','conllect.question_id','=','question.question_id')
//            ->leftJoin('answer','question.question_id','=','answer.question_id')
            ->where('conllect.uid','=',$id)
            ->get();
//        dd($data);
        return $data;
    }
    //试卷详情页
    public function getMyTrstDetail(){
        //获取前台传过来的ID值
        $pid = Input::get();
        //用前台传过来ID值来查询这个试卷的信息
        $data = DB::table('test')->where('test_id','=',$pid)->get()
            ->map(function($value){
                return (array)$value;
            })
            ->toArray();

        $question = $data[0]['question_id'];
        $question_id = explode(',',trim($question,","));
        $answer = $data[0]['answer_id'];
        $answer_id = explode(',',$answer);
//        dd($question_id);
//循环数据把转换成数组的数据循环查询下，查询完并添加一个新的字段，把查出啦id值添加到这个新的字段里
        foreach($question_id as $k=>$v){
            $arr = DB::table('question')
                ->where('question_id','=',$v)
                ->get()
                ->map(function($value){
                    return (array)$value;
                })
                ->toArray();
//            dd($arr);
            $data[0]['questionId'][]=$arr[0];
//            $question_id = $question::find($arr[0][0]);

        }
        foreach($answer_id as $k=>$v){
            $add = DB::table('answer')
                ->where('answer_id','=',$v)
                ->get()
                ->map(function($value){
                    return (array)$value;
                })
                ->toArray();
            $data[0]['answerId'][]=$add[0];
//            $question_id = $question::find($arr[0][0]);
        }

        //查找questtion里面的 id .取问题名，取完问题名字还要取到答案名字



//        $date = DB::table('test')->where('test_id','=',$pid)
//                    ->leftJoin('question','test.question_id','=','question.question_id')
//                    ->where('question.question_id','=',$question_id[$i])
//                    ->leftJoin('answer','question.question_id','=','answer.question_id')
//                    ->where('answer.answer_id','=',$answer_id[$i])
//                    ->orderBy('test_id','desc')
//                    ->get();

//        dd($data);
        return $data;
    }
    public function up_user($username,$email){
        $id = Auth::id();
      return $this->where("id",$id)->update(["name"=>$username,"email"=>$email]);
    }
}
