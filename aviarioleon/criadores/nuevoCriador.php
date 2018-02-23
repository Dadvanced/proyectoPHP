<?php include_once "/../conexion.php";

$consult = "INSERT INTO `criadores` (`criador`, `nombre`, `direccion`, `telefono`, `sociedad`)
VALUES ('". $_POST["criador"] ."',
'". $_POST["nombre"] ."',
'". $_POST["direccion"] ."',
". $_POST["telefono"] .",
'". $_POST["sociedad"] ."')";

$conection->query($consult);

?>
<tr>
    <td><?=$_POST["criador"]?></td>
    <td><?=$_POST["nombre"]?></td>
    <td><?=$_POST["direccion"]?></td>
    <td><?=$_POST["telefono"]?></td>
    <td><?=$_POST["sociedad"]?></td>
</tr>