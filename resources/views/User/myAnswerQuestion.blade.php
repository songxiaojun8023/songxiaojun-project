@extends('layouts.app')
{{--我回答过的问题--}}
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">

    <div class="layui-collapseMyAnswer" align="center">
        <div class="layui-collapse">
            <h2 class="layui-colla-title"><a href="/question/showOneQuestion">1+1=?</a></h2>
            <div class="layui-colla-content layui-show">
                2
                {{--删除按钮--}}
                <button class="layui-btn layui-btn-xs layui-btn-sm">
                    <i class="layui-icon">&#xe640;</i>
                </button>
            </div>

        </div>

    </div>
    <dt id="asd" align="center"></dt>
    <div id="test1" align="center"></div>
    <script>
        var v = [eval('{{$data}}'.replace(/&quot;/g,'"'))];
        var a = v[0];
        var date =[];
        for (i=0;i<a.length;i++){
            // console.log(a[i]['question']);
            date.push(a[i]['question']);

        }
        console.log(date);
        console.log(a);

        layui.use('laypage', function(){
            var laypage = layui.laypage;

            //执行一个laypage实例
            laypage.render({
                elem: 'test1'
                ,count: date.length
                ,limit:3
                ,jump: function(obj){
                    //模拟渲染
                    document.getElementById('asd').innerHTML = function(){
                        var arr = []
                            // alert();
                            ,thisData = date.concat().splice(obj.curr*obj.limit - obj.limit, obj.limit);
                        layui.each(thisData, function(index, item){
                            console.log();
                            arr.push('<a href="/question/showOneQuestion" class="layui-btnMy layui-btn-fluidMy" >'+ item +'</a>');
                        });
                        return arr.join('');
                    }();
                }
            });
        });

    </script>
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>

