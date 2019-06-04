@extends('layout')
@section('title', 'test')
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">
    <div align="cneter">
        <li class="layui-card-header" value="{{Auth::user()->id}}">试卷</li>
    </div>
    @foreach($data as $v)
        <div class="layui-cardMyStartTest">
            <li class="layui-card-headerStart" name="headline" value="{{$v->question_id}}">{{$v->question}}</li>
            <div class="layui-card-body">
                <textarea name="desc" placeholder="请输入内容" class="layui-textarea" ></textarea>
            </div>
        </div>
    @endforeach
    <button class="layui-btn" onclick="start()">提交</button>

    {{--<script src="/static/build/layui.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
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
            var uid = $('.layui-card-header').val();
            var timestamp = Date.parse(new Date());
            var testPaper = steamed+timestamp+uid;
            // console.log(uid);
            // console.log(steamed);
            // console.log(timestamp);
            // console.log(testPaper);
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
                    'test_name':testPaper
                },
                success:function(msg){
                    if(msg){
                        alert('成功');
                        // window.location.href = "http://guopenghang.tt/user/myTest";
                    }
                }
            })
        }
    </script>
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
