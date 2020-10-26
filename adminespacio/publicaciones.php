<?php

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 

header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1

header("Cache-Control: post-check=0, pre-check=0", false);

header("Pragma: no-cache");                          // HTTP/1.0

include ("../mysql/dbconnect.php");

require '../fx/functions.php';

extract($_REQUEST);



if ($type=="ok"){

	$query_del=mysql_query("DELETE from scroll where id='$id' limit 1") or die(mysql_error());

	header ("location: ?method=2");

	exit;

}

$load_query="select * from scroll WHERE !ISNULL(id) ".$vWhere." ORDER BY orden DESC";

$bgcolorrep='#BBE9FF';

$path="../web/webimg/";

?>

<html>

<head>

<title></title>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



<style>



body {

	background-image: url();

	background-color: #EFEFEF;

}



</style>



<script language='javascript' src="../js/popcalendar.js"></script> 



<script language='javascript' src="../js/macrocontadores.js"></script> 



<script language="JavaScript" type="text/JavaScript">

function deleted(i,ID,fech){



	var msgfin=confirm("¡Seguro de Eliminar!\n La Publicidad ( "+ i +" ) será eliminado\n \n\n ¿Desea Continuar ?")



	if (msgfin) {



	location.href='?tipo=3&fecha='+ fech +'&id='+ID;



	}



}

function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

</script>



</head>



<body bottommargin="0" leftmargin="0" marginwidth="0"  rightmargin="0" topmargin="0">



<table width="760" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF" class="texto">



  <tr bgcolor="#fff">



    <td colspan="2" bgcolor="ffffff"><?php include("top.php") ?></td>

  </tr>





  <tr>

    <td height="12" colspan="2"></td>

  </tr>

  <tr>

    <td height="30" colspan="2" bgcolor="#000000"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <td height="8" colspan="3"></td>

        </tr>

      <tr>

        <td width="4%" height="25">&nbsp;</td>

        <td width="48%">&nbsp;</td>
        <td width="48%">&nbsp;</td>
      </tr>

      <tr>

        <td height="8" colspan="3"></td>

        </tr>

    </table></td>

  </tr>

  <tr>



    <td height="12" colspan="2"></td>

  </tr>



  



  <tr>



    <td width="443" height="40"><div style="font-family:arial; font-size:12px; font-weight:bold; color: #003366;"> &nbsp;



            <input name="sUB" type="button"  style="cursor:pointer; font-family:tahoma; font-size:11px; font-weight:normal; color:#fff; height:23px; width:130px; background:#009FEC" id="sUB" value="NUEVA PUBLICACI&Oacute;N" onClick="javascript: iLink('publicaciones_new.php')">



            <input name="tIPbOl" type="hidden" id="tIPbOl" value="<? echo $tIPbOl?>">

            <input name="tipo" type="hidden" id="tipo" value="1">

    </div></td>



    <td width="317" height="30">&nbsp;</td>

  </tr>



  <tr>



    <td height="20" colspan="2">



    



    <table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#BBE9FF" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000">



      <tr style=" color:#FFFFFF">



        <td width="46" height="28" bgcolor="#009FEC"><div align="center">-</div></td>



        <td width="189" bgcolor="#009FEC">&nbsp;Imagen</td>







        <td width="248" bgcolor="#009FEC">&nbsp;T&igrave;tulo</td>

        <td width="213" bgcolor="#009FEC">&nbsp;Sinopsis</td>

        <td width="42" bgcolor="#009FEC"><div align="center">-</div></td>

      </tr>



      <?php

		$query=mysql_query($load_query) or die(mysql_error());

		$num_rows=mysql_num_rows($query);

		if ($num_rows>=1){

			while ($res=mysql_fetch_array($query)){
				$ini++;
				$id_n=$res[id];
				$fecha_edicion=format_fech($res[fecha_edicion],"d/m/Y");
				$titulo=$res[titulo];
				$autor=$res[autor];
				$edicion=$res[edicion];
				$paginas=$res[paginas];
				$formato=$res[formato];
				$sinopsis=$autor.'<br>'.$edicion.'<br>'.$paginas.'<br>'.$formato;
				$img=$path.$res[img];
				echo '<tr onmouseout="bgColor='."'".$bgcolor."'".'"'.' onmouseover="bgColor='."'".$bgcolorrep."'".'" style=" cursor:pointer" onclick="iLink('."'publicaciones_new.php?type=2&id=".$id_n."'".')">';
				echo '<td height="25" bgcolor="#009FEC"><div align="center" style=" color:#fff">'.$ini.'</div></td>';
				echo '<td><div align="center" style=" margin:8px;"><img src="'.$img.'" width="150" /></div></td>';
				echo '<td STYLE=" padding-top:5px; padding-bottom:5px; padding-right:10px; padding-left:10px;">'.$titulo.'</td>';
				echo '<td STYLE=" padding-top:5px; padding-bottom:5px; padding-right:10px; padding-left:10px;">'.$sinopsis.'</td>';
				echo '<td><div align="center"><div align="center"><a href="?type=ok&id='.$id_n.'"><img src="imagenes/deleted.gif" width="14" height="14" border="0"></a></div></td>';
				echo '</tr>';

			}

		}	

		else {

				echo '<tr><td height="30" colspan="5"><div style=" margin-left:10px; color:#000">Lo Sentimos, No hay Registros Encontrados</div></td></tr>';

		}

		?>

    </table></td>

  </tr>



  <tr >



    <td height="8" colspan="2"></td>

  </tr>



  <tr >



    <td colspan="2">&nbsp;</td>

  </tr>



  <tr bgcolor="#1A487A">



    <td height="10" colspan="2" bgcolor="#000000"></td>

  </tr>

</table>



</body>



</html>



