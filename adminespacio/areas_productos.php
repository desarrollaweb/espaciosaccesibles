<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include ("../mysql/dbconnect.php");
require '../fx/functions.php';
$path="../web/images/productos/";
extract($_REQUEST);
if ($type=="ok"){
	$query_del=mysql_query("delete from categorias where idcategoria='$id' limit 1") or die(mysql_error());
	header ("location: ?ok=0");
	exit;
}
$load_query="select * from categorias order by orden ASC";
$bgcolorrep='#E6E6FF';
?>
<html>
<head>
<title>INTRANET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
body {
	background-image: url();
	background-color: #f5f5f5;
}
.style1 {color: #FFFFFF}
</style>
<script language='javascript' src="../js/macrocontadores.js"></script> 
<script language="JavaScript" type="text/JavaScript">
function deleted(i,ID,fech){
	var msgfin=confirm("¡Seguro de Eliminar!\n La Noticia ( "+ i +" ) será eliminado\n \n\n ¿Desea Continuar ?")
	if (msgfin) {
	location.href='?tipo=3&fecha='+ fech +'&id='+ID;
	}
}
</script>
</head>
<body bottommargin="0" leftmargin="0" marginwidth="0"  rightmargin="0" topmargin="0">
<table width="760" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF" class="texto">
  <tr bgcolor="#000000">
    <td colspan="2" bgcolor="#FFFFFF"><?php include("top.php")?></td>
  </tr>
  <tr bgcolor="#1A487A">
    <td height="15" colspan="2" bgcolor="#000000"><div align="center">
      <table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
        <form name="form1" action="" method="post">
          <tr>
            <td height="8" colspan="3"></td>
          </tr>
          <tr>
            <td width="13%" height="15">&nbsp;</td>
            <td width="32%">&nbsp;
              <input name="tipo" type="hidden" id="tipo" value="1"></td>
            <td width="55%"><div align="right" style="margin-right:10Ppx; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#FFFFFF; font-weight:bold;">CATEGORIAS</div></td>
          </tr>
          <tr>
            <td height="8" colspan="3"></td>
          </tr>
        </form>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="6" colspan="2"></td>
  </tr>
  <tr >
    <td height="8" colspan="2"></td>
  </tr>
  <tr>
    <td width="443" height="30"><div style="font-family:arial; font-size:12px; font-weight:bold; color: #003366; margin-bottom:15px;"> &nbsp;
            <input name="sUB" type="button"  style="cursor:pointer; font-family:tahoma; font-size:11px; font-weight:normal; color:#fff; height:24px; width:130px; background:#000066" id="sUB" value="NUEVA CATEGORIA" onClick="javascript: iLink('areas_productos_new.php')">
    </div></td>
    <td width="317" height="30"><div align="right" style="margin-right:8px; font-family:tahoma; font-size:13px; font-weight:bold; color: #999999">&nbsp;</div></td>
  </tr>
  <tr>
    <td height="20" colspan="2">
    
    <table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E6E6FF" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size:11px; color:#000">
      <tr>
        <td width="69" height="28" bgcolor="#000066"><div align="center" class="style1">-</div></td>
        <td width="482" bgcolor="#000066"><span class="style1">&nbsp; Nombre de Categoria</span></td>
        <td width="109" bgcolor="#000066"><div align="center" class="style1">Orden</div></td>
        <td width="80" bgcolor="#000066">&nbsp;</td>
      </tr>
      <?php
		$query=mysql_query($load_query) or die(mysql_error());
		$num_rows=mysql_num_rows($query);
		if ($num_rows>=1){
			while ($res=mysql_fetch_array($query)){
				$ini++;
				$id_=$res[idcategoria];
				$nom_categoria=$res[nom_categoria];
				$imgmenu=$path.$res[imgmenu];				
				$orden=$res[orden];
				echo '<tr onmouseout="bgColor='."'".$bgcolor."'".'"'.' onmouseover="bgColor='."'".$bgcolorrep."'".'" style=" cursor:pointer" onclick="iLink('."'areas_productos_new.php?type=2&id=".$id_."'".')">';
				echo '<td height="28" bgcolor="#000066"><div align="center" style=" color:#fff">'.$ini.'</div></td>';
				echo '<td STYLE=" padding-top:5px; padding-bottom:5px; padding-right:5px; padding-left:10px;">'.$nom_categoria.'</td>';
				echo '<td><div align="center">'.$orden.'</td>';
				echo '<td><div align="center"><div align="center"><a href="?type=ok&id='.$id_.'"><img src="imagenes/deleted.gif" width="14" height="14" border="0"></a></div></td>';
				echo '</tr>';
			}
		}	
		else {
				echo '<tr><td height="30" colspan="3">&nbsp;  Lo Sentimos, No hay Registros Encontrados</td></tr>';
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