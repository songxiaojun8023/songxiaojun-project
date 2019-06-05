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
<div style="border-bottom:1px solid #B0C4DE;margin-top:20%;">
<div><p align="center"><b><font size="4" color="#48D1CC">　　　　图片识别搜索问题：</font></b></p></div>
<form action="{{url('question/PicQuestion')}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="checkbox" style="margin-left:43%;margin-top:3%;">
        请选择文本间距
        <label>
            <select name="size" id="size">

                @for( $i=1; $i<=20; $i++ )
                    <option value="{{$i*5}}"
                            @if( $i==12 )
                            selected="selected"
                            @endif

                    >{{$i*5}}</option>
                @endfor


            </select>
        </label>
    </div>
    <input type="hidden" value="1" name="yin">
    <div style="margin-left:41%;margin-top:2%;margin-bottom:3%;">
        上传图片：<input type="file" id="imageFile" name="file" />


    </div>
    <div style="margin-left:45%;margin-top:2%;margin-bottom:3%;">
        <input type="submit" class="layui-btn" lay-submit lay-filter="formDemo" value="立即提交">
    </div>
</form>
</div>



</body>
</html>