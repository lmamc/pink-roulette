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

        .input-group {
            margin-bottom: 10px;
        }

        .button-group {
            margin-top: 10px;
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
        
         .titulo {
            margin-top: 7%;
            text-align: center;
            content: flex;

        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    
<div class="barra"></div>

<div class="titulo">Pink Roulette</div>



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
        var html = '<div class="participantes">' +
            '<div class="input-group"><label for="nombre' + i + '">Nombre del participante ' + i + ':</label>' +
            '<input type="text" id="nombre' + i + '" name="nombre' + i + '"></div>' +
            '<div class="input-group"><label for="participante' + i + '">RUT del participante ' + i + ':</label>' +
            '<input type="number" id="participante' + i + '" name="participante' + i + '"></div>';

        for (var j = 1; j <= cantidad; j++) {
            html += '<div class="input-group"><label for="nota' + i + '_' + j + '">Nota ' + j + ' para participante ' + i + ':</label>' +
            '<input type="number" id="nota' + i + '_' + j + '" name="nota' + i + '_' + j + '" min="1" max="7" step="0.1"></div>';
        }

        html += '<div class="input-group"><label for="notaFinal' + i + '">Nota Final:</label>' +
            '<input type="text" id="notaFinal' + i + '" name="notaFinal' + i + '" readonly></div>' +
            '<div class="button-group">' +
            '<button onclick="mostrarContenidoParticipante(' + i + ')">Mostrar Contenido</button>' +
            '<button onclick="calcularPromedio(' + i + ', ' + cantidad + ')">Calcular Promedio</button>' +
            '</div>' +
            '<div id="contenido' + i + '"></div></div>';

        camposDiv.innerHTML += html;
    }
}

function calcularPromedio(participante, totalNotas) {
    var suma = 0;
    for (var i = 1; i <= totalNotas; i++) {
        var nota = document.getElementById('nota' + participante + '_' + i).value;
        suma += parseFloat(nota);
    }
    var promedio = suma / totalNotas;
    document.getElementById('notaFinal' + participante).value = promedio.toFixed(1);
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
