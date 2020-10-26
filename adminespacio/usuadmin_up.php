<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include ("../mysql/dbconnect.php");
require '../fx/functions.php';
extract($_REQUEST);
$page='usuadmin.php';
$fecha=date("Y-m-d");
switch ($option){
	case 1:
		$load_query="INSERT INTO usuarios (ID,usuario,pass,nombre)";
		$load_query.=" VALUES ('','$usuario','$pass','$nombre')";
	break;
	case 2:
		$load_query="UPDATE usuarios SET nombre='$nombre', usuario='$usuario', pass='$pass' WHERE ID='$id_empleado' LIMIT 1";
		$hder='?id='.$id_empleado.'&option=2';
		mysql_query("UPDATE sec_usuarios SET nombre_email='$nombre' WHERE usuario='$id_empleado' LIMIT 1") or die(mysql_error());
	break;
	case 3:
		$load_query="DELETE FROM usuarios WHERE ID='$id' LIMIT 1";
	break;
	default:
		header ("location: $page");
		exit;	
	break;
}
mysql_query($load_query) or die(mysql_error());
if ($option==1){
	$load_i=mysql_query("SELECT LAST_INSERT_ID()") or die(mysql_error());
	$res_i=mysql_fetch_array($load_i);
	$id_asesor=$res_i[0];
	$hder='?id='.$id_empleado.'&option=2';
}
mysql_query("DELETE FROM usuarios_servicios WHERE id_usuario='$id_empleado'") or die(mysql_error());
$i=1;
if ($option!=3){
	while ($i<=$total_rows){
		$chk='chk_'.$i;
		$chk_i=$_POST[$chk];
		mysql_query("INSERT INTO usuarios_servicios (id_servicio,id_usuario) values ('$chk_i','$id_empleado')") or die(mysql_error());
	$i++;
	}
}
$hder=$page.$hder;
header ("location: $hder");
?>