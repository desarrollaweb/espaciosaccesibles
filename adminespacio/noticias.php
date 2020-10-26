<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include ("../mysql/dbconnect.php");
mysql_query("SET NAMES 'utf8'");
//require '../fx/functions.php';
extract($_REQUEST);
$path="../web/webimg/";
$imgw=130;
if ($type=="ok"){
	mysql_query("delete from noticias WHERE id_noticia='$id' limit 1") or die(mysql_error());
//	mysql_query("delete from productos_imagenes where id_producto='$id'") or die(mysql_error());
	header ("location: ?not=ok");
	exit;
}

/*if (strlen($txt)>=2){
	$vWhere .=" and CONCAT_WS(' ', a.titulo) like '%".$txt."%'";
}*/


$load_query="SELECT * FROM noticias ORDER BY fecha DESC, id_noticia ASC";
$query=mysql_query($load_query) or die(mysql_error());
$num_tot=mysql_num_rows($query);
$TAMANO_PAGINA=20;
$pag = $_GET["pag"]; 
if (!$pag){
    $inicio=0; 
    $pag=1; 
}
else {
    $inicio = ($pag - 1) * $TAMANO_PAGINA; 
}
$re_t=ceil($num_tot / $TAMANO_PAGINA);
$ssql = $load_query . " limit " . $inicio . "," . $TAMANO_PAGINA; 
$bgcolor='#FFFFFF';
$bgcolorrep='#FFE8E8';
?>

<html>

<head>

<title></title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style>

body {

	background-color: #f5f5f5;

}

.BordeGris { BORDER-RIGHT: #CCCCCC 1px solid; BORDER-TOP: #CCCCCC  1px solid; BORDER-LEFT: #CCCCCC 1px solid; BORDER-BOTTOM: #CCCCCC 1px solid}

a.num { background:#59C1FF; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; border-right:#59C1FF 3px solid; border-left:#59C1FF 3px solid; border-top:#59C1FF 3px solid; border-bottom:#59C1FF 3px solid; text-decoration:none}

a:hover.num {  background:#012E65; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; border-right:#012E65 3px solid; border-left:#012E65 3px solid; border-top:#012E65 3px solid; border-bottom:#012E65 3px solid; text-decoration:underline}

a.numx {  background:#012E65; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; border-right:#012E65 3px solid; border-left:#012E65 3px solid; border-top:#012E65 3px solid; border-bottom:#012E65 3px solid; text-decoration:underline}

a:hover.numx {  background:#012E65; font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF; border-right:#012E65 3px solid; border-left:#012E65 3px solid; border-top:#012E65 3px solid; border-bottom:#012E65 3px solid; text-decoration:underline}



</style>

<script language="JavaScript" type="text/JavaScript">

function iLink(aHref)

{	

	parent.location=aHref;

}



function deleted(i,ID){

	var msgfin=confirm("¡Seguro de Eliminar!\n el Producto( "+ i +" ) será eliminado\n \n\n ¿Desea Continuar ?")

	if (msgfin) {

	location.href='?type=ok&id='+ID;

	}

}

function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

</script>

</head>

<body bottommargin="0" leftmargin="0" marginwidth="0"  rightmargin="0" topmargin="0">

<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF" class="texto">

  <tr>

    <td colspan="2" bgcolor="ffffff"><?php include("top.php") ?></td>

  </tr>

  <tr>

    <td height="26" colspan="2" bgcolor="#E9E9E9"><div align="center" style=" margin-right:10px;"></div></td>

  </tr>

  

  

  <tr>

    <td width="443" height="42"><div style="font-family:arial; font-size:12px; font-weight:bold; color: #003366;"> &nbsp;

            <input name="sUB" type="button"  style="cursor:pointer; font-family:tahoma; font-size:10px; font-weight:normal; color:#990000; height:28px; width:130px; background: #FFDDDD" id="sUB" value="NUEVA NOTICIA" onClick="javascript: iLink('noticias_new.php')">

            <input name="tipo" type="hidden" id="tipo" value="1" />

    </div></td>

    <td width="317" height="30">&nbsp;</td>

  </tr>

  <tr>

    <td height="42" colspan="2"><table width="960" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td width="423"><div align="left" style=" font-family:arial; font-size:11px;">

            <?php

if ($re_t>=1){

	$ini=0;

	if ($pag>1){

		$ini=$TAMANO_PAGINA*($pag-1);

	}

	$query=mysql_query($ssql) or die(mysql_error());

	$num_rows=mysql_num_rows($query);

	$ini_rows=$ini + $num_rows;

	echo 'Mostrando '.$ini.' - '.$ini_rows.' Registros de un total de <strong>'.$num_tot.'</strong>';

}

    ?>

        </div></td>

        <td width="537"><div align="right" style=" font-family:arial; font-size:11px; margin-right:10px;"> P&aacute;g.

          <?php

  			if ($re_t>=1){

//				echo '<select name="jumpMenu"  onchange="MM_jumpMenu('."'".'parent'."'".',this,0)" style=" font-family:arial; font-size:11px; width:80px;">';

				$t=1;

				while ($t<=$re_t){

				$sel='num';

				if ($t==$pag){

					$sel=' numx ';

				}

				echo '<a href="?pag='.$t.'&idcategoria='.$idcategoria.'" class="'.$sel.'">'.$t.'</a>&nbsp; ';

//				echo '<option value="?campana='.$campana.'&txt='.$txt.'&fecha_ini='.$fecha_ini.'&fecha_fin='.$fecha_fin.'&hora_ini='.$hora_ini.'&hora_fin='.$hora_fin.'&estado='.$estado.'&id_ciudad='.$id_ciudad.'&id_promotor='.$id_promotor.'&pag='.$t.'" '.$sel.'>'.$t.' de '.$re_t;

				$t++;

				}

	//			echo '</select>';

			}



		     ?>

        </div></td>

      </tr>

    </table></td>

  </tr>

  <tr>

    <td height="20" colspan="2">

    

    <table width="990" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#FFDDDD" style="font-family:tahoma; font-size:11px; color:#333333">

      <tr>

        <td width="117" height="28" bgcolor="#FFE8E8"><div align="center">-</div></td>

        <td width="308" bgcolor="#FFE8E8">&nbsp; <strong>Imagen</strong></td>


        <td width="428" bgcolor="#FFE8E8">&nbsp; <strong>T&iacute;tulo</strong></td>
        <td width="127" bgcolor="#FFE8E8"><div align="center">-</div></td>
      </tr>

      <?php

		if ($num_rows>=1){

			while ($res=mysql_fetch_array($query)){

				$ini++;
				$id_=$res[id_noticia];
				$titulo=trim($res[titulo]);
//				$tipo=trim($res[tipo]);				
				$img_auto=$path.$res[imagen];
				echo '<tr onmouseout="bgColor='."'".$bgcolor."'".'"'.' onmouseover="bgColor='."'".$bgcolorrep."'".'" style=" cursor:pointer" onclick="iLink('."'noticias_new.php?type=2&id=".$id_."'".')">';
				echo '<td height="25" bgcolor="#FFE8E8"><div align="center"">'.$ini.'</div></td>';
				echo '<td><div align="center" style="margin-bottom:10px; margin-top:10px;"><img src="'.$img_auto.'" width="250"></td>';
				echo '<td><div style=" margin-right:3px; margin-left:3px; margin-bottom:8px; margin-top:8px;">'.$titulo.'</div></td>';
				echo '<td><div align="center"><a href="?type=ok&id='.$id_.'"><img src="imagenes/deleted.gif" width="14" height="14" border="0"></a></div></td>';
				echo '</tr>';

			}

		}	

		else {

				echo '<tr><td height="30" colspan="4">&nbsp;  Lo Sentimos, No hay Registros Encontrados</td></tr>';

		}

		?>
    </table></td>

  </tr>

  <tr >

    <td height="8" colspan="2"></td>

  </tr>

  

  <tr bgcolor="#1A487A">

    <td height="10" colspan="2" bgcolor="#990000"></td>

  </tr>

</table>

</body>

</html>