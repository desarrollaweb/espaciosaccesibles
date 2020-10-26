<?php

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 

header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1

header("Cache-Control: post-check=0, pre-check=0", false);

header("Pragma: no-cache");                          // HTTP/1.0

include('../mysql/dbconnect.php');

require '../fx/functions.php';

extract($_REQUEST);

extract($_COOKIE);

$fecha=date("Y-m-d");

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

.BordeGris {BORDER-BOTTOM: #cccccc 1px solid; BORDER-LEFT: #cccccc 1px solid; BORDER-TOP: #cccccc 1px solid; BORDER-RIGHT: #cccccc 1px solid; height:22px;}

</style>



</head>

<body onLoad="putFocus(0,0);">

<table width="765" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

<tr>

<td height="5" colspan="3" bgcolor="#000000">&nbsp;</td>

</tr>

<tr>

<td colspan="3"><img src="imagenes/top_intra.jpg" width="765" height="18"></td>

</tr>

<tr>

  <td>&nbsp;</td>

  <td height="60" valign="middle" bgcolor="#fff"><div align="left" style=" margin-left:10px; margin-top:10px; margin-bottom:10px;">

    <div align="center"><img src="imagenes/logo.png" border="0"></div>

  </div></td>

  <td>&nbsp;</td>

</tr>





<tr>

<td width="5">&nbsp;</td>

<td width="755" valign="top"><table width="500" border="0" align="center" cellpadding="0" cellspacing="0">

  <form name="form1" action="login.php" method="post">

    

    

    <tr>

      <td height="40" colspan="3"><div align="center" style=" color:#F00; font-family: Verdana, Arial, Helvetica, sans-serif; font-size:11px; font-weight:bold;">USO EXCLUSIVO PARA PERSONAL ADMINISTRATIVO</div></td>

    </tr>

    <tr>

      <td height="15" colspan="3"></td>

    </tr>

    <tr>

      <td width="194" height="40"><font STYLE=" font-family:Verdana, Arial, Helvetica, sans-serif; color:#000000; FONT-SIZE:11px">Nombre de Usuario:</font></td>

      <td width="306" colspan="2"><input name="user" type="text" class="BordeGris" id="user" size="32" maxlength="50"></td>

    </tr>

    <tr>

      <td height="40"><font STYLE=" font-family:Verdana, Arial, Helvetica, sans-serif; color:#000000; FONT-SIZE:11px">Clave Internet:</font></td>

      <td colspan="2"><input name="secreto" type="password" class="BordeGris" id="secreto" size="32" maxlength="32"></td>

    </tr>

    <tr>

      <td height="12" colspan="3">&nbsp;</td>

    </tr>

    

    <tr>

      <td height="42"></td>

      <td colspan="2"><div align="left" style=" margin-left:90px;">

        <input type="submit" name="button" id="button" value="Aceptar" style="background:#303030; cursor:pointer; color:#FFFFFF; width:100px; height:25px; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:11px;">

      </div></td>

    </tr>

    <tr>

      <td height="30" colspan="3">

		  <?php

			if ($error){

			 switch ($error){

			 case 1:

				 $tit_error='Usuario y/o Clave Internet Erroneo';

			  break;

			  case 2:

				   $tit_error='Acceso No Autorizado';

			  break;

			 default:

				 $tit_error='Acceso No valido';

			 break;

			}

			echo '<table width="100%"  border="0" cellspacing="0" cellpadding="0" align="center">';

            echo '<tr>';

            echo '<td width="19"><img src="imagenes/deleted.gif" width="14" height="14"></td>';

            echo '<td valign="top"><font STYLE=" font-family:verdana; color:#FF6666; FONT-SIZE:11px">'.$tit_error.'</font></td>';

            echo '</tr>';

            echo '</table>';

			}

			 ?></td>

      </tr>

  </form>

</table></td>

    <td width="5">&nbsp;</td>

  </tr>

<tr>

  <td>&nbsp;</td>

  <td height="25" valign="top">&nbsp;</td>

  <td>&nbsp;</td>

</tr>

<tr>

  <td colspan="3"><img src="imagenes/bottom_intra.jpg" width="765" height="18"></td>

  </tr>

</table>

</body>

</html>