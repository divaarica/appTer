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
            <div class="col-md-8 col-md-offset-1 col-sm-10 col-sm-offset-1">
                <form class="reserve-form row" action="{{ route('reservations.store') }}" method="post">
                    @csrf
                    <div class="section-header text-center">
                        <h4 class="sub-title">Reservation</h4>
                        <h2 class="title white-text">Faites une reservation de ticket(s)</h2>
                        @error('end')
                        <div class="text-danger">{{ $message }}</div>
                        <br>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Depart:</label>

                            <select class="input" id="start" name="start">
                                @foreach( $regions as $region)
                                <option value="{{ $region->id }}">{{ $region-> name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Arrivee:</label>

                            <select class="input" id="end" name="end">
                                @foreach( $regions as $region)
                                <option value="{{ $region->id }}">{{ $region-> name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Ligne:</label>

                            <select class="input" id="ligne" name="ligne_id">
                                @foreach ($lignes as $ligne)
                                <option value="{{ $ligne->id }}">{{ $ligne -> start}} - {{ $ligne -> end}}</option>
                                @endforeach
                            </select>

                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="number">Nombre de personnes:</label>
                            <select class="input" id="nbPersons" name="nbPersons">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <br>
                            @foreach( $classes as $classe)
                            <label>
                                <input type="radio" name="class_id" value="{{ $classe -> id }}" checked> {{ $classe -> name }}
                            </label>
                            @endforeach
                        </div>
                        <br>
                        <button type="submit" class="main-button">Book Now</button>
                    </div>

                </form>
            </div>
            <!-- /reservation form -->

            <!-- opening time -->
            <div class="col-md-3 col-md-offset-0 col-sm-10 col-sm-offset-1">
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