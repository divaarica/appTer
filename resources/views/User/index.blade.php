@extends('layout')
@section('content')
<!-- Home -->
<div id="home" class="banner-area">

	<!-- Backgound Image -->
	<div class="bg-image bg-parallax overlay backIndex"></div>
	<!-- /Backgound Image -->

	<div class="home-wrapper">

		<div class="col-md-10 col-md-offset-1 text-center">
			<div class="home-content">
				<h1 class="white-text">TER de Dakar</h1>
				<h4 class="white-text lead">Simplifiez votre expérience de voyage en réservant vos places en
					quelques clics, offrant ainsi une nouvelle dimension à votre trajet ferroviaire.</h4>
				<a href="index.html#menu"><button class="main-button">Decouvrir les prix</button></a>
			</div>
		</div>

	</div>

</div>
<!-- /Home -->

<!-- About -->
<div id="about" class="section">

	<!-- container -->
	<div class="container">

		<!-- row -->
		<div class="row">

			<!-- section header -->
			<div class="section-header text-center">
				<h4 class="sub-title">A propos de nous</h4>
				<h2 class="title">TER DAKAR</h2>
			</div>
			<!-- /section header -->

			<!-- about content -->
			<div class="col-md-5">
				<p class="lead">La Société Nationale de Gestion du Patrimoine du Train Express Régional (SEN - TER
					S.A.) est une société anonyme avec conseil d’administration de droit privé dont la création a
					été autorisée par la loi n° 2019-11 du 10 juin 2019</p>
			</div>
			<!-- /about content -->

			<!-- about content -->
			<div class="col-md-7">
				<p>Créée le 10 juin 2019 avec un capital de 1 milliard de F CFA, La SEN – TER S.A. a pour mission
					d’assurer la gestion exclusive du patrimoine ferroviaire issu des investissements réalisés dans
					le cadre du projet TER et des emprises impactées ou affectées au projet TER, au profit de l’État
					du Sénégal.</p>
			</div>
			<!-- /about content -->

			<!-- Gallery Slider -->
			<div class="col-md-12">
				<div id="Gallery" class="owl-carousel owl-theme">

					<!-- single column -->
					<div class="Gallery-item">

						<!-- single image -->
						<div class="Gallery-img img1"></div>
						<!-- /single image -->

					</div>
					<!-- single column -->

					<!-- single column -->
					<div class="Gallery-item">

						<!-- single image -->
						<div class="Gallery-img img2"></div>
						<!-- /single image -->

						<!-- single image -->
						<div class="Gallery-img img3"></div>
						<!-- /single image -->

					</div>
					<!-- single column -->

					<!-- single column -->
					<div class="Gallery-item">

						<div class="item-column">
							<!-- single image -->
							<div class="Gallery-img img4"></div>
							<!-- /single image -->

							<!-- single image -->
							<div class="Gallery-img img5"></div>
							<!-- /single image -->
						</div>

						<div class="item-column">
							<!-- single image -->
							<div class="Gallery-img img6"></div>
							<!-- /single image -->

							<!-- single image -->
							<div class="Gallery-img img7"></div>
							<!-- /single image -->
						</div>

					</div>
					<!-- /single column -->

				</div>
			</div>
			<!-- /Gallery Slider -->


		</div>
		<!-- /row -->

	</div>
	<!-- /container -->

</div>
<!-- /About -->


<!-- Menu -->
<div id="menu" class="section">

	<!-- Backgound Image -->
	<div class="bg-image bg-parallax overlay imgprix"></div>
	<!-- /Backgound Image -->

	<!-- container -->
	<div class="container">
		<div class="section-header text-center">
			<h4 class="sub-title">Decouvrez</h4>
			<h2 class="title white-text">Nos Prix</h2>
		</div>
		<div class="row">
			<div class="col-md-3 col-sm-6">
				<div class="pricingTable">
					<div class="pricingTable-header">
						<!-- <i class="fa fa-ticket" aria-hidden="true"></i> -->
						<!-- <i class="fa fa-adjust"></i> -->
						<div class="price-value"> 500 FCFA <span class="month">par personne</span>
						</div>
					</div>
					<h3 class="heading">Standard</h3>
					<h4 class="heading"> 1 Zone</h4>
					<div class="pricing-content">
						<ul>
							<li><b>Zone1 ou Zone2 </b> </li>
						</ul>
					</div>
					<div class="pricingTable-signup">
						<a href="{{ route('reservations.create') }}">
							Reserver
						</a>
						<!-- <a href="#">Modifier</a> -->
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="pricingTable green">
					<div class="pricingTable-header">
						<!-- <i class="fa fa-ticket" aria-hidden="true"></i> -->
						<div class="price-value"> 1 000 FCFA <span class="month">par personne</span>
						</div>
					</div>
					<h3 class="heading">Standard</h3>
					<h4 class="heading"> 2 Zone</h4>
					<div class="pricing-content">
						<ul>
							<li><b>Zone1 + Zone2 ou Zone2 + Zone3</b></li>
						</ul>
					</div>
					<div class="pricingTable-signup">
						<a href="{{ route('reservations.create') }}">
							Reserver
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="pricingTable blue">
					<div class="pricingTable-header">

						<div class="price-value"> 1 500 FCFA <span class="month">par personne</span>
						</div>
					</div>
					<h3 class="heading">Standard</h3>
					<h4 class="heading"> 3 Zone</h4>
					<div class="pricing-content">
						<ul>
							<li><b>Zone1 + Zone2 + zone3</b> </li>
						</ul>
					</div>
					<div class="pricingTable-signup">
						<a href="{{ route('reservations.create') }}">
							Reserver
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6">
				<div class="pricingTable red">
					<div class="pricingTable-header">

						<div class="price-value"> 2 500 FCFA <span class="month">par personne</span>
						</div>
					</div>
					<h3 class="heading">Premiere Classe</h3>
					<h4 class="heading"> Toute Zone</h4>
					<div class="pricing-content">
						<ul>
							<li><b>Prix fixe </b> </li>
						</ul>
					</div>
					<div class="pricingTable-signup">
						<a href="{{ route('reservations.create') }}">
							Reserver
						</a>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /container -->

</div>
<!-- /Menu -->

<!-- Reservation -->
<div id="reservation" class="section">

	<!-- Backgound Image -->
	<div class="bg-image imgheure"></div>
	<!-- /Backgound Image -->

	<!-- container -->
	<div class="container" id="horaires">

		<!-- row -->
		<div class="row">

			<div class="col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1">
				<form class="reserve-form row ">
					<div class="section-header text-center">
						<h4 class="sub-title"></h4>
						<h2 class="title white-text">Voyager sur toute la ligne du TER, avec un train</h2>
					</div>

					<div style="color: rgb(223, 226, 228);">
						<ul>
							<li>Toutes les 10 minutes du lundi au samedi de 5H35 (départ de Diamniadio) et 5H45
								(départ de Dakar) à 20H55, et toutes les 20 min de 21h05 à 22h05 dernier départ.
							</li>
							<li>Toutes les 20 minutes, le dimanche et les jours féries de 6h25 à 22h05 dernier
								départ.</li>
							<p>Pour maîtriser les horaires de passage des trains dans votre gare appuyez-vous sur
								les fiches horaire ci-dessous :</p>

						</ul>
					</div>


					<br>

					<div class="row">
						<div class="col-md-6">
							<p style="color: rgb(228, 225, 223);">Dakar > Diamniadio </p>
							<a style="color: rgb(124, 157, 248);" href="{{ asset('User/pdf/Dkr_Dia2.pdf') }}" target="_blank"><i class="fa fa-clock-o"> Fiche horaire du lundi au samedi</i></a>
							<br>
							<a style="color: rgb(124, 157, 248);" href="{{ asset('User/pdf/Dkr_Dia.pdf') }}" target="_blank"><i class="fa fa-clock-o"> Fiche horaire du dimanche & jours fériés</i></a>
							<br>
						</div>
						<div class="col-md-6 text-left">
							<p style="color: rgb(223, 226, 228);">Diamniadio > Dakar</p>
							<a style="color: rgb(124, 157, 248);" href="{{ asset('User/pdf/Dia_Dkr2.pdf') }}" target="_blank"><i class="fa fa-clock-o"> Fiche horaire du lundi au samedi</i></a>
							<br>
							<a style="color: rgb(124, 157, 248);" href="{{ asset('User/pdf/Dia_Dkr.pdf') }}" target="_blank"><i class="fa fa-clock-o"> Fiche horaire du dimanche & jours fériés</i>

						</div>
					</div>
					<br>
					<br>
					<div class="col-md-12 text-center">
						<a style="color: rgb(124, 157, 248);" href="{{ asset('User/pdf/plan_ligne.pdf') }}" target="_blank"><i class="fa fa-clock-o"> Plan de ligne</i></a>
						<br>
					</div>


				</form>
			</div>
			<!-- /reservation form -->

			<!-- opening time -->
			<div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
				<div class="opening-time row">
					<div class="section-header text-center">
						<h2 class="title white-text">Horaires</h2>
					</div>
					<ul>
						<li>
							<h4 class="day">Lundi</h4>
							<h4 class="hours">5:30 am – 20:55 pm</h4>
						</li>
						<li>
							<h4 class="day">Mardi</h4>
							<h4 class="hours">5:30 am – 20:55 pm</h4>
						</li>
						<li>
							<h4 class="day">Mercredi</h4>
							<h4 class="hours">5:30 am – 20:55 pm</h4>
						</li>
						<li>
							<h4 class="day">Jeudi</h4>
							<h4 class="hours">5:30 am – 20:55 pm</h4>
						</li>
						<li>
							<h4 class="day">Vendredi</h4>
							<h4 class="hours">5:30 am – 20:55 pm</h4>
						</li>
						<li>
							<h4 class="day">Samedi</h4>
							<h4 class="hours">5:30 am – 20:55 pm</h4>
						</li>
						<li>
							<h4 class="day">Dimanche</h4>
							<h4 class="hours">6:25 am – 22h05 pm</h4>
						</li>
						<h4></h4>

						<p></p>
					</ul>
				</div>
			</div>
			<!-- /opening time -->

		</div>
		<!-- /row -->

	</div>
	<!-- /container -->

</div>
<!-- /Reservation -->
<br>
<br>
<br>
<br>


<!-- Contact -->
<div id="contact" class="section">

	<!-- container -->
	<div class="container">

		<!-- row -->
		<div class="row">

			<div class="col-md-5 ">
				<br>
				<br>
				<br>
				<div class="section-header">
					<h4 class="sub-title">Contactez nous</h4>
					<h2 class="title">Prendre Contact</h2>
				</div>
				<div class="contact-content">
					<p> Pour toute question, suggestion ou demande d'information, n'hésitez pas à nous contacter.
						Nous sommes là pour vous aider !</p>
					<h3>Tel: <a href="#">33-548-14-97</a></h3>
					<p>Address: Sacre coeur, Dakar</p>
					<p>Email: <a href="#">ter-dakar@email.com</a></p>
					<ul class="list-inline">
						<li>
							<p>Suivez nous:</p>
						</li>
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-md-5 ">
				<p><img src="{{ asset('User/img/gare.jpg') }}" alt="" height="500" width="700"></p>
			</div>

		</div>
		<!-- /row -->

	</div>
	<!-- /container -->

	<!-- map -->

	<!-- /map -->

</div>
<!-- Contact -->
@endsection