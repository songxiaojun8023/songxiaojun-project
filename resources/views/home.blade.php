@extends('layout')
@section('title', 'test')
@section('content')
<div type="search" align="center" style="margin-bottom:10px;">
        <input type="text" style="width: 40%;height: 35px">
        <button class="layui-btn layui-btn-radius layui-btn-normal">搜索<tton>
    </div>
    <div style="width:50%;height:50%;float:left;" >
            <div><p align="center"><b><font size="4">有答案列表</font></b></p></div>
            <div><p align="right"><a href="{{url('question/questionAnswerList')}}"><font  color="blue">更多>></font></a></div>
            <table class="layui-table" lay-even lay-skin="nob" width="600">
                

                 @foreach($questionAnswer as $k=>$v)
                  <thead>
                    <tr>
                      <th><b><a href="{{url('question/showOneQuestion')}}?q_id={{$questionAnswer[$k]['question_id']}}"><font color="#00FFF">{{$questionAnswer[$k]['question']}}</font></a></b></th>
                    </tr> 
                  </thead>
                  @foreach($questionAnswer[$k]['answerList'] as $kk=>$vv)
                  <tbody>
                    <tr>
                      <td>{{$questionAnswer[$k]['answerList'][$kk]['answer']}}</td>
                    </tr>
                  </tbody>
                  @endforeach
               @endforeach
            </table>
        </div>
        <div style="width:48%;height:50%;float:right;margin-left:4px;" >
            <div><p align="center"><b><font size="4">无答案列表</font></b></p></div>
            <div><p align="right"><a href="{{url('question/showQuestionList')}}"><font  color="blue">更多>></font></a></div>
            <table class="layui-table" lay-even lay-skin="nob" width="600">
                 @foreach($question as $k=>$v)
                  <thead>
                    <tr>
                      <th><b><a href="{{url('question/showNoAnswerQuestion')}}?q_id={{$question[$k]['question_id']}}"><font color="#00FFF">{{$question[$k]['question']}}</font></a></b></th>
                    </tr> 
                  </thead>
                    @endforeach
                </table>
        </div>



  @endsection