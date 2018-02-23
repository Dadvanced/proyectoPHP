<?php include_once "/../conexion.php";

$criador = $_POST["criador"];
$anilla = $_POST["anilla"];
$nacimiento = $_POST["nacimiento"];
    //formateamos la fecha "nacimiento" para que coincida con la BBDD
$nuevoNac = date('Y-m-d', strtotime($_POST["nacimiento"]));
$sexo = $_POST["sexo"];
$observaciones = $_POST["observaciones"];

$consult = "UPDATE pajaros SET
            criador = '$criador',
            anilla = '$anilla',
            nacimiento = '$nuevoNac',
            sexo = '$sexo',
            observaciones = '$observaciones'
			WHERE anilla = '$anilla';";
			 
$conection->query($consult);
?>
<tr id="<?=$anilla?>">
    <td class="tdCriador"><?=$criador?></td>
    <td class="tdAnilla"><?=$anilla?></td>
    <td class="tdNacimiento"><?=$nacimiento?></td>
    <td class="tdSexo"><?=$sexo?></td>
    <td class="tdObservaciones"><?=$observaciones?></td>
    <td><button type="button" onclick="eliminar('<?=$anilla?>')" class="btn btn-danger botonEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
    <td><button type="button" onclick="editarPajaro('<?=$anilla?>')" class="btn btn-warning botonEditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
</tr>