<?php include_once "conexion.php";

$consult = "INSERT INTO `crias` (`anilla`, `idCollera`, `fechaAnillado`, `fechaDestete`, `nacimiento`, `observaciones`)
VALUES ('". $_POST["anillaCria"] ."',
". $_POST["idColleraCria"] .",
'". $_POST["fechaAnillado"] ."',
'".$_POST["fechaDestete"] ."',
'".$_POST["nacimientoCria"] ."',
'".$_POST["observacionesCria"] ."')";

$conection->query($consult); 

?>
<tr>
    <td><?=$_POST["idColleraCria"]?></td>
    <td><?=$_POST["anillaCria"]?></td>
    <td><?=$_POST["fechaAnillado"]?></td>
    <td><?=$_POST["fechaDestete"]?></td>
    <td><?=$_POST["nacimientoCria"]?></td>
    <td><?=$_POST["observacionesCria"]?></td>
</tr>