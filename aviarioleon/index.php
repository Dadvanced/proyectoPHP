<?php include "conexion.php"?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Aviario León</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="jquery-ui-1.12.1.custom/jquery-ui.css">
        <link rel="stylesheet" href="style.css">
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
                                $.post("nuevoCriador.php", {
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
                                $.post("nuevoPajaro.php", {
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
                                $.post("nuevaCollera.php", {
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
                                $.post("nuevaCria.php", {
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
        </script>
    </head>


    <body>
        <span id="banner"><img src="img/bird.png"></img></span>
        <span class="title">Aviario León</span>
        <input type="button" class="btn btn-success fecha" id="mostrarFecha" value="Fecha">
        
        <div class="container">
            <div class="btn-group btn-group-lg" role="group">
                <button type="button" class="btn btn-info buttonMenu" data-url="criadores.php" data-btn="#nuevoCriador">Mostrar criadores</button>
                <button type="button" class="btn btn-info buttonMenu" data-url="pajaros.php" data-btn="#nuevoPajaro">Mostrar pájaros</button>
                <button type="button" class="btn btn-info buttonMenu" data-url="colleras.php" data-btn="#nuevaCollera">Mostrar colleras</button>
                <button type="button" class="btn btn-info buttonMenu" data-url="crias.php" data-btn="#nuevaCria">Mostrar crías</button>
            </div>

            <button type="button" class="btn btn-lg btn-success" id="nuevoCriador" onclick="nuevoCriador()">Añadir criador</button>
            <button type="button" class="btn btn-lg btn-success" id="nuevoPajaro" onclick="nuevoPajaro()">Añadir pájaro</button>
            <button type="button" class="btn btn-lg btn-success" id="nuevaCollera" onclick="nuevaCollera()">Añadir collera</button>
            <button type="button" class="btn btn-lg btn-success" id="nuevaCria" onclick="nuevaCria()">Añadir cria</button>

            <table id="table1" class="table table-striped table-hover table-bordered">
            </table>
        </div>

                <!--   DIALOG/FORM   -->
        <div id="divNuevoCriador" title="Nuevo Criador">
            <form id="formNuevoCriador">
                Criador: <input type="text" id="criador" val=""/><br/>
                Nombre: <input type="text" id="nombre" val=""/><br/>
                Dirección: <input type="text" id="direccion" val=""/><br/>
                Teléfono: <input type="number" id="telefono" val=""/><br/>
                Sociedad: <input type="text" id="sociedad" val=""/><br/>
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


                <!--   SCRIPTS DE AJAX  -->
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