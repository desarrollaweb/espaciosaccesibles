<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include ("./mysql/dbconnect.php");
mysql_query("SET NAMES 'utf8'");
require './fx/functions.php';
extract($_REQUEST);
$path_img="./web/webimg/";
$load_query="SELECT a.*,b.nom_area_noti FROM noticias a LEFT JOIN areas_noticias b ON a.id_area_noti=b.id WHERE a.id_noticia='$id' LIMIT 1";
$query=mysql_query($load_query) or die(mysql_error());
$n_rows=mysql_num_rows($query);
if ($n_rows<=0){
	header ("location: blog.php");
	exit;
}
mysql_query("UPDATE noticias SET vistos=vistos+1 WHERE id_noticia='$id' LIMIT 1") or die(mysql_error());
$res=mysql_fetch_array($query);
	$id_noticia=trim($res[id_noticia]);
	$titulo=trim($res[titulo]);
	$texto=trim($res[texto]);
	$texto_fb=substr(strip_tags($texto),0,150);		
	$nom_area_noti=trim($res[nom_area_noti]);
	$comentarios=trim($res[comentarios]);
	$tags=trim($res[tags]);
	$imagen=trim($res[imagen]);
	if (strlen($imagen)<=5){
		$imagen="img_default.jpg";
	}
	$pimagen=$path_img.$imagen;	
	$pimagen_fb='http://www.espacioaccesible.com/'.$path_img.$imagen;		
	$fecha=$res[fecha];
	$dia=format_fech($fecha,"d");
	$nmes=format_fech($fecha,"M");
	$ano=format_fech($fecha,"Y");
	$ndia=format_fech($fecha,"D");	
	$URL_w_="detalle-blog.php?id=".$id_noticia;
	$URL_w_fb="http://espacioaccesible.com/detalle-blog.php?id=".$id_noticia;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="<?php echo $titulo?>" />
<meta property="og:description" content="<?php echo $texto_fb?>" />
<meta property="og:image" content="<?php echo $pimagen_fb?>" />
<meta property="og:url" content="<?php echo $URL_w_fb?>" />
<meta name="description" content="<?php echo $titulo?>" />	
<meta name="robots" content="<?php echo $tags?>" />
<meta name="googlebot" content="<?php echo $tags?>" />
    <title>Espacio Accesible</title>
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--CSS-->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/responsive-style.css" rel="stylesheet">
    <!--FONTS-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <!--ICONOS-->
    <script src="https://use.fontawesome.com/1a163d64a3.js"></script>
  </head>
  <body>
<script src='https://www.google.com/recaptcha/api.js'></script>
    <?php include('top.php') ?>

    <div class="fr-banner fr-img-banner-blog">
      <h2>BLOG</h2>
    </div>

    <div id="blog" class="blog">
      <div class="container">
        <div class="row">
          <div class="col-sm-8">
            <div class="tarjeta">
              <time itemprop="datePublished" datetime="2017-04-28T15:26:00-05:00"><?php echo $ndia?>, <?php echo $dia?> de <?php echo $nmes?> <?php echo $ano?></time>
              <!--<h3>Por fin llego ESPACIO ACCESIBLE!!</h3>-->
              <h3><?php echo $titulo?></h3>
              <div class="main-noticia">
                <img class="img-responsive" src="<?php echo $pimagen?>">
              </div>

              <div class="noti-texto justificar">
                <?php echo $texto?>
              </div>
            <div class="container blog-fr-redes">
              <h2>COMPARTE EN REDES SOCIALES</h2>
              <div class="row">
                <div class="col-md-12" align="center">
                  <a href="https://www.facebook.com/sharer.php?u=<?php echo $URL_w_fb?>" target="_Blank"><i class="fa fa-facebook" aria-hidden="true"></i>COMPARTIR EN FACEBOOK</a>
                  <a href="https://twitter.com/intent/tweet?text=<?php echo $titulo?>&url=<?php echo $URL_w_fb?>" target="_Blank"><i class="fa fa-twitter" aria-hidden="true"></i>COMPARTIR EN TWITTER</a>
                  <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $URL_w_fb?>&title=<?php echo $titulo?>" target="_Blank"><i class="fa fa-linkedin-square" aria-hidden="true"></i>COMPARTIR EN LINKEDIN</a>
                  <a href="https://plusone.google.com/_/+1/confirm?hl=en&url=<?php echo $URL_w_fb?>&name=<?php echo $titulo?>" target="_Blank"><i class="fa fa-google-plus" aria-hidden="true"></i>COMPARTIR EN GOOGLE PLUS</a>
                </div>
              </div>
<!--              <a href="detalle-blog2.php" class="siguiente-post">Siguiente post...</a>-->
            </div>
            <div class="comentario-post">
              <form action="enviaform.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">DEJA UN COMENTARIO</label>
                  <textarea type="text" name="mensaje" class="form-control" id="mensaje" placeholder="Comentario"></textarea>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre*">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                </div>
                    <div class="form-group col-md-12">
                     <input name="_ubicacion" type="hidden" value="Formulario de DEJA UN COMENTARIO" id="_ubicacion">
					<input name="email_enviado" type="hidden" value="buzon@espacioaccesible.com" id="email_enviado">              
                    <div style="padding-top:10px;" class="g-recaptcha" data-sitekey="6Lek6kMUAAAAAFwiv98fIA5tzd0ZUxJ2ifkGUFQV"></div>
                    </div>
                <button type="submit" class="btn btn-default">PUBLICAR COMENTARIO</button>
              </form>
            </div>
            </div>
          </div>
          <div class="col-sm-4">
            <?php include('blog-sidebar.php') ?>
          </div>
        </div>
      </div>
    </div>

    <?php include('footer.php') ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!--SCRIPTS-->
    <script src="js/scripts.js"></script>
  </body>
</html>
