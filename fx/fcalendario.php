<?php
function calendario($dia,$mes,$ano){
	extract($_REQUEST);
	$fecha = getdate(time());
	if(!isset($dia)){
		$dia=$fecha['mday'];
	}
	if(!isset($mes)){
		$mes = $fecha['mon'];
	}
	if(!isset($ano)){
		$ano = $fecha['year'];
	}
	$fecha = mktime(0,0,0,$mes,$dia,$ano);
	$fechaInicioMes = mktime(0,0,0,$mes,1,$ano);
	$fechaInicioMes = date("w",$fechaInicioMes);
	
	$tableCalend ='<table border="0" align="center" cellpadding="2" cellspacing="0" width="95%" bgcolor="#FFFFFF" height="95%" style=" font-family:tahoma; font-size:12px;">';
	$diasSem = array ('L','M','M','J','V','S','D');
	$ultimoDia = date('t',$fecha);
	$numMes = 0;
	for ($fila = 0; $fila < 7; $fila++){
	  $tableCalend .= "      <tr>\n";
	  for ($coln = 0; $coln < 7; $coln++){
		$posicion = array (1,2,3,4,5,6,0);
		$tableCalend .= '<td width="14%" height="19"';
		if($fila == 0) {
			$tableCalend .=' bgcolor="#EE7B81"';
		} 
		if($dia-1 == $numMes){
			$tableCalend .= ' bgcolor="#E11D25"';	
		}
		$tableCalend .= " align=\"center\">\n";
		$tableCalend .= '        ';
		if($fila == 0)
			$tableCalend .= '<font color="#fffff">'.$diasSem[$coln];
		elseif(
			($numMes && $numMes < $ultimoDia) || (!$numMes && $posicion[$coln] == $fechaInicioMes))
		{
		  $tableCalend .= '<a href="http://www.jusboletin.com/web/jusboletin.php?fecha='.$ano.'-'.$mes.'-'.(++$numMes).'" class="lnk">';
		
		if($dia == $numMes){
			$tableCalend .= '<font color="#FFFFFF">';
		}
			$tableCalend .= ($numMes).'</a>';
		}
		$tableCalend .= "</td>\n";
	  }
	  $tableCalend .= "</tr>\n";
	} 
	$tableCalend .= '</table>';
	return $tableCalend;
}
?>