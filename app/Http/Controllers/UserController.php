<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\User;

class UserController extends Controller
{
    //定义接口需要的常量
    const APP_ID = '16100280';
    const API_KEY = '8hsZqb0WhPer7qQQqcjVKrYY';
    const SECRET_KEY = 'UDZpw5XvTFYZSlUY6nri7qqPgUqNo2ze';

    //用户个人中心
    public function myCenter(){
        $question = new User();
        $data=$question->getmyCenter();
//        dd($data);
        $c = 0;
        foreach($data as $k=>$v){
//             $data[$k]->intgral;
            $c = $c + $data[$k]->intgral;
        }

//        dd($c);
        return view('User.myCenter',['data'=>$c]);
    }

    //我发布的问题列表
    public function myQuestionList(){
        $question = new User();
        $data=$question->getMyQuestionList();//return $data;
        $aa = json_decode(json_encode($data),true);
        foreach($aa as &$v){
            $v['created_at'] = date('Y-m-d H:i:s',$v['created_at']);
            $v['updated_at'] = date('Y-m-d H:i:s',$v['updated_at']);
        }

//        dd($aa);
//        dd($data);
//        $data[0]->updated_at[]
        $v = json_encode($aa);
//        dd($time);

        return view('User.myQuestionList',['data'=>$v])   ;
    }

    //我回答过的问题列表
    public function  myAnswerQuestion(){
        $question = new User();
        $data=$question->getMyAnswerQuestion();
        $v = json_encode($data);
        return view('User.myAnswerQuestion',['data'=>$v]);
    }

    //我的做过的试题列表
    public function myTest(){
        $question = new User();
        $data=$question->getMyTest();
        return view('User.myTest',['data'=>$data]);
    }

    //我的试题详情
    public function myTestDetail(){
        $question = new User();
        $data=$question->getMyTrstDetail();
//        dd($data);
        return view('User.myTestDetail',['data'=>$data]);
    }

    //删除指定试卷
    public function delMyTest(){
        return ['code'=>200,'message'=>'ok'];
    }

    //我的收藏问题列表
    public function myConllect(){

        $question = new User();
        $data=$question->getMyCollect();
        return view('User.myConllect',['data'=>$data]);
    }

    //删除我的收藏试题
    public function delMyConllect(){

        return ['code'=>200,'message'=>'ok'];
    }

    //我的积分
    public function editIntegral(){
        return ['code'=>200,'message'=>'ok'];
    }

    //用户基本信息
    public function myMessage(){
        return view('User.myMessage');
    }

    //修改个人信息
    public function editMyMessage(){
        return view('User.editMyMessage');
    }

    //处理修改
    public function doEditMyMessage(Request $request){
        $post = $request->all();
       // print_r($post);die;
        $user = new User();
        $res = $user->up_user($post['username'],$post['email']);
        //return ['code'=>200,'message'=>'ok'];
        if($res){
            return json_encode(["message"=>'修改成功',"code"=>200]);
        }else{
            return json_encode(["message"=>'修改失败',"code"=>202]);
        }
    }

}
