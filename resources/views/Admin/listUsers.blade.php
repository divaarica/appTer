@extends('layoutAdmin')
@section('content')
<main class="content">
	<div class="container-fluid p-0">

		<h1 class="h3 mb-3"><strong>Liste</strong> des Utilisateurs</h1>
		<!-- <a href="" type="button" class="btn btn-primary float-end padding-right-10px"><i class="fa fa-plus"></i> Ajouter</a> -->
		<br />
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
					<th scope="row">...</th>
					<td>{{$user -> firstName}}</td>
					<td>{{$user -> lastName}}</td>
					<td>{{$user -> adress}}</td>
					<td>{{$user -> tel}}</td>
					<td>


						<a href="" type="button" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
							Reservation(s)</a>

						<form action="" method="post" style="display:inline">
							<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Supprimer</button>
						</form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>



	</div>
</main>
@endsection