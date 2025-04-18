<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../public/Estilos/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'barra.php'; ?>

    <br>
    <div class="container">
        <h1 class="text-center">Bienvenido al panel de administración</h1>

        <!-- Carrusel -->
        <section id="carrusel" class="container my-5">
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.visa.com.co/dam/VCOM/regional/lac/SPA/venezuela/tarjetas/visa-prepaga-400x225.jpeg" class="d-block w-50 mx-auto" style="height: 300px;" alt="1">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.visa.com.do/dam/VCOM/regional/lac/SPA/Default/Pay%20With%20Visa/Tarjetas/visa-infinite-400x225.jpg" class="d-block w-50 mx-auto" style="height: 300px;" alt="2">
                    </div>
                    <div class="carousel-item">
                        <img src="https://www.bancofinandina.com/RS/build/img/educacion-financiera/numeros-tarjeta-credito-module.webp" class="d-block w-50 mx-auto" style="height: 300px;" alt="3">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <!-- Sección de Producto -->
        <div class="col-md-4">
            <div class="card">
                <img src="https://www.mastercard.com.co/content/dam/public/mastercardcom/lac/mx/home/consumidores/encontrar-una-tarjeta/tarjetas-de-credito/tarjeta-gold/tarjeta-credito-gold-1280x720.jpg" class="card-img-top" alt="Ejemplo de tarjeta">
                <div class="card-body">
                    <h5>Producto A</h5>
                    <p class="card-text">Descripción breve del producto A</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>

        <br>
        <h1 class="text-center">Misión y Visión</h1>
        <br>
        <div class="row">
            <div class="col-md-5 text-center">
                <img id="Gif" src="../../public/Imagenes/MISIÓN.gif" class="d-block w-100 img-fluid" alt="Misión">
            </div>
            <div class="col-md-7">
                <p class="fs-4 text-lg bg-primary text-white text-center">La misión de...</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <p class="fs-4 text-lg bg-primary text-white text-center">La visión de...</p>
            </div>
            <div class="col-md-5 text-center">
                <img id="Gif" src="../../public/Imagenes/VISIÓN.gif" class="d-block w-100 img-fluid" alt="Visión">
            </div>
        </div>

    </div>

    <script src="../../public/javaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
