
{{--积分--}}
@extends('layout')
@section('title', 'test')
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">


    <dt id="asd" align="center"></dt>
    <div id="test1" align="center"></div>
    <a href="/user/myCenter"class="layui-btn layui-btn-normal">返回</a>

    {{--<script src="/static/build/layui.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>



        layui.use('laypage', function(){
            var laypage = layui.laypage;
            var date = {!! $data !!};
            //执行一个laypage实例
            laypage.render({
                elem: 'test1'
                ,count: date.length
                ,limit:3
                ,layout: ['count', 'prev', 'page', 'next', 'skip']
                ,jump: function(obj){
                    //模拟渲染
                    document.getElementById('asd').innerHTML = function(){
                        var arr = []
                            // alert();
                            ,thisData = date.concat().splice(obj.curr*obj.limit - obj.limit, obj.limit);
                        layui.each(thisData, function(index, item){
                            arr.push('<h2 class="layui-colla-title">'+item['created_at']+':'+ item['todo']+'</h2>');
                        });
                        return arr.join('');
                    }();
                }
            });
        });
    </script>
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
