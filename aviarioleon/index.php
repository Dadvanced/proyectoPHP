<?php
    session_start();

    if (time() - $_SESSION["time"] > 1800) {
        $mensaje = "Su sesión ha expirado, volviendo al login.";
    } else {
        include_once "conexion.php";
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
        <script type="text/javascript" src="js/script.js"></script>
        
        <script>
            $(document).ready(function() {
                $(".fecha").datepicker({
                    firstDay: 1,
                    dateFormat: "yy-mm-dd",
                });

                $("#divNuevoCriador").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 400,
                    width: 350,
                    show: {
                        effect: "drop",
                        direction: "up",    
                    },
                    hide: {
                        effect: "drop",
                        direction: "down",
                    },
                    modal: true,
                    buttons: [
                        {
                            text: "Guardar",
                            click: function() {
                                $.post("criadores/nuevoCriador.php", {
                                    "criador":$("#criador").val(),
                                    "nombre":$("#nombre").val(),
                                    "direccion":$("#direccion").val(),
                                    "telefono":$("#telefono").val(),
                                    "sociedad":$("#sociedad").val()
                                }, function(result){
                                    $("#table1 tbody.datos").append(result);
                                    $("#table1").css("background-color", "white");                                        
                                }), 
                                $(this).dialog("close");                               
                            },
                        },
                        {
                            text: "Cancelar",
                            click: function() {
                                $(this).dialog("close");
                            }
                        }
                    ]//buttons                  
                })

                $("#divEditaCriador").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 400,
                    width: 350,
                    show: {
                        effect: "drop",
                        direction: "up",    
                    },
                    hide: {
                        effect: "drop",
                        direction: "down",
                    },
                    modal: true,
                    buttons: [
                        {
                            text: "Actualizar",
                            click: function() {
                                $.post("criadores/updateCriador.php", {
                                    "criador":$("#eCriador").val(),
                                    "nombre":$("#eNombre").val(),
                                    "direccion":$("#eDireccion").val(),
                                    "telefono":$("#eTelefono").val(),
                                    "sociedad":$("#eSociedad").val()
                                }, function(result){
                                    trId = $("#eCriador").val(); //recoge el valor actual del inputId
                                    $("#" + trId).fadeOut(); //hace desaparecer el TR del registro eliminado
                                    $("#table1 tbody.datos").append(result);
                                    $("#table1").css("background-color", "white");                                        
                                }), 
                                $(this).dialog("close");                               
                            },
                        },
                        {
                            text: "Cancelar",
                            click: function() {
                                $(this).dialog("close");
                            }
                        }
                    ]//buttons                  
                })


                $("#divNuevoPajaro").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 330,
                    width: 350,
                    show: {
                        effect: "drop",
                        direction: "up",    
                    },
                    hide: {
                        effect: "drop",
                        direction: "down",
                    },
                    modal: true,
                    buttons: [
                        {
                            text: "Guardar",
                            click: function() {
                                $.post("pajaros/nuevoPajaro.php", {
                                    "criador":$("#criadorPajaro").val(),
                                    "anilla":$("#anilla").val(),
                                    "nacimiento":$("#nacimiento").val(),
                                    "sexo":$("#sexo").val(),
                                    "observaciones":$("#observaciones").val()
                                }, function(result){
                                    $("#table1 tbody.datos").append(result);
                                    $("#table1").css("background-color", "white");                                        
                                }), 
                                $(this).dialog("close");                               
                            },
                        },
                        {
                            text: "Cancelar",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    ]//buttons                  
                })

                $("#divEditaPajaro").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 330,
                    width: 350,
                    show: {
                        effect: "drop",
                        direction: "up",    
                    },
                    hide: {
                        effect: "drop",
                        direction: "down",
                    },
                    modal: true,
                    buttons: [
                        {
                            text: "Actualizar",
                            click: function() {
                                $.post("pajaros/updatePajaro.php", {
                                    "criador":$("#eCriadorPajaro").val(),
                                    "anilla":$("#eAnilla").val(),
                                    "nacimiento":$("#eNacimiento").val(),
                                    "sexo":$("#eSexo").val(),
                                    "observaciones":$("#eObservaciones").val()
                                }, function(result){
                                    trId = $("#eAnilla").val(); //recoge el valor actual del inputId
                                    $("#" + trId).fadeOut(); //hace desaparecer el TR del registro eliminado
                                    $("#table1 tbody.datos").append(result);
                                    $("#table1").css("background-color", "white");                                        
                                }), 
                                $(this).dialog("close");                               
                            },
                        },
                        {
                            text: "Cancelar",
                            click: function() {
                                $(this).dialog("close");
                            }
                        }
                    ]//buttons                  
                })



                $("#divNuevaCollera").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 530,
                    width: 350,
                    show: {
                        effect: "drop",
                        direction: "up",    
                    },
                    hide: {
                        effect: "drop",
                        direction: "down",
                    },
                    modal: true,
                    buttons: [
                        {
                            text: "Guardar",
                            click: function() {
                                var d = new Date();
                                var date = d.getFullYear() + "-" + (d.getMonth() +1) + "-" + d.getDate();
                                $.post("colleras/nuevaCollera.php", {
                                    "anillaM":$("#anillaMacho").val(),
                                    "anillaH":$("#anillaHembra").val(),
                                    "fechaUnion":(date),
                                    "cI":$("#comienzoIncubacion").val(),
                                    "eP":$("#eclosionPrevista").val(),
                                    "p1":$("#postura1").val(),
                                    "p2":$("#postura2").val(),
                                    "p3":$("#postura3").val(),
                                    "jaula":$("#jaula").val(),
                                    "observaciones":$("#obsCollera").val()
                                }, function(result){
                                    $("#table1 tbody.datos").append(result);
                                    $("#table1").css("background-color", "white");                                        
                                }), 
                                $(this).dialog("close");                               
                            },
                        },
                        {
                            text: "Cancelar",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    ]//buttons                  
                })

                $("#divEditaCollera").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 530,
                    width: 350,
                    show: {
                        effect: "drop",
                        direction: "up",    
                    },
                    hide: {
                        effect: "drop",
                        direction: "down",
                    },
                    modal: true,
                    buttons: [
                        {
                            text: "Actualizar",
                            click: function() {
                                var d = new Date();
                                var date = d.getFullYear() + "-" + (d.getMonth() +1) + "-" + d.getDate();
                                $.post("colleras/updateCollera.php", {
                                    "fechaCollera":$("#inputFechaCollera").val(),
                                    "idUnionCollera":$("#inputIdCollera").val(),
                                    "anillaM":$("#eAnillaMacho").val(),
                                    "anillaH":$("#eAnillaHembra").val(),
                                    "cI":$("#eComienzoIncubacion").val(),
                                    "eP":$("#eEclosionPrevista").val(),
                                    "p1":$("#ePostura1").val(),
                                    "p2":$("#ePostura2").val(),
                                    "p3":$("#ePostura3").val(),
                                    "jaula":$("#eJaula").val(),
                                    "observaciones":$("#eObsCollera").val()
                                }, function(result){
                                    trId = $(".idUnionCollera").val(); //recoge el valor actual del inputId
                                    $("#" + trId).fadeOut(); //hace desaparecer el TR del registro eliminado
                                    $("#table1 tbody.datos").append(result);
                                    $("#table1").css("background-color", "white");                                        
                                }), 
                                $(this).dialog("close");                               
                            },
                        },
                        {
                            text: "Cancelar",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    ]//buttons                  
                })

                $("#divNuevaCria").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 430,
                    width: 350,
                    show: {
                        effect: "drop",
                        direction: "up",    
                    },
                    hide: {
                        effect: "drop",
                        direction: "down",
                    },
                    modal: true,
                    buttons: [
                        {
                            text: "Guardar",
                            click: function() {
                                $.post("crias/nuevaCria.php", {
                                    "anillaCria":$("#anillaCria").val(),
                                    "idColleraCria":$("#idColleraCria").val(),
                                    "fechaAnillado":$("#fechaAnillado").val(),
                                    "fechaDestete":$("#fechaDestete").val(),
                                    "nacimientoCria":$("#nacimientoCria").val(),
                                    "observacionesCria":$("#observacionesCria").val()
                                }, function(result){
                                    $("#table1 tbody.datos").append(result);
                                    $("#table1").css("background-color", "white");                                        
                                }),
                                $( this ).dialog( "close" );
                            }
                        },
                        {
                            text: "Cancelar",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    ]//buttons                  
                })

                $("#divEditaCria").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 430,
                    width: 350,
                    show: {
                        effect: "drop",
                        direction: "up",    
                    },
                    hide: {
                        effect: "drop",
                        direction: "down",
                    },
                    modal: true,
                    buttons: [
                        {
                            text: "Actualizar",
                            click: function() {
                                $.post("crias/updateCria.php", {
                                    "anillaCria":$("#eAnillaCria").val(),
                                    "idCollera":$("#eIdColleraCria").val(),
                                    "fechaAnillado":$("#eFechaAnillado").val(),
                                    "fechaDestete":$("#eFechaDestete").val(),
                                    "nacimiento":$("#eNacimientoCria").val(),
                                    "observaciones":$("#eObservacionesCria").val()
                                }, function(result){
                                    trId = $("#eAnillaCria").val(); //recoge el valor actual del inputId
                                    $("#" + trId).fadeOut(); //hace desaparecer el TR del registro eliminado
                                    $("#table1 tbody.datos").append(result);
                                    $("#table1").css("background-color", "white");                                        
                                }), 
                                $(this).dialog("close");                               
                            },
                        },
                        {
                            text: "Cancelar",
                            click: function() {
                                $(this).dialog("close");
                            }
                        }
                    ]//buttons                  
                })

                $("#eliminar").dialog({
                    autoOpen: false,
                    resizable: false,
                    height: 220,
                    width: 390,
                    show: {
                        effect: "drop",
                        direction: "up",    
                    },
                    hide: {
                        effect: "drop",
                        direction: "down",
                    },
                    modal: true,
                    buttons: [
                        {
                            text: "Eliminar",
                            click: function() {
                                $.post("eliminar.php", {
                                    "id":$("#inputId").val(),
                                    "tabla":$("#inputTable").val()
                                }, function(result){
                                    trId = $("#inputId").val(); //recoge el valor actual del inputId
                                    $("#" + trId).fadeOut(); //hace desaparecer el TR del registro eliminado
                                    $("#table1").css("background-color", "white");                                        
                                }),
                                $( this ).dialog( "close" );
                            }
                        },
                        {
                            text: "Cancelar",
                            click: function() {
                                $( this ).dialog( "close" );
                            }
                        }
                    ]//buttons                  
                })

            })//document ready

            function nuevoCriador() {
                $("#divNuevoCriador").dialog("open");
            }

            function nuevoPajaro() {
                $("#divNuevoPajaro").dialog("open");
            }
            
            function nuevaCollera() {
                $("#divNuevaCollera").dialog("open");
            }

            function nuevaCria() {
                $("#divNuevaCria").dialog("open");
            }

            function editarCriador(id) {
                $("#eCriador").val($("#"+id+">td.tdCriador").html());
                $("#eNombre").val($("#"+id+">td.tdNombre").html());
                $("#eDireccion").val($("#"+id+">td.tdDireccion").html());
                $("#eTelefono").val($("#"+id+">td.tdTelefono").html());
                $("#eSociedad").val($("#"+id+">td.tdSociedad").html());
                $("#divEditaCriador").dialog("open");
            }

            function editarPajaro(id) {
                $("#eCriadorPajaro").val($("#"+id+">td.tdCriador").html());
                $("#eAnilla").val($("#"+id+">td.tdAnilla").html());
                $("#eNacimiento").val($("#"+id+">td.tdNacimiento").html());
                $("#eSexo").val($("#"+id+">td.tdSexo").html());
                $("#eObservaciones").val($("#"+id+">td.tdObservaciones").html());
                $("#divEditaPajaro").dialog("open");
            }

            function editarCria(id) {
                $("#eIdColleraCria").val($("#"+id+">td.tdIdCollera").html());
                $("#eAnillaCria").val($("#"+id+">td.tdAnilla").html());
                $("#eFechaAnillado").val($("#"+id+">td.tdFechaAnillado").html());
                $("#eFechaDestete").val($("#"+id+">td.tdFechaDestete").html());
                $("#eNacimientoCria").val($("#"+id+">td.tdNacimientoCria").html());
                $("#eObservacionesCria").val($("#"+id+">td.tdObservacionesCria").html());
                $("#divEditaCria").dialog("open");
            }

            function editarCollera(id) {
                $("#inputIdCollera").val(id);
                $("#inputFechaCollera").val($("#"+id+">th.tdFechaCollera").html());
                $("#eAnillaMacho").val($("#"+id+">.colleraMacho").val());
                $("#eAnillaHembra").val($("#"+id+">.colleraHembra").val());
                $("#eComienzoIncubacion").val($("#"+id+">td.tdCi").html());
                $("#eEclosionPrevista").val($("#"+id+">td.tdEp").html());
                $("#ePostura1").val($("#"+id+">td.tdPostura1").html());
                $("#ePostura2").val($("#"+id+">td.tdPostura2").html());
                $("#ePostura3").val($("#"+id+">td.tdPostura3").html());
                $("#eJaula").val($("#"+id+">td.tdJaula").html());
                $("#eObsCollera").val($("#"+id+">td.tdObservaciones").html());
                $("#divEditaCollera").dialog("open");
            }

            function changeTable(tabla) {
                $("#inputTable").val(tabla); //cambiamos el valor del input hidden tabla
            }

            function eliminar(id) {
                tabla = $("#inputTable").val(); //recogemos valor del input hidden tabla
                $("#inputId").val(id); //modificamos el valor del input hidden ID
                console.log(id); //comprobamos su valor en la consola
                console.log(tabla); //comprobamos su valor en la consola
                $("#parrafoEliminar").html("¿Estás seguro de que desea eliminar " + id + "?");
                $("#parrafoEliminar2").html("De la tabla " + tabla);
                $("#eliminar").dialog("open");
            }

        </script>
    </head>


    <body>
        <span id="banner"><img src="img/bird.png"></img></span>
        <span class="title">Aviario León</span>
        <span id="log">
            <span>Has logueado como:</span>
            <span><?=$_SESSION["user"]?></span>
            <span> <a href="login.php">Cerrar sesión</a> </span>
        </span>
        <input type="button" class="btn btn-success fecha" id="mostrarFecha" value="Fecha">
        
                <!-- MENU -->
        <div class="container">
            <div class="btn-group btn-group-lg" role="group">
                <button type="button" class="btn btn-info buttonMenu" onclick="changeTable('criadores')" data-url="criadores/criadores.php" data-btn="#nuevoCriador">Mostrar criadores</button>
                <button type="button" class="btn btn-info buttonMenu" onclick="changeTable('pajaros')" data-url="pajaros/pajaros.php" data-btn="#nuevoPajaro">Mostrar pájaros</button>
                <button type="button" class="btn btn-info buttonMenu" onclick="changeTable('colleras')" data-url="colleras/colleras.php" data-btn="#nuevaCollera">Mostrar colleras</button>
                <button type="button" class="btn btn-info buttonMenu" onclick="changeTable('crias')" data-url="crias/crias.php" data-btn="#nuevaCria">Mostrar crías</button>
            </div>
                <!-- /MENU -->

                <!-- BUTTONS GROUP ADD NEW -->
                <?php if ($_SESSION["groupUser"] == "admins") {?>
            <button type="button" class="btn btn-lg btn-success" id="nuevoCriador" onclick="nuevoCriador()">Añadir criador</button>
            <button type="button" class="btn btn-lg btn-success" id="nuevoPajaro" onclick="nuevoPajaro()">Añadir pájaro</button>
            <button type="button" class="btn btn-lg btn-success" id="nuevaCollera" onclick="nuevaCollera()">Añadir collera</button>
            <button type="button" class="btn btn-lg btn-success" id="nuevaCria" onclick="nuevaCria()">Añadir cria</button>
            <?php }   ?>
                <!-- ADD ALL DATA TO THE TABLE -->
            <table id="table1" class="table table-striped table-hover table-bordered">
            </table>

            <?php
                if (isset($mensaje)) { //si el mensaje existe, es que se ha expirado la conexión
                    echo $mensaje;
                    header("refresh: 2; url=login.php");
                    $_SESSION[] = array();
                    session_destroy();
                    exit;
                }
                ?>

        </div>








                <!--   DIALOG/FORM   -->
        <div id="divNuevoCriador" title="Nuevo Criador">
            <form id="formNuevoCriador">
                Criador: <input type="text" id="criador" val=""/><br/>
                Nombre: <input type="text" id="nombre" val=""/><br/>
                Dirección: <input type="text" id="direccion" val=""/><br/>
                Teléfono: <input type="number" id="telefono" val=""/><br/>
                Sociedad: <input type="text" id="sociedad" val=""/><br/>
                <input type="hidden" id="sesion" val="<?= $_SESSION["groupUser"]?>"/>
            </form>
        </div>

        <div id="divEditaCriador" title="Editar Criador">
            <form id="formEditaCriador">
                Criador: <input type="text" id="eCriador" val=""/><br/>
                Nombre: <input type="text" id="eNombre" val=""/><br/>
                Dirección: <input type="text" id="eDireccion" val=""/><br/>
                Teléfono: <input type="number" id="eTelefono" val=""/><br/>
                Sociedad: <input type="text" id="eSociedad" val=""/><br/>
            </form>
        </div>

        <div id="divNuevoPajaro" title="Nuevo Pájaro">
            <form id="formNuevoPajaro">
                Criador: <select id="criadorPajaro">
                    <?php
                        $result = $conection->query("SELECT `criador`FROM `criadores`;");
                        while ($data = $result->fetch_object()) {
                            echo '<option value="'.$data->criador.'">'.$data->criador.'</option>';
                        } 
                        mysqli_free_result($result);
                    ?> </select> <br/>

                Anilla: <input type="text" id="anilla" val=""/><br/>
                Fecha de nacimiento: <input type="text" id="nacimiento" class="fecha" val=""/><br/>
                Sexo: <select id="sexo"><option value="macho">Macho</option><option value="hembra">Hembra</option></select><br/>
                Observaciones: <input type="text" id="observaciones" val=""/><br/>
            </form>
        </div>

        <div id="divEditaPajaro" title="Editar Pájaro">
            <form id="formEditaPajaro">
                Criador: <select id="eCriadorPajaro">
                    <?php
                        $result = $conection->query("SELECT `criador`FROM `criadores`;");
                        while ($data = $result->fetch_object()) {
                            echo '<option value="'.$data->criador.'">'.$data->criador.'</option>';
                        } 
                        mysqli_free_result($result);
                    ?> </select> <br/>

                Anilla: <input type="text" id="eAnilla" val=""/><br/>
                Fecha de nacimiento: <input type="text" id="eNacimiento" class="fecha" val=""/><br/>
                Sexo: <select id="eSexo"><option value="macho">Macho</option><option value="hembra">Hembra</option></select><br/>
                Observaciones: <input type="text" id="eObservaciones" val=""/><br/>
            </form>
        </div>

        <div id="divNuevaCollera" title="Nueva Collera">
            <form id="formNuevaCollera">
                Macho: <select id="anillaMacho">
                <?php 
                    $result = $conection->query("SELECT * FROM `pajaros` WHERE `sexo` = 'macho';");
                    while ($data = $result->fetch_object()) {
                        echo '<option value="'.$data->anilla.'">'.$data->anilla.'</option>';
                    }
                    mysqli_free_result($result);
                ?> </select><br/>

                Hembra: <select id="anillaHembra">
                <?php 
                    $result = $conection->query("SELECT * FROM `pajaros` WHERE `sexo` = 'hembra';");
                    while ($data = $result->fetch_object()) {
                        echo '<option value="'.$data->anilla.'">'.$data->anilla.'</option>';
                    }
                    mysqli_free_result($result);
                ?> </select><br/>

                <!--Fecha de la union: <input type="text" id="fecha" class="fecha" val=""/>-->
                Comienzo incubación: <input type="text" id="comienzoIncubacion" class="fecha" val=""/>
                Eclosión prevista: <input type="text" id="eclosionPrevista" class="fecha" val=""/>
                Postura 1: <input type="number" id="postura1" val=""/><br/>
                Postura 2: <input type="number" id="postura2" val=""/><br/>
                Postura 3: <input type="number" id="postura3" val=""/><br/>
                Jaula: <input type="number" id="jaula" val=""/><br/>
                Observaciones: <input type="text" id="obsCollera" val=""/><br/>
            </form>
        </div>

        <div id="divEditaCollera" title="Editar Collera">
            <form id="formEditaCollera">
                Macho: <select id="eAnillaMacho">
                <?php 
                    $result = $conection->query("SELECT * FROM `pajaros` WHERE `sexo` = 'macho';");
                    while ($data = $result->fetch_object()) {
                        echo '<option value="'.$data->anilla.'">'.$data->anilla.'</option>';
                    }
                    mysqli_free_result($result);
                ?> </select><br/>

                Hembra: <select id="eAnillaHembra">
                <?php 
                    $result = $conection->query("SELECT * FROM `pajaros` WHERE `sexo` = 'hembra';");
                    while ($data = $result->fetch_object()) {
                        echo '<option value="'.$data->anilla.'">'.$data->anilla.'</option>';
                    }
                    mysqli_free_result($result);
                ?> </select><br/>

                <!--Fecha de la union: <input type="text" id="fecha" class="fecha" val=""/>-->
                Comienzo incubación: <input type="text" id="eComienzoIncubacion" class="fecha" val=""/>
                Eclosión prevista: <input type="text" id="eEclosionPrevista" class="fecha" val=""/>
                Postura 1: <input type="number" id="ePostura1" val=""/><br/>
                Postura 2: <input type="number" id="ePostura2" val=""/><br/>
                Postura 3: <input type="number" id="ePostura3" val=""/><br/>
                Jaula: <input type="number" id="eJaula" val=""/><br/>
                Observaciones: <input type="text" id="eObsCollera" val=""/><br/>
                <input type="hidden" id="inputIdCollera" val=""/>
                <input type="hidden" id="inputFechaCollera" val=""/>
            </form>
        </div>

        <div id="divNuevaCria" title="Nueva Cría">
            <form id="formNuevaCria">
                Collera: <select id="idColleraCria">
                <?php
                    $result = $conection->query("SELECT * FROM `colleras`;");
                    while ($data = $result->fetch_object()) {
                        echo '<option value="'.$data->idCollera.'">'.$data->idCollera.'</option>';
                    }
                    mysqli_free_result($result);
                ?> </select><br/>

                Anilla: <input type="text" id="anillaCria" val=""/><br/>
                Fecha de anillado: <input type="text" id="fechaAnillado" class="fecha" val=""/><br/>
                Fecha de destete: <input type="text" id="fechaDestete" class="fecha" val=""/><br/>
                Fecha de nacimiento: <input type="text" id="nacimientoCria" class="fecha" val=""/><br/>
                Observaciones: <input type="text" id="observacionesCria" val=""/><br/>
            </form>
        </div>

        <div id="divEditaCria" title="Editar Cría">
            <form id="formEditaCria">
                Collera: <select id="eIdColleraCria">
                <?php
                    $result = $conection->query("SELECT * FROM `colleras`;");
                    while ($data = $result->fetch_object()) {
                        echo '<option value="'.$data->idCollera.'">'.$data->idCollera.'</option>';
                    }
                    mysqli_free_result($result);
                ?> </select><br/>

                Anilla: <input type="text" id="eAnillaCria" val=""/><br/>
                Fecha de anillado: <input type="text" id="eFechaAnillado" class="fecha" val=""/><br/>
                Fecha de destete: <input type="text" id="eFechaDestete" class="fecha" val=""/><br/>
                Fecha de nacimiento: <input type="text" id="eNacimientoCria" class="fecha" val=""/><br/>
                Observaciones: <input type="text" id="eObservacionesCria" val=""/><br/>
            </form>
        </div>

        <div class="modal" tabindex="-1" role="dialog" title="Eliminar" id="eliminar">
            <p id="parrafoEliminar"></p>
            <p id="parrafoEliminar2"></p>
            <input type="hidden" id="inputTable" value=""/>
            <input type="hidden" id="inputId" value=""/>
        </div>


                <!--   SCRIPT DE AJAX  -->
        <script> 
            $(".buttonMenu").click(function() {
                hideAll();
                var newButton = $(this).data("btn");
                $(newButton).show();
                $.ajax({
                url: $(this).data("url"), success: function(result) {
                    $("#table1").html(result);
                    $("#table1").css("background-color", "white");
                }});
            });
        </script>
    
    </body>
</html>