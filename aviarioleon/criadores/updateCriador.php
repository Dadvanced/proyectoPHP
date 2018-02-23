<?php include_once "/../conexion.php";

$criador = $_POST["criador"];
$nombre = $_POST["nombre"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$sociedad = $_POST["sociedad"];

$consult = "UPDATE criadores SET
            criador = '$criador',
            nombre = '$nombre',
            direccion = '$direccion',
            telefono = $telefono,
            sociedad = '$sociedad'
			WHERE criador = '$criador';";
			 
$conection->query($consult);
?>
<tr id="<?=$_POST["criador"]?>">
    <td class="tdCriador"><?=$_POST["criador"]?></td>
    <td class="tdNombre"><?=$_POST["nombre"]?></td>
    <td class="tdDireccion"><?=$_POST["direccion"]?></td>
    <td class="tdTelefono"><?=$_POST["telefono"]?></td>
    <td class="tdSociedad"><?=$_POST["sociedad"]?></td>
    <td><button type="button" onclick="eliminar('<?=$_POST["criador"]?>')" class="btn btn-danger botonEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
    <td><button type="button" onclick="editar('<?=$_POST["criador"]?>')" class="btn btn-warning botonEditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
</tr>