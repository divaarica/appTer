@extends('layout')
@section('content')

<!-- Home -->
<div id="homeRes" class="banner-area2">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay reserveImg"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper2">

        <div class="col-md-10 col-md-offset-1 text-center">
            <div class="home-content">
                <h1 class="white-text">Reserver</h1>
                <h4 class="white-text lead">Simplifiez votre expérience de voyage en réservant vos places en
                    quelques clics, offrant ainsi une nouvelle dimension à votre trajet ferroviaire.</h4>
                <!-- <a href="index.html#menu"><button class="main-button">Decouvrir les prix</button></a> -->
            </div>
        </div>





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
    <div class="container">


        <!-- row -->
        <div class="row">
            <br>
            <br>

            <!-- reservation form -->
            <div class="col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <form class="reserve-form row">
                    <div class="section-header text-center">
                        <h4 class="sub-title">Reservation</h4>
                        <h2 class="title white-text">Faites une reservation de ticket(s)</h2>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input class="input" type="text" placeholder="Name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input class="input" type="tel" placeholder="Phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="date">Date:</label>
                            <input class="input" type="text" placeholder="MM/DD/YYYY" id="date">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input class="input" type="email" placeholder="Email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="number">Number of Guests:</label>
                            <select class="input" id="number">
                                <option>1 Person</option>
                                <option>2 People</option>
                                <option>3 People</option>
                                <option>4 People</option>
                                <option>5 People</option>
                                <option>6 People</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="time">Time:</label>
                            <input class="input" type="text" placeholder="HH:MM" id="time">
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <button class="main-button">Book Now</button>
                    </div>

                </form>
            </div>
            <!-- /reservation form -->

            <!-- opening time -->
            <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
                <div class="opening-time row">
                    <div class="section-header text-center">
                        <h2 class="title white-text">Horaires</h2>
                    </div>
                    <ul>
                        <li>
                            <h4 class="day">Lundi</h4>
                            <h4 class="hours">5:30 am – 20:55 pm</h4>
                        </li>
                        <li>
                            <h4 class="day">Mardi</h4>
                            <h4 class="hours">5:30 am – 20:55 pm</h4>
                        </li>
                        <li>
                            <h4 class="day">Mercredi</h4>
                            <h4 class="hours">5:30 am – 20:55 pm</h4>
                        </li>
                        <li>
                            <h4 class="day">Jeudi</h4>
                            <h4 class="hours">5:30 am – 20:55 pm</h4>
                        </li>
                        <li>
                            <h4 class="day">Vendredi</h4>
                            <h4 class="hours">5:30 am – 20:55 pm</h4>
                        </li>
                        <li>
                            <h4 class="day">Samedi</h4>
                            <h4 class="hours">5:30 am – 20:55 pm</h4>
                        </li>
                        <li>
                            <h4 class="day">Dimanche</h4>
                            <h4 class="hours">6:25 am – 22h05 pm</h4>
                        </li>
                        <h4></h4>

                        <p></p>
                    </ul>
                </div>
            </div>
            <!-- /opening time -->

        </div>
        <!-- /row -->

    </div>
    <!-- /container -->

</div>
<!-- /Home -->
@endsection