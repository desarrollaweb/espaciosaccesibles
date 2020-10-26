<?php

$pag_web_exp=explode("/",$_SERVER["SCRIPT_NAME"]);

//$webpag=trim($pag_web_exp[2]);

$webpag=end($pag_web_exp);

//$webpag="productos.php";

$path_____='./imagenes/';

extract($_REQUEST);

extract($_COOKIE);

if (!isset($_COOKIE["login_admin_espacio_NEWid"])){

	echo '<div align="center" style=" margin-top:10px; font-size:12px; font-family:tahoma">Acceso No autorizado';

	echo '<br><br><a href="index.php" style=" color:#0000FF">Intranet</a><br><br>';

	echo '</div>';

	exit;

}



$load_query_servi="select b.nom_servicio,b.imagen,a.id_servicio from subservicios a inner join servicios b on a.id_servicio=b.id where a.url='".$webpag."' limit 1";

$query_servi=mysql_query($load_query_servi) or die(mysql_error());

$res_servi=mysql_fetch_row($query_servi);

$nom_servicio_____=$res_servi[0];

$imagen_____=$path_____.$res_servi[1];

$id_servicio=$res_servi[2];

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">



<head>



<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />



<title></title>



<style type="text/css">



<!--



body {



	margin-left: 0px;



	margin-top: 5px;



	margin-right: 0px;



	margin-bottom: 0px;



}



</style></head>







<body>



<table width="760" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" style=" font-family:tahoma; font-size:11px; color:#666666">



	 <tr><td colspan="2">&nbsp;</td>



	 </tr>



  <tr>



    <td width="481" height="60" bgcolor="#fff" colspan="<?php echo $num_rows_ser?>"><div align="left" style="margin-left:15px; color: #000000;"><a href="ini.php"><img src="imagenes/logo.png" alt="Inicio Administrativo" border="0" /></a></div></td>



    <td width="279" bgcolor="#fff" >&nbsp;</td>



  </tr>



  <tr>



    <td height="8" colspan="2">    </td>



  </tr>



  <tr>



    <td colspan="2"><table width="98%" border="0" cellspacing="0" cellpadding="3" style=" font-family:tahoma; font-size:12px; color:#333333">



      <tr>



        <td width="17%" height="70"><div align="center"><img src="<?php echo $imagen_____?>" width="45" height="45"><br />



          <?php echo $nom_servicio_____?></div></td>



        <td width="83%"><table width="97%" border="0" align="center" cellpadding="3" cellspacing="0" style=" font-family:tahoma; font-size:11px;">



       <?php



	  $load_query_ser="select * from subservicios where id_servicio='$id_servicio' order by orden ASC";



	  $query_ser=mysql_query($load_query_ser) or die(mysql_error());



	  $num_rows_ser=mysql_num_rows($query_ser);



	  while ($res_ser=mysql_fetch_array($query_ser)){



	  $nombre__=$res_ser[nombre];



  	  $id_subservicio__=$res_ser[id_sub];



	  $url__=$res_ser[url];



	  $i_ser++;



		if ($i_ser==1){



			  echo '<tr>';



		}



	  echo '<td><div align="center"><a href="'.$url__.'" style=" color:#000">'.$nombre__.'</a></div></td>';



	  if ($i_ser==$num_rows_ser){



			  echo '</tr>';



		  }



	  }



  ?>



        </table></td>



      </tr>



    </table></td>



  </tr>



  <tr>



    <td height="10" colspan="2">    </td>



  </tr>



</table>



</body>



</html>



