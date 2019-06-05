<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>答题系统大布局 - Layui</title>


  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

@if(Route::currentRouteName() != 'home')
  	<link rel="stylesheet" href="{{URL::asset('../layui/css/layui.css')}}">
    <script src="{{URL::asset('../layui/layui.js')}}"></script>
    <script src="{{URL::asset('../js/jquery1.12.js')}}"></script>
  @else
   <link rel="stylesheet" href="{{URL::asset('./layui/css/layui.css')}}">
    <script src="{{URL::asset('./layui/layui.js')}}"></script>
    <script src="{{URL::asset('./js/jquery1.12.js')}}"></script>
    @endif
  <style>

    html{min-width: 1200px;}
  </style>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo"><h3>答题系统布局</h3></div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="javascript:;">简单</a></li>
      <li class="layui-nav-item"><a href="javascript:;">轻便</a></li>
      <li class="layui-nav-item"><a href="javascript:;">易管理</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;"></a>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          {{ Auth::user()->name }}
        </a>
      </li>
      <li class="layui-nav-item"><a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="{{url('/home')}}">首页</a>
          
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="{{url('user/myCenter')}}">个人中心</a>
          
        </li>
        <li class="layui-nav-item"><a href="{{url('question/pushQuestion')}}">发布问题</a></li>
        <li class="layui-nav-item"><a href="{{url('test/startTest')}}">模拟答题</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->

    <div style="padding: 15px;">

     @yield('content')

    </div>
  </div>

</div>

<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>