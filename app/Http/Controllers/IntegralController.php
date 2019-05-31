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
    //积分
    public function myIntegral(){
        $question = new Integral();
        $data=$question->myIntegral();
        return view('integral.myIntegral',['data'=>$data]);
    }
}