<?php include_once "/../conexion.php";

$anilla = $_POST["anillaCria"];
$idCollera = $_POST["idCollera"];
$fechaAnillado = $_POST["fechaAnillado"];
$formatAnillado = date('Y-m-d', strtotime($_POST["fechaAnillado"]));
$fechaDestete = $_POST["fechaDestete"];
$formatDestete = date('Y-m-d', strtotime($_POST["fechaDestete"]));
$nacimiento = $_POST["nacimiento"];
$formatNac = date('Y-m-d', strtotime($_POST["nacimiento"]));
$observaciones = $_POST["observaciones"];

$consult = "UPDATE crias SET
            anilla = '$anilla',
            idCollera = $idCollera,
            fechaAnillado = '$formatAnillado',
            fechaDestete = '$formatDestete',
            nacimiento = '$formatNac',
            observaciones = '$observaciones'
			WHERE anilla = '$anilla';";
			 
$conection->query($consult);
?>
<tr id="<?=$anilla?>">
    <td class="tdIdCollera"><?=$idCollera?></td>
    <td class="tdAnilla"><?=$anilla?></td>
    <td class="tdFechaAnillado"><?=$fechaAnillado?></td>
    <td class="tdFechaDestete"><?=$fechaDestete?></td>
    <td class="tdNacimientoCria"><?=$nacimiento?></td>
    <td class="tdObservacionesCria"><?=$observaciones?></td>
    <td><button type="button" onclick="eliminar('<?=$anilla?>')" class="btn btn-danger botonEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
    <td><button type="button" onclick="editarCria('<?=$anilla?>')" class="btn btn-warning botonEditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
</tr>