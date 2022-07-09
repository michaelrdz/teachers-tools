<?php
global $grp; 
include_once("conexion.php");
 
//variables POST
  	$mat=$_POST['matricula'];
  	$grup=$_POST['grupo'];
 	$grp=$grup;
//registra los datos del empleados
  $sql="DELETE FROM `utags_db`.`alumnos` WHERE (`matricula` = $mat)";
  mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
 
include("consulta.php");
?>