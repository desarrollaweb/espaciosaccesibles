<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include ("../mysql/dbconnect.php");
mysql_query("SET NAMES 'utf8'");
require '../fx/functions.php';
extract($_REQUEST);
//**Fecha Server
$fecha=date("Y-m-d");
$server=$_SERVER["SERVER_NAME"];
extract($_REQUEST);
$fecha=date("Y-m-d");
if (!$id){
	$option=1;
}
$name='Datos del Nuevo Usuario';
	if ($option==2){
		$query=mysql_query("select a.* from usuarios a where a.ID='$id' limit 1") or die(mysql_error());
		$res=mysql_fetch_array($query);
		$id_empleado=$res[ID];
		$nom_empleado=$res[nombre];
		$usuario=$res[usuario];
		$secreto=$res[pass];		
		$name='Editar Usuario "'.$nom_empleado.'"';
}
?>
<html>
<head>

<title>Gestión de Usuarios</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<LINK href="../css/style.css" type=text/css rel=stylesheet>

<style type="text/css">

<!--

.Estilo2 {font-size: 14px; color: #FFFFFF;}

.texto { font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#333333}
body {
	background-color: #f0f0f0;
}

-->

</style>

</head>

<body bottommargin="0" leftmargin="0" marginwidth="0"  rightmargin="0" topmargin="0">

<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

  <form name="form1" action="usuadmin_up.php" method="post">

    <tr bordercolor="#FFFFFF" bgcolor="#FFFFFF">
      <td colspan="2"><div align="left" style=" margin-left:8px; margin-top:8px;"><a href="ini.php"><img src="imagenes/logo.png" border="0"></a></div></td>
    </tr>



<?php
if ($option!=1){
echo '    <tr> 
<td height="37" colspan="2">';
echo '<div align="right" style=" margin-right:12px;font-family:arial; font-size:12px; color: #000000;"><a href="usuadmin.php" class="menugris">NUEVO USUARIO</a></div>';
echo '</td>
</tr>';
}
?>


    <tr> 

      <td height="10" colspan="2"></td>
    </tr>

    <tr> 

      <td width="393" height="226" valign="top"><table width="96%"  border="0" cellpadding="0" cellspacing="0" class="texto" style="margin-left:8px;">

        <tr bgcolor="#7D000D">

          <td height="25" colspan="2" bgcolor="#000000"><div align="center"><span class="Estilo2"><? echo $name?> </span></div></td>
          </tr>

        <tr>

          <td height="8" colspan="2">		  </td>
          </tr>

        <tr>

          <td width="50%">&nbsp; Personal Administrativo</td>

          <td width="50%">&nbsp;</td>
          </tr>

        <tr>

          <td colspan="2">&nbsp;

<input name="nombre" type="text" class="BordeGris" id="nombre" value="<?php echo $nom_empleado?>" size="56" maxlength="100">&nbsp; </td>
          </tr>

        <tr>

          <td>&nbsp;</td>

          <td>&nbsp;</td>
          </tr>

        <tr>

          <td>&nbsp; Nombre de Usuario </td>

          <td>Clave de Usuario</td>
        </tr>

        <tr>

          <td>&nbsp;

<input name="usuario" type="text" class="BordeGris" id="usuario" value="<? echo $usuario?>" size="25" maxlength="30"></td>

          <td><input name="pass" type="password" class="BordeGris" id="pass" value="<? echo $secreto?>" size="23" maxlength="10">

            <input name="option" type="hidden" id="option" value="<? echo $option?>">

            <input name="id_empleado" type="hidden" id="id_empleado" value="<? echo $id?>"></td>
        </tr>



        <tr>

          <td>&nbsp;</td>

          <td>&nbsp;</td>
          </tr>

        <tr>

          <td>&nbsp;</td>

          <td>

            <div align="right">

              <input name="Submit" type="submit" value="GRABAR DATOS" style="background:#000; height:30px; cursor:pointer; color:#FFFFFF;" class="texto">

         &nbsp; &nbsp;  &nbsp; &nbsp; </div></td>
        </tr>

        <tr>
          <td colspan="2"></td>
        </tr>
        <tr>

          <td height="5" colspan="2"></td>
          </tr>


      </table></td>

      <td width="372" valign="top">

	    <table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0" class="texto">

        <tr>

          <td height="25" bgcolor="#000000"><div align="center"><span class="Estilo2">Permiso de Servicios</span></div></td>
          </tr>

      <?php

	  $query=mysql_query("select a.*,b.id_servicio as servicio from servicios a left join usuarios_servicios b on a.id=b.id_servicio and b.id_usuario='$id' WHERE a.activo='1' ORDER BY a.orden asc") or die(mysql_error());
	  while ($res=mysql_fetch_array($query)){
	   	$F++;
		$servicio=$res[servicio];
		$check='';
		if ($res[id]==$servicio){
			$check=' checked';
		}
		$bgcolor="#EAEAEA";
		if ($F%2){
			$bgcolor="#FFFFFF";
		}
	    echo '<tr>';
        echo '<td height="30" bgcolor="'.$bgcolor.'">&nbsp; <input type="checkbox" name="chk_'.$F.'" value="'.$res[id].'" class="cursor" '.$check.'> '.$res[nom_servicio].'</td>';
        echo '</tr>';

	}

		?>
      </table></td>
    </tr>

    <tr> 

      <td height="2" colspan="2"></td>
    </tr>

    <tr>

      <td colspan="2"><table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0" class="texto">

        <tr bgcolor="14487A">
          <td height="10" colspan="5" bgcolor="#FFFFFF"></td>
        </tr>
        <tr bgcolor="14487A">

          <td height="27" colspan="5" bgcolor="#333333"><div align="center" class="Estilo2"><input name="total_rows" type="hidden" value="<?php echo $F?>">Listado de Usuarios 

		    </div></td>
          </tr>

        <tr>

          <td width="12%" height="22" bgcolor="#f5f5f5"><div align="center"><strong>N&ordm;</strong></div></td>

          <td width="35%" bgcolor="#f5f5f5"><div align="left"><strong>&nbsp;Personal Administrativo</strong></div></td>

          <td width="34%" bgcolor="#f5f5f5"><div align="left"><strong>&nbsp;Usuario </strong></div></td>

          <td width="10%" bgcolor="#f5f5f5"><div align="center"><strong>Editar</strong></div></td>
          <td width="9%" bgcolor="#f5f5f5"><div align="center"><strong>Eliminar</strong></div></td>
        </tr>

        <?php

		$query=mysql_query("select a.* from usuarios a ") or die(mysql_error());

		while ($res=mysql_fetch_array($query)){

		$i++;

		$id_empleado_=$res[ID];

		$nom_empleado=$res[nombre];		

		$usuario=$res[usuario];


		echo '<tr>';

          echo '<td height="35"><div align="center"><strong>'.$i.'</strong></div></td>';

          echo '<td>&nbsp;'.$nom_empleado.'</td>';

          echo '<td>&nbsp;'.$usuario.'</td>';
          echo '<td><div align="center"><a href="?option=2&id='.$id_empleado_.'"><img src="imagenes/plumon.gif" width="14" height="14" border="0"></a><div></td>';
          echo '<td><div align="center"><a href="usuadmin_up.php?option=3&id='.$id_empleado_.'"><img src="imagenes/del_it.gif" width="14" height="14" border="0"></a><div></td>';

        echo '</tr>';

		}

		?>

        <tr>

          <td height="8" colspan="5" bgcolor="#333333">		  </td>
          </tr>

      </table></td>
    </tr>


    <tr>
      <td height="15" colspan="2"></td>
    </tr>
  </form>
</table>

</body>

</html>