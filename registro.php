<?php

include_once("conexion.php");
 	if (isset($_POST['matriculaAnt'])) {
		//variables POST
		$mat=$_POST['matricula'];
		$matAnt=$_POST['matriculaAnt'];
	  	$nom=$_POST['nombre'];
	  	$cor=$_POST['correo'];
	  	$grp=$_POST['grupo'];

	  	$sql="UPDATE alumnos set matricula=".$mat.", Nombre='".$nom."', correo='".$cor."' where matricula =".$matAnt."";
		mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));		  		
  	}
  	else {
  		//variables POST
		$mat=$_POST['matricula'];
	  	$nom=$_POST['nombre'];
	  	$cor=$_POST['correo'];
	  	$grp=$_POST['grupo'];  			

	  	$sql="INSERT INTO alumnos (matricula, Nombre, correo, grupos_idgrupos) VALUES ($mat,'$nom', '$cor', '$grp')";
  		mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));		
  	}
	//registra los datos del empleados
	/*$resultset=$query="SELECT * from alumnos where matricula = $mat";
	if(mysqli_num_rows($resultset)) {
		
	}
	else {
		
	}*/
  
 
include("consulta.php");
?>