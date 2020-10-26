<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include ("../mysql/dbconnect.php");
require '../fx/functions.php';
extract($_REQUEST);
$path="../web/webimg/";
$fecha=date("Y-m-d");
$hora=date("H:i:s");
switch ($type){
default: //Nuevo Registro
	$type=3;
break;
case 2: //Editar Registro
	$load_query="select * from scroll where id='$id' limit 1";
	$query=mysql_query($load_query) or die(mysql_error());
	$num_rows=mysql_num_rows($query);
	if ($num_rows<1){
		echo "Lo Sentimos, No se ha Encontrado el Registro Deseado";
		exit;
	}
	$res=mysql_fetch_array($query);
	$titulo=$res[titulo];
	$editorial=$res[editorial];
	$edicion=$res[edicion];
	$paginas=$res[paginas];
	$formato=$res[formato];
	$autor=$res[autor];
	$precio=$res[precio];
	$contenido=$res[contenido];
	$orden=$res[orden];
	$type=4;

break;

case 3: //Insertar Nuevo Registro
	if (($cbx_1=='1') && (is_uploaded_file($_FILES['file_1']['tmp_name']))){
		$nombre=$_FILES['file_1']['name'];
		$ext = substr($nombre, strrpos($_FILES['file_1']['name'],'.'));
		$name_f=$fecha.'_'.aleatorio(6).$ext;
		copy($_FILES['file_1']['tmp_name'],$path.$name_f);
	}
	$load_query="INSERT INTO scroll (id,titulo,editorial,edicion,paginas,formato,autor,precio,contenido,orden,img) VALUES
				 ('','$titulo','$editorial','$edicion','$paginas','$formato','$autor','$precio','$contenido','$orden','$name_f')";
	mysql_query($load_query) or die(mysql_error());
	header ("location: publicaciones.php");
	break;
case 4: //Actualizar Valores
	if (($cbx_1=='1') && (is_uploaded_file($_FILES['file_1']['tmp_name']))){
		$nombre=$_FILES['file_1']['name'];
		$ext = substr($nombre, strrpos($_FILES['file_1']['name'],'.'));
		$name_f=$fecha.'_'.aleatorio(6).$ext;
		copy($_FILES['file_1']['tmp_name'],$path.$name_f);
		$is_img_mysql=", img='$name_f'";
	}
	$load_query="update scroll SET titulo='$titulo', editorial='$editorial', edicion='$edicion', paginas='$paginas', formato='$formato', autor='$autor', precio='$precio', contenido='$contenido', orden='$orden' ".$is_img_mysql."  where id='$id_' limit 1";
	mysql_query($load_query) or die(mysql_error());
	header ("location: publicaciones.php");
	exit;		
	break;
}
?>

<html>

<head>

<title></title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../css/style.css" rel="stylesheet" type="text/css">

<script>

function gettext(){ 

var sel = document.selection; 

if (sel!=null) { 

    var rng = sel.createRange(); 

    if (rng!=null) 

      alert (rng.text); 

} 

} 

function valid(i){

	box = eval("document.form1.cbx_" +  i); 

	if (eval("document.form1.file_" + i + ".value") == "" || eval("document.form1.file_" + i + ".value")==" "){

		box.checked = false;

	}

	else {

		box.checked = true;

	}

}

</script>
<script language='javascript' src="../js/popcalendar.js"></script> 
<script language='javascript' src="../js/macrocontadores.js"></script> 

<style>

.BordeGris {

	BORDER-RIGHT: #cccccc 1px solid; BORDER-TOP: #cccccc 1px solid; BORDER-LEFT: #cccccc 1px solid; BORDER-BOTTOM: #cccccc 1px solid

}

.texto2 {FONT-SIZE: 10px; FONT-FAMILY: Arial, Helvetica, sans-serif}

a.linkright {FONT-FAMILY: Arial, Helvetica, sans-serif;font-size: 12px;font-style: normal;font-weight: none;color: #025271;text-decoration: none}

a:hover.linkright {font-family: Arial, Helvetica, sans-serif;font-size: 12px;font-style: normal;font-weight: none;color: #025271;text-decoration: underline}

.desactivado {FONT-FAMILY:Arial; WIDTH:150px; FONT-SIZE:11px; COLOR: #000000; background: #BEBEBE}

.desactivatext {FONT-FAMILY:Arial; FONT-SIZE:11px; COLOR: #000000; background: #BEBEBE}

.activado {FONT-FAMILY:Arial; WIDTH:150px; FONT-SIZE:11px; COLOR: #000000; background: #FFFFFF}

.texto {FONT-SIZE: 11px; FONT-FAMILY: Arial, Helvetica, sans-serif}

body {

	background-color: #DDF7FF;

}

.texto5 {FONT-SIZE: 11px; FONT-FAMILY: Arial, Helvetica, sans-serif}

</style>

</head>

<body bottommargin="0" leftmargin="0" marginwidth="0"  rightmargin="0" topmargin="0">

<table width="760" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="texto">

  <form name="form1" action="" method="post" enctype="multipart/form-data">

    <tr bgcolor="·fff">

      <td height="60" bgcolor="ffffff"><div align="right" style=" margin-right:10px;"><a href="publicaciones.php">Retornar</a></div></td>
    </tr>

    <tr bgcolor="#1A487A"> 

      <td height="26" bgcolor="#000000"> <div align="center">

        <table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">

          <tr>

            <td height="8" colspan="3">			</td>
            </tr>

          <tr>

            <td width="6%" height="25">&nbsp;</td>

            <td width="22%">&nbsp;</td>

            <td>&nbsp;</td>
            </tr>

          <tr>

            <td height="8" colspan="3"></td>
            </tr>
        </table>

      </div></td>
    </tr>


    <tr >
      <td >&nbsp;</td>
    </tr>
    <tr >
      <td ><div style="font-family:tahoma; font-size:12px; margin-left:8px;">T&iacute;tulo:</div></td>
    </tr>
    <tr >
      <td ><div style="font-family:tahoma; font-size:12px; margin-left:8px;">
        <input name="titulo" type="text" class="texto" id="titulo" style="font-family:tahoma; font-size:12px; font-weight:normal; width:700px; height:25px;" value="<? echo $titulo?>">
      </div></td>
    </tr>
    <tr >
      <td height="10" ></td>
    </tr>
    
    <tr > 

      <td ><div style="font-family:tahoma; font-size:12px; margin-left:8px;">Editorial</div></td>
    </tr>

    <tr> 

      <td height="42"><div style="margin-left:8px;"><input name="editorial" type="text" class="texto" id="editorial" style="font-family:tahoma; font-size:12px; font-weight:normal; width:700px; height:25px;" value="<? echo $editorial?>">
      </div></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td><div style="font-family:tahoma; font-size:12px; margin-left:8px;">Edici&oacute;n</div></td>
    </tr>
    <tr>
      <td height="42"><div style="margin-left:8px;">
        <input name="edicion" type="text" class="texto" id="edicion" style="font-family:tahoma; font-size:12px; font-weight:normal; width:700px; height:25px;" value="<? echo $edicion?>">
      </div></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td><div style="font-family:tahoma; font-size:12px; margin-left:8px;">P&aacute;ginas</div></td>
    </tr>
    <tr>
      <td height="42"><div style="margin-left:8px;">
        <input name="paginas" type="text" class="texto" id="paginas" style="font-family:tahoma; font-size:12px; font-weight:normal; width:700px; height:25px;" value="<? echo $paginas?>">
      </div></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td><div style="font-family:tahoma; font-size:12px; margin-left:8px;">Formato</div></td>
    </tr>
    <tr>
      <td height="42"><div style="margin-left:8px;">
        <input name="formato" type="text" class="texto" id="formato" style="font-family:tahoma; font-size:12px; font-weight:normal; width:700px; height:25px;" value="<? echo $formato?>">
      </div></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td><div style="font-family:tahoma; font-size:12px; margin-left:8px;">Autor</div></td>
    </tr>
    <tr>
      <td height="42"><div style="margin-left:8px;">
        <input name="autor" type="text" class="texto" id="autor" style="font-family:tahoma; font-size:12px; font-weight:normal; width:700px; height:25px;" value="<? echo $autor?>">
      </div></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td><div style="font-family:tahoma; font-size:12px; margin-left:8px;">Precio</div></td>
    </tr>
    <tr>
      <td height="42"><div style="margin-left:8px;">
        <input name="precio" type="text" class="texto" id="precio" style="font-family:tahoma; font-size:12px; font-weight:normal; width:100px; height:25px;" value="<? echo $precio?>">
      </div></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td><div style="font-family:tahoma; font-size:12px; margin-left:8px;">Orden</div></td>
    </tr>
    <tr>
      <td height="42"><div style="margin-left:8px;">
        <input name="orden" type="text" class="texto" id="orden" style="font-family:tahoma; font-size:12px; font-weight:normal; width:50px; height:25px;" value="<? echo $orden?>">
      </div></td>
    </tr>

    

    <tr >

      <td height="12">&nbsp;</td>
    </tr>

    <tr >

      <td height="12"><table width="98%"  border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#E7F1FE" class="texto5">

        <tr>

          <td height="26" bordercolor="#DDDDDD" bgcolor="#C1E7FF"><div style="font-family:tahoma; font-size:12px; margin-left:8px; font-weight:normal;">Imagen</div></td>
          </tr>

        <tr>

          <td height="40" bordercolor="#FFFFFF"><div style=" margin-left:8px;">

              <input name="cbx_1" type="checkbox" id="cbx_1" value="1">

              <input name="file_1" type="file" id="file_1" size="35" style="font-family:tahoma; font-size:12px; background-color:#ffffff" onChange="valid(1)">

          </div></td>
          </tr>

      </table>      </td>
    </tr>

    

    



    <tr>

      <td height="12" bordercolor="#F7F3E8">&nbsp;</td>
    </tr>

    



    <tr> 

      <td> <div align="right"><span style="font-family:arial; font-size:12px; font-weight:bold; color: #003366">

        <input type="hidden" name="id" id="id" value="<? echo $id?>">

        <input type="hidden" name="type" id="type" value="<? echo $type?>">

        <input name="sUB" type="submit"  style="cursor:pointer; font-family:tahoma; font-size:11px; font-weight:normal; color:#fff; height:23px; width:130px; background: #000066" id="sUB" value="ACTUALIZAR VALOR">

      </span>&nbsp;           &nbsp; </div></td>
    </tr>

    <tr> 

      <td>&nbsp;</td>
    </tr>

    <tr> 

      <td height="10" bgcolor="#000000">	  </td>
    </tr>
  </form>
</table>

</body>

</html>

