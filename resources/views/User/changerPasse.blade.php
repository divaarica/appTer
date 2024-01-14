@extends('layout')
@section('content')

<!-- Home -->
<div id="homeCon" class="banner-area2">

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
            <br>

            <!-- reservation form -->
            <div class="col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-3 ">
                <form class="reserve-form row">
                    <div class="section-header text-center">
                        <!-- <h4 class="sub-title">Connection</h4> -->
                        <h2 class="title white-text">Changer de mot de passe</h2>
                    </div>


                    <div class="form-group">
                        <label for="name">Ancien mot de passe</label>
                        <input class="input" type="text" placeholder="Name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="phone">Nouveau mot de passe</label>
                        <input class="input" type="tel" placeholder="Phone" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="phone">Confirmation du nouveau mot de passe</label>
                        <input class="input" type="tel" placeholder="Phone" id="phone">
                    </div>


                    <div class="">
                        <button class="main-button">Changer</button>
                        <div style="text-align: right;">
                            <a href="inscription.html" class="white-text" style="text-decoration: underline;">Edite le profil</a>
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
