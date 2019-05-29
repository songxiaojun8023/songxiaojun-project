@extends('layouts.app')
{{--我回答过的问题--}}
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">

    <div class="layui-collapse">
        <div class="layui-colla-item">
            <h2 class="layui-colla-title"><a href="#">1+1=?</a></h2>
            <div class="layui-colla-content layui-show">
                2
                {{--删除按钮--}}
                <button class="layui-btn layui-btn-xs layui-btn-sm">
                    <i class="layui-icon">&#xe640;</i>
                </button>
            </div>

        </div>
    </div>
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
<script>
    //注意：折叠面板 依赖 element 模块，否则无法进行功能性操作
    layui.use('element', function(){
        var element = layui.element;

        //…
    });
</script>