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

		<div class="mb-3">
			<h1 class="h3 d-inline align-middle">Google Maps</h1>
			<a class="badge bg-dark text-white ms-2" href="upgrade-to-pro.html">
				Get more Google Maps examples
			</a>
		</div>
		<div class="row">
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Default Map</h5>
						<h6 class="card-subtitle text-muted">Displays the default road map view.</h6>
					</div>
					<div class="card-body">
						<div class="content" id="default_map" style="height: 300px;"></div>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-6">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title">Hybrid Map</h5>
						<h6 class="card-subtitle text-muted">Displays a mixture of normal and satellite views.</h6>
					</div>
					<div class="card-body">
						<div class="content" id="hybrid_map" style="height: 300px;"></div>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>

@endsection