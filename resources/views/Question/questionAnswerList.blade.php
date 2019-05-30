<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../layui/css/layui.css" media="all">
    <title>更多</title>
</head>
<style type="text/css">
    div.Allof{
        margin-top:3%;
        margin-left:10%;
    }
    div.show{
        width: 50%;
        text-align: left;
        margin:0 auto;
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
</style>
<body>
@extends('layouts.app')
@section('content')
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
      console.log(v);


        var a = v[0];
        var date = [];
        for(i=0;i<a.length;i++){
            // console.log(a[i]['question']);
            date.push(a[i]['question']);
        }

        console.log(v);
        console.log(a);

        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage;

            laypage.render({
                elem: 'test1'
                ,count: date.length
                ,limit:3
                ,jump: function(obj){
                    //模拟渲染
                    document.getElementById('question_id').innerHTML = function(){
                        var arr = []
                            ,thisData = date.concat().splice(obj.curr*obj.limit - obj.limit, obj.limit);
                        layui.each(thisData, function(index, item){
                            arr.push('<a href="showOneQuestion">'+1+'</a>'+'<br /><br />');
                        });
                        return arr.join('');
                    }();
                }
            })
        });
    </script>


@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
</body>
</html>