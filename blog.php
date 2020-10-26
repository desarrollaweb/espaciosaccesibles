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

?>

<!DOCTYPE html>

<html lang="en">

  <?php include('head.php') ?>

  <body>



    <?php include('top.php') ?>



    <div class="fr-banner fr-img-banner-blog">

      <h2 class="title-blog">BLOG</h2>

    </div>



    <div id="blog" class="blog">

      <div class="container">

        <div class="row">

          <div class="col-sm-8">

            <div class="tarjeta">

              <!--<time itemprop="datePublished" datetime="2017-04-28T15:26:00-05:00">Martes, 10 de Octubre de 2017</time>-->



<?php

$vWhere='';

if ($categoria>=1){

	$vWhere=" AND a.id_area_noti='".$categoria."'";

}

if ($ano>=1 && $mes>=1){

	$vWhere=" AND YEAR(a.fecha)='".$ano."' AND MONTH(a.fecha)='".$mes."'";	

}

$load_query="SELECT a.*,b.nom_area_noti FROM noticias a LEFT JOIN areas_noticias b ON a.id_area_noti=b.id WHERE !ISNULL(a.id_noticia) ".$vWhere." ORDER BY a.fecha DESC, a.id_noticia ASC LIMIT 20";

$query=mysql_query($load_query) or die(mysql_error());

while ($res=mysql_fetch_array($query)){

	$id_noticia=trim($res[id_noticia]);

	$titulo=trim($res[titulo]);

	$txt=trim($res[texto]);

	$texto=substr(strip_tags($txt),0,360);	

	$nom_area_noti=trim($res[nom_area_noti]);

	$comentarios=trim($res[comentarios]);

	$imagen=trim($res[imagen]);

	if (strlen($imagen)<=5){

		$imagen="img_default.jpg";

	}

	$pimagen=$path_img.$imagen;	

	$fecha=$res[fecha];

	$dia=format_fech($fecha,"d");

	$nmes=format_fech($fecha,"M");

	$ano=format_fech($fecha,"Y");

	$URL_w_="detalle-blog.php?id=".$id_noticia;

	$URL_w_fb="http://espacioaccesible.com/detalle-blog.php?id=".$id_noticia;	

echo '<h3 class="blog-tit1">'.$nom_area_noti.'</h3>

              <h4 class="blog-tit2">'.$titulo.'</h4>

              <div class="linea-ploma"></div>

              <div class="main-noticia">

                  <a href="'.$URL_w_.'">

                      <img class="img-responsive" src="'.$pimagen.'">

                  </a>

              </div>

              <div class="detalles-blogsito">

                <ul class="post-info">

                  <li style="background: none;" class="justificar">'.$texto.' (&hellip;)</li>

                  <li><span class="date font-crimson">'.$dia.' <br> '.$nmes.'</span><span class="gris">'.$ano.'</span></li>

                  <li style="background: none;"><a href="'.$URL_w_.'">SIGUE LEYENDO ></a></li>

                </ul>

                <div class="row fr-plom">

                  <div class="col-sm-3"><p style="margin-top: 1em;">'.$comentarios.' comentarios</p></div>

                  <div class="col-sm-4 blog-coso">

                    <div class="footer_social pull-right">

                    <ul>

                      <li style="background: none; padding: 0px;"><a class="footer_facebook  wow bounceInDown" data-wow-delay=".1s" href="https://www.facebook.com/sharer.php?u='.$URL_w_fb.'" data-toggle="tooltip" data-placement="top" title="Facebook" target="_Blank"><i class="fa fa-facebook"></i></a></li>

                      <li style="background: none; padding: 0px;"><a class="footer_twitter wow bounceInDown" data-wow-delay=".2s" href="https://twitter.com/intent/tweet?text='.$titulo.'&url='.$URL_w_fb.'" data-toggle="tooltip" data-placement="top" title="Twitter" target="_Blank"><i class="fa fa-twitter"></i></a></li>

                      <li style="background: none; padding: 0px;"><a class="footer_linkedin wow bounceInDown" data-wow-delay=".4s" href="https://www.linkedin.com/shareArticle?mini=true&url='.$URL_w_fb.'&title='.$titulo.'" data-toggle="tooltip" data-placement="top" title="Linkedin" target="_Blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>

                      <li style="background: none; padding: 0px;"><a class="footer_google wow bounceInDown" data-wow-delay=".4s" href="https://plusone.google.com/_/+1/confirm?hl=en&url='.$URL_w_fb.'&name='.$titulo.'" data-toggle="tooltip" data-placement="top" title="Google Plus" target="_Blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>

                   </ul>

                    </div>

                  </div>

                  <div class="col-sm-5"><p style="margin-top: 1em;">'.$dia.' de '.$nmes.' '.$ano.' por ESPACIO ACCESIBLE</p></div>

                </div>

              </div>';

}

?>			  







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

