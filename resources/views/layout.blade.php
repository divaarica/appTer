<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Restaurant HTML Template</title>
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700%7CCabin:400%7CDancing+Script" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/bootstrap.min.css') }}" />

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/owl.carousel.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/owl.theme.default.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('User/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('User/css/style.css') }}" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>

    <!-- Header -->
    <header id="header">

        <!-- Top nav -->
        <div id="top-nav">
            <div class="container">

                <!-- logo -->
                <div class="logo">
                    <a href="index.html"><img src="{{ asset('User/img/TER_Dakar_IP2i.png') }}" alt="logo"></a>
                </div>
                <!-- logo -->

                <!-- Mobile toggle -->
                <button class="navbar-toggle">
                    <span></span>
                </button>
                <!-- Mobile toggle -->

                <!-- social links -->
                <ul class="social-nav">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
                <!-- /social links -->

            </div>
        </div>
        <!-- /Top nav -->

        <!-- Bottom nav -->
        <div id="bottom-nav">
            <div class="container">
                <nav id="nav">

                    <!-- nav -->

                    <ul class="main-nav nav navbar-nav">
                        <li><a href="{{ route('users.index') }}">Acceuil</a></li>
                        <li><a href="{{ route('users.index') }}">Horaires</a></li>
                        <li><a href="{{ route('users.index') }}">Contact</a></li>
                        @auth
                        <li><a href="{{ route('reservations.create') }}">Reserver</a></li>
                        <li><a href="{{ route('reservations.index')}}">Mes reservations</a></li>
                        @endauth

                    </ul>
                    <!-- /nav -->

                    <!-- button nav -->

                    <ul class="cta-nav">
                        @auth
                        <form action="{{ route('auth.logout') }}" method="post">
                            @method('delete')
                            @csrf
                            <li><button class="main-button btn-sm">Se deconnecter</button></li>
                        </form>
                        @endauth
                        @guest
                        <li><a href="{{ route('auth.login') }}" class="main-button">Se connecter</a></li>
                        <li><a href="{{ route('users.create') }}" class="main-button">S'inscrire</a></li>
                        @endguest
                    </ul>
                    <!-- button nav -->

                    <!-- profile nav -->
                    <ul class="contact-nav nav navbar-nav">
                        @auth
                        <li><a href="#">Bienvenue {{ Auth::user()->firstName }}</a></li>

                        <li class="dropdown">
                            <a href="#"><i class="fa fa-user" style='font-size:25px;color:#f36700'></i></a>
                            <span></span>
                            <!-- <pre>{{ print_r(Auth::user(), true) }}</pre> -->
                            <div class="dropdown-content">
                                <a href="{{ route('users.edit', ['user'=> auth()->user()->id] ) }}">Editer Profile</a>
                                <a href="{{ route('users.editPassword') }}">changer le mot de passe</a>
                            </div>
                        </li>
                        @endauth
                    </ul>
                    <!-- profile nav -->

                </nav>
            </div>
        </div>
        <!-- /Bottom nav -->


    </header>
    <!-- /Header -->
    @yield('content')
    <!-- Footer -->
    <footer id="footer">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- copyright -->
                <div class="col-md-6">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    <span class="copyright">Copyright @2024 All rights reserved |  <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="" target="_blank">Groupe1L3Gl</a></span>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </div>
                <!-- /copyright -->

                <!-- footer nav -->
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <a href="{{ route('users.index') }}">Acceuil</a>
                        <a href="{{ route('users.index') }}">Horaires</a>
                        <a href="{{ route('users.index') }}">Contact</a>
                        @auth
                        <a href="{{ route('reservations.create') }}">Reserver</a>
                        <a href="{{ route('reservations.index')}}">Mes reservations</a>
                        @endauth
                    </nav>
                </div>
                <!-- /footer nav -->

            </div>
            <!-- /row -->

        </div>
        <!-- /container -->

    </footer>
    <!-- /Footer -->

    <!-- Preloader -->
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- /Preloader -->


    <!-- jQuery Plugins -->
    <script>
        window.addEventListener('beforeunload', function(event) {
            // Faire une requête AJAX pour déconnecter l'utilisateur
            fetch('/logout', {
                method: 'POST',
                credentials: 'include'
            });
        });
    </script>
    <script>
        flatpickr("#datepicker", {
            defaultDate: "today",
            minDate: "today",
            dateFormat: "Y-m-d"
        });
    </script>
    <script type="text/javascript" src="{{ asset('User/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('User/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('User/js/owl.carousel.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script type="text/javascript" src="{{ asset('User/js/google-map.js') }}"></script>
    <script type="text/javascript" src="{{ asset('User/js/main.js') }}"></script>

</body>

</html>