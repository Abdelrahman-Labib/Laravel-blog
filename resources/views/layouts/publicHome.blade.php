<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
     integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
      integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
      
</head>
<body>    
    <div class="container">
    <div class="row headingBox">
      <h1>Welcome to the Blog</h1>
      <div class="loginBox nav navbar-nav">
      <!-- Authentication Links -->
      @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu">
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
        @endguest
      </div>
    </div>
  
  <style type="text/css">
  .headingBox{
      position:relative;
  }
  .loginBox{
      position:absolute;
      top:0;
      right:0;
      margin-top:10px;
  }
  .loginBox a{
      color: #0d3625;
  }
  </style>   
                        
                    
    <!-- menu -->
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="" class="dropdown-toggle" data-toggle="dropdown">Sort Posts By <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('getPublic', ['type'=>'recentPosts'])}}">Top 10 most recent posts</a></li>
            <li><a href="{{ route('getPublic', ['type'=>'mostVisited'])}}">Top 10 Most Visited Posts</a></li>
        </ul>
        </li>            
        </ul>

        @if(Auth::check())
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{route('posts.index')}}">Manage Blog Posts</a></li>
        </ul>
        @endif
    </div>        
    </nav>

    <!--container -->   
        @yield('content')       
</body>
</html>