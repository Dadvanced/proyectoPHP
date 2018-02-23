<?php include_once "/../conexion.php";
include_once "/../funciones.php";


$consult = "INSERT INTO `unioncollera` (`anillaMacho`, `anillaHembra`, `fecha`)
VALUES ('". $_POST["anillaM"] ."',
'". $_POST["anillaH"] ."',
'". $_POST["fechaUnion"] ."')";

//obtenemos el último ID de la tabla "unioncollera"
$idUnion = lastIdUnion(); 

$conection->query($consult); //insert unioncollera

//usamos el último ID para insertarlo a "colleras"
$consult2 = "INSERT INTO `colleras` (`idUnion`, `comienzoIncubacion`, `eclosionPrevista`, `postura1`, `postura2`, `postura3`, `jaula`, `observaciones`)
VALUES (".$idUnion.",
'". $_POST["cI"] ."',
'". $_POST["eP"] ."',
". $_POST["p1"] .",
". $_POST["p2"] .",
". $_POST["p3"] .",
". $_POST["jaula"] .",
'". $_POST["observaciones"] ."')";

$conection->query($consult2); //insert colleras

?>
<tr>
    <td><?=$idUnion?></td>
    <td><?=$_POST["fechaUnion"]?></td>
    <td><?=$_POST["cI"]?></td>
    <td><?=$_POST["eP"]?></td>
    <td><?=$_POST["p1"]?></td>
    <td><?=$_POST["p2"]?></td>
    <td><?=$_POST["p3"]?></td>
    <td><?=$_POST["jaula"]?></td>
    <td><?=$_POST["observaciones"]?></td>
</tr>