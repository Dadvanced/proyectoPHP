<?php include_once "conexion.php";?>


    <thread>
        <th>ID Unión</th><th>Fecha Unión</th><th>Comienzo Incubación</th>
        <th>Eclosión prevista</th><th>Postura 1</th>
        <th>Postura 2</th><th>Postura 3</th>
        <th>Jaula</th><th>Observaciones</th>
    </thread>
    <tbody class="datos">
<?php
    $consult = $conection->query("SELECT *, DATE_FORMAT(comienzoIncubacion, '%d-%m-%Y') AS cI, DATE_FORMAT(eclosionPrevista, '%d-%m-%Y') AS eP FROM colleras;");
    while ($res = $consult->fetch_object()) {
        $consult2 = $conection->query("SELECT *, DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha FROM unioncollera
        WHERE `idUnion` = $res->idUnion;");?>
        <tr>
            <td><?=$res->idUnion?></td>
            <th><?=$consult2->fetch_object()->fecha?></th>
            <td><?=$res->cI?></td>
            <td><?=$res->eP?></td>
            <td><?=$res->postura1?></td>
            <td><?=$res->postura2?></td>
            <td><?=$res->postura3?></td>
            <td><?=$res->jaula?></td>
            <td><?=$res->observaciones?></td>
        </tr>
    <?php } mysqli_free_result($consult); ?>
    </tbody>