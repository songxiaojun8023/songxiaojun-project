<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AipOcr;
use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use phpDocumentor\Reflection\Types\Self_;

class QuestionController extends Controller
{

    //定义接口需要的常量
    const APP_ID = '16100280';
    const API_KEY = '8hsZqb0WhPer7qQQqcjVKrYY';
    const SECRET_KEY = 'UDZpw5XvTFYZSlUY6nri7qqPgUqNo2ze';

    public static $array_data=[];


    //分词搜索
    public function showQuestion(){

        return view('question.showQuestion');
    }

    //显示指定某个问题详情---问题，多个答案，作者，收藏，采纳
    public function showOneQuestion(Request $request){
        $qid = $request->all();
//        dd($qid);
        $question = new Question();
        $data = $question->showOneQuestion($qid);
        return view('question.showOneQuestion')->with('data',$data);

    }

    //有答案问题列表
    public function questionAnswerList(){
        $question = new Question();
        $data=$question->questionAnswerList();//return $data;
//        print_r($data);die;
        return  view('question.questionAnswerList')->with('data',json_encode($data));
    }

    //无答案问题列表
    public function showQuestionList(){
        $question = new Question();
        $data = $question->showQuestionList();//return $data;
        return  view('question.showQuestionList')->with('data',json_encode($data));

    }

    //无答案问题详情页,一条问题
    public function showNoAnswerQuestion(Request $request){
        $qid = $request->all();
//        dd($qid);
        $question = new Question();
        $data = $question->showNoAnswerQuestion($qid);
//        print_r($data);die;
        return  view('question.showNoAnswerQuestion')->with('data',$data);
    }

    //发布问题--页面
    public function pushQuestion(){
        return  view('question.pushQuestion');
    }

    //图片识别
    public function PicQuestion(Request $request){
       //echo  request()->yin();die;
       //dd($request->all());die;
        $post = $request->all();

        if(request()->isMethod('post')){


            //保存到本地磁盘---返回路径
            $path = request()->file('file')->store('upload');
            //dd($path);die;
            $file_path = public_path().'/upload/'.$path;
//            $file_path = public_path().'/upload/'.'1.png';
//            $path = public_path().'/upload/'.'1.png';

            //var_dump(request('size'));diel


            //echo $file_path;die;

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
                    //request('size')  用户根据图片情况选择的不同的行间距，多题默认为60，单提默认为10
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


            array_push($array,"./upload/".$path);


            static::$array_data = $array;
            //dd($array);die;
            session(['test_data'=>$array]);
            $img = $array[count($array)-1];
            $num = count($array)-1;
            unset($array[$num]);
            //echo $img;die;
           //识别出的结果存入了session，最后一条数据为图片路径

            //var_dump(session('test_data'));die;


            //        return ['code'=>200,'message'=>'ok'];
        }
            if(isset($post["yin"]) && !empty($post['yin'])){
                return view('Iphone.picIphoneQuestion',["img"=>$img,"data"=>$array]);
            }
            return view('question.picQuestion',["img"=>$img,"data"=>$array]);
    }

    //图片识别完成，编辑后上传试题
    public function addPicQuestion(Request $request){
        $post = $request->all();
        //print_r($post);die;
        $question = new Question();
        $img = session('test_data');
        $src = $img[count($img)-1];
        for($i=0;$i<count($post['question']);$i++){
            $res = $question->moreaddQuestion($post['question'][$i],$src);
        }
        //$question->addAnswer($post['question']);
        if($res){
            return redirect("user/myQuestionList");
        }else{
            echo "添加失败<br/>";
            echo "<a href='url(question/pushQuestion)'>返回</a>";
        }
    }

    //form表单提交 录入试题
    public function pushFormQuestion(Request $request){
        $post = $request->all();
        //print_r($post);die;
        //$arr =session('test_data');

        $question = new Question();
        $res = $question->addAnswer($post['desc']);
        //var_dump($res);die;
        if($res){
          return redirect("user/myQuestionList");
        }else{
            echo "添加失败<br/>";
            echo "<a href='url(question/pushQuestion)'>返回</a>";
        }
    }



}