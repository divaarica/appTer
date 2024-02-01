@extends('layout')
@section('content')

<!-- Home -->
<div id="homeCon" class="banner-area2">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(User/img/terimg6.png)"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper2">
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <!-- container -->
    <div class="container ">


        <!-- row -->
        <div class="row " style="margin-left: 100; margin-right: 100;">
            <br>
            <br>

            <!-- reservation form -->
            <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-3 ">
                <form class="reserve-form row" action="{{ route('auth.login') }}" method="post">
                    @csrf
                    <div class="section-header text-center">
                        <h4 class="sub-title">Connection</h4>
                        <h2 class="title white-text">Connectez vous</h2>
                        @if($errors->has('error'))
                        <div class="text-danger">
                            {{ $errors->first('error') }}
                        </div>
                        <br>
                        @endif

                    </div>

                    <div class="form-group">
                        <label for="email">email:</label>
                        <input class="input" type="text" placeholder="" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    <br>
                    @enderror
                    <div class="form-group">
                        <label for="password">Mot de passe:</label>
                        <input class="input" type="password" placeholder="" id="password" name="password">
                    </div>
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    <br>
                    @enderror


                    <div class="">
                        <button class="main-button">Se connecter</button>
                        <!-- <a class="main-button">S'inscrire</a> -->
                        <div style="text-align: right;">
                            <a href="{{ route('users.create') }}" class="white-text" style="text-decoration: underline;">Pas encore inscrit? Inscrivez vous</a>
                        </div>

                    </div>


                </form>
            </div>
            <!-- /reservation form -->

            <!-- opening time -->
            <!-- <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
                    <div class="opening-time">
                        <img src="img/ter-dakar-trajet.jpg" alt="" width="300" height="300">
                    </div>
                    
                </div> -->
            <!-- /opening time -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Home -->

@endsection