<?php 

/*=============================================
FORMATEAR URL
=============================================*/

function limpiar_url($url) {
  // Tranformamos todo a minusculas
  $url = strtolower($url);
  //Rememplazamos caracteres especiales latinos
  $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
  $repl = array('a', 'e', 'i', 'o', 'u', 'n');
  $url = str_replace ($find, $repl, $url);
  // Añadimos los guiones
  $find = array(' ', '&', '\r\n', '\n', '+'); 
  $url = str_replace ($find, '-', $url);
  // Eliminamos y Reemplazamos demás caracteres especiales
  $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
  $repl = array('', '-', '');
  $url = preg_replace ($find, $repl, $url);
  
  return $url;
}

/*=============================================
FORMATEAR FECHA
=============================================*/

function created ($created) {
  $created = substr($created, 0, 10);
  $numeroDia = date('d', strtotime($created));
  $dia = date('l', strtotime($created));
  $mes = date('F', strtotime($created));
  $anio = date('Y', strtotime($created));
  $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
  $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
  $nombredia = str_replace($dias_EN, $dias_ES, $dia);
$meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
  $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
  return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
}