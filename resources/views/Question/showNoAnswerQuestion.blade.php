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
    div.question{
        height:30%;
    }

    span.questionTitle{
        font-size: 30px;
        margin-left: 60px;
    }
    div.answerAarea{
        margin-left: 60px;
        margin-top: 40px;
        height: 70%;
    }
    .layui-textareaq{
        width: 80%;
    }
    div.answerAarea .push{
        margin-right: 20%;
        text-align: right;
    }
</style>
<body>
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css" media="all">

    {{--问题的标题、作者及发布的时间--}}
    <div class="question">
        <span class="questionTitle">所点击问题的标题</span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span class="putWriter">提问者：<a href="">111</a></span>
        &nbsp&nbsp&nbsp
        <span class="putTime">提问时间：2019-05-29</span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <button class="layui-btn layui-btn-radius layui-btn-warm" href="">收藏</button>
    </div>

    <hr style="width:100%;height:3px;background-color:#000;"/>

    {{--用户作答区--}}
    <div class="answerAarea">
        <textarea name="" required lay-verify="required" placeholder="请输入" class="layui-textareaq"></textarea>
        <br>
        <div class="push">
            <button href="" class="layui-btn">提交</button>
        </div>
    </div>
@endsection
<script type="text/css" src="../layui/layui.js"></script>
</body>
</html>