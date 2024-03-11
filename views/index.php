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

        #numero {
            margin-bottom: 10px;
        }

        #boton {
            background-color: rgb(0, 85, 169);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #boton:hover {
            background-color: rgba(0, 85, 169, 0.8); 
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
    <label for="numero">Ingrese un RUT:</label>
    <input type="number" id="numero" name="numero">
    <button id="boton" onclick="mostrarContenido()">Mostrar Contenido</button>

    <div id="loader" class="loader" style="display: none;"></div>
    <div id="contenido"></div>

</div>
<div class="contenedor">
<div class="participantes">
    <label for="participantes">Ingrese la cantidad de participantes:</lable>
    <input type="number" id="participantes" name="participantes">
    <button id="boton1">Generar  cantidad de participantes</button>
</div>
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
</script>

</body>
</html>
