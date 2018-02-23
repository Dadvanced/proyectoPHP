<?php include_once "/../conexion.php";
session_start();
?>


    <thread>
        <th>ID Unión</th><th>Fecha Unión</th><th>Comienzo Incubación</th>
        <th>Eclosión prevista</th><th>Postura 1</th>
        <th>Postura 2</th><th>Postura 3</th>
        <th>Jaula</th><th>Observaciones</th>
        <?php if ($_SESSION["groupUser"] == "admins") {?>
        <th>Eliminar</th><th>Editar</th>
        <?php } ?>
    </thread>
    <tbody class="datos">
<?php
    $consult = $conection->query("SELECT *, DATE_FORMAT(comienzoIncubacion, '%d-%m-%Y') AS cI, DATE_FORMAT(eclosionPrevista, '%d-%m-%Y') AS eP FROM colleras;");
    while ($res = $consult->fetch_object()) {
        $consult2 = $conection->query("SELECT *, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha FROM unioncollera
        WHERE `idUnion` = $res->idUnion;");
        $res2 = $consult2->fetch_object();?>
        <tr id="<?=$res->idUnion?>">
            <td class="tdIdUnion"><?=$res->idUnion?></td>
            <th class="tdFechaCollera"><?=$res2->fecha?></th>
            <td class="tdCi"><?=$res->cI?></td>
            <td class="tdEp"><?=$res->eP?></td>
            <td class="tdPostura1"><?=$res->postura1?></td>
            <td class="tdPostura2"><?=$res->postura2?></td>
            <td class="tdPostura3"><?=$res->postura3?></td>
            <td class="tdJaula"><?=$res->jaula?></td>
            <td class="tdObservaciones"><?=$res->observaciones?></td>
            <input type="hidden" class="colleraMacho" value="<?=$res2->anillaMacho?>"/>
            <input type="hidden" class="colleraHembra" value="<?=$res2->anillaHembra?>"/>
            <input type="hidden" class="idUnionCollera" value="<?=$res->idUnion?>"/>
            
            <?php if ($_SESSION["groupUser"] == "admins") {?>
            <td><button type="button" onclick="eliminar('<?=$res->idUnion?>')" class="btn btn-danger botonEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
            <td><button type="button" onclick="editarCollera('<?=$res->idUnion?>')" class="btn btn-warning botonEditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
            <?php }   ?>
        </tr>
    <?php } mysqli_free_result($consult); ?>
    </tbody>