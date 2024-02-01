@extends('layoutAdmin')
@section('sidebar')
<li class="sidebar-item">
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

<li class="sidebar-item active">
	<a class="sidebar-link" href="{{ route('regions.index') }}">
		<i class="align-middle fa fa-globe"></i> <span class="align-middle">Regions <span>
	</a>
</li>
@endsection
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Regions</strong></h1>
		<a href="" type="button" class="btn btn-primary float-end padding-right-10px" data-toggle="modal" data-target="#addRegionModal"><i class="fa fa-plus"></i> Ajouter</a>
		<br />
		<br />
		<table class="table table-striped table-bordered table-over">
			<thead class="table-info">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Nom</th>
					<th scope="col">Zone</th>
					<th scope="col">Options</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $listRegions as $region)
				<tr>
					<th scope="row">{{ $loop->index + 1 }}</th>
					<td>{{$region -> name}}</td>
					<td>{{$region -> zone -> name}}</td>
					<td>


						<a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#editRegionModal{{$region->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							Modifier</a>

						<form action="{{ route('regions.destroy', $region )}}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cete Region? ?');" style="display:inline">
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
	<div class="modal" id="addRegionModal" tabindex="-1" role="dialog" aria-labelledby="addRegionModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addRegionModalLabel">Ajouter une region</h5>
					<button type="button" class="close" aria-label="Fermer" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('regions.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="region">Nom de la region</label>
							<input type="text" class="form-control" id="name" name="name">
						</div>
						<div class="form-group">
							<label for="zone">Zone :</label>
							<select class="form-control" id="zone_id" name="zone_id">
								@foreach ( $listZones as $zone )
								<option value="{{ $zone -> id}}"> {{ $zone -> name}}</option>
								@endforeach
							</select>
						</div>
						<button type="submit" class="btn btn-primary">Ajouter</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- modal modifier Regions-->
	@foreach($listRegions as $region)
	<div class="modal" id="editRegionModal{{$region->id}}" tabindex="-1" role="dialog" aria-labelledby="editRegionModalLabel{{$region->id}}" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier le region {{$region->name}}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Formulaire pour la modification -->
					<form action="{{ route('regions.update', ['region' => $region->id]) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="region">Nom region </label>
							<input type="text" class="form-control" id="name" name="name" value="{{ $region->name }}">
						</div>
						<div class="form-group">
							<label for="zone">Zone :</label>
							<select class="form-control" id="zone_id" name="zone_id">
								@foreach ( $listZones as $zone )
								<option value="{{ $zone ->id }}" {{ ($zone -> id == $region->zone_id) ? 'selected' : '' }}>
									{{ $zone->name }}
								</option>
								@endforeach
							</select>
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