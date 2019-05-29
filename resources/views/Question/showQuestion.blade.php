<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>搜索</title>
</head>
<style type="text/css">
    div.show{
        width: 50%;
        text-align: left;
        margin: 0 auto;
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
    <link rel="stylesheet" href="../layui/css/layui.css" media="all">

    {{--搜索后展示页的搜索框--}}
    <div type="search" align="center">
        <input type="text" style="width: 40%;height: 35px">
        <button class="layui-btn layui-btn-radius layui-btn-normal">搜索</button>
    </div>

    <br>

    {{--搜索出来的问题列表及问题所对应的采纳度最高的一条答案--}}
    <div class="show">
        <dl class="qa">
            <dt class="question">
                <a href="showOneQuestion">这是问题1</a>
            </dt>
            <dd class="answer">这是答案1</dd>
        </dl>
    </div>
    <br>
    <div class="show">
        <dl class="qa">
            <dt class="question">
                <a href="showOneQuestion">这是问题2</a>
            </dt>
            <dd class="answer">这是答案2</dd>
        </dl>
    </div>
    <br>
    <div class="show">
        <dl class="qa">
            <dt class="question">
                <a href="showNoAnswerQuestion">这是问题3</a>
            </dt>
            <dd class="answer">暂无答案</dd>
        </dl>
    </div>
    <br>
@endsection
<script type="text/css" src="../layui/layui.js"></script>

</body>
</html>
