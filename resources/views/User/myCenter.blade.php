
    {{--用户中心模块--}}
    @extends('layout')
    @section('title', 'test')
    @section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">



    <div class="layui-collapseMyCenter" align="center">
        <a href="myQuestionList" class="layui-btnMyCenter">我发布的问题列表</a>
        <a href="myAnswerQuestion" class="layui-btnMyCenter">我答过的问题列表</a>
        <a href="myTest" class="layui-btnMyCenter">我答过的试卷</a>
        <a href="myConllect" class="layui-btnMyCenter">我收藏过的问题</a>
        <a href="myMessage" class="layui-btnMyCenter">个人基本信息</a>
        <a href="/integral/myIntegral" class="layui-btnMyCenter">积分:{{$data}}</a>
        {{--<button class="layui-btn layui-btn-lg" >积分：1000000分</button>--}}
    </div>


@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
<script>

</script>