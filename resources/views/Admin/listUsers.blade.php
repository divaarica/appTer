@extends('layoutAdmin')
@section('sidebar')
<li class="sidebar-item ">
	<a class="sidebar-link" href="{{ route('admins.index') }}">
		<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
	</a>
</li>

<li class="sidebar-item">
	<a class="sidebar-link" href="{{ route('admins.editPage') }}">
		<i class="align-middle" data-feather="user"></i> <span class="align-middle">Profil</span>
	</a>
</li>

<li class="sidebar-header">
	Gestion
</li>

<li class="sidebar-item active">
	<a class="sidebar-link" href="{{ route('list-users') }}">
		<i class="align-middle" data-feather="user"></i> <span class="align-middle">Utilisateur</span>
	</a>
</li>

<li class="sidebar-item ">
	<a class="sidebar-link" href="{{ route('tarifs.index') }}">
		<i class="align-middle fa fa-money"></i> <span class="align-middle">Tarifs</span>
	</a>
</li>

<li class="sidebar-item ">
	<a class="sidebar-link" href="{{ route('classes.index') }}">
		<i class="align-middle fa fa-duotone fa-train"></i> <span class="align-middle">Classes</span>
	</a>
</li>

<li class="sidebar-item ">
	<a class="sidebar-link" href="{{ route('zones.index') }}">
		<i class="align-middle fa fa-map-marker"></i> <span class="align-middle">Zones <span>
	</a>
</li>

<li class="sidebar-item ">
	<a class="sidebar-link" href="{{ route('lignes.index') }}">
		<i class="align-middle fa fa-regular fa-map"></i> <span class="align-middle">Lignes<span>
	</a>
</li>

<li class="sidebar-item ">
	<a class="sidebar-link" href="{{ route('regions.index') }}">
		<i class="align-middle fa fa-globe"></i> <span class="align-middle">Regions <span>
	</a>
</li>
@endsection
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Liste</strong> des Utilisateurs</h1>
		<!-- <a href="" type="button" class="btn btn-primary float-end padding-right-10px"><i class="fa fa-plus"></i> Ajouter</a> -->
		<br />
		@if(session('success'))
		<div class="text-danger">
			{{ session('success') }}
		</div>
		@endif
		<br />

		<table class="table table-striped table-bordered table-over ">
			<thead class="table-info">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nom</th>
					<th scope="col">Prenom</th>
					<th scope="col">Adresse</th>
					<th scope="col">Tel</th>
					<th scope="col">Options</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $listUsers as $user)
				<tr>
					<th scope="row">{{ $loop->index + 1 }}</th>
					<td>{{$user -> firstName}}</td>
					<td>{{$user -> lastName}}</td>
					<td>{{$user -> adress}}</td>
					<td>{{$user -> tel}}</td>
					<td>


						<a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#userResModal{{$user->id}}"><i class="fa fa-pencil-square-o"></i>
							Reservation(s) en cours</a>

						<a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#userResModal2{{$user->id}}"><i class="fa fa-pencil-square-o"></i>
							Reservation(s) expiree(s)</a>

						<form action="{{ route('users.destroy', $user) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir Supprimer cet utilisteur? Il ne sera plus possible de revenir en arriere');" style="display:inline">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>



	</div>
	<!-- modal Reservation(S) user -->
	@foreach($listUsers as $user)
	<div class="modal" id="userResModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="userResModalLabel{{$user->id}}" aria-hidden="true">
		<div class="modal-dialog custom-modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Reservation(s) de Monsieur/Madame {{$user -> lastName }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="container">
					<table class="table table-striped">
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
							@foreach( $listReservationsEnCours as $reservation)
							@if($reservation->user_id == $user->id)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>{{$reservation -> resNumber}}</td>
								<td>{{$reservation -> startRegion -> name}}</td>
								<td>{{$reservation -> endRegion -> name}}</td>
								<td>{{$reservation -> classe -> name}}</td>
								<td>{{$reservation -> nbPersons}}</td>
								<td>{{$reservation -> price}}</td>
								<td>
									<form action="{{ route('reservations.cancel', $reservation) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir Annuler cette Reservation? Il ne sera plus possible de revenir en arriere');" style="display:inline">
										@csrf
										@method('PATCH')
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Annuler</button>
									</form>


								</td>
							</tr>
							@endif

							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endforeach

	@foreach($listUsers as $user)
	<div class="modal" id="userResModal2{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="userResModalLabel{{$user->id}}" aria-hidden="true">
		<div class="modal-dialog custom-modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Reservation(s) de Monsieur/Madame {{$user -> lastName }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="container">
					<table class="table table-striped">
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
							@foreach( $listReservationsExpire as $reservation)
							@if($reservation->user_id == $user->id)
							<tr>
								<th scope="row">{{ $loop->index + 1 }}</th>
								<td>{{$reservation -> resNumber}}</td>
								<td>{{$reservation -> startRegion -> name}}</td>
								<td>{{$reservation -> endRegion -> name}}</td>
								<td>{{$reservation -> classe -> name}}</td>
								<td>{{$reservation -> nbPersons}}</td>
								<td>{{$reservation -> price}}</td>
								<td>
									<form action="{{ route('reservations.destroy', $reservation) }}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir Annuler cette Reservation? Il ne sera plus possible de revenir en arriere');" style="display:inline">
										@csrf
										@method('DELETE')
										<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</button>
									</form>

								</td>
							</tr>
							@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endforeach


</main>
@endsection