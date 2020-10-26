<?php
date_default_timezone_set('America/Lima');
function isImage($path)
    {
    $imageSizeArray = getimagesize($path);
    $imageTypeArray = $imageSizeArray[2];
 
    return (bool)(in_array($imageTypeArray , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)));
    }
function restringearchivos($fileName){
	$fileName = strtolower(trim($fileName));
	$whitelist = array('jpg', 'png', 'gif', 'jpeg'); //example of white list
	$backlist = array('php', 'php3', 'php4', 'phtml','exe'); //example of black list
	if(!in_array(end(explode('.', $fileName)), $whitelist))	{
		echo 'Tipo de archivos Invalido';
		return false;
		exit(0);
	}
	if(in_array(end(explode('.', $fileName)), $backlist)){
		echo 'Tipo de archivos Invalido';
		return false;
		exit(0);
	}
	return true;
}
function XVideo($id){
	$load_query="select * from espacios_web where id_espacio='$id' limit 1";
	$query=mysql_query($load_query) or die(mysql_error());
	$res=mysql_fetch_array($query);
	$path="../admin/webdata/";
	$imagenp=$path.$res[imagen];
	$videoX=$res[ruta_video];
	$titulop=$res[titulo];
	$textop=substr(strip_tags($res[texto]),0,600);
	$txtT ='<table width="615" border="0" cellspacing="0" cellpadding="0">';
	$txtT .='<tr>';
	$txtT .='<td width="375"><script type="text/javascript" src="swfobject.js"></script><div id="container"></div>';
	$txtT .='<script type="text/javascript">'."\r\n";
	$txtT .='var s1 = new SWFObject("player-viral.swf","ply","370","300","9","#FFFFFF");'."\r\n";
	$txtT .='	s1.addParam("allowfullscreen","true");'."\r\n";
	$txtT .='	s1.addParam("allownetworking","all");'."\r\n";
	//		s1.addParam("allowscriptaccess","always");
	$txtT .='	s1.addParam("stretching","uniform");'."\r\n";
	$txtT .='	s1.addParam("flashvars","file='.$videoX.'&skin=modieus.swf&stretching=uniform&image='.$imagenp.'");'."\r\n";
	$txtT .='	s1.write("container");'."\r\n";
	$txtT .='</script>'."\r\n";
	$txtT .='</td>';
	$txtT .='<td width="240"><div align="justify" style=" margin-left:8px; margin-right:8px; font-family:trebuchet MS; font-size:14px; font-weight:bold; margin-top:1px">'.$titulop.'</div>';
	$txtT .='<div align="justify" style=" margin-left:8px; margin-right:8px; font-family:trebuchet MS; font-size:12px; margin-top:10px">'.$textop.'</div></td>';
	$txtT .='</tr>';
	$txtT .='</table>';
	return $txtT;
}
function aleatorio($long){
	for ($i=1; $i<=$long; $i++){ 
		$arand = chr(rand(65,90)); 
		$arandP .= $arand;
	}
	return $arandP;
}
function dir_ip(){
	return getenv("REMOTE_ADDR");
}
function format_fech($fecha_i,$format_i){
//	$fecha_i_exp=explode("-",$fecha_i);
//	$dia_=decimal($fecha_i_exp[2],0);
//	$mes_=decimal($fecha_i_exp[1],0);
//	$ano_=$fecha_i_exp[0];
//	if (!checkdate($mes_,$dia_,$ano_)){
//		return "";
//	}
	$data = strtotime($fecha_i);
	$data=date($format_i,$data);
	
	$mes_search=array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$mes_replace=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$data=str_replace($mes_search,$mes_replace,$data);
	
	$arraysearch=array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
	$arrayreplace=array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado");
	$data=str_replace($arraysearch,$arrayreplace,$data);
	
	return $data;
}

function fech_conv($fecha_ii,$sep){
	$ffech=explode($sep,$fecha_ii);
	return $ffech[2]."-".$ffech[1]."-".$ffech[0];
}
function decimal($ncantidad,$ndecimales)
{
	$n_dosdec = '%4.'.$ndecimales.'f';
	$dosdec= sprintf($n_dosdec, $ncantidad);
	$dosdec =  round($dosdec, $ndecimales);
	$dosdec = number_format($ncantidad, $ndecimales ,"."," ");
	return ($dosdec);
}
function resta_dias($fec,$ndias){
	$data = strtotime($fec);
	$sumf = strtotime("-$ndias days", $data);
	return date("Y-m-d",$sumf);
}
function da_mes($nmes){
	$nmes=decimal($nmes,0);
	$ames=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	return $ames[$nmes];
}
function sendMSGweb($xid){
	$load_query="SELECT a.*,b.motivo FROM web_msg a LEFT JOIN web_msg_motivos b ON a.id_motivo=b.id_motivo WHERE a.id='".$xid."' LIMIT 1";
	$query=mysql_query($load_query) or die(mysql_error());
	$rows=mysql_num_rows($query);
	if ($rows<=0){
		return false;
	}
	$res=mysql_fetch_array($query);
	$xnombres=$res[nombres];
	$xemail=$res[email];
	$xmensaje=$res[mensaje];
	$xmotivo=$res[motivo];
	$xtelefono=$res[telefono];
	$xfecha=format_fech($res[fecha],"d/m/Y");
	$xhora=format_fech($res[hora],"g:i a");
	$msg ='<table width="620" border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:tahoma; font-size:12px; color:#000000">';
	$msg .= '<tr><td height="30" colspan="4" bgcolor="#F5F5F5"><div align="left" style=" margin-left:10px; font-family:tahoma; font-size:12px;"><strong>Datos del Mensaje</strong></div></td></tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Fecha - Hora:</b></div></td>';
	$msg .='<td colspan="3">'.$xfecha.' - '.$xhora.'</td>';
	$msg .='</tr>';

	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Motivo de Contacto:</b></div></td>';
	$msg .='<td colspan="3">'.$xmotivo.'</td>';
	$msg .='</tr>';
	
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Nombres y Apellidos:</b></div></td>';
	$msg .='<td colspan="3">'.$xnombres.'</td>';
	$msg .='</tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>E-mail:</b></div></td>';
	$msg .='<td colspan="3">'.$xemail.'</td>';
	$msg .='</tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Telefs.:</b></div></td>';
	$msg .='<td colspan="3">'.$xtelefono.'</td>';
	$msg .='</tr>';
	$msg .='<tr>';
	$msg .='<td height="35"><div align="left"><b>Mensaje:</b></div></td>';
	$msg .='<td colspan="3">'.$xmensaje.'</td>';
	$msg .='</tr>';
	$msg .='</table>';

	$xtitulo=$xmotivo.' [desde GRUPOACROPOLIS.COM.PE]';
	$oSendM = $xemail;
	$Ounit ='gerencia@grupoacropolis.com.pe';
	if (mail($Ounit,$xtitulo,$msg,"From: $oSendM\nContent-Type: text/html; charset=iso-8859-1")){
		mysql_query("UPDATE web_msg SET enviado='1' WHERE id='$xid' LIMIT 1") or die(mysql_error());
		return true;
	}
}
function sendMSGweb_software($xid,$tit_=""){
	$load_query="SELECT a.*,b.motivo FROM descarga_software a LEFT JOIN web_msg_motivos b ON a.id_motivo=b.id_motivo WHERE a.id='".$xid."' LIMIT 1";
	$query=mysql_query($load_query) or die(mysql_error());
	$rows=mysql_num_rows($query);
	if ($rows<=0){
		return false;
	}
	$res=mysql_fetch_array($query);
	$xnombres=$res[nombres];
	$xemail=$res[email];
	$xmensaje=$res[mensaje];
	$xmotivo=$res[motivo];
	$xtelefono=$res[telefono];
	$xfecha=format_fech($res[fecha],"d/m/Y");
	$xhora=format_fech($res[hora],"g:i a");
	$msg ='<table width="620" border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:tahoma; font-size:12px; color:#000000">';
	$msg .= '<tr><td height="30" colspan="4" bgcolor="#F5F5F5"><div align="left" style=" margin-left:10px; font-family:tahoma; font-size:12px;"><strong>Datos del Mensaje</strong></div></td></tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Fecha - Hora:</b></div></td>';
	$msg .='<td colspan="3">'.$xfecha.' - '.$xhora.'</td>';
	$msg .='</tr>';

	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Referencia:</b></div></td>';
	$msg .='<td colspan="3">'.tit_.'</td>';
	$msg .='</tr>';
	
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Nombres y Apellidos:</b></div></td>';
	$msg .='<td colspan="3">'.$xnombres.'</td>';
	$msg .='</tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>E-mail:</b></div></td>';
	$msg .='<td colspan="3">'.$xemail.'</td>';
	$msg .='</tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Telefono Fijo.:</b></div></td>';
	$msg .='<td colspan="3">'.$xtelefono.'</td>';
	$msg .='</tr>';
	$msg .='</table>';

	$xtitulo='DESCARGA DE LIBRO '.$tit_.' [desde GRUPOACROPOLIS.COM.PE]';
	$oSendM = $xemail;
	$Ounit ='informes@grupoacropolis.com.pe';
	if (mail($Ounit,$xtitulo,$msg,"From: $oSendM\nContent-Type: text/html; charset=iso-8859-1")){
		mysql_query("UPDATE descarga_software SET enviado='1' WHERE id='$xid' LIMIT 1") or die(mysql_error());
		return true;
	}
}
function sendMSGweb_software_xemail($xid,$tit_=""){
	$load_query="SELECT a.*,b.motivo,c.nom_ciudad FROM descarga_software a LEFT JOIN web_msg_motivos b ON a.id_motivo=b.id_motivo LEFT JOIN ciudades c ON a.id_ciudad=c.id_ciudad WHERE a.id='".$xid."' LIMIT 1";
	$query=mysql_query($load_query) or die(mysql_error());
	$rows=mysql_num_rows($query);
	if ($rows<=0){
		return false;
	}
	$res=mysql_fetch_array($query);
	$xnombres=$res[nombres];
	$xemail=$res[email];
	$xmensaje=$res[mensaje];
	$xmotivo=$res[motivo];
	$nom_ciudad=$res[nom_ciudad];
	$xtelefono=$res[telefono];
	$xcelular=$res[celular];	
	$xfecha=format_fech($res[fecha],"d/m/Y");
	$xhora=format_fech($res[hora],"g:i a");
	$msg ='<table width="620" border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:tahoma; font-size:12px; color:#000000">';
	$msg .= '<tr><td height="30" colspan="4" bgcolor="#F5F5F5"><div align="left" style=" margin-left:10px; font-family:tahoma; font-size:12px;"><strong>Datos del Mensaje</strong></div></td></tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Fecha - Hora:</b></div></td>';
	$msg .='<td colspan="3">'.$xfecha.' - '.$xhora.'</td>';
	$msg .='</tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Nombres y Apellidos:</b></div></td>';
	$msg .='<td colspan="3">'.$xnombres.'</td>';
	$msg .='</tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>E-mail:</b></div></td>';
	$msg .='<td colspan="3">'.$xemail.'</td>';
	$msg .='</tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Telefs.:</b></div></td>';
	$msg .='<td colspan="3">'.$xtelefono.'</td>';
	$msg .='</tr>';
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Telefs.:</b></div></td>';
	$msg .='<td colspan="3">'.$xcelular.'</td>';
	$msg .='</tr>';	
	$msg .='<tr>';
	$msg .='<td width="124" height="35"><div align="left"><b>Ciudad:</b></div></td>';
	$msg .='<td colspan="3">'.$nom_ciudad.'</td>';
	$msg .='</tr>';
	$msg .='</table>';
	
	$msg_enlace ='<table width="620" border="0" align="center" cellpadding="0" cellspacing="0" style=" font-family:tahoma; font-size:12px; color:#000000">';
	$msg_enlace .= '<tr><td height="30" bgcolor="#F5F5F5"><div align="left" style=" margin-left:10px; font-family:tahoma; font-size:12px;"><strong>Enlace de Descarga</strong></div></td></tr>';
	$msg_enlace .='<tr>';
	$msg_enlace .='<td height="35"><div align="left">Estimado '.$xnombres.';<br>Se envía el enlace de descarga gratuita del libro '.$tit_.', por favor hacer clic en el link debajo:<br><br>';
	$msg_enlace .='<a href="http://www.grupoacropolis.com.pe/web/lib_gra_ELABORACION_INTERPRETACION_NUEVOS_EEFF.pdf" target="_Blank" style=" font-family:verdana; font-size:15px;">Haga Clic Aquí para Descargar</a>';
	$msg_enlace .='</div></td>';
	$msg_enlace .='</tr>';
	$msg_enlace .='</table>';

	$xtitulo='DESCARGA GRATUITA '.$tit_.' [desde GRUPOACROPOLIS.COM.PE]';
	$oSendM = $xemail;
	$Ounit ='eventosperu@grupoacropolis.com.pe';
	mail($xemail,$xtitulo,$msg_enlace,"From: $Ounit\nContent-Type: text/html; charset=iso-8859-1");
	if (mail($Ounit,$xtitulo,$msg,"From: $oSendM\nContent-Type: text/html; charset=iso-8859-1")){
		mysql_query("UPDATE descarga_software SET enviado='1' WHERE id='$xid' LIMIT 1") or die(mysql_error());
		return true;
	}
}
?>