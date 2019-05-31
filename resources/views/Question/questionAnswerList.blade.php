@extends('layout')
@section('title','test')
@section('content')

    <style type="text/css">
        div.Allof{
            margin-top:3%;
        }
        div.search{
            margin-left: 10%;
        }
        div.show{
            width: 50%;
            margin-left: 10%;
        }
        dt.question{
            font-size: 20px;
        }
        dt.question a{
            color: #0C0C0C;
        }
        dd.answer{
            color: #383d41;
        }
        div.fen{
            text-align: center;
        }
    </style>

    <div class="Allof">
        <div class="search">
            <input type="text" style="width: 40%;height: 35px">
            <button class="layui-btn layui-btn-radius layui-btn-normal">搜索</button>
        </div>
        <br />
        {{--<ul id="biuuu_city_list"></ul>--}}
        <div class="show">
            <dl class="qa" id="qa">

            </dl>
        </div>

        <br />
        <div id="demo20" class="fen"></div>
    </div>


    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">

        $(function () {
            layui.use(['laypage', 'layer'], function(){
                var laypage = layui.laypage
                //测试数据
                var data = {!! $data !!};

                //调用分页
                laypage.render({
                    elem: 'demo20'
                    ,count: data.length,
                    limit:3
                    ,jump: function(obj){
                        //模拟渲染
                        document.getElementById('qa').innerHTML = function(){
                            var arr = []
                                ,thisData = data.concat().splice(obj.curr*obj.limit - obj.limit, obj.limit);
                            layui.each(thisData, function(index, item){
                                // console.log(item['question_id']);
                                arr.push(
                                    '<dt class="question">'
                                    +"<a href='{{url('question/showOneQuestion')}}?q_id="+item['question_id']+"'>"
                                    + item['question']
                                    +'</a>'
                                    +'</dt>'
                                    +'<br />'
                                    +'<dd class="answer">'
                                    +item['answerList']['answer']
                                    +'</dd>'
                                    +'<br /><br />'
                                );
                            });
                            return arr.join('');
                        }();
                    }
                });
            });
        });
    </script>



@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
