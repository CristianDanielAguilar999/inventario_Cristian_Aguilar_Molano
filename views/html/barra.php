<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$rol = isset($_SESSION['rol']) ? $_SESSION['rol'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../../public/Estilos/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barra de Navegación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div id="overlay" class="overlay"></div>
        <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid bg-primary" id="menu">
            <a class="navbar-brand text-light" href="EjercicioInventario.php">Admin Panel</a>

            <!-- Proveedores -->
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Proveedores
                </button>
                <ul class="dropdown-menu">
                    <?php if ($rol !== 'Comprador'): ?>
                        <li><button class="dropdown-item" onclick="crearProveedor()">Crear Proveedor</button></li>
                    <?php endif; ?>
                    <li><a class="dropdown-item" href="proveedores.php">Ver Proveedores</a></li>
                </ul>
            </div>

            <!-- Categorías -->
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Categorías
                </button>
                <ul class="dropdown-menu">
                    <?php if ($rol !== 'Comprador'): ?>
                        <li><button class="dropdown-item" onclick="crearCategoria()">Crear Categoría</button></li>
                    <?php endif; ?>
                    <li><a class="dropdown-item" href="categorias.php">Ver Categorías</a></li>
                </ul>
            </div>

            <!-- Productos -->
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    Productos
                </button>
                <ul class="dropdown-menu">
                    <?php if ($rol !== 'Comprador'): ?>
                        <li><button class="dropdown-item" onclick="crearProducto()">Crear Producto</button></li>
                    <?php endif; ?>
                    <li><a class="dropdown-item" href="productos.php">Lista de Productos</a></li>
                </ul>
            </div>

            <button type="button" id="ver-perfil" class="btn btn-primary bg-white text-dark ms-auto" style="width: 10%;" onclick="mostrarPerfil()">Ver Perfil</button>

        </div>           
        </div>
        <div id="perfil" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); z-index: 2;">
            <button type="button" id="cerrar-perfil" class="btn btn-close" onclick="cerrarPerfil()"></button>
            <h2>Perfil de Usuario</h2>
            <form>
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" disabled>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido: </label>
                    <input type="text" id="apellido" name="apellido" disabled>
                </div>
                <div class="form-group">
                    <label for="edad">Edad:</label>
                    <input type="text" id="edad" name="edad" disabled>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="dirección" name="dirección" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" disabled>
                </div>
                <br>
                <br>
                <button type="button" id="editar" class="btn btn-primary" onclick="habilitar()">Editar</button>
                <button type="button" id="guardar" class="btn btn-primary" onclick="enviarDatos()">Guardar</button>
            </form>
        </div>
        <div id="proveedor" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); z-index: 2;">
            <button type="button" id="cerrar-perfil" class="btn btn-close" onclick="cerrarProveedor()"></button>
            <h2>Formulario Proveedor</h2>
            <form>
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombreProveedor" name="nombreProveedor">
                </div>
                <div class="form-group">
                    <label for="dirección">Dirección: </label>
                    <input type="text" id="direcciónProveedor" name="direcciónProveedor">
                </div>
                <div class="form-group">
                    <label for="edad">Edad: </label>
                    <input type="number" id="edadProveedor" name="edadProveedor">
                </div>
                <div class="form-group">
                    <label for="ciudad">Ciudad: </label>
                    <input type="text" id="ciudadProveedor" name="ciudadProveedor">
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" id="emailProveedor" name="emailProveedor">
                </div>
                <br>
                <br>
                <button type="button" id="guardar" class="btn btn-primary" onclick="enviarProveedor()">Guardar</button>
            </form>
        </div>
        <div id="categoria" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); z-index: 2;">
            <button type="button" id="cerrar-perfil" class="btn btn-close" onclick="cerrarCategoria()"></button>
            <h2>Formulario de Categoria </h2>
            <form>
                <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" id="nombreCategoria" name="nombreCategoria">
                </div>
                <div class="form-group">
                    <label for="descripción">Descripción: </label>
                    <br>
                    <textarea type="text" id="descripciónCategoria" name="descripciónCategoria" rows="5" cols="30"></textarea>
                </div>
                <div class="form-group">
                    <label for="codigo">Codigo: </label>
                    <input type="number" id="codigoCategoria" name="codigoCategoria">
                </div>
                <div class="form-group">
                    <label for="estado">Estado: </label>
                    <input type="text" id="estadoCategoria" name="estadoCategoria">
                </div>
                <br>
                <br>
                <button type="button" id="guardar" class="btn btn-primary" onclick="enviarCategoria()">Guardar</button>
            </form>
        </div>
        <div id="producto" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); z-index: 2;">
            <button type="button" id="cerrar-producto" class="btn btn-close" onclick="cerrarProducto()"></button>
            <h2>Formulario creación de producto</h2>
            <form>
              <div class="form-group">
                <label for="nombreProducto">Nombre del producto:</label>
                <input type="text" id="nombreProducto" name="nombreProducto">
              </div>
              <div class="form-group">
                <label for="valorProducto">Valor del producto:</label>
                <input type="number" id="valorProducto" name="valorProducto">
              </div>
              <div class="form-group">
                <label for="descripcionProducto">Descripción del producto:</label>
                <textarea id="descripcionProducto" name="descripcionProducto"></textarea>
              </div>
              <div class="form-group">
                <label for="cantidadProducto">Cantidad del producto:</label>
                <input type="number" id="cantidadProducto" name="cantidadProducto">
              </div>
              <div class="form-group">
                <label for="imagenProducto">Imagen del producto:</label>
                <input type="file" id="imagenProducto" name="imagenProducto"></input>
              </div>
              <div class="form-group">
                <label for="proveedorProducto">Proveedor:</label>
                <select id="proveedorProducto" name="proveedorProducto"></select>
              </div>
              <div class="form-group">
                <label for="categoriaProducto">Categoría:</label>
                <select id="categoriaProducto" name="categoriaProducto"></select>
              </div>
              <button type="button" id="guardar-producto" class="btn btn-primary" onclick="enviarProducto()">Guardar</button>
            </form>
          </div> 
    </nav>     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../public/javaScript/script.js"></script>


</body>
</html>