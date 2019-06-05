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


        }


    </style>
    <title>Document</title>
</head>
<body>
<div type="search" align="center" style="margin-top:20%;">
    <form action="{{url('Iphone/searchQuestion')}}" method="post">
    <input type="text" style="width:45%;height: 35px" name="search">
    <button class="layui-btn layui-btn-radius layui-btn-normal">搜索<button><button type="button" class="layui-btn layui-btn-radius layui-btn-normal" onclick="url()">图片识别</button>
    </form>
</div>
<script>
  function url(){
      window.location.href="{{url('Iphone/imgsearchQuestion')}}";
  }
</script>
</body>
</html>