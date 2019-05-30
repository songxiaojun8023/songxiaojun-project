<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>详情</title>
</head>
<style type="text/css">
    div.Allof{
        margin-top:3%;
    }
    div.question{
        height:30%;
    }

    span.questionTitle{
        font-size: 30px;
        margin-left: 60px;
    }
    div.answer{
        margin-left:60px;
        margin-right:150px;
        margin-top:20px;
    }
    div.putAnswer{
        height: 100%;
        width: 100%;
    }
    span.reslut{
        font-size: 17px;
    }
    dd.respondent{
        color: #6c757d;
    }
    dd.respondent a{
        color: #6c757d;
    }
</style>
<body>
@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="../layui/css/layui.css" media="all">

<div class="Allof">
    {{--问题的标题、作者及发布的时间--}}
    <div class="question">
        <span class="questionTitle">所点击问题的标题</span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span class="putWriter">提问者：<a href="" id="uid">111</a></span>
        &nbsp&nbsp&nbsp
        <span class="putTime" id="created_at">提问时间：2019-05-29</span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        {{--<button class="layui-btn layui-btn-radius layui-btn-warm" href="conllect/conllectQuestion">收藏</button>--}}
        <a href="../conllect/conllectQuestion" class="layui-btn layui-btn-radius layui-btn-warm" id="question_id">收藏</a>
    </div>

    <hr style="width:100%;height:3px;background-color:#000;"/>

    {{--问题所对应的答案、答案作者及回答时间--}}
    <div class="answer">
        <div class="putAnswer">
            <span class="reslut">
                请勿欧赔爱上对方过后就开了自行车VB你们请勿欧赔行车VB你
            </span>
            <dd class="respondent">
                <span class="putWriter">回答者：<a href="" id="uid">111</a></span>
                &nbsp&nbsp&nbsp
                <span class="putTime" id="created_at">2019-05-29</span>
                &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                {{--<button href="answer/collect" class="layui-btn layui-btn-xs">采纳</button>--}}
                <a href="../answer/collect" class="layui-btn layui-btn-xs" id="answer_id">采纳</a>
            </dd>
        </div>
    </div>
    <br><br>

<div class="answer">
    <div class="putAnswer">
            <span class="reslut">
                刚问过我写个投入和给我讲股票为评估价王鹏我
            </span>
        <dd class="respondent">
            <span class="putWriter">回答者：<a href="" id="uid">222</a></span>
            &nbsp&nbsp&nbsp
            <span class="putTime" id="created_at">2019-03-24</span>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="../answer/collect" class="layui-btn layui-btn-xs" id="answer_id">采纳</a>
        </dd>
    </div>
</div>
<br><br>

<div class="answer">
    <div class="putAnswer">
            <span class="reslut">
                我别给我备份违反8位为铺盖我佩服王鹏
            </span>
        <dd class="respondent">
            <span class="putWriter">回答者：<a href="" id="uid">333</a></span>
            &nbsp&nbsp&nbsp
            <span class="putTime" id="created_at">2018-6-23</span>
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <a href="../answer/collect" class="layui-btn layui-btn-xs" id="answer_id">采纳</a>
        </dd>
    </div>
</div>
<br><br>
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
<script type="text/css" src="../layui/layui.js"></script>
</body>
</html>