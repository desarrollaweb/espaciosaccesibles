<?php
include_once ("./mysql/dbconnect.php");
require_once './fx/functions.php';
?>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<ul class="tarjeta-sans espaciado-blog">
  <h2>POR FECHAS</h2>
<?php
 $load_query_ano="SELECT YEAR(fecha) as ano FROM noticias group by YEAR(fecha)"; 
 $query_ano=mysql_query($load_query_ano) or die(mysql_error());
 while ($res_ano=mysql_fetch_array($query_ano)){
  $ano_=$res_ano[ano];
  echo '<h3><strong>'.$ano_.'</strong></h3>';
 $load_query_mes="SELECT fecha, MONTH(fecha) as mes FROM noticias WHERE YEAR(fecha)='$ano_' GROUP BY MONTH(fecha)"; 
 $query_mes=mysql_query($load_query_mes) or die(mysql_error());
 while ($res_mes=mysql_fetch_array($query_mes)){
  $mes_=$res_mes[mes];
  $fecha__=format_fech($res_mes[fecha],"M");
  $url_f_="blog.php?mes=".$mes_."&ano=".$ano_;
  echo '<li><a href="'.$url_f_.'"><i class="fa fa-chevron-right" aria-hidden="true"></i>'.strtoupper($fecha__).'</a></li>';
 }
 }

?>
</ul>

<ul class="tarjeta-sans espaciado-blog">
  <h2>CATEGOR&Iacute;AS</h2>
<?php
$load_query_cat="SELECT * FROM areas_noticias ORDER BY orden ASC";
$query_cat=mysql_query($load_query_cat) or die(mysql_error());
while ($res_cat=mysql_fetch_array($query_cat)){
	$id_cat_=trim($res_cat[id]);
	$nom_area_noti_=trim($res_cat[nom_area_noti]);
	$url_cat="blog.php?categoria=".$id_cat_;
	echo '<li><a href="'.$url_cat.'"><i class="fa fa-chevron-right" aria-hidden="true"></i>'.$nom_area_noti_.'</a></li>';
}
?>
</ul>

<ul class="tarjeta-sans espaciado-blog mas-visto">
  <h2>LO M&Aacute;S VISTO</h2>
<?php
$load_query__="SELECT a.*,b.nom_area_noti FROM noticias a LEFT JOIN areas_noticias b ON a.id_area_noti=b.id WHERE !ISNULL(a.id_noticia) ORDER BY a.vistos DESC LIMIT 5";
$query__=mysql_query($load_query__) or die(mysql_error());
while ($res__=mysql_fetch_array($query__)){
	$id_noticia__=trim($res__[id_noticia]);
	$titulo__=trim($res__[titulo]);
	$txt__=trim($res__[texto]);
	$texto__=substr(strip_tags($txt__),0,120);	
	$nom_area_noti__=trim($res__[nom_area_noti]);
	$imagen__=trim($res__[imagen]);
	if (strlen($imagen__)<=5){
		$imagen__="img_default.jpg";
	}
	$pimagen__=$path_img.$imagen__;	
	$URL_w="detalle-blog.php?id=".$id_noticia__;
echo ' <li>
    <a href="'.$URL_w.'">
      <div class="row">
        <div class="col-md-6">
          <img src="'.$pimagen__.'" class="img-responsive">
        </div>
        <div class="col-md-6">
          <h3>'.$nom_area_noti__.'</h3>
          <h4>'.$titulo__.'</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <p>'.$texto__.' (&hellip;)</p>
        </div>
      </div>
    </a>
  </li>';
}
?>
</ul>

<ul class="tarjeta-sans espaciado-blog mas-visto">
  <h2>VISITA NUESTRO FACEBOOK</h2>
  <li class="iframe-fb">
    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fespacioaccesibleperu%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
  </li>
</ul>

<ul class="tarjeta-sans espaciado-blog">
    <li class="susc-blog">
      <h2>¡OBTEN LAS ÚLTIMAS<br>NOTICIAS Y NOVEDADES!</h2>
      <form name="form1" action="enviaform.php" method="post">
        <input type="email" name="EMAIL" class="form-control yesyes" style="background: #fff;" placeholder="Tu dirección e-mail">
		<input name="ubicacion" type="hidden" value="Formulario de Noticias" id="ubicacion">
		<input name="email_enviado" type="hidden" value="buzon@espacioaccesible.com" id="email_enviado">        
        <button type="submit" name="subscribe" class="fr-form-susc-blog">¡SUSCRÍBETE!</button>
      </form>
    </li>
</ul>
