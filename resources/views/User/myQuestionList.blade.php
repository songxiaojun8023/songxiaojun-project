@extends('layouts.app')
    {{--我的问题--}}
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">

    <div align="center">
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
        <a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy">问题详情页</a>
    </div>
    <div id="test1" align="center"></div>

    <script src="/static/build/layui.js"></script>
    <script>
        layui.use('laypage', function(){
            var laypage = layui.laypage;

            //执行一个laypage实例
            laypage.render({
                elem: 'test1' //注意，这里的 test1 是 ID，不用加 # 号
                ,count: 51,
                limit:3//数据总数，从服务端得到
            });
        });
    </script>
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
