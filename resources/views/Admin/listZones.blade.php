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

<li class="sidebar-item">
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

<li class="sidebar-item active">
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
		<p class="ml-10"><img src="{{ asset('Admin/img/plan-de-la-ligne-1.jpg') }}" alt="" width="1000" height="300"></p>
		<h1 class="h3 mb-3"><strong>Zones</strong></h1>
		@if(session('flash_message'))
		<div class="text-danger">
			{{ session('flash_message') }}
		</div>
		@endif
		@error('name')
		<div class="text-danger">{{ $message }}</div>
		@enderror
		<a href="" type="button" class="btn btn-primary float-end padding-right-10px" data-toggle="modal" data-target="#addZoneModal"><i class="fa fa-plus"></i> Ajouter</a>
		<br />
		<br />
		<hr>
		<table class="table table-striped table-default table-over">
			<thead class="table-dark">

				<tr>
					<th scope="col">#</th>
					<th scope="col">Nom</th>
					<th scope="col">Options</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach( $listZones as $zone)
					<th scope="row">{{ $loop->index + 1 }}</th>
					<td>{{$zone -> name}}</td>
					<td>
						<a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#editZoneModal{{$zone->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							Modifier</a>

						<form action="{{ route('zones.destroy', $zone )}}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cete Zone? ?');" style="display:inline">
							@csrf
							@method('DELETE')
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>


	</div>

	<!-- Modal ajouter zone -->
	<div class="modal" id="addZoneModal" tabindex="-1" role="dialog" aria-labelledby="addZoneModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addZoneModalLabel">Ajouter une Zone</h5>
					<button type="button" class="close" aria-label="Fermer" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('zones.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="nomZone">Nom de la Zone</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<button type="submit" class="btn btn-primary">Ajouter</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- modal modifier zone -->
	@foreach($listZones as $zone)
	<div class="modal" id="editZoneModal{{$zone->id}}" tabindex="-1" role="dialog" aria-labelledby="editZoneModalLabel{{$zone->id}}" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier la Zone {{$zone->name}}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Formulaire pour la modification -->
					<form action="{{ route('zones.update', ['zone' => $zone->id]) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Nom :</label>
							<input type="text" class="form-control" id="name" name="name" value="{{ $zone->name }}">
						</div>
						<button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	@endforeach

</main>

@endsection