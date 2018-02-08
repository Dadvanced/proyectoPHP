<?php
$conection = new mysqli("localhost", "root", "");

if ($conection->connect_errno > 0) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $conection->connect_error);
} else {
        $conection->select_db("AVIARIOLEON");
        $conection->set_charset("utf8");
}