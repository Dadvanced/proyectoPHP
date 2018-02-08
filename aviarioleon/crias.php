<?php include_once "conexion.php";?>


    <thread>
        <th>ID Collera</th><th>Anilla</th><th>Fecha de anillado</th>
        <th>Fecha destete</th><th>Fecha de Nacimiento</th>
        <th>Observaciones</th>
    </thread>
    <tbody class="datos">
<?php
    $consult = $conection->query("SELECT *, DATE_FORMAT(fechaAnillado, '%d-%m-%Y') AS fA, DATE_FORMAT(fechaDestete, '%d-%m-%Y') AS fD, DATE_FORMAT(nacimiento, '%d-%m-%Y') AS nac FROM crias;");
    while ($res = $consult->fetch_object()) {?>
        <tr>
            <td><?=$res->idCollera?></td>
            <td><?=$res->anilla?></td>
            <td><?=$res->fA?></td>
            <td><?=$res->fD?></td>
            <td><?=$res->nac?></td>
            <td><?=$res->observaciones?></td>
        </tr>
    <?php } mysqli_free_result($consult); ?>
    </tbody>