<?php require_once __DIR__ . '/../../config/config.php' ?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>INDI</title>
	<link rel="stylesheet" href="/proyectomejora/assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="/proyectomejora/assets/css/normalize.css">
	<link rel="stylesheet" href="/proyectomejora/assets/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
	<!--<link rel="stylesheet" href="./assets/css/style.css"> -->
	<link rel="stylesheet" href="/proyectomejora/assets/css/style.css">
	<script src="/ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>
		window.jQuery || document.write('<script src="/proyectomejora/assets/js/jquery-1.11.2.min.js"><\/script>')
	</script>
	<script src="/proyectomejora/assets/js/modernizr.js"></script>
	<script src="/proyectomejora/assets/js/bootstrap.min.js"></script>
	<script src="/proyectomejora/assets/js/main.js"></script>

	<!--TIPO DE LETRA LOGO UNSCH EN LA ESQUINA -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
	<!-- TIPO DE LETRA DE NAVBAR -OPCIONES- -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Knewave&display=swap" rel="stylesheet">
	<!-- TIPO DE LETRA DE POR ENCIMA DEL LOGO INDI Y LOS TITULOS  -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lemon&display=swap" rel="stylesheet">
</head>

<body>
	<!--======================================== Boton ir arriba ========================================-->
	<i class="btn-up fa fa-arrow-circle-o-up hidden-xs"></i>
	<!--======================================== INCLUDE DE HEADER ========================================-->
	<header class="full-reset header" style="background-image:url(/proyectomejora/assets/img/fondo.jpg);">
		<!--======================================== Logo(Nombre INS) ========================================-->
		<div class="full-reset logo">
			<span class="hidden-lg hidden-md">INDI UNSCH</span>
			<span class="hidden-xs hidden-sm" style="font-family: 'Rubik Wet Paint', cursive;">INDI UNSCH</span>
		</div>
		<!--======================================== Links de navegación ========================================-->
		<nav class="full-reset navigation">
			<ul class="full-reset list-unstyled">
				<li><a href="<?= APP_URL ?>">INICIO</a></li>
				<li><a href="<?= APP_URL . '/view/institucion' ?>">INSTITUCION</a></li>
				<li><a href="<?= APP_URL . '/view/secretaria' ?>">SECRETARIA</a></li>
				<li><a href="<?= APP_URL . '/view/servicios' ?>">SERVICIOS</a></li>
				<li><a href="<?= APP_URL . '/view/galeria' ?>">GALERIA</a></li>
				<li><a href="#" class="btm-mega-menu"><i class="fa fa-caret-down"></i></a></li>
			</ul>
		</nav>
		<!--======================================== Mega menu ========================================-->
		<div class="full-reset mega-menu" style="background-image:url(<?= APP_URL . '/assets/img/fondo.jpg' ?>);">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-3">
						<span class="full-reset titles">Iniciar Sessión</span>
						<ul class="list-unstyled full-reset">
							<!-- <li><a href="#!" class="open-link-newTab"><i class="fa fa-university"></i>&nbsp; Dirección</a></li> -->
							<li><a href="<?= APP_URL . '/view/login' ?>" class=""><i class="fa fa-graduation-cap"></i>&nbsp; Inicia Sessión</a></li>
							<li><a href="https://indi.unsch.edu.pe/index/reglamento" class="open-link-newTab"><i class="fa fa-file-text-o"></i>&nbsp; Matriculate</a></li>
							<li><a href="<?= APP_URL . '/view/registro' ?>" target=""><i class="fa fa-star-o"></i>&nbsp; Inicia Trámite</a></li>
							<li><a href="<?= APP_URL . '/view/pago' ?>" target=""><i class="fa fa-gavel"></i>&nbsp; Realizar pagos</a></li>
						</ul>
					</div>
				</div>
			</div>
			<i class="fa fa-times-circle btm-mega-menu close-mega-menu fa-2x"></i>
		</div>
		<!--======================================== Boton menu mobil ========================================-->
		<a href="#" class=" hidden-sm hidden-md hidden-lg pull-right button-menu-mobile show-close-menu-m"><i class="fa fa-ellipsis-v"></i></a>
	</header>