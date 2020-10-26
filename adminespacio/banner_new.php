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
$id_grupo_novedad=1;
$path="../web/webimg/";
$a_activos=array("Habilitado"=>1,"Deshabilitado"=>2);
$activo=1;
switch ($type){
	default:
		$type=3;
		$load_query="SELECT * FROM banner ORDER BY orden_banner DESC";
		$query=mysql_query($load_query) or die(mysql_error());
		$res=mysql_fetch_array($query);
		$orden_banner=$res[orden_banner]+1;
	break;
	case 2:
		$load_query="SELECT * FROM banner WHERE id_banner='$id' LIMIT 1";
		$query=mysql_query($load_query) or die(mysql_error());
		$rows=mysql_num_rows($query);
		if ($rows<=0){
			header ("location: banner.php");
			exit;
		}
		$res=mysql_fetch_array($query);
		$id=$res[id_banner];
		$activo=$res[activo];
		$titulo_banner=$res[titulo_banner];		
		$subtitulo_banner=$res[subtitulo_banner];
		$url_banner=$res[url_banner];
		$orden_banner=$res[orden_banner];
//		$img=$res[img];
		$type=4;
	break;
	case 3:
	if (($cbx_1=='1') && (is_uploaded_file($_FILES['file_1']['tmp_name']))){
		$nombre=$_FILES['file_1']['name'];
		$ext=".".end(explode('.',trim($nombre)));
		$name_f=aleatorio(8).$ext;
		copy($_FILES['file_1']['tmp_name'],$path.$name_f);
	}	
		mysql_query("INSERT INTO banner (id_banner, img_banner, titulo_banner, subtitulo_banner, url_banner, orden_banner, activo) VALUES ('', '$name_f', '$titulo_banner', '$subtitulo_banner', '$url_banner', '$orden_banner', '$activo')") or die(mysql_error());
		header ("location: banner.php");
		exit;		
	break;
	case 4:
	if (($cbx_1=='1') && (is_uploaded_file($_FILES['file_1']['tmp_name']))){
		$nombre=$_FILES['file_1']['name'];
		$ext=".".end(explode('.',trim($nombre)));
		$name_f=aleatorio(8).$ext;
		copy($_FILES['file_1']['tmp_name'],$path.$name_f);
		$vWhere=", img_banner='$name_f' ";
	}
		mysql_query("UPDATE banner set titulo_banner='$titulo_banner', subtitulo_banner='$subtitulo_banner', url_banner='$url_banner', orden_banner='$orden_banner', activo='$activo' $vWhere WHERE id_banner='$id' LIMIT 1") or die(mysql_error());
		header ("location: banner.php");
		exit;
	break;
	case 5:
		mysql_query("DELETE FROM banner WHERE id_banner='$id' LIMIT 1") or die(mysql_error());
		header ("location: banner.php");
		exit;	
	break;	
}
$NOM='Banner';
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">



<html>



<head>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">



<title>INTRANET</title>



<link href="../css/style.css" rel="stylesheet" type="text/css">



<script language='javascript' src="../js/funciones.js"></script> 



<script type="text/javascript">



function Valida(form){



var MsgError='';



var Msg=0;



var txtnom_curso=Len(Trim(form1.nom_curso.value));



	if (txtnom_curso<5){



		MsgError = MsgError + "Ingrese Nombre Curso \n";



		Msg=1;		



	}



	if (Msg==1){



		alert(MsgError);



		return false;



	}



	



	form1.submit();



}

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

<script type="text/javascript" src="./ckeditor/ckeditor.js"></script>

<script src="sample.js" type="text/javascript"></script>

<link href="sample.css" rel="stylesheet" type="text/css"/>

<style type="text/css">



<!--



.Estilo1 {



	color: #FFFFFF;



	font-weight: bold;



}



.Estilo2 {color: #FFFFFF}
body {
	background-color: #CCCCCC;
}



-->



</style>



</head>







<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">



<table width="850" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="texto">



<form action="" method="post" enctype="multipart/form-data" name="form1" onSubmit="return Valida(this.form)">





  <tr>



    <td height="80" bgcolor="#FFFFFF"><table width="98%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="82%"><div align="left" style=" margin-left:15px;"><img src="imagenes/logo.png" border="0" /></div></td>
        <td width="18%"><div align="right"><a href="banner.php" style="color:#0000FF; font-family:Arial, Helvetica, sans-serif; font-size:11px;">Regresar</a></div></td>
      </tr>
    </table></td>
  </tr>





  <tr valign="top">
    
    
    
    <td><table width="99%" align="center" cellpadding="0" cellspacing="0">
      
      
      
      <tr class="BackgroudForoIni" >
        
        
        
        <td height="30" bgcolor="#000000"><table width="98%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="8" colspan="3"></td>
          </tr>
          <tr>
            <td width="6%" height="15">&nbsp;</td>
            <td width="22%">&nbsp;</td>
            <td width="72%"><div align="right"> <font style=" color:#FFFFFF; padding-top:5px; font-family:tahoma; font-size:11px; vertical-align:text-top">Banners:</font></div></td>
          </tr>
          <tr>
            <td height="8" colspan="3"></td>
          </tr>
        </table></td>
      </tr>
      
      
      
      
      
      
      
      
      
      
      
      <tr>
        
        
        
        <td height="12" bgcolor="#FFFFFF">		</td>
        </tr>
      
      
      
      <tr>
        
        
        
        <td bgcolor="#FFFFFF"><table width="97%"  border="0" align="center" cellpadding="0" cellspacing="0" style="font-family:Arial, Helvetica, sans-serif; font-size:11px;">
          
          
          
          <?php



				if ($type==2){



					echo '<tr><td>Razon Social </td><td colspan="2">&nbsp;</td></tr>';



					echo '<tr><td colspan="3"><input name="aux_raz" type="text" class="BordeGris" id="aux_raz" size="77" value="'.$aux_raz.'" onchange="this.value=this.value.toUpperCase()"></td></tr>';                



	                echo '<tr><td colspan="3">&nbsp;</td></tr>';



				}



				?>
          
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          
          <tr>
            
            
            
            <td width="100%" colspan="3">Orden:</td>
          </tr>
          
          
          
          <tr>
            
            
            
            <td colspan="3"><input name="orden_banner" type="text" class="BordeGris" id="orden_banner"  value="<?php echo $orden_banner?>" maxlength="250" style=" width:100px;"></td>
            </tr>
          
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">T&iacute;tulo:</td>
          </tr>
          <tr>
            <td colspan="3"><input name="titulo_banner" type="text" class="BordeGris" id="titulo_banner"  value="<?php echo $titulo_banner?>"  style=" width:700px;"></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Subt&iacute;tulo:</td>
          </tr>
          <tr>
            <td colspan="3"><input name="subtitulo_banner" type="text" class="BordeGris" id="subtitulo_banner"  value="<?php echo $subtitulo_banner?>"  style=" width:700px;"></td>
          </tr>
          <tr>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3">Enlace Web:</td>
          </tr>
          <tr>
            <td colspan="3"><input name="url_banner" type="text" class="BordeGris" id="url_banner"  value="<?php echo $url_banner?>"  style=" width:700px;"></td>
          </tr>
          <tr>
            
            <td colspan="3">&nbsp;</td>
          </tr>
          
          <tr>
            
            <td colspan="3">Imagen (1580 pixeles ANCHO x 870 pixeles ALTO)</td>
          </tr>
          
          <tr>
            
            <td colspan="3"><div style=" margin-left:8px;">
              
              <input name="cbx_1" type="checkbox" id="cbx_1" value="1">
              
              <input name="file_1" type="file" id="file_1" size="35" style=" width:700px;" onChange="valid(1)">
              
              </div></td>
            </tr>
          
          
          
          
          
          
          
          
          
          
          
          </table></td>
        </tr>
      
      
      
  <?php



?>
      
      
      
      
      
      
      
      </table></td>
  </tr>



  <tr>



    <td height="10"></td>
  </tr>



  <tr>



    <td height="10"><table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0">



        <tr>



          <td width="25%" height="25">&nbsp;</td>

          <td width="75%"><div align="right" style="margin-right:30px;"><input name="id" type="hidden" id="id" value="<?php echo $id?>">



            <input name="type" type="hidden" id="type" value="<?php echo $type?>">



            <input name="Submit" type="submit" class="boton_ini2" value="GRABAR DATOS" style="background:#333; color:#FFF; height:28px; cursor:pointer; font-family:Arial, Helvetica, sans-serif; font-size:11px;"></div></td>
          </tr>

    </table></td>
  </tr>

  <tr>

    <td height="10"></td>
  </tr>

  <tr>

    <td height="20" bgcolor="#FFFFFF"></td>
  </tr>
</form>
</table>

</body>

</html>