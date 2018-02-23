<?php include_once "conexion.php";
include_once "funciones.php";

$id = $_POST["id"];
$tabla = $_POST["tabla"];
$campo = ""; //campo que obtiene la clave primaria de la tabla

if ($tabla == "pajaros") {
    $campo = "anilla";
} else if ($tabla == "crias") {
    $campo = "anilla";
} else if ($tabla == "criadores") {
    $campo = "criador";
} else if ($tabla == "colleras") {
    $campo = "idUnion";
    $tabla = "unioncollera";

    $cons = "DELETE FROM colleras WHERE idUnion = '$id'";
    $conection->query($cons);
}

/*if (checkBird($id)) {
    echo "<h1>ese pájaro ya existe</h2>";
} else {
    $consult = "DELETE FROM $tabla WHERE anilla = '$id'";
    $conection->query($consult);
}*/

$consult = "DELETE FROM $tabla WHERE $campo = '$id'";
    $conection->query($consult);

    $conection->close();