<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://use.fontawesome.com/595a5020bd.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
.left-sidebar li { padding:10px;
  border-bottom:1px solid #ddd;
list-style:none; margin-left:-20px}


.caption li {list-style:none !important; padding:5px}

  .new-post {
    padding: 16px 0;
    border-bottom: 1px solid #ccc;
}

.new-post header,
.posts header {
    margin-bottom: 20px;
}

 .post {
    padding-left: 10px;
    border-left: 3px solid #a21b24;
    margin-bottom: 30px;
}

 .info {
    color: #aaa;
    font-style: italic;
}

.error,
.success {
    text-align: center;
}

.error {
    border: 1px solid red;
    background-color: #f9b5af;
    color: red;
}

.error ul {
    list-style: none;
    margin: 0;
    padding: 0;
}

.success {
    border: 1px solid green;
    background-color: #d1f9da;
    color: green;
}

</style>
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">

                        
                        <button type="button" class="navbar-toggle collapsed"
                        data-toggle="collapse" data-target="#app-navbar-collapse">
                            <span class="sr-only">Toggle Navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        
                          <a class="navbar-brand" href="{{ url('/') }}">
                            
                             FaceBook
                        </a>


                    </div>

                    <div class="collapse navbar-collapse" id="app-navbar-collapse">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav navbar-nav">
                            @if (Auth::check())

                            <li><a href="{{url('/findFriends')}}">Find Friends </a></li>
                              <li><a href="{{url('/requests')}}">My Requests
                                      <span style="color:green; font-weight:bold;
                                       font-size:16px">({{App\friendships::where('status', Null)
                                                  ->where('user_requested', Auth::user()->id)
                                                  ->count()}})</span></a></li>
                       
                            @endif
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="nav navbar-nav navbar-right">
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else


                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               role="button" aria-expanded="false">
                                <img src="{{url('../')}}/public/img/msg_icon.png" width="30"/>
                               
                            </a>
                          <ul class="dropdown-menu" role="menu" style="width:320px">
                         
                            </ul>
                            </li>

                            <li>
                                <a href="{{url('/friends')}}" title="friends">
                                  <img src="{{url('../')}}/public/img/friends.png" width="30"/>
                                 </a>
                            </li>

                              

                    <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <img src="{{url('../')}}/public/img/{{Auth::user()->pic}}" width="30px" height="30px" class="img-circle"/>
                                    <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">

                                    <li> <a href="{{ url('/profile') }}/{{Auth::user()->slug}}" >   Profile  </a> </li>
                                    

                                    <li>
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>


                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>

            @yield('content')
            <div >

                <div class="container"> <p class="pull-right" style="padding: 5px;">FaceBook - &copy; 2017</p></div>
            </div>
        </div>

        <script src="<?php echo Config::get('app.url');?>/public/js/profile.js"></script>
        <script type="text/javascript">
               $(document).ready(function() {
                   $('#tooltip1').tooltip();
               });
               </script>
                  <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>