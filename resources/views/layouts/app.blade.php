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
    <script type="text/javascript" src="./layui/layui.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        *{
            margin:0;
            padding:0;
        }
        .left{
            float:left;

            width:200px;
            height:544.5px;
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
                width:1149px;
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

            width:1120px;
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

            width:50px;
            height:23px;
            float:right;
         }
         .content{

            width:520px;
            height:400px;
            margin-top:28px;
            margin-left:5px;
            margin-right:5px;
         }
        .content li{

            width:520px;
            height:28px;
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
            <div class="left">

            <ul class="layui-nav layui-nav-tree" lay-filter="test">
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
            </ul>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
