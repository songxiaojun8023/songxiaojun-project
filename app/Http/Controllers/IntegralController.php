<?php
/**
 * Created by PhpStorm.
 * User: 郭鹏航
 * Date: 2019/5/30
 * Time: 23:08
 */

namespace App\Http\Controllers;

use App\Integral;

class IntegralController extends Controller
{
    //定义接口需要的常量
    const APP_ID = '16100280';
    const API_KEY = '8hsZqb0WhPer7qQQqcjVKrYY';
    const SECRET_KEY = 'UDZpw5XvTFYZSlUY6nri7qqPgUqNo2ze';
    //积分
    public function myIntegral(){
        $question = new Integral();
        $data=$question->myIntegral();
        return view('Integral.myIntegral',['data'=>$data]);
    }
}