<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../public/Estilos/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div id="overlay" class="overlay"></div>
    <?php include 'barra.php'; ?>
    <div class="container mt-5" id="productos">
        <h2 class="mb-3">Lista de Productos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre del producto</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoria</th>
                    <th>Proveedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="listarProductos"></tbody>
        </table>
    </div> 
    <div id="modalEditar" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); z-index: 2;">
        <button type="button" id="cerrar-Edición" class="btn btn-close" onclick="cerrarEdicion()"></button>
        <h2>Formulario creación de producto</h2>
        <form>
          <div class="form-group">
            <label for="nombreProducto">Nombre del producto:</label>
            <input type="text" id="editarNombre" name="editarNombre">
          </div>
          <div class="form-group">
            <label for="valorProducto">Valor del producto:</label>
            <input type="number" id="editarValor" name="editarValor">
          </div>
          <div class="form-group">
            <label for="descripcionProducto">Descripción del producto:</label>
            <textarea id="editarDescripcion" name="editarDescripcion"></textarea>
          </div>
          <div class="form-group">
            <label for="cantidadProducto">Cantidad del producto:</label>
            <input type="number" id="editarCantidad" name="editarCantidad">
          </div>
          <button type="button" id="guardar-producto" class="btn btn-primary" onclick="enviarCambios()">Guardar</button>
        </form>
    </div>
    <script src="../../public/javaScript/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
