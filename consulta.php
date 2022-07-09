<table class="table table-bordered">
<thead>
<tr>
<th>matricula</th>
<th>Nombre</th>
<th>Correo</th>
<th colspan="2">Opciones</th>
</tr>
</thead>
<tbody>
<?php
include_once("conexion.php");

$sql = "SELECT matricula, Nombre, correo FROM alumnos where grupos_idgrupos like '".$grp."' ORDER BY matricula DESC";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
if(mysqli_num_rows($resultset)) {
while( $rows = mysqli_fetch_assoc($resultset) ) {
?>
<tr>
<td><?php echo $rows['matricula']; ?></td>
<td><?php echo $rows['Nombre']; ?></td>
<td><?php echo $rows['correo']; ?></td>
<td style="text-align: center;"><a onclick="editaDato(<?=$rows['matricula']; ?>, '<?=$rows['Nombre']; ?>', '<?=$rows['correo']; ?>');"><img alt="Editar" class="icon_tab" src="imgs/ico_edit.png"></a></td>
<td style="text-align: center;"><a onclick="borrarDato(<?=$rows['matricula'];?>);"><img alt="Borrar" class="icon_tab" src="imgs/icoEliminaAlumno.png"></a></td>

</tr>
<?php } } else { ?>
<tr><td colspan="5">No hay alumnos en lista.....</td></tr>
<?php } ?>
</tbody>
</table>