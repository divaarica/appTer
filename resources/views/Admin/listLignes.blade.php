@extends('layoutAdmin')
@section('content')

<main class="content">
	<div class="container-fluid p-0">
		<p class="ml-10"><img src="{{ asset('Admin/img/plan-de-la-ligne-1.jpg') }}" alt="" width="1000" height="300"></p>
		<h1 class="h3 mb-3"><strong>Lignes</strong></h1>
		@if(session('flash_message'))
		<div class="text-danger">
			{{ session('flash_message') }}
		</div>
		@endif
		@error('start')
		<div class="text-danger">{{ $message }}</div>
		@enderror
		@error('end')
		<div class="text-danger">{{ $message }}</div>
		@enderror
		<a href="" type="button" class="btn btn-primary float-end padding-right-10px" data-toggle="modal" data-target="#addLineModal"><i class="fa fa-plus"></i> Ajouter</a>
		<br />
		<br />
		<hr>
		<table class="table table-striped table-default table-over">
			<thead class="table-dark">

				<tr>
					<th scope="col">#</th>
					<th scope="col">Depart</th>
					<th scope="col">Arrivee</th>
					<th scope="col">Options</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@foreach( $listLignes as $ligne)
					<th scope="row">{{ $loop->index + 1 }}</th>
					<td>{{$ligne -> start}}</td>
					<td>{{$ligne -> end}}</td>
					<td>


						<a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#editLigneModal{{$ligne->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							Modifier</a>

						<form action="{{ route('lignes.destroy', $ligne )}}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cete Ligne? ?');" style="display:inline">
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


	<!-- modal ajouter ligne -->
	<div class="modal" id="addLineModal" tabindex="-1" role="dialog" aria-labelledby="addLineModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addLineModalLabel">Ajouter une Ligne</h5>
					<button type="button" class="close" aria-label="Fermer" data-dismiss="modal">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('lignes.store') }}" method="post">
						@csrf
						<div class="form-group">
							<label for="start">Départ</label>
							<input type="text" class="form-control" id="start" name="start">
						</div>
						<div class="form-group">
							<label for="end">Arrivée</label>
							<input type="text" class="form-control" id="end" name="end">
						</div>
						<button type="submit" class="btn btn-primary">Ajouter</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- modal modifier ligne -->
	@foreach($listLignes as $ligne)
	<div class="modal" id="editLigneModal{{$ligne->id}}" tabindex="-1" role="dialog" aria-labelledby="editLigneModalLabel{{$ligne->id}}" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier la Ligne {{$ligne->start}}-{{$ligne->end}}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('lignes.update', ['ligne' => $ligne->id]) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Depart</label>
							<input type="text" class="form-control" id="start" name="start" value="{{ $ligne->start }}">
						</div>
						<div class="form-group">
							<label for="name">Arrivee</label>
							<input type="text" class="form-control" id="end" name="end" value="{{ $ligne->end }}">
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