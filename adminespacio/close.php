<?php
extract($_REQUEST);
extract($_COOKIE);
setcookie("login_admin_espacio_NEWid","",time() - 360);
setcookie("login_admin_espacio_user","",time() - 360);
setcookie("login_admin_espacio_nom","",time() - 360);
header ("location: index.php");
?>