@extends('layouts.app')
{{--我回答过的问题--}}
@section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">

    <dt id="asd" align="center"></dt>
    <div id="test1" align="center"></div>
    <script>
        {{--var v = [eval('{{$data}}'.replace(/&quot;/g,'"'))];--}}
        {{--var a = v[0];--}}
        {{--var date =[];--}}
        {{--for (i=0;i<a.length;i++){--}}
            {{--// console.log(a[i]['question']);--}}
            {{--date.push(a[i]['question']);--}}

        {{--}--}}
        {{--console.log(date);--}}
        {{--console.log(a);--}}

        layui.use('laypage', function(){
            var laypage = layui.laypage;
            var data = {!! $data !!};
            console.log(data);
            //执行一个laypage实例
            laypage.render({
                elem: 'test1'
                ,count: data.length
                ,limit:3
                ,jump: function(obj){
                    //模拟渲染
                    document.getElementById('asd').innerHTML = function(){
                        var arr = []
                            // alert();
                            ,thisData = data.concat().splice(obj.curr*obj.limit - obj.limit, obj.limit);
                        layui.each(thisData, function(index, item){
                            arr.push('<div class="layui-collapseMyAnswer" align="center">\n' +
                                '        <div class="layui-collapse">\n' +
                                '            <h2 class="layui-colla-title"><a href="/question/showOneQuestion">'+ item['question'] +'</a></h2>\n' +
                                '            <div class="layui-colla-content layui-show">\n' +
                                '                '+item['answer']+'\n' +
                                '                {{--删除按钮--}}\n' +
                                '                <button class="layui-btn layui-btn-xs layui-btn-sm">\n' +
                                '                    <i class="layui-icon">&#xe640;</i>\n' +
                                '                </button>\n' +
                                '            </div>\n' +
                                '\n' +
                                '        </div>\n' +
                                '\n' +
                                '    </div>');
                        });
                        return arr.join('');
                    }();
                }
            });
        });

    </script>
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>

