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

    
	    <div id="main">
            <div class="jumbotron">

                <form action="comprobar.php" method="POST">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <div class="input-group mb-2 mb-sm-0" id="logUser">
                                <div class="input-group-addon"><strong>Usuario</strong> :</div>
                                <input type="txt" name="user" class="form-control" />
                            </div> <!-- Grupo -->
                        </div> <!-- columna -->

                        <div class="col-auto">
                            <div class="input-group mb-2 mb-sm-0" id="logPass">
                                <div class="input-group-addon"><strong>Contraseña</strong> :</div>
                                <input type="password" name="pass" class="form-control" />
                            </div> <!-- Grupo -->
                        </div> <!-- columna -->

                        <div class="col-auto">
                            <button type="submit" id="submit" class="btn btn-primary">Entrar</button>
                        </div> <!-- columna -->
                    </div> <!-- fila -->
                </form> <!-- form -->
            </div> <!-- jumbotron -->
        </div> <!-- main -->
        
    </body>
</html>