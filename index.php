<?php
    //$error="";
    if(isset($_POST['submit'])){


        $usuario=$_POST['email'];
        $password=$_POST['contrasena'];

        //*****Conexion a la Base de Datos ***/
        $conexion=mysqli_connect("localhost", "root", "");
        mysqli_select_db($conexion,"vineriabd");
        
        /**** 
            CONSULTA 
                mysql_real_escape_string, evita las injecciones SQL dañinas.
        ***/
        $consulta=sprintf("SELECT * FROM usuarios WHERE email='%s' AND contrasena='%s'",mysqli_real_escape_string($conexion,$usuario),mysqli_real_escape_string($conexion,$password));
        $resultado=mysqli_query($conexion,$consulta);

        if(mysqli_num_rows($resultado) > 0){
            session_start();
            $fila=mysqli_fetch_array($resultado);
            $_SESSION['usuario'] = $fila['id'];
            $_SESSION['nombre'] = $fila['nombre'];
            $_SESSION['logeado'] = true;
            $status = "Usuario Logeado";
            //header("Location: panel.php");
        }else{
			//$error="El usuario no existe";
			$status = "El Usuario no existe";
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Pizza - free responsive website template</title>
	<meta name="keywords" content="">
	<meta name="description" content="">
    <meta name="author" content="templatemo">
    <!-- 
    Pizza Template
    http://www.templatemo.com/preview/templatemo_459_pizza
    -->
    
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- font-awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- custom -->
	<link rel="stylesheet" href="css/templatemo-style.css">
	<!-- google font -->
	<link href='//fonts.googleapis.com/css?family=Signika:400,300,600,700' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>

</head>
<body id="home" data-spy="scroll" data-target=".navbar-collapse">

	<!-- start navigation -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
					<span class="icon icon-bar"></span>
				</button>
				<a href="#home" class="navbar-brand smoothScroll"><strong>PIZZA</strong></a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#home" class="smoothScroll">INICIO</a></li>
					<li><a href="#about" class="smoothScroll">ACERCA</a></li>
					<li><a href="#gallery" class="smoothScroll">CONTACTO</a></li>
					<li><a href="#contact" class="smoothScroll">INGRESAR</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- end navigation -->

	<!-- start flexslider -->
	<div class="flexslider">
		<ul class="slides">
			<li>
				<img src="images/slider-img1.jpg" alt="Pizza Image 1">
				<div class="flex-caption">
					<h2 class="slider-title">Pizza</h2>
					<h3 class="slider-subtitle">Fresca, Limpia y Deliciosa</h3>
					<p class="slider-description">Con los mejores Ingredients, traídos directamente de Italia.</p>
				</div>
			</li>
			<li>
				<img src="images/slider-img2.jpg" alt="Pizza Image 2">
				<div class="flex-caption">
					<h2 class="slider-title">Pizza de horno</h2>
					<h3 class="slider-subtitle">Calidad Premium</h3>
					<p class="slider-description">La pizza de Don Cangrejo es la mejor pizza para ti y para mí.</p>
				</div>
			</li>
		</ul>
	</div>
	<!-- end flexslider -->

	<!-- start about -->
	<section id="about" class="templatemo-section templatemo-top-130">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h1 class="text-uppercase">Pizza Hecha a Mano</h1>
				</div>
				<div class="col-md-6 col-sm-6">					
					<h3 class="text-uppercase padding-bottom-10">Panaderos especializados</h3>
					<p>Tenemos diferentes panaderos especializados en diferentes tipos de Pizza desde</p>
					<p> New York Style hasta Calzone.</p>
				</div>
				<div class="col-md-6 col-sm-6">
					<img src="images/about-img1.jpg" class="img-responsive img-bordered img-about" alt="about img">
				</div>
			</div>
		</div>
	</section>
	<!-- end about -->

	<!-- start gallery -->
	<section id="gallery" class="templatemo-section templatemo-light-gray-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-center text-uppercase">Galería</h2>
					<hr>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<img src="images/gallery-img1.jpg" class="img-responsive gallery-img" alt="Pizza 1">
						<div class="gallery-des">
							<h3>Curabitur </h3>
							<h5>Cras in ante mattis, elementum nunc sed.</h5>
						</div>
					</div>
				</div>	
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<img src="images/gallery-img2.jpg" class="img-responsive gallery-img" alt="Pizza 2">
						<div class="gallery-des">
							<h3>Pizza de momos</h3>
							<h5>Una pizza de muchos momazos</h5>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="gallery-wrapper">
						<img src="images/gallery-img3.jpg" class="img-responsive gallery-img" alt="Pizza 3">
						<div class="gallery-des">
							<h3>Pizza al estilo Diego</h3>
							<h5>Una pizza de momazos diego</h5>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="gallery-wrapper">
						<img src="images/gallery-img4.jpg" class="img-responsive gallery-img" alt="Pizza 4">
						<div class="gallery-des">
							<h3>Pizza de Dron</h3>
							<h5>Pizza hecha para el profe de estadística</h5>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
					<div class="gallery-wrapper">
						<img src="images/gallery-img5.jpg" class="img-responsive gallery-img" alt="Pizza 5">
						<div class="gallery-des">
							<h3>Pizza DreamViewer</h3>
							<h5>Se te cae el pito de comerla</h5>
						</div>
					</div>
				</div>				
			</div>
		</div>
	</section>
	<!-- end gallery -->

	<!-- start contact -->
	<section id="contact" class="templatemo-section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="text-uppercase text-center">Ingrese</h2>
					<hr>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="#" method="post" role="form">
						<div class="col-md-6 col-sm-6">
							<input name="email" type="email" class="form-control" id="email" maxlength="60" placeholder="E-mail">
					    	<input name="contrasena" type="text" class="form-control" id="contrasena" placeholder="Contraseña">
						</div>
				
						<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
							<input name="submit" type="submit" class="form-control" id="submit" value="Send">
						</div>
					</form>
				</div>
				<div class="status">
					<?php if ($status) echo $status; ?>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-4 col-sm-4">
					<h3 class="padding-bottom-10 text-uppercase">Visita nuestro local</h3>
					<p><i class="fa fa-map-marker contact-fa"></i> Calle Diego Momazos, Mazatlán, Sin.</p>
					<p>
						<i class="fa fa-phone contact-fa"></i> 
						<a href="tel:010-020-0340" class="contact-link">669 918 8557</a>, 
						<a href="tel:080-090-0660" class="contact-link">669 272 0996</a>
					</p>			
					<p><i class="fa fa-envelope-o contact-fa"></i> 
                    	<a href="mailto:hello@company.com" class="contact-link">Pizzeria@gmail.com</a></p>
				</div>
				<div class="col-md-4 col-sm-4">
					<h3 class="text-uppercase">Abierto</h3>
					<p><i class="fa fa-clock-o contact-fa"></i> 7:00 AM - 11:00 PM</p>
					<p><i class="fa fa-bell-o contact-fa"></i> Lunes a Viernes y Sábado</p>
			  	</div>
			</div>
		</div>
	</section>
	<!-- end contact -->

	<!-- start footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p>Copyright &copy; Flores Amillano Jesús Antonio LISI 3-1</p>
					<hr>
					<ul class="social-icon">
						<li><a href="#" class="fa fa-facebook"></a></li>
						<li><a href="#" class="fa fa-twitter"></a></li>
						<li><a href="#" class="fa fa-instagram"></a></li>
						<li><a href="#" class="fa fa-pinterest"></a></li>
						<li><a href="#" class="fa fa-google"></a></li>
						<li><a href="#" class="fa fa-github"></a></li>
						<li><a href="#" class="fa fa-apple"></a></li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
	<!-- end footer -->

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/custom.js"></script>

</body>
</html>