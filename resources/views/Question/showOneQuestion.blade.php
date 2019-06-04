@extends('layout')
@section('title','test')
@section('content')

<style type="text/css">
    div.Allof{
        margin-top:3%;
    }
    div.question{
        height:10%;
    }

    span.questionTitle{
        font-size: 30px;
        margin-left: 60px;
    }
    div.hr{
        margin-top: 1px;
    }
    div.answer{
        margin-left:60px;
        margin-right:150px;
        margin-top:20px;
    }
    div.putAnswer{
        height: 20%;
        width: 100%;
    }
    span.reslut{
        font-size: 17px;
    }
    dd.respondent{
        color: #6c757d;
    }
    dd.respondent a{
        color: #6c757d;
    }
    div.answerAarea{
        margin-left: 60px;
        margin-top: 40px;
        height: 70%;
    }
    .layui-textareaq{
        width: 80%;
    }
    div.push{
        margin-right: 20%;
        text-align: right;
    }
</style>


<div class="Allof">
    {{--问题的标题、作者及发布的时间--}}

    <div class="question">
        <input type="hidden" value="{{$data[0]['question_id']}}" id="con">
        <span class="questionTitle">{{$data[0]['question']}}</span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span class="putWriter">提问者：{{$data[0]['name']}}</span>
        &nbsp&nbsp&nbsp
        <span class="putTime" id="created_at">提问时间：{{$data[0]['created_at']}}</span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        {{--<a href="{{url('../conllect/conllectQuestion')}}?q_id={{$data[0]['question_id']}}" class="layui-btn layui-btn-radius layui-btn-warm" id="conllect" onclick="addcon()">收藏</a>--}}
        <button id="conllect" onclick="addcon()" class="layui-btn layui-btn-radius layui-btn-warm">收藏</button>

    </div>

    <div class="hr">
        <hr style="width:100%;height:3px;background-color:#000;"/>
    </div>

    {{--问题所对应的答案、答案作者及回答时间--}}
    <div class="answer">
    @foreach($data[0]['answerList'] as $k=>$v)
    <div class="putAnswer">
        {{--<input type="hidden" value="{{$data[0]['answerList'][$k]['answer_id']}}" id="col">--}}
        <span class="reslut">
            {{$data[0]['answerList'][$k]['answer']}}
        </span>
        <dd class="respondent">
            <span class="putWrite">回答者：{{$data[0]['answerList'][$k]['name']}}</span>
            &nbsp&nbsp&nbsp
            <span class="putTime">回答时间：{{$data[0]['answerList'][$k]['created_at']}}</span>
            {{--<a href="{{url('../answer/collect')}}?q_id={{$data[0]['answerList'][0]['answer_id']}}" class="layui-btn layui-btn-xs">采纳</a>--}}
        </dd>
        <button id="col" onclick="addcol({{$data[0]['answerList'][$k]['answer_id']}})" class="layui-btn layui-btn-xs">采纳</button>
    </div>
        <br><br>
    @endforeach
    </div>


    {{--分页按钮--}}
    {{--用户作答区--}}
    <form action="{{url('answer/addAnswer')}}" method="post" >
    <div class="answerAarea">
        @csrf
        <input type="hidden" value="{{$data[0]['question_id']}}" name="qid" id="qid">
        <textarea name="ans" required lay-verify="required" placeholder="请输入你的答案" class="layui-textareaq" id="ans"></textarea>
        <div class="push">
        {{--<input type="submit" class="layui-btn" value="提交">--}}
        <input type="button" class="layui-btn" id="adda" onclick="addanswer()" value="提交">
        </div>

    </div>
    </form>

</div>
<script src="../layui/layui.js"></script>

<script>
    function addcon() {
        var qid = $('#con').val();
        // alert(qid);
        console.log(qid);
        $.ajax({
            url:'../conllect/conllectQuestion',
            type:'get',
            data:{'q_id':qid},
            success:function(msg){
                alert('收藏成功');
                window.location.href ='/question/showOneQuestion?q_id={{$data[0]['question_id']}}';
        }
    })
    }
</script>

<script>
    function addcol(aid){
        // alert(id);
        console.log(aid);
        $.ajax({
            url:'../answer/collect',
            type:'get',
            data:{'a_id':aid},
            success:function(msg){
                alert('采纳成功');
                window.location.href ='/question/showOneQuestion?q_id={{$data[0]['question_id']}}';
            }
        })
    }
</script>

<script>
    function addanswer(){
        var qid = $('#qid').val();
        var ans = $('#ans').val();
        console.log(ans);
        console.log(qid);
        $.ajax({
            url:'../answer/addAnswer',
            type:'get',
            dataType: "text",
            async: false,
            data:{
                "ans":ans,
                "qid":qid
            },
            success:function(msg){
                alert('提交成功');
                window.location.href ='/question/showOneQuestion?q_id={{$data[0]['question_id']}}';
            }
        });
    }
</script>
@endsection
