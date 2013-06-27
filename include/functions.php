<?php

function curso_actual() {
	$anyo_actual=date('Y');
	$curso_actual=$anyo_actual;
	$mes_actual=date('n');
	if( $mes_actual<9 ){
		$curso_actual--;
	}
	return $curso_actual;
}

function semestre_actual() {
	$mes_actual=date('n');
	$semestre_actual=1;
	if( $mes_actual>1 && $mes_actual<9 ) {
		$semestre_actual=2;
	}
	return $semestre_actual;
}

function dos_ceros($x) {
	if($x=="0") {
		return "00";	
	} else {
		return $x;
	}
}

?>