<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="googlebot" content="noimageindex">
    <meta name="robots" content="noindex">
    @yield("robots")

    <title>@yield("title")</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	
    <!-- Styles -->
    <!-- ****** favicons ****** -->
    <link rel="shortcut icon" type="image/ico" sizes="32x32" href="{{ asset('images/favicons/favicon.ico') }}" />
    <!-- ****** favicons ****** -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


    <style>
        .hovercolorchange:hover {
            color: grey;
        }
        body
        {
            background: #777777 !important;
        }
        .fancy {
            border-width: 0 0 2px;
            border-style: solid;
            border-image: linear-gradient(45deg, darken($fendersblue,11), darken($fendersblue,1)) 10% round;
        }

        h1{
            font-size: 4.0vmin;
        }

        h2{
            font-size: 2.8vmin;
            text-align:justify;
        }

        h3{
            font-size: 2.0vmin;
        }
        .tfont{
            font-size: 2.5vmin;
            text-align:justify;
        }

        .imgCustom{
            margin-right:15px;

        }


        @media only screen and (max-width:768px) {
            .nextLine tr {
                display: table;
                width:100%;
                text-align: center;
            }
            .nextLine td {
                display: table-row;
                text-align: center;
            }

            h1{
                font-size: 4.5vmax;
            }

            h2{
		font color="grey";
                font-size: 3.3vmax;
                text-align:center;
            }

            h3{
                font-size: 2.5vmax;
            }
            p{
                font-size: 2.5vmax;
            }
            .tfont{
                font-size: 3.0vmax;
                text-align:left;
            }
            .imgSize{
                max-width: 90%;
                height: 95%;
                margin-bottom: 25px;
            }

        }

        .well{
            padding-bottom:0px;
        }
        .g-recaptcha {
            display: inline-block;
        }
        .center_div{
            margin: 0 auto;
            width:40% /* value of your choice which suits your alignment */
        }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php
		echo json_encode(['csrfToken' => csrf_token() , ]); ?>
	</script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-static-top  " style="margin-bottom:0px;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

                <!-- Branding Image -->
                <a class="navbar-brand " href="{{ url('/')}}">
                    <h2 style="color: white; margin: 0px;"><i class="fas fa-home hovercolorchange"></i>
					</h2>
                </a>
            </div>
            <!--Testing Purposes-->
            <div class="collapse navbar-collapse" id="myNavbar">
                <!-- Authentication Links -->
                @if (Auth::check())
					@if( Auth::user()->role == 1)
						<!-- Right Side Of Navbar Admin-->
						<ul class="nav navbar-nav navbar-navbar-inverse navbar-right ">

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<h2 style="color: white; margin: 0px;">
										Create <span class="caret"></span>
									</h2>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ url('/register') }}">
											<h2 style=" margin: 0px;">New User</h2>
										</a>
									</li>
									<li>
										<a href="{{ url('/add_device') }}">
											<h2 style="margin: 0px;">New Device</h2>
										</a>
									</li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<h2 style="color: white; margin: 0px;">
										Modify <span class="caret"></span>
									</h2>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ url('/update_user') }}">
											<h2 style=" margin: 0px;">User Info</h2>
										</a>
									</li>
									<li>
										<a href="{{ url('/change_pw') }}">
											<h2 style="margin: 0px;">Password</h2>
										</a>
									</li>
								</ul>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<h2 style="color: white; margin: 0px;">
										Remove <span class="caret"></span>
									</h2>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ url('/remove_user') }}">
											<h2 style=" margin: 0px;">User</h2>
										</a>
									</li>
									<li>
										<a href="{{ url('/update_device') }}">
											<h2 style=" margin: 0px;">Device</h2>
										</a>
									</li>
								</ul>
							</li>
							
							
								
							
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<h2 style="color: white; margin: 0px;">
										{{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
									</h2>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ url('/logout') }}" onclick="event.preventDefault();
											   document.getElementById('logout-form').submit();">
											<h2 style="margin: 0px;">Logout</h2>
										</a>
										<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
						</ul>
						<!-- End of Nav bar Admin-->
					@else
						<!-- Right Side Of Navbar User -->
						<ul class="nav navbar-nav navbar-navbar-inverse navbar-right ">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<h2 style="color: white; margin: 0px;">
										{{ ucfirst(Auth::user()->name) }} <span class="caret"></span>
									</h2>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li>
										<a href="{{ url('/change_pw') }}">
											<h2 style="margin: 0px;">Change Password</h2>
										</a>
									</li>
									<li>
										<a href="{{ url('/logout') }}" onclick="event.preventDefault();
											   document.getElementById('logout-form').submit();">
											<h2 style="margin: 0px;">Logout</h2>
										</a>
										<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
									</li>
								</ul>
							</li>
						</ul>
					@endif
                @endif <!-- End of Nav Bar-->

            </div>
            <!-- End of Nav Bar-->
        </div>
        <!-- End of Container -->
    </nav>
    <!-- End of Header-->

    <br />

    <!-- Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <!--Validator-->
                @if(isset($errors) && $errors->any())
                <div class="col-xs-9 col-xs-offset-2 alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"></span></button>
                    <strong>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </strong>
                </div>
                @endif
                <!-- Custom Error -->
                @if(Session::has('flash_success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ Session::get('flash_success')}}</strong>
                </div>
                @elseif(Session::has('flash_error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ Session::get('flash_error')}}</strong>
                </div>
                @elseif(Session::has('flash_warning'))
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>{{ Session::get('flash_warning')}}</strong>
                </div>
                @endif
            </div>

            <!-- Yield Content-->
            @yield('content')

        </div>
    </div>
    <!-- End of Container -->
    <!-- End Of Content -->

    <!-- Scripts -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://use.fontawesome.com/31a7458090.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/solid.js" integrity="sha384-+Ga2s7YBbhOD6nie0DzrZpJes+b2K1xkpKxTFFcx59QmVPaSA8c7pycsNaFwUK6l" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/fontawesome.js" integrity="sha384-7ox8Q2yzO/uWircfojVuCQOZl+ZZBg2D2J5nkpLqzH1HY0C1dHlTKIbpRz/LG23c" crossorigin="anonymous"></script>

    @yield('footer')
    <footer style="text-align: center;color: black">
        <p>
				<a href="{{ url('http://opensource.org/licenses/MIT')}}" style="color: #BD5D38 !important;"> Website designed by Kavier Koo</a>
				<br>
				For more information, please contact developer via <a href="{{url('http://kavierkoo.com/#contact ')}}" style="color: #b1b7ba !important;">Here</a> .
      
        </p>
    </footer>

</body>

</html>