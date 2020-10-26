<?php

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past

header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

header("Cache-Control: no-store, no-cache, must-revalidate");  // HTTP/1.1

header("Cache-Control: post-check=0, pre-check=0", false);

header("Pragma: no-cache");                          // HTTP/1.0

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<meta name="description" content="Somos un equipo de profesionales formado por Arquitectos, Ingenieros, Especialistas en Comunicación y Profesionales en Gestión de Proyectos con especialización en Accesibilidad y Diseño Universal para Todos, comprometidos con nuestros objetivos para el desarrollo de proyectos donde LAS PERSONAS son el componente principal a través del diseño universal e inclusivo." />	

<meta name="robots" content="Diseño universal, Diseño para todos, Estudio de accesibilidad , Estudios de accesibilidad, Accesibilidad en el Perú, Empresa de accesibilidad, Accesibilidad , Arquitectura accesible, A120, Plano accesible, Pictograma, Perú accesible, Negocio accesible, Web accesible, Turismo accesible, Centros comerciales, Cine accesible, Documental accesible, Publicidad accesible, Señalética, Tecnología accesible, discapacidad y accesibilidad perú, comunicación accesible perú, transporte accesible perú" />

 

<meta name="googlebot" content="Diseño universal, Diseño para todos, Estudio de accesibilidad , Estudios de accesibilidad, Accesibilidad en el Perú, Empresa de accesibilidad, Accesibilidad , Arquitectura accesible, A120, Plano accesible, Pictograma, Perú accesible, Negocio accesible, Web accesible, Turismo accesible, Centros comerciales, Cine accesible, Documental accesible, Publicidad accesible, Señalética, Tecnología accesible, discapacidad y accesibilidad perú, comunicación accesible perú, transporte accesible perú" />

<style>

.textol { font-family:tahoma; font-size:9px; color:#FFFFFF}

a:hover.textol {font-family:tahoma; font-size:9px; color:#FFFFFF; text-decoration:underline}

a.textol {font-family:tahoma; font-size:9px; color:#FFFFFF; text-decoration:none}

</style>

<title></title>

<?php

echo '<script language="javascript">'."\r\n";

echo 'var leftrightslide=new Array()'."\r\n";

$i=0;

$alogos=array("001"=>"logo1.png","002"=>"7.png","003"=>"daas-group.png","004"=>"logo1.png","005"=>"7.png","006"=>"daas-group.png","007"=>"logo1.png","008"=>"7.png","009"=>"daas-group.png");

foreach ($alogos as $key=>$value){

	echo 'leftrightslide['.$i.'] ='."'".'<img src="img/carrusel/'.$value.'" border="0" class="BordeColor">'."'"."\r\n";

	/*

	echo 'leftrightslide['.$i.'] ='."'".'<a href="'.$key.'" target="_Blank"><img src="img/carrusel/'.$value.'" border="0" class="BordeColor"></a>'."'"."\r\n";

	*/

	$i++;

}

echo '</script>';

?>

<script language="javascript">

//Specify the slider's width (in pixels)

var sliderwidth="1125px"

//Specify the slider's height

var sliderheight="110px"

//Specify the slider's slide speed (larger is faster 1-10)

var slidespeed=1

//configure background color:

slidebgcolor="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"



//Specify the slider's images

var finalslide='#0000ff'



//Specify gap between each image (use HTML):

//var imagegap="&nbsp;&nbsp;&nbsp;&nbsp;"

var imagegap="&nbsp;&nbsp;&nbsp;&nbsp;"



//Specify pixels gap between each slideshow rotation (use integer):

var slideshowgap=1





////NO NEED TO EDIT BELOW THIS LINE////////////



var copyspeed=slidespeed

leftrightslide='<nobr>'+leftrightslide.join(imagegap)+'</nobr>'

var iedom=document.all||document.getElementById

if (iedom)

document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">'+leftrightslide+'</span>')

var actualwidth=''

var cross_slide, ns_slide



function fillup(){

if (iedom){

cross_slide=document.getElementById? document.getElementById("test2") : document.all.test2

cross_slide2=document.getElementById? document.getElementById("test3") : document.all.test3

cross_slide.innerHTML=cross_slide2.innerHTML=leftrightslide

actualwidth=document.all? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth

cross_slide2.style.left=actualwidth+slideshowgap+"px"

}

else if (document.layers){

ns_slide=document.ns_slidemenu.document.ns_slidemenu2

ns_slide2=document.ns_slidemenu.document.ns_slidemenu3

ns_slide.document.write(leftrightslide)

ns_slide.document.close()

actualwidth=ns_slide.document.width

ns_slide2.left=actualwidth+slideshowgap

ns_slide2.document.write(leftrightslide)

ns_slide2.document.close()

}

lefttime=setInterval("slideleft()",30)

}

window.onload=fillup



function slideleft(){

if (iedom){

if (parseInt(cross_slide.style.left)>(actualwidth*(-1)+8))

cross_slide.style.left=parseInt(cross_slide.style.left)-copyspeed+"px"

else

cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth+slideshowgap+"px"



if (parseInt(cross_slide2.style.left)>(actualwidth*(-1)+8))

cross_slide2.style.left=parseInt(cross_slide2.style.left)-copyspeed+"px"

else

cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth+slideshowgap+"px"



}

else if (document.layers){

if (ns_slide.left>(actualwidth*(-1)+8))

ns_slide.left-=copyspeed

else

ns_slide.left=ns_slide2.left+actualwidth+slideshowgap



if (ns_slide2.left>(actualwidth*(-1)+8))

ns_slide2.left-=copyspeed

else

ns_slide2.left=ns_slide.left+actualwidth+slideshowgap

}

}





if (iedom||document.layers){

with (document){

document.write('<table border="0" cellspacing="0" cellpadding="0"><td>')

if (iedom){

write('<div style="position:relative;width:'+sliderwidth+';height:'+sliderheight+';overflow:hidden">')

write('<div style="position:absolute;width:'+sliderwidth+';height:'+sliderheight+';background-color:'+slidebgcolor+'" onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed">')

write('<div id="test2" style="position:absolute;left:0px;top:0px"></div>')

write('<div id="test3" style="position:absolute;left:-1000px;top:0px"></div>')

write('</div></div>')

}

else if (document.layers){

write('<ilayer width='+sliderwidth+' height='+sliderheight+' name="ns_slidemenu" bgColor='+slidebgcolor+'>')

write('<layer name="ns_slidemenu2" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')

write('<layer name="ns_slidemenu3" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')

write('</ilayer>')

}

document.write('</td></table>')

}

}

</script>

</head>

<body>

<!--"006"=>"006.jpg",-->

</body>

</html>

