@extends('layout')
@section('content')
<!-- Home -->
<div id="homeIns" class="banner-area2">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay" style="background-image:url(User/img/terimg6.png)"></div>
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
                <form class="reserve-form row">

                    <div class="section-header text-center">
                        <!-- <h4 class="sub-title">Inscription</h4> -->
                        <h2 class="title white-text">Editer le profil</h2>
                    </div>
                    <br>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Nom(s):</label>
                            <input class="input" type="text" placeholder="Name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Prenom(s):</label>
                            <input class="input" type="text" placeholder="Name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="name">Adresse:</label>
                            <input class="input" type="text" placeholder="Name" id="name">
                        </div>
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
                            <label for="email">Tel:</label>
                            <input class="input" type="text" placeholder="" id="tel">
                        </div>
                        <div class="form-group">
                            <label for="name">Nom d'utilisateur:</label>
                            <input class="input" type="text" placeholder="Name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse email:</label>
                            <input class="input" type="email" placeholder="Email" id="email">
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="">

                        <button type="button" class="main-button">Modifier</button>
                        <a href="" class="white-text align-right" style="text-decoration: underline;" data-bs-toggle="modal" data-bs-target="#staticBackdropé">
                            Changer de mot de passe
                        </a>
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