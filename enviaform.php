<?php

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 

header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1

header("Cache-Control: post-check=0, pre-check=0", false);

header("Pragma: no-cache");                          // HTTP/1.0

extract($_REQUEST);

require_once "recaptchalib.php";

// your secret key

$secret = "6Lek6kMUAAAAAFL3xcwrt2yFpZy8YHYUN5dx--7G";

 // empty response

$response = null;

 // check secret key

$reCaptcha = new ReCaptcha($secret);

// if submitted check response

if ($_POST["g-recaptcha-response"]) {

    $response = $reCaptcha->verifyResponse(

        $_SERVER["REMOTE_ADDR"],

        $_POST["g-recaptcha-response"]

    );

}

  if ($response != null && $response->success) {

	$msg ='<body style="font-family: Trebuchet MS, Arial, Helvetica, sans-serif;">

	<p style="font-size:12px; border-bottom: #999 1px solid;">Datos del Mensaje</p>';

	foreach ($_POST as $clave=>$valor)

   		{

			if ($clave!="g-recaptcha-response"){

				$msg.=$clave.": ".$valor."<br>";

			}

   		}

	$xtitulo='Formulario';

	if (strlen(trim($ubicacion))>=5){

		$xtitulo=$ubicacion;

	}

	$xtitulo .=" [desde espacioaccesible.com]";

	$oSendM = 'Espacio Accesible<info@espacioaccesible.com>';

	$Ounit ='info@espacioaccesible.com';
	if (strlen($email_enviado)>=5){

		$Ounit=$email_enviado;

	}	

	$headers = "MIME-Version: 1.0". "\n";

	$headers .= "Content-type: text/html; charset=iso-8859-1" . "\n";

	$headers .= 'From: '.$oSendM. "\r\n";

	$headers .= "Reply-To: ".$nombres." <".$email.">";

	if (mail($Ounit,$xtitulo,$msg,$headers)){

		header ("location: contacto-exito.php");

		exit;

	}

} else {

	  echo 'Hubo un error, favor <a href="javascript:history.back()">regresar</a> y activar "No Soy un Robot"';

  }

?>