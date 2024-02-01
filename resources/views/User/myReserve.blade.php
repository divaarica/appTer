@extends('layout')
@section('content')
<!-- Home -->
<div id="homeRes" class="banner-area2">

    <!-- Backgound Image -->
    <div class="bg-image bg-parallax overlay reserveImg"></div>
    <!-- /Backgound Image -->

    <div class="home-wrapper2">

        <div class="col-md-10 col-md-offset-1 text-center">
            @if(session('success'))
            <div class="text-danger">
                {{ session('success') }}
            </div>
            @endif
            <div class="home-content">
                <h1 class="white-text">Vos Rervations</h1>
                <h4 class="white-text lead"></h4>
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


        <table class="table table-newcolor ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Numero</th>
                    <th scope="col">Depart</th>
                    <th scope="col">Arrivee</th>
                    <th scope="col">Classe</th>
                    <th scope="col">nombre de personne</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $listReservations as $reservation)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{$reservation -> resNumber}}</td>
                    <td>{{$reservation -> startRegion -> name}}</td>
                    <td>{{$reservation -> endRegion -> name}}</td>
                    <td>{{$reservation -> classe -> name}}</td>
                    <td>{{$reservation -> nbPersons}}</td>
                    <td>{{$reservation -> price}}</td>
                    <td>
                        <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#afficherQrModal{{$reservation->id}}"><i class="fa fa-qrcode"></i>
                            Voir QrCode</a>

                        <form action="{{ route('reservations.cancel', $reservation) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir Annuler cette Reservation? Il ne sera plus possible de revenir en arriere');" style="display:inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Annuler</button>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>



    </div>
    <!-- /container -->

    <!-- modal afficher qrcode -->
    @foreach($qrCodesData as $qrCodeData)
    @if($qrCodeData['idRes'] !== 0 )
    <div class="modal" id="afficherQrModal{{$qrCodeData['idRes']}}" tabindex="-1" role="dialog" aria-labelledby="afficherQrModal{{$qrCodeData['idRes']}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-label="Fermer" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3>Temps Restant pour la validite de la reservation</h3><br>
                    <h5 class="text-center">{{ $qrCodeData['daysRemaining'] }} jour(s) {{ $qrCodeData['hoursRemaining'] }} heure(s) {{ $qrCodeData['minutesRemaining'] }} minutes(s)</h5><br>
                    <p class="text-center">
                        {{ $qrCodeData['qrCode']}}
                    </p>
                    <br>
                    <h3 class="text-center text-primary">Scanner pour voir les information de cette reservation</h3>
                    <h6 class="text-center text-danger">Ce Cette reservation ne sera plus disponible une fois expiree</h6>




                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    

</div>
<!-- /Home -->

<!-- Footer -->
@endsection