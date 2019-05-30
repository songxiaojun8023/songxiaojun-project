<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AipOcr;
use Illuminate\Http\Request;
use App\Work;
use phpDocumentor\Reflection\Types\Self_;

class AiController extends Controller
{

    //定义接口需要的常量
    const APP_ID = '16100280';
    const API_KEY = '8hsZqb0WhPer7qQQqcjVKrYY';
    const SECRET_KEY = 'UDZpw5XvTFYZSlUY6nri7qqPgUqNo2ze';

    public static $array_data=[];

    //图文识别首页
    public function addTest(){

        if(request()->isMethod('post')){


            //保存到本地磁盘---返回路径
            $path = request()->file('file')->store('work');
            $file_path = public_path().'/upload/'.$path;


            //调用OCR接口
            $client = new AipOcr(self::APP_ID, self::API_KEY, self::SECRET_KEY);
            $image = file_get_contents( $file_path );

            //含位置信息的
            $res = $client->general($image);
            $word = $res['words_result'];


            $arr=[];

            for($i=0;$i<count($word);$i++){//首次循环，取区间数据

                //大于1执行
                if($i>=1){

                    if((int)$word[$i]['location']['top'] - (int)$word[$i-1]['location']['top']  > request('size')){

                        $arr[]=$i;
                    }

                }else{

//                    echo $word[$i]['words'].'<br/>';//第一条
                }

            }


            $array=[];
            //二次循环，用区间数据，大致划分出试题
            for( $n=0;$n<count($arr)-1;$n++ ){//区间数据循环

                $w = '';

                for($i=0;$i<count($word);$i++){//文字数组循环


                    if( $i >= $arr[$n] && $i < $arr[$n+1] ){

                        $w .=  $word[$i]['words']."<br/>";
                    }
                }

                $array[]=$w;

            }


            //如果结果数组不为空，调用模型入库操作
            if( empty($array) ){
                return redirect()->back()->with(['msg'=>'识别失败,建议：调整文本间距 或 上传清晰图片']);
            }


            array_push($array,$path);


            static::$array_data = $array;
            session(['test_data'=>$array]);


            return redirect('/home/checkTest');

        }
        //添加页面
        return view('addTest');

    }


    /**
     * 返回信息用户供其核对数据
     */
    public function checkTest(){

        if(request()->isMethod('post')){

            return  session('test_data');

        }

        return view('checkTest');

    }

    /**
     * 处理用户核对完成的数据
     */
    public function doCheckTest(){

        $test = request('test');

        if(empty($test)){
            return redirect()->back()->with(['msg'=>'识别数据为空']);
        }

        $woke = new Work();
        $woke->addTest($test);
        return redirect('/home/testList');
    }

    /**
     * 试题列表管理
     */
    public function testList(){
        $work = new Work();
        $data = $work->list();

        return view('testList',['data'=>json_encode($data)]);

    }

    /**
     * 试题修改
     */
    public function updTest(){

        $work = new Work();
        $res = $work->updTest();

        if(!$res){

            return ['code'=>0,'msg'=>'no'];
        }
        return ['code'=>200,'msg'=>'ok'];
    }

    /**
     * 试题删除
     */
    public function delTest(){

        if($id = request('id')){
            $work = new Work();
            $res = $work::destroy($id);
            if(!$res){
                return ['code'=>0,'msg'=>'删除失败'];
            }

            return ['code'=>200,'msg'=>'删除成功'];
        }

        return ['code'=>0,'msg'=>'无发现id'];

    }

    /**
     * 关键字搜索
     */

    public function searchTest(){

        $work = new Work();
        return $work->searchTest();

    }





}
