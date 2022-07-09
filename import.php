<?php
include_once("conexion.php");
if(isset($_POST['import_data'])){
// validate to check uploaded file is a valid csv file
$file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'],$file_mimes)){
if(is_uploaded_file($_FILES['file']['tmp_name'])){
$csv_file = fopen($_FILES['file']['tmp_name'], 'r');
//fgetcsv($csv_file);
// get data records from csv file
while(($emp_record = fgetcsv($csv_file)) !== FALSE){
// Check if employee already exists with same email
$sql_query = "SELECT matricula, Nombre, correo, grupos_idgrupos FROM alumnos WHERE matricula = ".$emp_record[0]."";
$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
// if employee already exist then update details otherwise insert new record
if(mysqli_num_rows($resultset)) {
$sql_update = "UPDATE alumnos set Nombre='".$emp_record[1]."', correo='".$emp_record[2]."', grupos_idgrupos='1' WHERE matricula=".$emp_record[0]."";
mysqli_query($conn, $sql_update) or die("database error:". mysqli_error($conn));
} else{
$mysql_insert = "INSERT INTO alumnos (matricula, Nombre, correo, grupos_idgrupos )VALUES(".$emp_record[0].", '".$emp_record[1]."', '".$emp_record[2]."', '1')";
mysqli_query($conn, $mysql_insert) or die("database error:". mysqli_error($conn));
}
}
fclose($csv_file);
$import_status = '?import_status=success';
} else {
$import_status = '?import_status=error';
}
} else {
$import_status = '?import_status=invalid_file';
}
}
header("Location: lista_alumnos.php".$import_status);
?>