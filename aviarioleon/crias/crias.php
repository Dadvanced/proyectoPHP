<?php include_once "/../conexion.php";
session_start();
?>


    <thread>
        <th>ID Collera</th><th>Anilla</th><th>Fecha de anillado</th>
        <th>Fecha destete</th><th>Fecha de Nacimiento</th>
        <th>Observaciones</th>
        <?php if ($_SESSION["groupUser"] == "admins") {?>
        <th>Eliminar</th><th>Editar</th>
        <?php } ?>
    </thread>
    <tbody class="datos">
<?php
    $consult = $conection->query("SELECT *, DATE_FORMAT(fechaAnillado, '%d-%m-%Y') AS fA, DATE_FORMAT(fechaDestete, '%d-%m-%Y') AS fD, DATE_FORMAT(nacimiento, '%d-%m-%Y') AS nac FROM crias;");
    while ($res = $consult->fetch_object()) {?>
        <tr id="<?=$res->anilla?>">
            <td class="tdIdCollera"><?=$res->idCollera?></td>
            <td class="tdAnilla"><?=$res->anilla?></td>
            <td class="tdFechaAnillado"><?=$res->fA?></td>
            <td class="tdFechaDestete"><?=$res->fD?></td>
            <td class="tdNacimientoCria"><?=$res->nac?></td>
            <td class="tdObservacionesCria"><?=$res->observaciones?></td>
            
            <?php if ($_SESSION["groupUser"] == "admins") {?>
            <td><button type="button" onclick="eliminar('<?=$res->anilla?>')" class="btn btn-danger botonEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
            <td><button type="button" onclick="editarCria('<?=$res->anilla?>')" class="btn btn-warning botonEditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
            <?php } ?>
        </tr>
    <?php } 
    mysqli_free_result($consult); 
    $conection->close();
    ?>
    </tbody>