<?php 
include_once("conexion.php");
if(!empty($_GET['import_status'])) {
    switch($_GET['import_status']) {
        case 'success':
            $message_stauts_class = 'alert-success';
            $import_status_message = 'La lista se importó correctamente.';
            break;
        case 'error':
            $message_stauts_class = 'alert-danger';
            $import_status_message = 'Error al importar';
            break;
        case 'invalid_file':
            $message_stauts_class = 'alert-danger';
            $import_status_message = 'Error: Utilice un archivo .CSV válido';
            break;
        default:
            $message_stauts_class = '';
            $import_status_message = '';
    }
}
global $grp;
$grp='1'; 

?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de alumnos</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Michael Rodríguez, Karen Rodríguez, Luis Alberto Gonzalez, Emmanuel Reyes Jines" />
    <meta name="Description" content="Juego piedra, papel, tijera, lagarto y Spock. Proyecto del curso Básico de JavaScript de Platzi">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="scripts/ajax.js"></script>
</head>
<body>
<header>
	<div id="menu">
		<div id="menu_logo">
			<a href="#">
				<img alt="logo" src="imgs/logo_utools.png">
			</a>
		</div>
		<div id="menu_btns">
			<a class="menu_btn menu_btn-1">Inicio</a>
			<a class="menu_btn menu_btn-3">Salir</a> 
		</div>
	</div>
</header>
<div class="container">
<div class="panel panel-default">
<div class="panel-body">
	<div id="cont_botonera">
		<a href="grupos.php">
			<img class="btn_atras" src="imgs/ico_back_blanco.png"> Regresar a grupos
		</a>
	</div>
	<h1>Lista de alumnos</h1>
<br>
<div class="row">
<form name="nuevo_alumno" action="" onsubmit="enviarDatosAlumno(); return false" style="padding-left: 25px;">
	<input type="number" id="numb_matricula" name="numb_matricula" placeholder="Matrícula">
	<input type="text" id="txt_nombre" name="txt_nombre" placeholder="Nombre completo">
	<input type="email" id="txt_correo" name="txt_correo" placeholder="Correo"><br><br>
	<input type="text" id="txt_grupo" name="grupo" placeholder="TICASI8A">
	<input type="hidden" id="grp_hidden" name="grp_hidden" value="<?php echo $grp; ?>">
	<input type="hidden" id="´mat_hidden" name="mat_hidden" value=""><br><br>
	<input type="submit" name="Submit" class="btn btn-primary" value="Actualizar" />
</form>
<br>
<form action="import.php" method="post" enctype="multipart/form-data" id="import_form" style="padding-left: 25px;">
<input type="file" name="file" />
<br>
<input type="submit" class="btn btn-primary" name="import_data" value="Importar">
</form>
</div>
<br>
<?php if(!empty($import_status_message)){
        echo '<div class="alert '.$message_stauts_class.'">'.$import_status_message.'</div>';
    } ?>
<br>
<div class="row" id="resultado"><?php include("consulta.php");?></div>
</div>
</div>
</div>
<footer>
	<div id="pie_logo">
		<img src="imgs/utags_logoverde.png">
	</div>
</footer>
</body>
</html>