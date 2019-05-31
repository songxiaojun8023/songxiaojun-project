@extends('layout')
@section('title', 'test')
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">
    <div class="layui-card-header" align="center">卡片面板</div>
    @foreach($data as $v)
        <div class="layui-cardMyStartTest">
            <div class="layui-card-header">{{$v->question}}</div>
            <div class="layui-card-body">
                <textarea name="desc" placeholder="请输入内容" class="layui-textarea"></textarea>
            </div>
        </div>
    @endforeach
    <button class="layui-btn">提交</button>

    {{--<script src="/static/build/layui.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        layui.use('laypage', function(){
            var laypage = layui.laypage;
            var date = {!! $data !!};
            laypage.render({
                jump: function(obj){
                    //模拟渲染
                    document.getElementById('asd').innerHTML = function(){
                        var arr = []
                            // alert();
                            ,thisData = date.concat().splice(obj.curr*obj.limit - obj.limit, obj.limit);
                        layui.each(thisData, function(index, item){
                            arr.push('<a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy" >'+ item['question'] +'</a>');
                        });
                        return arr.join('');
                    }();
                }
            });
        })
    </script>
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
