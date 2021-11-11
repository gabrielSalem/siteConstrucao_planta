<?php
function subtrairDataMysql($data1, $data2){
	$tempo_inicial 	= strtotime($data1);
	$tempo_final 	= strtotime($data2);
	$diferenca 		= $tempo_final - $tempo_inicial; // resultado em segundos
	$dias = (int) floor($diferenca / (60 * 60 * 24));
	
	return $dias;
}

function somarDataMysql($data, $dias=0, $meses=0, $ano=0){
	$data = explode("-",$data);	
	$soma = date("Y-m-d", mktime(0,0,0, $data[1] + $meses, $data[2] + $dias , $data[0] + $ano));	
	return $soma;
}

function ultimoDiaMes($data){
	//Recebe o formato dd/mm/yyyy e retorna Y-m-d
	list($dia, $mes, $ano) = explode("/", $data);
	return date("Y-m-d", mktime(0,0,0,$mes +1,0,$ano));
}

function primeiroDiaMes($data){
	//Recebe o formato dd/mm/yyyy e retorna Y-m-d
	list($dia, $mes, $ano) = explode("/", $data);
	return $ano . "-" .$mes ."-"."01";
}