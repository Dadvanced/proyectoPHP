<?php include_once "conexion.php";

//devuelve el último ID de la tabla colleras
function lastIdUnion() {
    global $conection;
    $consult = $conection->query("SELECT * FROM colleras;");
    while ($res = $consult->fetch_object()) {
        $idUnion = $res->idUnion;
    }

    $idUnion++;
    return($idUnion);
}

//devuelve el último registro de una tabla
function lastData($campo, $tabla) {
    global $conection;
    $consult = $conection->query("SELECT $campo FROM $tabla
    ORDER BY $campo 
    DESC LIMIT 1;");

    return($consult);
}
    