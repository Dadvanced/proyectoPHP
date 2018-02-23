<?php include "conexion.php";


$user = $conection->real_escape_string($_POST["user"]);
$pass = $conection->real_escape_string($_POST["pass"]);
$mensaje = "";

$login = $conection->query("SELECT * FROM usuarios WHERE usr = '$user' AND pass = '$pass'");

if ($login->num_rows == 0) {
    $mensaje = "Error en usuario o contraseña.";
    header("refresh: 3; url=login.php");
}

if ($login->num_rows) { //si la consulta anterior devuelve una columna, quiere decir que coinciden
    $mensaje = "<h3>Ha iniciado sesión correctamente. Redirigiendo...</h3>";
    session_start();
    $_SESSION["time"] = time();
    $_SESSION["user"] = $user;
    $_SESSION["groupUser"] = $login->fetch_object()->grupo;
    header("refresh: 2; url=index.php");
 }
?>

<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Aviario León</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
        <link rel="stylesheet" href="style.css">
        <!-- <script src"js/jquery-3.3.1.js"></script>  JQUERY LOCAL--> 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>

    </head>



    <body>
        <span id="banner"><img src="img/bird.png"></img></span>
        <span class="title">Aviario León</span>

    
        <div>
            <h3 id="cuerpoMensaje"><?php echo $mensaje; ?>
            
            </h3>
        </div>

    </body>
</html>