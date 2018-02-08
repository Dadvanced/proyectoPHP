<?php include_once "conexion.php";?>


    <thread>
        <th>Criador</th><th>Nombre</th><th>Dirección</th><th>Teléfono</th><th>Sociedad</th>
    </thread>
    <tbody class="datos">
<?php
    $consult = $conection->query("SELECT * FROM criadores;");
    while ($res = $consult->fetch_object()) { ?>
        <tr>
            <td><?=$res->criador?></td>
            <td><?=$res->nombre?></td>
            <td><?=$res->direccion?></td>
            <td><?=$res->telefono?></td>
            <td><?=$res->sociedad?></td>
        </tr>
    <?php } mysqli_free_result($consult); ?>
    </tbody>