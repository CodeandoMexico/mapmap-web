<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="index,follow" />
        <meta name="author" content="Mapatón Xalapa | Codeando Xalapa" />
        <meta name="copyright" content="Creative Commons" />
      
        <!-- Google -->
        <meta name="title" content="Mapatón Xalapa | Codeando Xalapa" />
        <meta name="description" content="Mediante el uso de tecnología libre se podrán tener almacenadas en un repositorio de datos todas las rutas de autobuses de la ciudad de Xalapa." />
        <meta name="keywords" content="mapatón,datos abierto,xalapa" />

        <!-- Apple -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- FB / 560x560 -->
        <meta property="og:title" content="Mapatón Xalapa | Codeando Xalapa" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="https://mapaton.org/mapaton-ciudadano-xalapa/images/share_fb.png" />
        <meta property="og:url" content="http://mapaton.org" />
        <meta property="og:description" content="Mapatón Xalapa | Codeando Xalapa" />
        <meta property="fb:admins" content="100000759628852" />

        <!-- Twitter / 560x300 -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@twitter" />
        <meta name="twitter:creator" content="@twitter" />
        <meta name="twitter:image" content="https://mapaton.org/mapaton-ciudadano-xalapa/images/share_fb.png" />
        <meta name="twitter:url" content="http://mapaton.org" />
        <meta name="twitter:title" content="Mapatón Xalapa | Codeando Xalapa" />
        <meta name="twitter:description" content="Mediante el uso de tecnología libre se podrán tener almacenadas en un repositorio de datos todas las rutas de autobuses de la ciudad de Xalapa." />
		
    	<title>Mapatón Ciudadano</title>
    	<link rel="shortcut icon" type="image/png" href="rutas/libs/images/favicon.png">
		<link rel="stylesheet" href="rutas/libs/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="libs/css/style.css">
	</head>
  	<body>
		<div id="header"></div>
		<div id="top" class="bar-blue sticky-top"></div>
		<div id="myheader" class="container-fluid sticky">
    	<!-- nav -->
		<div class="container sin-pads">
			<nav class="navbar navbar-expand-md navbar-dark">
				<div class="col-xs-12">
					<div class="col-md-2 col-lg-2">
						<a class="navbar-brand" href="https://mapaton.org">
							<img src="rutas/libs/images/logo.png" class="img img-logo" alt="Mapaton Ciudadano" />
						</a>
					</div>
					<div class="col-md-1 col-lg-1 no-show-celular"></div>
					<div class="col-md-3 col-lg-2 border-left no-show-celular">
						<span class="subtitle"></span>
					</div>
					<div class="col-md-5 col-lg-6 no-show-celular">
						<h1></h1>
					</div>
					<div class="col-md-1 col-lg-1 pull-right no-show-celular">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
				</div>
				
			</nav>
			
		</div>
        <!-- end nav --> 
        </div>
		<div class="collapse" id="navbarCollapse">
			<div class="container sin-pads">
				<ul id="menu-clicked" class="navbar-nav">
					<li id="cerrar" class="nav-item">
						<a class="" href="">
							X
						</a>

					</li>
					<li class="nav-item">
						<a id="conoce" class="" href="https://mapaton.org/#conocenos">
							¿Qué es Mapatón Ciudadano?
						</a>

					</li>
					<li class="nav-item">
						<a id="ciudad" class="" href="https://mapaton.org/#ciudades">
							Ciudades
						</a>
					</li>
					<li class="nav-item">
						<a id="dat" class="" href="https://mapaton.org/#kit">
							KIT de Mapeo
						</a>
					</li>
					 <li class="nav-item">
						<a id="kitm" class="" href="https://mapaton.org/#medios">
							Medios
						 </a>
					</li>
					 <li class="nav-item">
						<a id="escribe" class="" href="https://mapaton.org/#escribenos">
							Escríbenos
						 </a>
					</li>
					<ul class="container-redes">
						<li>
							<a class="icon-github" href="https://github.com/codeandoxalapa" target="_blank"></a>
						</li>
						<li>
							<a class="icon-medium" href="https://medium.com/mapat%C3%B3n-ciudadano-en-tu-ciudad" target="_blank"></a>
						</li>
						<li>
							<a class="icon-insta" href="https://www.instagram.com/mapatonciudadano/" target="_blank"></a>
						</li>
						<li>
							<a class="icon-tweet" href="https://twitter.com/codeandoxalapa" target="_blank"></a>
						</li>
						<li>
							<a class="icon-face" href="https://www.facebook.com/CodeandoXalapa/" target="_blank"></a>
						</li>
					</ul>
				 </ul>
				 
			</div>	
		</div>
		<ul id="menu-dentro" class="navbar-nav menu-dentro sticky-ul">
			<li class="nav-item">
				<a id="conoce" class="nav-link expand" href="https://mapaton.org/#conocenos">
					<span class="tooltip-custom-new hide">Conócenos</span>
					<img class="logo-conocenos" src="libs/images/conocenos.png" />
				</a>

			</li>
			<li class="nav-item">
				<a id="ciudad" class="nav-link expand" href="https://mapaton.org/#ciudades">
					<span class="tooltip-custom-city-new hide">Ciudades</span>
					<img class="logo-pointer" src="libs/images/pointer.png" />
				</a>
			</li>
			<li class="nav-item">
				<a id="dat" class="nav-link expand" href="https://mapaton.org/#kit">
					<span class="tooltip-custom-dat-new hide">Kit</span>
					<img class="logo-datos" src="libs/images/left.png" />
				</a>
			</li>
			 <li class="nav-item">
				<a id="kitm" class="nav-link expand" href="https://mapaton.org/#medios">
					<span class="tooltip-custom-kitm-new hide">Medios</span>
					<img class="logo-datos" src="libs/images/datos.png" />
				 </a>
			</li>
			 <li class="nav-item">
				<a id="escribe" class="nav-link expand" href="https://mapaton.org/#escribenos">
					<span class="tooltip-custom-escribe-new hide">Escríbenos</span>
					<img class="logo-datos" src="libs/images/arroba.png" />
				 </a>
			</li>
		 </ul>
		