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
        <span class="questionTitle">所点击问题的标题</span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        <span class="putWriter">提问者：<a href="" id="uid">111</a></span>
        &nbsp&nbsp&nbsp
        <span class="putTime" id="created_at">提问时间：2019-05-29</span>
        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
        {{--<button class="layui-btn layui-btn-radius layui-btn-warm" href="conllect/conllectQuestion">收藏</button>--}}
        <a href="../conllect/conllectQuestion" class="layui-btn layui-btn-radius layui-btn-warm" id="question_id">收藏</a>
    </div>

    <div class="hr">
        <hr style="width:100%;height:3px;background-color:#000;"/>
    </div>

    {{--问题所对应的答案、答案作者及回答时间--}}
    <div class="answer">

        <div class="putAnswer">
            <span class="reslut">
                答案
            </span>
            <dd class="respondent">
                <span class="putWrite">作者</span>
                <span class="putTime">发布答案时间</span>
                <a href="../answer/collect" class="layui-btn layui-btn-xs">采纳</a>
            </dd>
        </div>
        <br><br>

    </div>


    {{--分页按钮--}}

    {{--用户作答区--}}
    <div class="answerAarea">
        <textarea name="" required lay-verify="required" placeholder="请输入你的答案" class="layui-textareaq"></textarea>
    </div>
    <div class="push">
        <a href="../answer/addAnswer" class="layui-btn" >提交</a>
    </div>

</div>
<script src="../layui/layui.js"></script>
@endsection
