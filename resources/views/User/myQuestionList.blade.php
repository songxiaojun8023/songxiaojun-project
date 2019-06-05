
    {{--我的问题--}}
    @extends('layout')
    @section('title', 'test')
    @section('content')
    <link rel="stylesheet" href="../layui/css/layui.css">


    <dt id="asd" align="center"></dt>
    <div id="test1" align="center"></div>
    <a href="/user/myCenter"class="layui-btn layui-btn-normal">返回</a>

    {{--{{ date( "Y-m-d H : i : s", "1231231")}}--}}
    {{--<script src="/static/build/layui.js"></script>--}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>

        layui.use('laypage', function(){
            var laypage = layui.laypage;
            var date = {!! $data !!};
            // ''+item['created_at']+''
            console.log(date);
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
                            // arr.push('<button class="layui-btnMy layui-btn-fluidMy" >'+ item['question'] +'</button>');
                            // console.log(item['question_id']);
                            // arr.push('<button class="layui-btnMy layui-btn-fluidMy" id="aaa" onclick="tiao(this)" value="'+item['question_id']+'">'+ item['question'] +'</button>');
                        arr.push('<a href="/question/showOneQuestion?q_id='+item['question_id']+'" class="layui-btnMy layui-btn-fluidMy" id="aaa" onclick="tiao()" value="'+item['question_id']+'">'+ item['question'] +'</a>'+item['created_at']);
                        });
                        return arr.join('');
                    }();
                }
            });
        });

       // function tiao(obj) {
       //     //记得记录
       //     var aaa = $(obj).attr('value');
       //     console.log(aaa);
       //  $.ajax({
       //      url:'/question/showOneQuestion',
       //      type:'get',
       //      data:{'qid':aaa},
       //      success:function(msg){
       //          // window.location.href ='/question/showOneQuestion/{$id}';
       //      }
       //  })
       //  }
    </script>
@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
