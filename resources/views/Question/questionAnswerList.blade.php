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
                <dt class="question">
                    <a href="showOneQuestion" id="question_id">这是问题1</a>
                </dt>
                <dd class="answer" id="answer_id">这是答案1</dd>
            </dl>
        </div>
        <br>
        <div class="show">
            <dl class="qa">
                <dt class="question">
                    <a href="showOneQuestion" id="question_id">这是问题2</a>
                </dt>
                <dd class="answer" id="answer_id">这是答案2</dd>
            </dl>
        </div>
        <br>
        <div class="show">
            <dl class="qa">
                <dt class="question">
                    <a href="showNoAnswerQuestion" id="question_id">这是问题3</a>
                </dt>
                <dd class="answer" id="answer_id">这是答案3</dd>
            </dl>
        </div>
        <br>
        <div id="test1" align="center"></div>
        <script src="../layui/layui.js"></script>
        <script type="text/javascript">
            layui.use('laypage', function(){
                var laypage = layui.laypage;

                //执行一个laypage实例
                laypage.render({
                    page:true,
                    elem: 'test1' //注意，这里的 test1 是 ID，不用加 # 号
                    ,count:3 //数据总数，从服务端得到
                    ,limit:1//每页显示的条数
                });
            });

        </script>

    </div>


@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
</body>
</html>