@extends('layout')
@section('content')
<!-- Home -->
<div id="homeIns" class="banner-area2">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay imgins"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper2">

        <!-- <div class="col-md-10 col-md-offset-1 text-center">
                <div class="home-content">
                    <h1 class="white-text">Reserver</h1>
                    <h4 class="white-text lead">Simplifiez votre expérience de voyage en réservant vos places en
                        quelques clics, offrant ainsi une nouvelle dimension à votre trajet ferroviaire.</h4>
                </div>
            </div> -->





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
            <div class="col-md-10 col-md-offset-1 col-sm-9 col-sm-offset-1 ">
                <form class="reserve-form row" action="{{ route('users.store') }}" method="post">
                    @csrf
                    <div class="section-header text-center">
                        <h4 class="sub-title">Inscription</h4>
                        <h2 class="title white-text">Inscrivez vous</h2>
                        @if(session('flash_message'))
                        <div class="alert alert-success">
                            {{ session('flash_message') }}
                        </div>
                        @endif
                        <br>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstName">Nom(s):</label>
                            <input class="input" type="text" id="firstName" name="firstName">
                        </div>
                        @error('nom')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="adresse">Adresse:</label>
                            <input class="input" type="text" id="adress" name="adress">
                        </div>
                        @error('adresse')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <!-- <div class="form-group">
                                <label for="name">Region:</label>
                                <select class="input">
                                    <option class="option" selected>Open this select menu</option>
                                    <option class="option" value="1">One</option>
                                    <option class="option" value="2">Two</option>
                                    <option class="option" value="3">Three</option>
                                </select>
                            </div> -->
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastName">Prenom(s):</label>
                            <input class="input" type="text" id="lastName" name="lastName">
                        </div>
                        @error('prenom')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="tel">tel:</label>
                            <input class="input" type="text" id="tel" name="tel">
                        </div>
                        @error('tel')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="name">Adresse email:</label>
                        <input class="input" type="email" id="email" name="email">
                    </div>
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="name">Mot de passe:</label>
                        <input class="input" type="password" id="password" name="password">
                    </div>
                    @error('mdp')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <!-- <div class="form-group">
                        <label for="name">Confirmer le mot de passe:</label>
                        <input class="input" type="password" id="mdp1" name="mdp1">
                    </div> -->
                    <div class="form-group" hidden>
                        <label for="role_id"></label>
                        <input class="input" value=2 type="text" id="role_id" name="role_id">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="main-button">S'inscrire</button>
                        <!-- <a class="main-button">S'inscrire</a> -->
                        <div style="text-align: right;">
                            <a href="{{ route('auth.login') }}" class="white-text" style="text-decoration: underline;">deja inscrit?
                                Connectez vous</a>
                        </div>

                    </div>


                </form>
            </div>

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Home -->

@endsection