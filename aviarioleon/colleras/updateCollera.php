<?php include_once "conexion.php";

$idUnion = $_POST["idUnionCollera"];
$fechaCollera = $_POST["fechaCollera"];
$anillaM = $_POST["anillaM"];
$anillaH = $_POST["anillaH"];
$cI = $_POST["cI"]; // comienzo incubacion
$nuevoCI = date('Y-m-d', strtotime($_POST["cI"]));
$eP = $_POST["eP"]; // eclosion preevista
$nuevaEP = date('Y-m-d', strtotime($_POST["eP"]));
$p1 = $_POST["p1"]; // postura 1
$p2 = $_POST["p2"];
$p3 = $_POST["p3"];
$jaula = $_POST["jaula"];
$observaciones = $_POST["observaciones"];

$consult = "UPDATE unioncollera SET
anillaMacho = '$anillaM',
anillaHembra = '$anillaH'
WHERE idUnion = $idUnion;";

$conection->query($consult);

$consult2 = "UPDATE colleras SET
            comienzoIncubacion = '$nuevoCI',
            eclosionPrevista = '$nuevaEP',
            postura1 = $p1,
            postura2 = $p2,
            postura3 = $p3,
            jaula = $jaula,
            observaciones = '$observaciones'
			WHERE idUnion = $idUnion;";
			 
$conection->query($consult2);
?>
<tr id="<?=$idUnion?>">
    <td class="tdIdUnion"><?=$idUnion?></td>
    <th class="tdFechaCollera"><?=$fechaCollera?></th>
    <td class="tdCi"><?=$cI?></td>
    <td class="tdEp"><?=$eP?></td>
    <td class="tdPostura1"><?=$p1?></td>
    <td class="tdPostura2"><?=$p2?></td>
    <td class="tdPostura3"><?=$p3?></td>
    <td class="tdJaula"><?=$jaula?></td>
    <td class="tdObservaciones"><?=$observaciones?></td>
    <input type="hidden" class="colleraMacho" value="<?=$anillaM?>"/>
    <input type="hidden" class="colleraHembra" value="<?=$anillaH?>"/>
    <input type="hidden" class="idUnionCollera" value="<?=$idUnion?>"/>
    <td><button type="button" onclick="eliminar('<?=$idUnion?>')" class="btn btn-danger botonEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
    <td><button type="button" onclick="editarCollera('<?=$idUnion?>')" class="btn btn-warning botonEditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
</tr>