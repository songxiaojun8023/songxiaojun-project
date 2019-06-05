<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" href="{{URL::asset('../layui/css/layui.css')}}">
    <script src="{{URL::asset('../layui/layui.js')}}"></script>
    <script src="{{URL::asset('../js/jquery1.12.js')}}"></script>
    <style>


        body{
            min-width:100%;

            min-width:150%
        }


    </style>
    <title>Document</title>
</head>
<body>
<div style="width:60%;height:50%;margin-top:5%;">
    <form action="{{url('Iphone/moresearchQuestion')}}" method="post">
        @csrf
        <table class="layui-table" lay-even lay-skin="nob" width="750" id="test" style="width:100%;">
            @foreach($data as $k=>$v)
                <thead>
                <tr>
                    <th><textarea name="question[]"  style="width:100%; height:10%">{{$data[$k]}}</textarea><button type="button" onclick="q_del(this)">删除</button></th>
                </tr>
                </thead>
            @endforeach

        </table>

         <div style="width:100%;height:50%;;margin-top:2%;margin-bottom:3%;">
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
</body>
</html>