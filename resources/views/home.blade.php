@extends('layouts.app')

@section('content')
<div class="right">
    <div type="search" align="center" class="top">
        <input type="text" style="width: 40%;height: 35px">
        <button class="layui-btn layui-btn-radius layui-btn-normal">搜索<tton>
    </div>
    <div class="center">
        <div class="r_left">
            <div class="title">
               <h3>最新有答案列表</h3> 
            </div>
            <div class="more">
                <a href="">更多>></a>
            </div>
            <div class="content">
             <ul>
                @foreach($questionAnswer as $k=>$v)
                <li><p align="center"><b><font size="5px"><a href="">{{$questionAnswer[$k]['question']}}</a></font></b></p></li>
                @foreach($questionAnswer[$k]['answerList'] as $kk=>$vv)
                <li><p align="center">{{$questionAnswer[$k]['answerList'][$kk]['answer']}}</p></li>
                @endforeach
                @endforeach
             </ul>   
            </div>
        </div>
        <div class="r_right">
            <div class="title">
               <h3>最新无答案列表</h3> 
            </div>
            <div class="more">
                <a href="">更多>></a>
            </div>
            <div class="content">
             <ul>
                @foreach($question as $k=>$v)
                <li><p align="center"><b><font size="5px"><a href="">{{$questionAnswer[$k]['question']}}</a></font></b></p></li>
                @endforeach
             </ul>   
            </div>
        </div> 
    </div>
</div>
<div class="clear"></div>
@endsection
