@extends('layout')
@section('title','test')
@section('content')
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

    <div class="Allof">
        <div class="search" align="center">
            <input type="text" style="width: 40%;height: 35px">
            <button class="layui-btn layui-btn-radius layui-btn-normal">搜索</button>
        </div>

        <div class="show">
            <dl class="qa">
                <dt class="question" id="question_id">
                    {{--<a href="showNoAnswerQuestion" id="question_id">这是问题1</a>--}}
                </dt>
            </dl>
        </div>
    <br>

        <div id="test1" align="center"></div>
        <script src="../layui/layui.js"></script>
</div>
    <script>
        var v = [eval('{{$data}}'.replace(/&quot;/g,'"'))];
        var a = v[0];
        var date = [];
        for(i=0;i<a.length;i++){
            // console.log(a[i]['question']);
            date.push(a[i]['question']);
        }

        console.log(v);
        console.log(a);

        layui.use(['laypage', 'layer'], function(){
            var laypage = layui.laypage;

            laypage.render({
                elem: 'test1'
                ,count: date.length
                ,limit:3
                ,jump: function(obj){
                    //模拟渲染
                    document.getElementById('question_id').innerHTML = function(){
                        var arr = []
                            ,thisData = date.concat().splice(obj.curr*obj.limit - obj.limit, obj.limit);
                        layui.each(thisData, function(index, item){
                            arr.push('<a href="showNoAnswerQuestion">'+ item +'</a>'+'<br /><br />');
                        });
                        return arr.join('');
                    }();
                }
            })
        });
    </script>
@endsection
<script type="text/css" src="../layui/layui.js"></script>
