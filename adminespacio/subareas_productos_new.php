<?php
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");                          // HTTP/1.0
include ("../mysql/dbconnect.php");
require '../fx/functions.php';
extract($_REQUEST);
$path_img="../web/images/productos/";
switch ($type){
default: //Nuevo Registro
	$type=3;
break;
case 2: //Editar Registro
	$load_query="select * from subcategorias where idsubcategoria='$id' limit 1";
	$query=mysql_query($load_query) or die(mysql_error());
	$num_rows=mysql_num_rows($query);
	if ($num_rows<1){
		echo "Lo Sentimos, No se ha Encontrado el Registro Deseado";
		exit;
	}
	$res=mysql_fetch_array($query);
	$nom_subcategoria=$res[nom_subcategoria];
	$idcategoria=$res[idcategoria];	
	$type=4;
break;
case 3: //Insertar Nuevo Registro
		$i=1;
/*		$cbx_="cbx_".$i;
		$cbx=$_POST[$cbx_];
		$archivo="archivo_".$i;
		if (($cbx=='1') && (is_uploaded_file($_FILES[$archivo]['tmp_name']))){
				$nombre=$_FILES[$archivo]['name'];
				$_ext=explode(".",$nombre);
				$ext=end($_ext);
				$name_f=aleatorio(10).".".$ext;
				copy($_FILES[$archivo]['tmp_name'],$path_img.$name_f);
		}*/
	$load_query="insert into subcategorias (idsubcategoria,nom_subcategoria,idcategoria) values ('','$nom_subcategoria','$idcategoria')";
	mysql_query($load_query) or die(mysql_error());
	header ("location: subareas_productos.php");
	break;
case 4: //Actualizar Valores
		$i=1;
/*		$cbx_="cbx_".$i;
		$cbx=$_POST[$cbx_];
		$archivo="archivo_".$i;
		if (($cbx=='1') && (is_uploaded_file($_FILES[$archivo]['tmp_name']))){
				$nombre=$_FILES[$archivo]['name'];
				$_ext=explode(".",$nombre);
				$ext=end($_ext);
				$name_f=aleatorio(10).$ext;
				copy($_FILES[$archivo]['tmp_name'],$path_img.$name_f);
				$vWhere=", imgmenu='".$name_f."'";
		}*/
	$load_query="UPDATE subcategorias set nom_subcategoria='$nom_subcategoria', idcategoria='$idcategoria' WHERE idsubcategoria='$id' limit 1";
	mysql_query($load_query) or die(mysql_error());
	header ("location: subareas_productos.php");
	exit;		
	break;
}
?>
<html>
<head>
<title>INTRANET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language='javascript' src="../js/macrocontadores.js"></script> 
<script>
function valid(i){
	box = eval("document.form1.cbx_" +  i); 
	if (eval("document.form1.archivo_" + i + ".value") == "" || eval("document.form1.archivo_" + i + ".value")==" "){
		box.checked = false;
	}
	else {
		box.checked = true;
	}
}
</script>
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
.texto5 {FONT-SIZE: 11px; FONT-FAMILY: Arial, Helvetica, sans-serif}
body {
	background-color: #CCCCCC;
}
</style>
</head>
<body bottommargin="0" leftmargin="0" marginwidth="0"  rightmargin="0" topmargin="0">
<table width="760" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="texto">
  <form name="form1" action="" method="post" enctype="multipart/form-data">
    <tr>
      <td height="60" colspan="2"><table width="98%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="82%"><div align="left" style=" margin-left:15px;"><img src="imagenes/logo.png" border="0" /></div></td>
          <td width="18%"><div align="right"><a href="subareas_productos.php" style="color:#0000FF; font-family:Arial, Helvetica, sans-serif; font-size:11px;">Regresar</a></div></td>
        </tr>
      </table></td>
    </tr>
    <tr bgcolor="#333333"> 
      <td height="15" colspan="2" bgcolor="#000000"> <div align="center">
        <table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="8" colspan="3">			</td>
            </tr>
          <tr>
            <td width="6%" height="15">&nbsp;</td>
            <td width="22%">&nbsp;</td>
            <td width="72%"><div align="right">
              <font style=" color:#FFFFFF; padding-top:5px; font-family:tahoma; font-size:11px; vertical-align:text-top">Subcategorias:</font></div></td>
          </tr>
          <tr>
            <td height="8" colspan="3"></td>
            </tr>
        </table>
      </div></td>
    </tr>
    <tr> 
      <td height="20" colspan="2"></td>
    </tr>
    
    <tr> 
      <td width="170" height="30"><div align="left" style="margin-left:20px;"> Subcategoria:</div></td>
      <td width="588">
        <input name="nom_subcategoria" type="text" class="texto5" id="nom_subcategoria" style="font-family:tahoma; font-size:14px; font-weight:normal; width:570px; height:25px;" value="<? echo $nom_subcategoria?>">
      </td>
    </tr>
    <tr>
      <td height="15" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="30"><div align="left" style="margin-left:20px;">Categoria:</div></td>
      <td height="30"><select name="idcategoria" id="idcategoria" style=" font-family:tahoma; font-size:12px; width:570px; height:25px;">
          <?php
			$load_query_="SELECT * FROM categorias ORDER BY nom_categoria DESC";
		  	$query_=mysql_query($load_query_) or die(mysql_error());
			while ($res_=mysql_fetch_array($query_)){
				$sel='';
				$id_=$res_[idcategoria];
				if ($id_==$idcategoria){
					$sel=' selected';
				}
				echo '<option value="'.$id_.'" '.$sel.'>'.$res_[nom_categoria];
			}
		  ?>
            </select></td>
    </tr>
    <tr>
      <td height="15" colspan="2">&nbsp;</td>
    </tr>
    
    
    <tr > 
      <td height="12" colspan="2">&nbsp;</td>
    </tr>
    

    <tr> 
      <td colspan="2"> <div align="right"><span style="font-family:arial; font-size:12px; font-weight:bold; color: #003366">
        <input type="hidden" name="id" id="id" value="<?php echo $id?>">
        <input type="hidden" name="type" id="type" value="<?php echo $type?>">
        <input name="sUB" type="submit"  style="cursor:pointer; font-family:tahoma; font-size:11px; font-weight:normal; color:#fff; height:24px; width:130px; background:#242424" id="sUB" value="ACTUALIZAR VALOR">
      </span>&nbsp;           &nbsp; </div></td>
    </tr>
    <tr> 
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr> 
      <td height="10" colspan="2" bgcolor="#333333">	  </td>
    </tr>
  </form>
</table>
</body>
</html>