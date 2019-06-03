
{{--//个人基本信息页面--}}
@extends('layout')
@section('title', 'test')
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">



    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="请输入用户名" autocomplete="off" class="layui-input" id="username" value="{{ Auth::user()->name }}">
            </div>
        </div>
        {{--<div class="layui-form-item">--}}
            {{--<label class="layui-form-label">密码框</label>--}}
            {{--<div class="layui-input-inline">--}}
                {{--<input type="password" name="password" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input" value="{{ Auth::user()->password }}">--}}
            {{--</div>--}}
            {{--<div class="layui-form-mid layui-word-aux"></div>--}}
        {{--</div>--}}
        <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
                <input type="text" name="title" required  lay-verify="required" placeholder="请输入邮箱号" autocomplete="off" id="email" class="layui-input" value="{{ Auth::user()->email }}">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block">
                <button type="button" class="layui-btn" lay-submit lay-filter="formDemo" onclick="up()">修改</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>





@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
<script>
    //Demo
    layui.use('form', function(){
        var form = layui.form;

        //监听提交
        form.on('submit(formDemo)', function(data){
            layer.msg(JSON.stringify(data.field));
            return false;
        });
    });
    function up() {
        var username = $("#username").val();
        var email = $("#email").val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            dataType:"json",
            url: "{{url('user/doEditMyMessage')}}",
            data: "username="+username+"&email="+email,
            success: function(msg){
                alert(msg.message);
            }
        });
    }
</script>