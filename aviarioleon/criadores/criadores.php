<?php include_once "/../conexion.php";
session_start();
?>


    <thread>
        <th>Criador</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Sociedad</th>
        <?php if ($_SESSION["groupUser"] == "admins") {?>
            <th>Eliminar</th><th>Editar</th>
        <?php } ?>
    </thread>
    <tbody class="datos">
<?php
    $consult = $conection->query("SELECT * FROM criadores;");
    while ($res = $consult->fetch_object()) { ?>
        <tr id="<?=$res->criador?>">
            <td class="tdCriador"><?=$res->criador?></td>
            <td class="tdNombre"><?=$res->nombre?></td>
            <td class="tdDireccion"><?=$res->direccion?></td>
            <td class="tdTelefono"><?=$res->telefono?></td>
            <td class="tdSociedad"><?=$res->sociedad?></td>

            <?php if ($_SESSION["groupUser"] == "admins") {?>
            <td><button type="button" onclick="eliminar('<?=$res->criador?>')" class="btn btn-danger botonEliminar"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>
            <td><button type="button" onclick="editarCriador('<?=$res->criador?>')" class="btn btn-warning botonEditar"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
            <?php }   ?>
        </tr>
    <?php } 
    mysqli_free_result($consult);
    $conection->close(); ?>
    </tbody>