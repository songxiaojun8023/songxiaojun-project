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
        $length = count($get['content']);
        for($i=0;$i<$length;$i++){
            $content = $get['content'][$i];
            $question_id = $get['headline'][$i];
//            dd($content);
            $data = DB::table('answer')->insertGetId(['answer'=>$content,'question_id'=>$question_id,'uid'=>$id]);
        }
        if( $data ){
            return true;
        }else{
            return false;
        }
//        dd($data);

    }
}
