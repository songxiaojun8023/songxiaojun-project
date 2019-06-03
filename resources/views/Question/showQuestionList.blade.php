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
                <dt class="question" id="question">
                    {{--<a href="showNoAnswerQuestion" id="question_id">这是问题1</a>--}}
                </dt>
            </dl>
        </div>
    <br>

        <div id="test1" align="center"></div>

</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script type="text/javascript">

    $(function () {
        layui.use(['laypage', 'layer'], function () {
            var laypage = layui.laypage;
            var data = {!! $data !!};

            laypage.render({
                elem: 'test1'
                , count: data.length
                , limit: 3
                , jump: function (obj) {
                    //模拟渲染
                    document.getElementById('question').innerHTML = function () {
                        var arr = []
                            , thisData = data.concat().splice(obj.curr * obj.limit - obj.limit, obj.limit);
                        layui.each(thisData, function (index, item) {
                            arr.push(
                                "<a href='{{url('question/showNoAnswerQuestion')}}?q_id=" + item['question_id'] + "'>"
                                + item['question']
                                + "</a>"
                                + "<br /><br />"
                            );
                        });
                        return arr.join('');
                    }();
                }
            })
        });
    });
</script>
<script src="../layui/layui.js"></script>

@endsection
<script type="text/javascript" src="../layui/layui.js"></script>
