<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('Blood Donation', 'Blood Donation |') }} @yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    @yield('script')



    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('Blood', 'Blood') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
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
                </div>
            </div>
        </nav>




        <main class="py-4">
            <div class="container">
                <div class="row">
                    @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('post.create')}}">Create New Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('category.create')}}">Create Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('categories')}}">Show All Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('show.post')}}">Show All Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('post.trashed')}}">Show All Trashed Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('create.tag')}}">Create New Tag</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('show.tag')}}">Show all tag</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{route('users')}}">Show All Users</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('user.create')}}">New User</a>
                            </li>
                                <li class="list-group-item">
                                    <a href="{{route('settings')}}">Settings</a>
                                </li>
                                @endif
                            <li class="list-group-item">
                                <a href="{{route('user.profile')}}">My Profile</a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    <div class="col-lg-8">

                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                <strong>Hello!</strong> {{Session::get('success')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>





                        @endif
                        @if(Session::has('info'))

                            <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                                <strong>Hello!</strong> {{Session::get('info')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>


                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>

    </div>
</body>
</html>
