<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Ligne;
use App\Models\Region;
use App\Models\Reservation;
use App\Models\Tarif;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Stringable;

class ReservationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $id = $user->id;

        $listReservations = Reservation::where('user_id', $id)->where('state', 1)->get();
        foreach ($listReservations as $reservation) {
            if (Carbon::now()->gte($reservation->qrcode_expiration)) {
                $reservation->state = 0;
                $reservation->save();
            }
        }
        
        $listReservations = Reservation::where('user_id', $id)->where('state', 1)->get();
        
        $qrCodesData = [];
        foreach ($listReservations as $reservation) {
            $qrCodesData[] = $this->generateQrCode($reservation->id);
        }


        return view('User.myReserve', compact('listReservations', 'qrCodesData'));
        //return view('User.myReserve', compact('listReservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $regions = Region::all();
        $lignes = Ligne::all();
        $classes = Classe::all();


        return view('User.reserve', compact('regions', 'lignes', 'classes'));
    }

    public function show()
    {
    }


    public function store(Request $request)
    {
        $request->validate(
            [
                "start" => "required",
                "end" => "required|different:start",
                "nbPersons" => "required",
                "class_id" => "required",
                "ligne_id" => "required",

            ]
        );

        // $startText = $request->get('start');
        // $endText = $request->get('end');
        $startId = $request->input('start');
        $endId = $request->input('end');
        $classe = $request->input('class_id');
        $nb = $request->input('nbPersons');
        $region1 = Region::find($startId);
        $region2 = Region::find($endId);
        $zone1 = $region1->zone->id;
        $zone2 = $region2->zone->id;

        //Atribution des prix celon la classe
        if ($classe == 2) {
            if ($zone1 == $zone2) {
                //$price = Tarif::where('nbZones', '=', '1')->first()->price * $nb;
                $price = 500  * $nb;
            } elseif (($zone1 == 1 && $zone2 == 2) || ($zone1 == 2 && $zone2 == 3) || ($zone1 == 2 && $zone2 == 1) || ($zone1 == 3 && $zone2 == 2)) {
                //$price = Tarif::where('nbZones', '=', '2')->first()->price * $nb;
                $price = 1000  * $nb;
            } else {
                //$price = Tarif::where('nbZones', '=', '3')->first()->price * $nb;
                $price = 1500  * $nb;
            }
        } else {
            //$price = Tarif::where('nbZones', '=', '3')->first()->price * $nb;
            $price = 2500  * $nb;
        }

        //generation du numero du ticket
        $user = auth()->user();
        $random1 = mt_rand(100, 999);
        $random2 = mt_rand(100, 999);
        $id = $user->id;
        $resNumber = strtoupper("RES" . $random1 . $id . $random2);

        // Combiner les attributs générés avec les attributs de la requête
        $input = array_merge([
            'date' => Carbon::today(),
            'qrcode_expiration' => Carbon::now()->addDays(7),
            'price' => $price,
            'resNumber' => $resNumber,
            'user_id' => $id,
            'state' => 1,
        ], $request->all());

        Reservation::create($input);

        return redirect()->route('reservations.index')->with('success', 'Reservation creer avec succès.');
    }

    public function generateQrCode($reservationId)
    {
        $reservation = Reservation::find($reservationId);

        // si la date d'expiration n'est pas dépassée . lt(lower than, etourne true ou false)
        // if (Carbon::now()->lt($reservation->qrcode_expiration))

        //temsp restant
        $timeRemaining = now()->diff($reservation->qrcode_expiration);
        //jours restatnt
        $daysRemaining = $timeRemaining->d;
        //heure restantes
        $hoursRemaining = $timeRemaining->h;
        //minutes restantes
        $minutesRemaining = $timeRemaining->i;

        // $url = url('/view-pdf?data=' . json_encode($data));
        // $qrCode = QrCode::size(200)->generate($url);

        $qrContent =  "Numero de reservation:" . $reservation->resNumber . "\nDepart: " . $reservation->startRegion->name . "\nArrivee: " . $reservation->endRegion->name . "\nNombre de personne: " . $reservation->nbPersons . "\nClasse: " . $reservation->classe->name . "\nPrix: " . $reservation->price . "\nDate d'expiration de la reservation: " . $reservation->qrcode_expiration;


        $qrCode = QrCode::size(150)->generate($qrContent);

        $tbl = [
            'idRes' => $reservation->id,
            'qrCode' => $qrCode,
            'daysRemaining' => $daysRemaining,
            'hoursRemaining' => $hoursRemaining,
            'minutesRemaining' => $minutesRemaining,
        ];

        // Retourner une vue avec le code QR
        return $tbl;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $region = Reservation::find($id);
        $request->validate(
            [
                "start" => "required",
                "end" => "required|different:start",
                "nbPersons" => "required",
                "class_id" => "required",
                "ligne_id" => "required",
            ]
        );

        $input = $request->all();
        $region->update($input);

        return redirect()->route('reservations.index')->with('success', 'reservation modifier avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        $user = auth()->user();
        if ($user->role_id == 1) {
            return redirect()->route('list-users')->with('success', 'resevation supprimée avec succès.');
        }
        return redirect()->route('reservations.index')->with('success', 'resevation supprimée avec succès.');
    }

    public function cancel($id)
    {
        $reservation = Reservation::find($id);
        $reservation->state = 0;
        $reservation->save();
        $user = auth()->user();
        if ($user->role_id == 1) {
            return redirect()->route('list-users')->with('success', 'resevation annuler avec succès.');
        }
        return redirect()->route('reservations.index')->with('success', 'resevation annuler avec succès.');
    }
}
