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

//devuelve el último registro de una tabla (probar)
function lastData($campo, $tabla) {
    global $conection;
    $consult = $conection->query("SELECT $campo FROM $tabla
    ORDER BY $campo 
    DESC LIMIT 1;");

    return($consult);
}
    
//comprueba si el pajaro a eliminar existe en la tabla collera
function checkBird($anilla) {
    $consult = $conection->query("SELECT * FROM unioncollera WHERE id = $id;");
    if (mysql_num_rows($consult)>0) {
        return true;
    } else {
        return false;
    }
}