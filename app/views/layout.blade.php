<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>QC tool</title>

        <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootswatch/3.3.1/lumen/bootstrap.min.css" rel="stylesheet">
        @yield('styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ URL::to('/') }}">QT Tool</a>
                </div>

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav pull-right">
                        <li class="{{ Request::is('/') ? 'active' : '' }}">
                            <a href="{{ URL::route('home') }}">Home</a>
                        </li>
                        
                        @if (Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        {{ link_to_route('logout', 'Logout') }}
                                    </li>
                                </ul>
                            </li>
                            @if (Auth::user()->superuser)
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            {{ link_to_route('admin.project.index', 'Projects') }}
                                        </li>
                                        <li>
                                            {{ link_to_route('admin.user.index', 'Users') }}
                                        </li>
                                    </ul>
                                </li>
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        @include('flash::message')
                    </div>
                </div>
                @if ($errors->has())
                    <div class="row">
                        <div class="col-md-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li class="text-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
        </section>
        <div class="container">
            @yield('content')
        </div>

        <footer>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="text-center">Created by <a href="http://innervisiongroup.com" target="_blank">Inner Vision Group</a></div>
                            <div class="text-center">Build with <a href="http://laravel.com" target="_blank">Laravel Framework</a></div>
                        </div>
                    </div>
                </div>
            </nav>
        </footer>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
        @yield('scripts')
    </body>
</html>