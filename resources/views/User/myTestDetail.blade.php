@extends('layout')
@section('title', 'test')
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">
    <div class="layui-card-header" align="center">{{$data[0]->test_name}}</div>
    {{--@foreach($data as $v)--}}
    {{--@foreach($data as $v)--}}
        {{--<div class="layui-cardMyStartTest">--}}
            {{--<li class="layui-card-headerStart" name="headline" value="">{{$v->question}}</li>--}}
            {{--<div class="layui-card-body">--}}
                {{--<div name="desc" placeholder="请输入内容" class="layui-textarea" >{{$v->answer}}</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endforeach--}}
    @foreach($data as $v)
    <div class="layui-collapse">
        <div class="layui-colla-item">
            <h2 class="layui-colla-title">{{$v->question}}</h2>
            <div class="layui-colla-content layui-show">{{$v->answer}}</div>
        </div>
    </div>
    @endforeach
    {{--@endforeach--}}
    <a href="/user/myTest"class="layui-btn layui-btn-normal">返回</a>
    {{--<script src="/static/build/layui.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        layui.use('element', function(){
            var element = layui.element;

            //…
        });
        function start(){
            // var ddd = $('div[class="layui-card-headerStart"]').map(function(index,elem){
            //     return $(elem).html();
            // })
            // var aaa = $('textarea[name="desc"]').map(function(index,elem){
            //     return $(elem).val();
            // });
            // var asd =[];
            // for(let i in aaa){
            //     asd.push(aaa[i]);
            // }

            var content = [];
            for(var i=0;i<5;i++){
                var aaa = document.getElementsByName('desc')[i].value;
                content.push(aaa);
            }

            var steamed = $('.layui-card-header').html();
            var headline = [];

            $(".layui-card-headerStart").each(function(k,v){
                headline.push($(v).val());
            })

            $.ajax({
                url:'/test/addTest',
                type:'get',
                data:{
                    'content':content,
                    'headline':headline,
                    'steamed':steamed
                },
                success:function(msg){
                    if(msg){
                        alert('成功');
                        window.location.href = "http://guopenghang.tt/user/myCenter";
                    }
                }
            })
        }
    </script>
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>