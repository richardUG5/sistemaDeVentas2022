<?php

function formatearFecha($fecha)
{
	/*2022-07-28 11:17:04*/
	$dia=substr($fecha,8,2);
	$mes=substr($fecha,5,2);
	$anio=substr($fecha,0,4); // 0=inicio y 4=fin (nro digitos)
	$hora=substr($fecha,11,5);
	$fechaformateada=$dia."/".$mes."/".$anio;
	return $fechaformateada;
}
function estado($nota)
{
	if($nota>=61)
	{
		$estado="APROBADO";
	}
	else
	{
		$estado="REPROBADO";
	}
	return $estado;
}

?>