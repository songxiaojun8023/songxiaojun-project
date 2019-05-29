@extends('layouts.app')
    {{--用户中心模块--}}
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">




    <a href="myQuestionList" class="layui-btnMyCenter">我发布的问题列表</a>
    <a href="myAnswerQuestion" class="layui-btn">我答过的问题列表</a>
    <a href="myTest" class="layui-btn">我答过的试卷</a>
    <a href="myConllect" class="layui-btn">我收藏过的问题</a>
    <a href="myMessage" class="layui-btn">个人基本信息</a>
    <a href="#" class="layui-btn">积分：1000000分</a>
    {{--<button class="layui-btn layui-btn-lg" >积分：1000000分</button>--}}



@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
<script>

</script>