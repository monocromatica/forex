<?php
if(isset($_POST['email'])) {
	
	// CHANGE THE TWO LINES BELOW
	$email_to = "reicker@me.com";
	
	$email_subject = "Email desde el website.";
	
	
	function died($error) {
		// your error code can go here
		echo "Lo sentimos, pero hay errores en el formulario que envi&oacute;.<br /><br />";
		echo $error."<br /><br />";
		echo "Por favor regrese y corrija estos errores.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['first_name']) ||
		!isset($_POST['last_name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['telephone']) ||
		!isset($_POST['comments'])) {
		died('Lo sentimos, pero hay errores en el formulario que envi&oacute;.');		
	}
	
	$first_name = $_POST['first_name']; // required
	$last_name= $_POST['last_name'];//required
	$email_from = $_POST['email']; // required
	$telephone = $_POST['telephone']; // not required
	$comments = $_POST['comments']; // required
	
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
  	$error_message .= 'El email que usted envi&oacute; parece no ser v&aacute;lido.<br />';
  }
	$string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
  	$error_message .= 'El nombre que usted envi&oacute; parece no ser v&aacute;lido.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
  	$error_message .= 'El apellido que usted envi&oacute; parece no ser v&aacute;lido.<br />';
  }
  if(strlen($comments) < 2) {
  	$error_message .= 'Los comentarios que usted envi&oacute; parecen no ser v&aacute;lidos.<br />';
  }
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Detalles del formulario abajo..\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "Nombre: ".clean_string($first_name)."\n";
	$email_message .= "Apellido".clean_string($last_name)."\n";
	$email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Teléfono: ".clean_string($telephone)."\n";
	$email_message .= "Comentarios: ".clean_string($comments)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>



<!-- place your own success html below -->

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
		
		<link rel='stylesheet' href='css/bootstrap.css'>
<link rel='stylesheet' href='css/main.css'>
		<link href='http://fonts.googleapis.com/css?family=Lato:100,400,900' rel='stylesheet' type='text/css'>
        <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">Tu navegador es <strong>anticuado.</strong> Por favor <a href="http://browsehappy.com/">actualizalo</a> para tener una mejor experiencia del sitio.</p>
        <![endif]-->
				
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<a href="index.html" target="_self">
							<img src="img/logo.jpg" alt="Plastival" />
						</a>
					</div>
					<div class="col-md-8">
						<div class="row">
							<div id="mediosTop" class="col-md-5 col-md-offset-7">
								<ul class="list-inline">
									<li><p><strong>Tel. (33) 1234 5678</strong></p></li>
									<li><a href="mailto:contacto@plastialcompany.com"><img src="img/email.png" alt="Envíanos un correo" /></a></li>
									<li><a href="#"><img src="img/facebook.png" alt="Síguenos en Facebook" /></a></li>
									<li><a href="#"><img src="img/twitter.png" alt="Síguenos en Twitter" /></a></li>
								</ul>
							</div><!-- /#mediosTop -->
							<div id="menu" class="col-md-12">
								<ul class="nav nav-pills pull-right">
									<li><a href="">Inicio</a></li>
									<li><a href="">Empresa</a></li>
									<li><a href="">Proceso</a></li>
									<li><a href="">Productos</a></li>
									<li><a href="">Clientes</a></li>
									<li><a href="">Contacto</a></li>
								</ul>
							</div><!-- /#menu -->
						</div>
					</div>
				</div><!-- /.row -->
			</div><!-- /.container -->
		</header>	
		<div id="imgHeaderFormulario">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1 class="tituloS"><img src="img/inosotros.png" alt="Icono nosotros" /> Gracias por comunicarse con nosotros, nos pondremos en contacto con usted lo mas pronto posible. </h1>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="container">
				<div class="row">
					<ul class="list-inline">
						<li class="col-md-3">Todos los derechos reservados 2014</li>
						<li class="col-md-2 text-center"><a href="#">mapa del sitio</a></li>
						<li class="col-md-5">Tel. (33) 1234 5678  -  Email: <a href="mailto:contacto@plastivalcompany.com">contacto@plastivalcompany.com</a></li>
						<li><a href="index.html" target="_self"><img src="img/logoFooter.jpg" alt="Plastival" /></a></li>
					</ul>
				</div>
			</div>
		</footer>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
		<script src='js/vendor/bootstrap.min.js'></script>
<script src='js/main.js'></script>
<script src='js/jquery.easing.1.3.min.js'></script>
<script src='js/layerslider.kreaturamedia.jquery-min.js'></script>
		        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>



<?php
}
die();
?>