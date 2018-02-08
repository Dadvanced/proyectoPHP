<?php include_once "conexion.php";

$consult = "INSERT INTO `pajaros` (`anilla`, `criador`, `nacimiento`, `sexo`, `observaciones`)
VALUES ('". $_POST["anilla"] ."',
'". $_POST["criador"] ."',
'". $_POST["nacimiento"] ."',
'". $_POST["sexo"] ."',
'". $_POST["observaciones"] ."')";

$conection->query($consult);

?>
<tr>
    <td><?=$_POST["criador"]?></td>
    <td><?=$_POST["anilla"]?></td>
    <td><?=$_POST["nacimiento"]?></td>
    <td><?=$_POST["sexo"]?></td>
    <td><?=$_POST["observaciones"]?></td>
</tr>