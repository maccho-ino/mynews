<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-epuiv="X-UA-Conpatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        {{-- 後の章で説明 --}}
    　　<meta name="csrf-token" content="{{csrf_token() }}">
    　　
    　　{{-- 各ページごとにtittleタグを入れるために@yieldで空けておく --}}
    　　<!-- TODO: 不要なタイトルは後で削除 -->
    　　<tittle>@yield('tittle')</tittle>
    　　
    　　{{-- Laravel標準で用意されているJavascriptを読み込む --}}
    　　<script src="{{ secure_asset('js/app.js') }}" defer></script>
    　　
    　　<link rel="dns-prefetch" href="https://fonts.gstatic.com">
    　　<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet type="text/css">
    　　
    　　{{--Laravel標準で用意されているcssを読み込む --}}
    　　<link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    　　{{-- この章の後半で作成するcssを読み込む --}}
    　　<link href="{{ secure_asset('css/profile.css')}}" rel="stylesheet">
    </head>
    <body>
        <div id="app">
            {{-- 画面上部に表示するナビゲーションバー --}}
            <nav class="navbar-expand-mdnavbar-dark navbar-laravel">
                <div class="container">
                    <a class="navbar-brand" href="{{url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            
                        </ul>
                        
                        <ul class="navbar-nav ml-auto">
                            
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
                    </div>
                </div>
            </nav>
            {{-- ここまでナビゲーションバー --}}
            
            <main class="py-4">
                {{-- コンテンツをここに入れるため、@yieldで空けておく --}}
                @yield('content')
            </main>
        </div>
    </body>
</html>