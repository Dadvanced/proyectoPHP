<?php include_once "conexion.php";?>


    <thread>
        <th>Criador</th><th>Anilla</th><th>Fecha de nacimiento</th><th>Sexo</th><th>Observaciones</th>
    </thread>
    <tbody class="datos">
<?php
    $consult = $conection->query("SELECT *, DATE_FORMAT(nacimiento, '%d-%m-%Y') AS nacimiento FROM pajaros;");
    while ($res = $consult->fetch_object()) {?>
        <tr>
            <td><?=$res->criador?></td>
            <td><?=$res->anilla?></td>
            <td><?=$res->nacimiento?></td>
            <td><?=$res->sexo?></td>
            <td><?=$res->observaciones?></td>
        </tr>
    <?php } mysqli_free_result($consult); ?>
    </tbody>