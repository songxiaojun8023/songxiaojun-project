<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
</style>
<body>
@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css" media="all">
    <div class="Allof">
        <div class="search" align="center">
            <input type="text" style="width: 40%;height: 35px">
            <button class="layui-btn layui-btn-radius layui-btn-normal">搜索</button>
        </div>

        <div class="show">
            <dl class="qa">
                <dt class="question">
                    <a href="showNoAnswerQuestion" id="question_id">这是问题1</a>
                </dt>
            </dl>
        </div>
    <br>
    <div class="show">
        <dl class="qa">
            <dt class="question">
                <a href="showNoAnswerQuestion" id="question_id">这是问题2</a>
            </dt>
        </dl>
    </div>
    <br>
    <div class="show">
        <dl class="qa">
            <dt class="question">
                <a href="showNoAnswerQuestion" id="question_id">这是问题3</a>
            </dt>
        </dl>
    </div>
    <br>
</div>
@endsection
<script type="text/css" src="../layui/layui.js"></script>
</body>
</html>