<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class Test extends Model
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
    public $table = 'test';
    public function getTest(){
        $data = DB::table('question')
            ->inRandomOrder()
            ->take(5)
            ->get();
        return $data;
    }
    public function getAddTest(){
        $get = Input::get();

        $id = Auth::id();
        $status = DB::table('users')->where('id','=',$id)->get();
        $question = implode(",",$get['headline']);
//        for($i=0;$i<5;$i++){
//            $headline = $get['headline'][$i];
//            $aa[] = $headline+',';
//        }
//        dd($aa);
        $length = count($get['content']);
        $date = [];
        for($i=0;$i<$length;$i++){
            $content = $get['content'][$i];
            $question_id = $get['headline'][$i];
//            dd($content);

            $date[] = DB::table('answer')->insertGetId(['answer'=>$content,'question_id'=>$question_id,'uid'=>$id]);
        }
        $aswer = implode(",",$date);
//        dd($date);
        $data = DB::table('test')->insertGetId(['uid'=>$id,'test_name'=>$get['test_name'],'status'=>$status[0]->status,'question_id'=>$question,'answer_id'=>$aswer]);

        if( $data ){
            return true;
        }else{
            return false;
        }
//        dd($data);

    }
}
