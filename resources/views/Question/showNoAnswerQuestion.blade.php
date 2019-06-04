@extends('layout')
@section('title','test')
@section('content')
<style type="text/css">
    div.Allof{
        margin-top:3%;
    }
    div.question{
        height:30%;
    }

    span.questionTitle{
        font-size: 30px;
        margin-left: 60px;
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
        {{--<button class="layui-btn layui-btn-radius layui-btn-warm" href="">收藏</button>--}}
        {{--<a href="../conllect/conllectQuestion" class="layui-btn layui-btn-radius layui-btn-warm" id="question_id">收藏</a>--}}
        <button id="conllect" onclick="addcon()" class="layui-btn layui-btn-radius layui-btn-warm">收藏</button>
    </div>

    <hr style="width:100%;height:3px;background-color:#000;"/>

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
                if(msg == ''){
                    alert('已收藏过一次');
                }else{
                    alert('收藏成功');
                    window.location.href ='/question/showOneQuestion?q_id={{$data[0]['question_id']}}';
                }

            },
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
            // async: false,
            data:{
                'ans':ans,
                'qid':qid
            },
            success:function(msg){
                alert('提交成功');
                window.location.href ='../question/showQuestionList';
            }
        })
    }
</script>
@endsection
