<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include ("../mysql/dbconnect.php");
require '../fx/functions.php';
extract($_REQUEST);
$fecha=date("Y-m-d");
$user_c= $_POST['user']; 
$server=$_SERVER["SERVER_NAME"];
$secreto_c= $_POST['secreto'];
$load_query="SELECT a.ID,a.usuario,a.nombre,b.idusuario from usuarios a LEFT JOIN sec_usuarios b ON a.ID=b.usuario where a.usuario='$user_c' and a.pass='$secreto_c' limit 1";
$cook_name_id="login_admin_espacio_NEWid";
$cook_name_cod="login_admin_espacio_user";
$cook_name_nom="login_admin_espacio_nom";
$header="ini.php";

$query = mysql_query($load_query) or die (mysql_error());

$num_rows=mysql_num_rows($query);

if ($num_rows<1){

	header ("location: index.php?error=1");

	exit;

}

$res=mysql_fetch_array($query);
setcookie($cook_name_id,$res[0],time() + 14440);
setcookie($cook_name_cod,$res[1],time() + 14440);
setcookie($cook_name_nom,$res[2],time() + 14440);
header ("location: $header");

?>