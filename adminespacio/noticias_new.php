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

if (strlen(trim($fecha))<=3){

$fecha=date("Y-m-d");

}

$path="../web/webimg/";

switch ($type){

default: //Nuevo Registro

	$type=3;

	$titut="Nuevo Registro";

	$predefinido=1;

break;

case 2: //Editar Registro

	$load_query="select * from noticias where id_noticia='".$id."' limit 1";

	$query=mysql_query($load_query) or die(mysql_error());

	$num_rows=mysql_num_rows($query);

	if ($num_rows<1){

		echo "Lo Sentimos, No se ha Encontrado el Registro Deseado";

		exit;

	}

	$res=mysql_fetch_array($query);

	$id=$res[id_noticia];

	$titulo=$res[titulo];

	$texto=$res[texto];

	$id_area_noti=$res[id_area_noti];	

	$fecha=$res[fecha];

	$tags=$res[tags];		

	$type_=2;

	$type=4;

break;

case 3: //Insertar Nuevo Registro

	$sumilla=str_replace("\n","<br>",$sumilla);

	if (($cbx_1=='1') && (is_uploaded_file($_FILES['file_1']['tmp_name']))){

		$tmp_name=$_FILES['file_1']['tmp_name'];

		$nombre=$_FILES['file_1']['name'];

		$exp_nombre=explode(".",$nombre);

		$ext=".".end($exp_nombre);

		$name_f=$fecha.'_'.aleatorio(8).$ext;

		copy($_FILES['file_1']['tmp_name'],$path.$name_f);

	}



	$load_query="INSERT INTO noticias (id_noticia, imagen, titulo, texto, fecha,id_area_noti,tags) 

								VALUES ('', '$name_f', '$titulo', '$texto','$fecha','$id_area_noti','$tags')";

	mysql_query($load_query) or die(mysql_error());

	header ("location: noticias.php");

	break;

case 4: //Actualizar Valores

	$sumilla=str_replace("\n","<br>",$sumilla);

	if (($cbx_1=='1') && (is_uploaded_file($_FILES['file_1']['tmp_name']))){

		$tmp_name=$_FILES['file_1']['tmp_name'];

		$nombre=$_FILES['file_1']['name'];

		$exp_nombre=explode(".",$nombre);

		$ext=".".end($exp_nombre);

		$name_f=$fecha.'_'.aleatorio(8).$ext;

		copy($_FILES['file_1']['tmp_name'],$path.$name_f);

		$vwhereI=", imagen='$name_f'";

	}



	$load_query="UPDATE noticias set id_area_noti='$id_area_noti', titulo='$titulo', tags='$tags', texto='$texto', fecha='$fecha' $vwhereI WHERE id_noticia='$id' LIMIT 1";

	mysql_query($load_query) or die(mysql_error());

	header ("location: noticias.php");

	exit;

	break;

}

?>

<html>

<head>

<title></title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script>

function valid(i){

	box = eval("document.form1.cbx_" +  i); 

	if (eval("document.form1.file_" + i + ".value") == "" || eval("document.form1.file_" + i + ".value")==" "){

		box.checked = false;

	}

	else {

		box.checked = true;

	}

}

function fillSelectFromArray(selectCtrl, itemArray, goodPrompt, badPrompt, defaultItem) {

var i, j;

var prompt;

for (i = selectCtrl.options.length; i >= 0; i--) {

selectCtrl.options[i] = null; 

}

prompt = (itemArray != null) ? goodPrompt : badPrompt;

if (prompt == null) {

j = 0;

}

else {

selectCtrl.options[0] = new Option(prompt);

j = 1;

}

if (itemArray != null) {

for (i = 0; i < itemArray.length; i++) {

selectCtrl.options[j] = new Option(itemArray[i][0]);

if (itemArray[i][1] != null) {

selectCtrl.options[j].value = itemArray[i][1]; 

}

j++;

}

selectCtrl.options[0].selected = true;

   }

}

</script>

<!--<script src="https://cdn.ckeditor.com/4.7.2/standard/ckeditor.js"></script>-->

<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<script src="sample.js" type="text/javascript"></script>
<link href="sample.css" rel="stylesheet" type="text/css"/>


<style type="text/css">

<!--

body {

	background-color: #f5f5f5;

}

-->

</style>

</head>

<body bottommargin="0" leftmargin="0" marginwidth="0"  rightmargin="0" topmargin="0">



<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="FFFFFF" class="texto">



  <form name="form1" action="" method="post" enctype="multipart/form-data">



  <tr>



    <td width="760" height="60" colspan="2" bgcolor="ffffff"><div align="left" style=" margin-left:10px; font-family:tahoma; font-size:11px;"><a href="noticias.php" style="color:#0000FF">Regresar</a></div></td>



  </tr>



  <tr>



    <td height="26" colspan="2" bgcolor="#990000"><div align="center" style=" font-family:tahoma; font-size:12px; margin-right:20px; color:#FFFFFF">



      <div align="right"><?php echo $titut?></div>



    </div></td>



  </tr>



  



  <tr>



    <td height="12" colspan="2">    </td>



  </tr>



  <tr>



    <td height="50" colspan="2"><table width="938" border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:tahoma; font-size:12px;">



      



      <tr>

        <td width="107" height="1"></td>

        <td width="317"></td>

        <td width="172"></td>

        <td width="342"></td>

      </tr>    

      

      <tr>

        <td height="45"><strong>&Aacute;rea:</strong></td>

        <td colspan="3"><select name="id_area_noti" id="id_area_noti" style=" font-family:tahoma; font-size:12px; width:600px; height:25px;">

          <?php

			$load_query_="SELECT * FROM areas_noticias ORDER BY nom_area_noti ASC";

		  	$query_=mysql_query($load_query_) or die(mysql_error());

			while ($res_=mysql_fetch_array($query_)){

				$sel='';

				$id_=$res_[id];

				if ($id_==$id_area_noti){

					$sel=' selected';

				}

				echo '<option value="'.$id_.'" '.$sel.'>'.$res_[nom_area_noti];

			}

		  ?>

        </select></td>

      </tr>

      <tr>



        <td height="45"><strong>Titulo:</strong></td>



        <td colspan="3"><input type="text" name="titulo" id="titulo" style=" font-family:tahoma; font-size:12px; width:600px; height:25px; ;" value="<?php echo $titulo?>" /></td>

      </tr>



      





      







   <?php

/*      <tr>

        

        <td height="45"><strong>Orden:</strong></td>

        

        <td><input type="text" name="orden" id="orden" style=" font-family:tahoma; font-size:12px; width:110px; height:25px; ;" value="<?php echo $orden?>" /></td>

        <td>&nbsp;</td>

        <td>&nbsp;</td>

      </tr>*/

	  ?>

      

      <tr>

        <td height="45"><strong>Texto:</strong></td>

        <td colspan="3"><textarea name="texto" id="texto" cols="45" rows="2" style="width:600px"><?php echo $texto?></textarea>

          <script type="text/javascript">

			CKEDITOR.replace( 'texto' );

		  </script>

          </td>

      </tr>



      <tr>

        <td height="55"><strong>Fecha:</strong></td>

        <td colspan="3"><input type="text" name="fecha" id="fecha" style=" font-family:tahoma; font-size:12px; width:100px; height:25px; ;" value="<?php echo $fecha?>" /></td>

      </tr>

      <tr>

        <td height="55"><strong>Imagen:<br>

        </strong>720 x 340 Pixeles</td>

        <td colspan="3"><input name="cbx_1" type="checkbox" id="cbx_1" value="1">

          <input name="file_1" type="file" id="file_1" size="35" style="font-family:tahoma; font-size:12px; background-color:#f5f5f5" onChange="valid(1)"></td>

      </tr>

      

      <tr>

        <td height="55"><strong>Tags:</strong></td>

        <td colspan="3"><input type="text" name="tags" id="tags" style=" font-family:tahoma; font-size:12px; width:600px; height:25px; ;" value="<?php echo $tags?>" /></td>

      </tr>

      <tr>



        <td height="55">&nbsp;</td>



        <td colspan="3"><div align="right" style=" margin-right:70px;">



          <input type="submit" name="button" id="button" value="Grabar" style=" cursor:pointer; width:100px; height:25px;  font-family:tahoma; color: #990000; font-size:11px; background:#FFDDDD" />



          <input type="hidden" name="type" id="type" value="<?php echo $type?>">



          <input type="hidden" name="id" id="id" value="<?php echo $id?>">



        </div></td>

      </tr>



    </table></td>



  </tr>



  <tr>



    <td height="12" colspan="2"></td>



  </tr>



  



  <tr bgcolor="#1A487A">



    <td height="10" colspan="2" bgcolor="#990000"></td>



  </tr>



</form>



</table>



</body>



</html>