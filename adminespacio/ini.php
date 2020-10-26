<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include('../mysql/dbconnect.php');
mysql_query("SET NAMES 'utf8'");
require '../fx/functions.php';
extract($_REQUEST);
extract($_COOKIE);
$fecha=date("Y-m-d");
$server=$_SERVER["SERVER_NAME"];
$login_ID_EMP=$_COOKIE["login_admin_espacio_NEWid"];
if (!isset($login_ID_EMP)){
	echo '<div align="center" style=" margin-top:10px; font-size:12px; font-family:tahoma">Acceso No autorizado';
	echo '<br><br><a href="index.php" style=" color:#0000FF">Intranet</a><br><br>';
	echo '</div>';
	exit;
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>INTRANET</title>
<style>
BODY {
	scrollbar-base-color: #C9DBDE;
	scrollbar-arrow-color: #003366;
	background:#ffffff;
	MARGIN-BOTTOM: 0px;
	MARGIN-TOP: 0px;
	MARGIN-LEFT: 0px;
	MARGIN-RIGHT: 0px;
	background-color:#000000;
}
a.tit_intra { font-family: Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#000000; text-decoration:none; font-weight:normal;}
a:hover.tit_intra { font-family:Verdana, Arial, Helvetica, sans-serif; font-size:12px; color:#000000; text-decoration:underline;font-weight:normal;}
</style>


</head>

<body>

<table width="765" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

<tr>

<td height="5" colspan="3" bgcolor="#000000">&nbsp;</td>

</tr>

<tr>

<td colspan="3"><img src="imagenes/top_intra.jpg" width="765" height="18"></td>

</tr>

<tr>

  <td bgcolor="#fff">&nbsp;</td>

  <td height="60" valign="middle" bgcolor="#fff"><div align="left" style=" margin-left:10px;"><img src="imagenes/logo.png" border="0"></div></td>

  <td>&nbsp;</td>

</tr>

<tr>

  <td>&nbsp;</td>

  <td valign="middle">  </td>

  <td>&nbsp;</td>

</tr>

<tr>

  <td height="8"></td>

  <td>  </td>

  <td>  </td>

</tr>

<tr>

<td width="5">&nbsp;</td>

<td width="755" valign="top">

<?php   

$ncolumn=3;

$total_width=100;

$div_width=round($total_width/$ncolumn,0);

echo '<table width="'.$total_width.'%" border="0" cellspacing="0" cellpadding="0">';

echo '<tr>';

echo '<td height="10" colspan="'.$ncolumn.'"></td>';

echo '</tr>';

$i=0;

$query=mysql_query("select b.* from usuarios_servicios a INNER JOIN servicios b ON a.id_servicio=b.id WHERE a.id_usuario='$login_ID_EMP' order by b.orden ASC") or die(mysql_error());

$num_rowsc=mysql_num_rows($query);

while ($res=mysql_fetch_array($query)){

if ($i==0 || $i==$ncolumn){

echo '<tr>';

}

$url=$res[url];

$target="";

if ($res[new_page]==1){

	$target='target="_blank"';

}

echo '<td width="'.$div_width.'%"><div align="center"><a href="'.$url.'" class="tit_intra" '.$target.'><img src="imagenes/'.$res[imagen].'" width="45" height="45" border="0"><br>';

echo '<div style=" margin-top: 5px;">'.$res[nom_servicio].'</a></div></div></td>';

$i++;

	if ($i==$ncolumn){

		echo '</tr>';

		echo '<tr><td height="25" colspan="'.$ncolumn.'"></td></tr>';

		$i=0;

	}

}

echo '</table>';

?></td>

    <td width="5">&nbsp;</td>

  </tr>

<tr>

  <td>&nbsp;</td>

  <td valign="top">&nbsp;</td>

  <td>&nbsp;</td>

</tr>

<tr>

  <td colspan="3"><img src="imagenes/bottom_intra.jpg" width="765" height="18"></td>

  </tr>

</table>

</body>

</html>