<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lib/style.css" rel="stylesheet" type="text/css">
    <title>Pink Roulette</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .barra {
            background-color: rgb(0, 85, 169);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background-image: url('https://portalalumnos.ucm.cl/v2/assets/img/logo_ucm_white.png');
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .contenedor {
            border: 1px solid blue; 
            margin-top: 120px; 
            max-width: 60%;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            padding: 20px; 
            border-radius: 5px; 
        }

        .participantes {
            margin-bottom: 10px;
        }

        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    
<div class="barra"></div>



<div class="contenedor">
    <div class="participantes">
        <label for="cantidad">Ingrese la cantidad de participantes:</label>
        <input type="number" id="cantidad" name="cantidad">
        <button onclick="agregarPollos()">Generar cantidad de participantes</button>
    </div>
    <div id="campos"></div>
</div>

<script>
function mostrarContenido() {
    var numero = document.getElementById("numero").value;
    var enlace = "https://imagenes.ucm.cl/foto_alum.php?alu=" + numero;
    
    document.getElementById("loader").style.display = "block";
    
    var contenido = "<iframe src='" + enlace + "' style='width:100%; height:500px; margin-left:40%;margin-top:3%;border:none;'></iframe>";
    
    setTimeout(function() {
        document.getElementById("contenido").innerHTML = contenido;
        document.getElementById("loader").style.display = "none";
    }, 1000); 
}

function agregarPollos() {
    var cantidad = document.getElementById("cantidad").value;
    var camposDiv = document.getElementById("campos");
    camposDiv.innerHTML = '';

    for (var i = 1; i <= cantidad; i++) {
        camposDiv.innerHTML += '<div class="participantes"><label for="participante' + i + '">Ingrese el RUT del participante ' + i + ':</label><input type="number" id="participante' + i + '" name="participante' + i + '"><button onclick="mostrarContenidoParticipante(' + i + ')">Mostrar Contenido</button><div id="contenido' + i + '"></div></div>';
    }
}

function mostrarContenidoParticipante(participante) {
    var rut = document.getElementById("participante" + participante).value;
    var enlace = "https://imagenes.ucm.cl/foto_alum.php?alu=" + rut;
    
    var contenido = "<iframe src='" + enlace + "' style='width:100%; height:500px; margin-left:40%;margin-top:3%;border:none;'></iframe>";
    document.getElementById("contenido" + participante).innerHTML = contenido;
}
</script>

</body>
</html>
