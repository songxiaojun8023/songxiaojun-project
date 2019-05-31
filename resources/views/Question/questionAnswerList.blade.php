<<<<<<< HEAD

@extends('layout')
@section('title','test')
@section('content')


=======
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css" media="all">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <title>更多</title>
</head>
>>>>>>> songxiaojun_branch
<style type="text/css">
    div.Allof{
        margin-top:3%;
    }
    div.search{
        margin-left: 10%;
    }
    div.show{
        width: 50%;
        margin-left: 10%;
    }
    dt.question{
        font-size: 20px;
    }
    dt.question a{
        color: #0C0C0C;
    }
    dd.answer{
        color: #383d41;
    }
    div.fen{
        text-align: center;
    }
</style>


<<<<<<< HEAD
<<<<<<< HEAD
<div class="Allof">
    <div class="search">
        <input type="text" style="width: 40%;height: 35px">
        <button class="layui-btn layui-btn-radius layui-btn-normal">搜索</button>
    </div>
    <br />
        {{--<ul id="biuuu_city_list"></ul>--}}
    <div class="show">
        <dl class="qa" id="qa">

        </dl>
    </div>

    <br />
    <div id="demo20" class="fen"></div>
</div>

=======
{{--    <div class="Allof"  id="demo20">--}}
{{--        <div class="search" align="center">--}}
{{--            <input type="text" style="width: 40%;height: 35px">--}}
{{--            <button class="layui-btn layui-btn-radius layui-btn-normal">搜索</button>--}}
{{--        </div>--}}

{{--        <div class="show">--}}
{{--            <dl class="qa">--}}
{{--                <dt class="question">--}}
{{--                    <a href="showOneQuestion" id="question_id">这是问题1</a>--}}
{{--                </dt>--}}
{{--                <dd class="answer" id="answer_id">这是答案1</dd>--}}
{{--            </dl>--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <div class="show">--}}
{{--            <dl class="qa">--}}
{{--                <dt class="question">--}}
{{--                    <a href="showOneQuestion" id="question_id">这是问题2</a>--}}
{{--                </dt>--}}
{{--                <dd class="answer" id="answer_id">这是答案2</dd>--}}
{{--            </dl>--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <div class="show">--}}
{{--            <dl class="qa">--}}
{{--                <dt class="question">--}}
{{--                    <a href="showNoAnswerQuestion" id="question_id">这是问题3</a>--}}
{{--                </dt>--}}
{{--                <dd class="answer" id="answer_id">这是答案3</dd>--}}
{{--            </dl>--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <div id="test1" align="center"></div>--}}

=======
>>>>>>> parent of dfeaf9f... 增加了AI识别图片
        <div id="demo20"></div>
        <ul id="biuuu_city_list"></ul>
>>>>>>> songxiaojun_branch

        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script src="../layui/layui.js"></script>

<script type="text/javascript">

    $(function () {
        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage
            //测试数据
            var data = {!! $data !!};

            //调用分页
            laypage.render({
                elem: 'demo20'
                ,count: data.length,
                limit:3
                ,jump: function(obj){
                    //模拟渲染
                    document.getElementById('qa').innerHTML = function(){
                        var arr = []
                            ,thisData = data.concat().splice(obj.curr*obj.limit - obj.limit, obj.limit);
                        layui.each(thisData, function(index, item){
                            // console.log(item['question_id']);
                            arr.push(
                                '<dt class="question">'
                                +"<a href='{{url('question/showOneQuestion')}}?q_id="+item['question_id']+"'>"
                                + item['question']
                                +'</a>'
                                +'</dt>'
                                +'<br />'
                                +'<dd class="answer">'
                                +item['answerList']['answer']
                                +'</dd>'
                                +'<br /><br />'
                            );
                        });
                        return arr.join('');
                    }();
                }
            });
        });
    });
</script>
<<<<<<< HEAD
<<<<<<< HEAD
=======
    
>>>>>>> parent of dfeaf9f... 增加了AI识别图片
=======

<<<<<<< HEAD
=======
    </div>



</div>

<<<<<<< HEAD
>>>>>>> songxiaojun_branch
=======
>>>>>>> dev

    @csrf

    <div class="Allof">
        <div class="search" align="center">
            <input type="text" style="width: 40%;height: 35px">
            <button class="layui-btn layui-btn-radius layui-btn-normal">搜索</button>
        </div>

        <div class="show">
            <dl class="qa">
                <dt class="question" id="question_id">
                    {{--<a href="showOneQuestion" id="question_id"></a>--}}
                </dt>
                <dd class="answer" id="answer_id">这是答案1</dd>
            </dl>
        </div>
        <br>

        {{--<dt id="qalist"></dt>--}}
        <div id="test1" align="center"></div>
    </div>

    <script src="../layui/layui.js"></script>
    <script type="text/javascript">
        var v = [eval('{{$data}}'.replace(/&quot;/g,'"'))];
      // console.log(v);
        var a = v[0];
        var date = {!! $data !!};
        // for(i=0;i<a.length;i++){
        //     // console.log(a[i]['question']);
        //     date.push(a[i]['question']);
        // }

        // console.log(v);
        // console.log(a);

        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage;

            laypage.render({
                elem: 'test1'
                ,count: date.length
                ,limit:3
                ,jump: function(obj){
                    //模拟渲染
                    document.getElementById('qa').innerHTML = function(){
                        var arr = []
                            ,thisData = date.concat().splice(obj.curr*obj.limit - obj.limit, obj.limit);
                        layui.each(thisData, function(index, item){
                            arr.push('<a href="showOneQuestion">'+item+'</a>'+'<br /><br />');
                        });
                        return arr.join('');
                    }();
                }
            })
        });
    </script>
>>>>>>> parent of dfeaf9f... 增加了AI识别图片

>>>>>>> dev
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
