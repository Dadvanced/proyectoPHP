<?php include_once "/../conexion.php";
session_start();
?>

    <thread>
        <th>Criador</th><th>Anilla</th><th>Fecha de nacimiento</th><th>Sexo</th><th>Observaciones</th>
        <?php if ($_SESSION["groupUser"] == "admins") {?>
        <th>Eliminar</th><th>Editar</th>
        <?php } ?>
    </thread>
    <tbody class="datos">
<?php
    $consult = $conection->query("SELECT *, DATE_FORMAT(nacimiento, '%d-%m-%Y') AS nacimiento FROM pajaros;");
    while ($res = $consult->fetch_object()) {?>
        <tr id="<?=$res->anilla?>">
            <td class="tdCriador"><?=$res->criador?></td>
            <td class="tdAnilla"><?=$res->anilla?></td>
            <td class="tdNacimiento"><?=$res->nacimiento?></td>
            <td class="tdSexo"><?=$res->sexo?></td>
            <td class="tdObservaciones"><?=$res->observaciones?></td>
            
            <?php if ($_SESSION["groupUser"] == "admins") {?>
            <td><button type="button" onclick="eliminar('<?=$res->anilla?>')" class="btn btn-danger botonEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
            <td><button type="button" onclick="editarPajaro('<?=$res->anilla?>')" class="btn btn-warning botonEditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
            <?php }   ?>
        </tr>
    <?php } 
    mysqli_free_result($consult); 
    $conection->close();
    ?>
    </tbody>