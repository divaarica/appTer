@extends('layout')
@section('content')
<!-- Home -->
<div id="homeIns" class="banner-area2">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay editP"></div>
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
                <form action="{{ route('users.update', ['user' => auth()->user()->id]) }}" method="post"class="reserve-form row">

                    <div class="section-header text-center">
                        <!-- <h4 class="sub-title">Inscription</h4> -->
                        <h2 class="title white-text">Editer le profil</h2>
                    </div>
                    <br>
                    @if(session('message'))
                    <div class="text-danger">
                        {{ session('message') }}
                    </div>
                    @endif


                    @csrf
                    @method('PUT')
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nom(s):</label>
                            <input class="input" type="text" id="lastName" name="lastName" value="{{auth()->user()->lastName}}">
                        </div>
                        @error('lastName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <label for="name">Prenom(s):</label>
                            <input class="input" type="text" id="name" name="firstName" value="{{ auth()->user()->firstName }}">
                        </div>
                        @error('firstName')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Tel:</label>
                            <input class="input" type="text" id="tel" name="tel" value="{{ auth()->user()->tel }}">
                        </div>
                        @error('tel')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror

                        <div class="form-group">
                            <label for="email">Adresse email:</label>
                            <input class="input" type="email" id="email" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        @error('email')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Adresse:</label>
                            <input class="input" type="text" id="name" name="adress" value="{{ auth()->user()->adress }}">
                        </div>
                        @error('adress')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <br>
                    <br>
                    <div class="">

                        <button type="submit" class="main-button">Modifier</button>
                        <a href="" class="white-text align-right" style="text-decoration: underline;" data-bs-toggle="modal" data-bs-target="#staticBackdropé">
                            Changer de mot de passe
                        </a>
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