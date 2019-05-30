    <!-- <style>
        *{
            margin:0;
            padding:0;
        }
        .left{
            float:left;
           
            width:15%;
            height:100%;
            background:#4E5465;
        }
        .nav{
            width:100%;
            height:56px;
        }
        .bottom{
           
            width:100%;
            height:544px; 
        }
        .layui-nav{
            margin-bottom:0rem;
    
        }
        .nav-right{
            float:right;
            line-height:45px;
    
        }
         .right{
                border:1px solid black;
                width:85%;
                height:543px;
                float:right;
                
         }
         .top{
           margin:8px auto;
    
         }
         .clear{
            clear:both;
         }
         .center{
            border:1px solid black;
            width:80%;
            height:488px;
            margin-left:10px;
            margin-right:10px;
         }
         .r_left{
           border-right:1px solid black;
            width:545px;
            height:470px;
            margin-left:7px;
            margin-top:10px; 
            float:left;
         }
         .r_right{
           border:1px solid black;
            width:540px;
            height:470px;
            margin-right:7px;
            margin-top:10px; 
            float:right;
         }
         .title{
           
            width:180px;
            height:37px;
            margin:2px auto;
         }
         .more{
            border:1px solid black;
            width:50px;
            height:23px;
            float:right;
         }
         .content{
            border:1px solid black;
            width:520px;
            height:400px;
            margin-top:28px;
            margin-left:5px;
            margin-right:5px;
         }
        .content li{
            border:1px solid black;
            width:520px;
            height:25px;
            margin-top:5px;
        }
    </style> -->

     <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>


<ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    {{$question[0]['question']}}






<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
   <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">答题系统后台布局</div>
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
      <li class="layui-nav-item"><a href="">退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">所有商品</a>
          
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">解决方案</a>
          
        </li>
        <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    <div style="padding: 15px;">内容主体区域</div>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="../src/layui.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>



@extends('layouts.app')

@section('content')
<div class="right">
    <div type="search" align="center" class="top">
        <input type="text" style="width: 40%;height: 35px">
        <button class="layui-btn layui-btn-radius layui-btn-normal">搜索<tton>
    </div>
    
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
                <li style="line-height:20px;"><p align="center"><b><font size="5px"><a href="">{{$questionAnswer[$k]['question']}}</a></font></b></p></li>
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
                <li style="line-height:20px;"><p align="center"><b><font size="5px"><a href="">{{$questionAnswer[$k]['question']}}</a></font></b></p></li>
                @endforeach
             </ul>   
            </div>
        </div> 
    </div>

<div class="clear"></div>
@endsection





<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="./layui/css/layui.css">
    <script src="./layui/layui.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        *{
            margin:0;
            padding:0;
        }
       
        .nav{
            width:100%;
            height:56px;
        }
        .bottom{
           
            width:100%;
            height:544px; 
        }
        .layui-nav{
            margin-bottom:0rem;

        }
        .nav-right{
            float:right;
            line-height:45px;

        }
         
         .top{
           margin:8px auto;

         }
         .clear{
            clear:both;
         }
         .center{
            border:1px solid black;
            width:80%;
            height:488px;
            margin-left:10px;
            margin-right:10px;
         }
         .r_left{
           border-right:1px solid black;
            width:545px;
            height:470px;
            margin-left:7px;
            margin-top:10px; 
            float:left;
         }
         .r_right{
           border:1px solid black;
            width:540px;
            height:470px;
            margin-right:7px;
            margin-top:10px; 
            float:right;
         }
         .title{
           
            width:180px;
            height:37px;
            margin:2px auto;
         }
         .more{
            border:1px solid black;
            width:50px;
            height:23px;
            float:right;
         }
         .content{
            border:1px solid black;
            width:520px;
            height:400px;
            margin-top:28px;
            margin-left:5px;
            margin-right:5px;
         }
        .content li{
            border:1px solid black;
            width:520px;
            height:25px;
            margin-top:5px;
        }
</style>
</head>
<body>
    <div id="app">
        <ul class="layui-nav layui-bg-green" lay-filter="">
          <li class="layui-nav-item">
           <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
          </li>
          
                         @guest
                            <li class="nav-right">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-right">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-right">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    
                                    <font color="black">{{ Auth::user()->name }}</font><span class="caret" ></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
        </ul>

        <main class="bottom">
           

            <ul class="layui-nav layui-nav-tree" lay-filter="test" style="position:fixed;top:10%;">
            <!-- 侧边导航: <ul class="layui-nav layui-nav-tree layui-nav-side"> -->
              <li class="layui-nav-item">
                <a href="user/myCenter">用户中心</a>
              </li>
              <li class="layui-nav-item">
                <a href="question/pushQuestion">发布问题</a>
              </li>
              <li class="layui-nav-item">
                <a href="test/startTest">模拟答题</a>
              </li>
              <li class="layui-nav-item">...</li>
              <li class="layui-nav-item">...</li>
              <li class="layui-nav-item">...</li>
              <li class="layui-nav-item">...</li>
              <li class="layui-nav-item">...</li>
              <li class="layui-nav-item">...</li>
              <li class="layui-nav-item">...</li>
              <li class="layui-nav-item">...</li>
              <li class="layui-nav-item">...</li>
              <li class="layui-nav-item">...</li>
            </ul>
            
            @yield('content')
        </main>
    </div>
</body>
</html>


