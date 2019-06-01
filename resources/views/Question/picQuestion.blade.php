@extends('layout')
@section('title', 'test')
@section('content')
    <div style="margin-left:42%;color:#FF1493;">
        <h2>图片识别出来的结果</h2>

    </div>
    <div style="border-right:1px solid #8B008B;width:38%;height:80%;margin-top:5%;float:left">
        <img src="{{URL::asset($img)}}" alt="" width="420" height="370" style="margin-top:10%"/ >

    </div>
    <div style="border-right:1px solid #8B008B;width:60%;height:50%;margin-top:5%;float:right">
        <form action="{{url('question/addPicQuestion')}}" method="post">
            @csrf
        <table class="layui-table" lay-even lay-skin="nob" width="750" id="test">
            @foreach($data as $k=>$v)
            <thead>
            <tr>
                <th><textarea rows="3" cols="93" name="question[]">{{$data[$k]}}</textarea><button type="button" onclick="q_del(this)">删除</button></th>
            </tr>
            </thead>
                @endforeach


        </table>
            <div style="margin-left:35%;margin-top:2%;margin-bottom:3%;">
                <button type="button" class="layui-btn" lay-submit lay-filter="formDemo" onclick="q_add()">添加</button>
                <input type="submit" class="layui-btn" lay-submit lay-filter="formDemo" value="立即提交">

            </div>
        </form>
    </div>
    <script>
        function q_add(){
        var html = "<thead><tr><th><textarea rows='3' cols='93' name='question[]'>"+"</textarea><button type=\"button\" onclick=\"q_del(this)\">删除</button></th></tr></thead>";
            $("#test").append(html);
        }
        function q_del(obj){
            obj.parentNode.parentNode.removeChild(obj.parentNode);
        }
    </script>
@endsection