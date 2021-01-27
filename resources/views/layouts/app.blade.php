<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
  
    <title>{{ config('app.name', 'ADzone') }}</title>

    <!-- Scripts -->
    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom-css.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: rgb(159,25,50) !important;">
            <div class="container">
                <div class="col-lg-2">
                    <div class="row">
                        <a class="navbar-brand" href="{{ url('/') }}" style="color: #fff;font-size: 28px;font-weight: 600;">Shopping Cart
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color: #fff;" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color: #fff;" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" style="color: #fff;" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" style="color: #fff;" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
0                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        <li style="margin-top: 9px;"><a href="{{url('post-classified-ad')}}" style="color: #fff;text-decoration: none;">Add Post</a></li>
                    </ul>
                </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <form class="form-horizontal" method="post" action="{{url('/search/product/')}}">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-6">
                                        <input type="text" name="searchonproduct" class="form-control" placeholder="Search On">
                                    </div>
                                    <div class="col-2">
                                        <input type="submit" name="" class="btn btn-default" value="Search">
                                    </div>
                                </div>
                            </form>  
                        </div>
                        <div class="col-lg-8">
                            <form class="form-horizontal" method="post" action="{{route('yahan-pos-hoja')}}">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <input type="text" name="state" id="state" class="form-control" placeholder="Enter State">
                                    </div>
                                    
                                    <div id="stateList"></div>
                                    <div id="cityList" style="
                                    display: block;
                                    border-radius: 0px;
                                    background: #fff;
                                    position: absolute;
                                    width: 40%;
                                    padding: 0px 25px;
                                    overflow-y: auto;
                                    margin-top: 40px;
                                    z-index: 1;"
                                    ></div>

                                    <input type="text" name="city" id="city" >
                                    
                                    <div class="col-lg-2">
                                        <select class="form-control dropdown" name="categories" id="categories" placeholder="Categories">
                                            <option>Select</option>
                                            
                                        </select>
                                    </div>
                                    <div class="col-lg-2">
                                        <input type="submit" name="" class="btn btn-default" value="Search">
                                    </div>
                                </div>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </nav> 

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

jjjjjjjjj

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#state').keyup(function(){
            var data;
            var indiastates=$(this).val();
            if(indiastates != ''){
                var _token=$('input[name="_token"]').val();
                console.log('reached');
                $.ajax({
                    url: "{{route('searchlocation.fetch')}}",
                    method: "POST",
                    data: {indiastates:indiastates, _token:_token},
                    success:function(data){
                        $('#stateList').fadeIn();
                        $('#stateList').html(data);
                    }
                });
            }
            else{
                $('#stateList').fadeOut();
                $('#stateList').html(data);
            }
        });
        $(document).on('click','#search',function(){
            $('#state').val($(this).text());
            $('#stateList').fadeOut();
        });
    });

    $(document).on('click','#stateList ul li',function(){
        var state=$('#state').val();
        var id=$(this).val();
        var _token=$('input[name="_token"]').val();
        $.ajax({
            url: "{{route('state.cities')}}",
            method: "POST",
            data: {id:id, _token:_token},
            success:function(data){
               $('#cityList').fadeIn();
               $('#cityList').html(data);
            }
        });
    });
    $(document).on('click','#cityList',function(e){
        var txt=$(e.target).text();
        $('#city').val();
        $('#city').val(txt);
        $('#cityList').fadeOut();
    });

    $(document).ready(function(){
        var _token=$('input[name="_token"]').val();
        $.ajax({
            url: "{{route('categories.retrieve')}}",
            method: "POST",
            data: {_token:_token},
            success:function(data){
               $('#categories').fadeIn();
               $('#categories').html(data);
            }
        });
    });

    $(document).ready(function(){
        if(window.location=="http://127.0.0.1/adzone/public/"){
            var _token=$('input[name="_token"]').val();
        $.ajax({
            url: "{{route('categories.ads')}}",
            method: "GET",
            data: {_token:_token},
            success:function(data){
               $('#Advertisements').html(data);
               //$('#categories').html(data);
               //alert(data);
            }
        });
        }
    });

</script>
