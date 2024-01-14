@extends('layoutAdmin')
@section('content')

<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Tarifs</strong></h1>
		@if(session('success'))
		<div class="text-danger">
			{{ session('success') }}
		</div>
		@endif
		@error('price')
		<div class="text-danger">{{ $message }}</div>
		@enderror
		@error('nbPersons')
		<div class="text-danger">{{ $message }}</div>
		@enderror
		@error('nbZones')
		<div class="text-danger">{{ $message }}</div>
		@enderror
		<a href="" type="button" class="btn btn-primary float-end padding-right-10px" data-toggle="modal" data-target="#addTarifModal"><i class="fa fa-plus"></i> Ajouter</a>
		<br />
		<br />
		<table class="table table-striped table-bordered table-over ">
			<thead class="table-info">
				<tr>
					<th scope="col">#</th>
					<th scope="col">Classe</th>
					<th scope="col">Prix</th>
					<th scope="col">nombre de zones</th>
					<th scope="col">nombre de personne</th>
					<th scope="col">Options</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $listTarifs as $tarif)
				<tr>

					<th scope="row">{{ $loop->index + 1 }}</th>
					<td>{{$tarif -> classe -> name }}</td>
					<td>{{$tarif -> price}}</td>
					<td>{{$tarif -> nbZones}}</td>
					<td>{{$tarif -> nbPersons}}</td>
					<td>


						<a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#editTarifModal{{$tarif->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							Modifier</a>

						<form action="{{ route('tarifs.destroy', $tarif )}}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce Tarif? ?');" style="display:inline">
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

	<!-- Modal ajouter Tarif-->
	<div class="modal" id="addTarifModal" tabindex="-1" role="dialog" aria-labelledby="addTarifModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addTarifModalLabel">Ajouter un nouveauTarif</h5>
					<button type="button" class="close" aria-label="Fermer" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('tarifs.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="prix">Prix:</label>
							<input type="text" class="form-control" id="price" name="price">
						</div>
						<div class="form-group">
							<label for="nbZones">Nombre de zone:</label>
							<input type="text" class="form-control" id="nbZones" name="nbZones">
						</div>
						<div class="form-group">
							<label for="prix">Nombre de personne:</label>
							<input type="text" class="form-control" id="nbPersons" name="nbPersons">
						</div>
						<div class="form-group">
							<label for="zone">Classe :</label>
							<select class="form-control" id="class_id" name="class_id">
								@foreach ( $listClasses as $classe )
								<option value="{{ $classe ->id }}" {{ ($classe -> id == $tarif->class_id) ? 'selected' : '' }}>
									{{ $classe->name }}
								</option>
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

	<!-- modal modifier Tarif-->
	@foreach($listTarifs as $tarif)
	<div class="modal" id="editTarifModal{{$tarif->id}}" tabindex="-1" role="dialog" aria-labelledby="editClasseTarifLabel{{$tarif->id}}" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier le Tarif </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<!-- Formulaire pour la modification -->
					<form action="{{ route('tarifs.update', ['tarif' => $tarif->id]) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<div class="form-group">
								<label for="prix">prix:</label>
								<input type="text" class="form-control" id="price" name="price" value="{{ $tarif->price }}">
							</div>
							<div class="form-group">
								<label for="nbZones">Nombre de zone:</label>
								<input type="text" class="form-control" id="nbZones" name="nbZones" value="{{ $tarif->nbZones }}">
							</div>
							<div class="form-group">
								<label for="prix">Nombre de personne:</label>
								<input type="text" class="form-control" id="nbPersons" name="nbPersons" value="{{ $tarif->nbPersons }}">
							</div>
							<div class="form-group">
								<label for="zone">Classe :</label>
								<select class="form-control" id="class_id" name="class_id">
									@foreach ( $listClasses as $classe )
									<option value="{{ $classe ->id }}" {{ ($classe -> id == $tarif->class_id) ? 'selected' : '' }}>
										{{ $classe->name }}
									</option>
									@endforeach
								</select>
							</div>
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