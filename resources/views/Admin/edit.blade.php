@extends('layoutAdmin')
@section('sidebar')
<li class="sidebar-item">
	<a class="sidebar-link" href="{{ route('admins.index') }}">
		<i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
	</a>
</li>

<li class="sidebar-item active">
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

<li class="sidebar-item ">
	<a class="sidebar-link" href="{{ route('regions.index') }}">
		<i class="align-middle fa fa-globe"></i> <span class="align-middle">Regions <span>
	</a>
</li>
@endsection
@section('content')
<main class="content">

	<div class="container-fluid p-0">
		<div class="">
			<div class="card">
				<div class="card-header pb-0">
					<div class="d-flex align-items-center">
						<h2 class="mb-0">Editer le Profil</h2>
						<button class="btn btn-primary ms-auto float-end" data-toggle="modal" data-target="#changePasswordModal">Changer de mot de passe</button>
					</div>
				</div>
				<div class="card-body">
					@if(session('message'))
					<div class="text-danger">
						{{ session('message') }}
					</div>
					@endif

					<h4 class="text-uppercase text-sm text-primary">Information Admn</h4>
					<br>
					<form action="{{ route('admins.update', ['admin'=> auth()->user()->id])}}" method="post">
						@csrf
						@method('PUT')
						<div class="row">
							<div class="">
								<div class="form-group">
									<label for="example-text-input" class="form-control-label">Nom</label>
									<br>
									<input class="form-control" id="lastName" name="lastName" type="text" value="{{auth()->user()->lastName}}">
								</div>
								@error('lastName')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<br>
							<br>
							<br>
							<br>
							<div class="">
								<div class="form-group">
									<label for="example-text-input" class="form-control-label">Prenom</label>
									<br>
									<input class="form-control" type="text" id="firstName" name="firstName" value="{{ auth()->user()->firstName }}">
								</div>
								@error('firstName')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<br>
							<br>
							<br>
							<br>

							<div class="">
								<div class="form-group">
									<label for="example-text-input" class="form-control-label">Adresse</label>
									<br>
									<input class="form-control" id="adress" name="adress" type="text" value="{{ auth()->user()->adress }}">
								</div>
								@error('adress')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<br>
							<br>
							<br>
							<br>

							<div class="">
								<div class="form-group">
									<label for="example-text-input" class="form-control-label">Telephone</label>
									<br>
									<input class="form-control" id="tel" name="tel" type="text" value="{{ auth()->user()->tel }}">
								</div>
								@error('tel')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
							<br>
							<br>
							<br>
							<br>
							<div class="">
								<div class="form-group">
									<label for="example-text-input" class="form-control-label">Adresse mail</label>
									<br>
									<input class="form-control" id="email" name="email" type="text" value="{{ auth()->user()->email }}">
								</div>
								@error('email')
								<div class="text-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<br>
						<br>
						<hr class="horizontal dark">
						<br>
						<button type="submit" class="btn btn-secondary float-end tn-sm">Modifier</button>
					</form>


				</div>
			</div>
		</div>


	</div>

	<!-- modal modifier mot de passe  -->
	<div class="modal" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="changePasswordModal" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modifier le mot de passe </h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Fermer">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{ route('admins.updatePassword', ['user' => auth()->user()->id]) }}" method="post">
						@csrf
						@method('PUT')
						<div class="form-group">
							<label for="name">Ancien mot de passe :</label>
							<input type="password" class="form-control" id="password" name="password">
						</div>
						<div class="form-group">
							<label for="name">Nouveau mot de passe:</label>
							<input type="password" class="form-control" id="new_password" name="new_password">
						</div>
						<button type="submit" class="btn btn-primary">Enregistrer les Modifications</button>
					</form>
				</div>
			</div>
		</div>
	</div>


</main>


@endsection