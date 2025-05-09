<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../public/Estilos/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="overlay" class="overlay"></div>
    <?php include 'barra.php'; ?>

    <h1>Categorías</h1>
    <div id="contenedor-categorias" class="contenedor"></div>

    <style>
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        .contenedor {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            max-width: 850px;
            margin: 0 auto;
        }
        .card {
            width: 200px;
            background: rgb(255, 255, 255);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 2px 2px 5px rgba(255, 255, 255, 0.2);
            text-align: center;
        }
    </style>
    
    <script src="../../public/javaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
