fetch('barra.html')
  .then(response => response.text())
  .then(html => {
    document.getElementById('nav-container').innerHTML = html;
  });

function IniciarLogin() {
    document.getElementById("RegisterFormContainer").style.display = "block";
}


function RegistrarUsuario() {
    const nombre = document.getElementById("NombreUsuario").value;
    const apellido = document.getElementById("ApellidoUsuario").value;
    const edad = document.getElementById("Edad").value;
    const direccion = document.getElementById("Dirección").value;
    const email = document.getElementById("Email").value;
    const telefono = document.getElementById("Telefono").value;
    const contrasena = document.getElementById("Contrasena").value;
    const rol = document.getElementById("Rol").value;

    // Validar campos
    if (nombre === "" || apellido === "" || edad === "" || direccion === "" || email === "" || telefono === "" || contrasena === "" || rol === "") {
        alert("Por favor, complete todos los campos");
        return;
    }

    // Enviar datos a PHP
    fetch("../php/usuario1.php", {
    method: "POST",
    headers: {
        "Content-Type": "application/json"
    },
    body: JSON.stringify({
        nombre: nombre,
        apellido: apellido,
        edad: edad,
        direccion: direccion,
        email: email,
        telefono: telefono,
        contrasena: contrasena,
        rol: rol
        })
    })
    .then(response => response.json())
    .then(data => {
    if (data.mensaje === "Registro exitoso") {
        alert("Registro exitoso");
        window.location.href ="../htmlyjs/Index.html";
    } else {
        alert("Error al registrar");
    }
    })
    .catch(error => {
        console.error("Error:", error);
    });
}

let intentosRestantes = 3;

function iniciarSesion() {
    const nombreUsuario = document.getElementById("nombreUsuario").value;
    const contrasena = document.getElementById("contrasena").value;
    const rol = document.getElementById("Rol").value;
    const boton = document.getElementById("Iniciar");

    if (!nombreUsuario || !contrasena || !rol) {
        alert("Por favor, completa todos los campos.");
        return;
    }

    boton.disabled = true; // Evita múltiples clics

    fetch("../php/login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            nombreUsuario: nombreUsuario,
            contrasena: contrasena,
            Rol: rol
        })
    })
    .then(response => response.json())
    .then(data => {
        boton.disabled = false; // Habilita el botón nuevamente
        if (data.estado === "exito") {
            // Redirige a la misma página para todos los roles
            window.location.href = "../htmlyjs/EjercicioInventario.html";
        } else {
            intentosRestantes--;
            if (intentosRestantes === 0) {
                boton.disabled = true;
                alert("Cuenta bloqueada por intentos fallidos.");
            } else {
                alert(`Intentos restantes: ${intentosRestantes}`);
            }
        }
    })
    .catch(error => {
        console.error(error);
        boton.disabled = false;
        alert("Error en el servidor. Intente nuevamente.");
    });
}



function mostrarPerfil() {
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('perfil').style.display = 'block';

  fetch('../php/mostrar.php')
    .then(response => response.json())
    .then(data => {
      document.getElementById('nombre').value = data.nombre;
      document.getElementById('apellido').value = data.apellido;
      document.getElementById('edad').value = data.edad;
      document.getElementById('dirección').value = data.dirección;
      document.getElementById('email').value = data.email;
    })
    .catch(error => console.error(error));
}


function cerrarPerfil() {
  document.getElementById('overlay').style.display = 'none';
  document.getElementById('perfil').style.display = 'none';
}

function habilitar(){
  document.getElementById('apellido').disabled=false;
  document.getElementById('edad').disabled=false;
  document.getElementById('dirección').disabled=false;
  document.getElementById('email').disabled=false;
}

function actualizarDatos() {
  var nombre = document.getElementById('nombre').value;
  var apellido = document.getElementById('apellido').value;
  var edad = document.getElementById('edad').value;
  var dirección = document.getElementById('dirección').value;
  var email = document.getElementById('email').value;

  var formData = new FormData();
  formData.append('nombre', nombre);
  formData.append('apellido', apellido);
  formData.append('edad', edad);
  formData.append('dirección', dirección);
  formData.append('email', email);

  fetch('../php/guardar.php', {
      method: 'POST',
      body: formData
  })
  .then(response => response.text())
  .then(data => {
      console.log(data);
      document.getElementById('overlay').style.display = 'none';
      document.getElementById('perfil').style.display = 'none';
  })
  .catch(error => console.error(error));
}

document.getElementById('guardar').addEventListener('click', function() {
  actualizarDatos();
});

function crearProveedor() {
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('proveedor').style.display = 'block';
}

function enviarProveedor(){ 
  const nombre = document.getElementById('nombreProveedor').value;
  const dirección = document.getElementById('direcciónProveedor').value;
  const edad = document.getElementById('edadProveedor').value;
  const ciudad = document.getElementById('ciudadProveedor').value;
  const email = document.getElementById('emailProveedor').value;

  const datos = {
    nombre: nombre,
    dirección: dirección,
    edad: edad,
    ciudad: ciudad,
    email: email
  };

  fetch('../php/guardarProveedor.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(datos)
  })
  .then(response => response.json())
  .then(data => {
    console.log(data);
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('proveedor').style.display = 'none';
  })
  .catch(error => console.error(error));
}

function cerrarProveedor() {
  document.getElementById('overlay').style.display = 'none';
  document.getElementById('proveedor').style.display = 'none';
}

function crearCategoria() {
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('categoria').style.display = 'block';
}

function enviarCategoria() {
  const nombreCategoria = document.getElementById('nombreCategoria').value;
  const descripción = document.getElementById('descripciónCategoria').value;
  const codigoCategoria = document.getElementById('codigoCategoria').value;
  const estado = document.getElementById('estadoCategoria').value;

  const datos = {
    nombreCategoria: nombreCategoria,
    descripciónCategoria : descripción,
    codigoCategoria: codigoCategoria,
    estadoCategoria: estado
  };

  fetch('../php/guardarCategoria.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(datos)
  })
  .then(response => response.text())
  .then(data => {
    console.log(data);
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('categoria').style.display = 'none';
  })
  .catch(error => console.error(error));
}

function cerrarCategoria() {
  document.getElementById('overlay').style.display = 'none';
  document.getElementById('categoria').style.display = 'none';
}


function crearProducto() {
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('producto').style.display = 'block';
}

function enviarProducto() {
  const formData = new FormData();
  formData.append('nombreProducto', document.getElementById('nombreProducto').value);
  formData.append('valorProducto', document.getElementById('valorProducto').value);
  formData.append('descripcionProducto', document.getElementById('descripcionProducto').value);
  formData.append('cantidadProducto', document.getElementById('cantidadProducto').value);
  formData.append('imagenProducto', document.getElementById('imagenProducto').files[0]);
  formData.append('proveedorProducto', document.getElementById('proveedorProducto').value);
  formData.append('categoriaProducto', document.getElementById('categoriaProducto').value);

  fetch('../php/guardarProducto.php', {
      method: 'POST',
      body: formData // Enviar FormData sin 'Content-Type'
  })
  .then(response => response.json()) 
  .then(data => {
      console.log(data);
      if (data.success) {
          alert("Producto agregado correctamente");
          document.getElementById('overlay').style.display = 'none';
          document.getElementById('producto').style.display = 'none';
      } else {
          alert("Error: " + data.message);
      }
  })
  .catch(error => console.error(error));
}

  function cerrarProducto(){
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('producto').style.display = 'none';
  }



// Cargar proveedores y categorías en los select
fetch('../php/cargarProveedores.php')
.then(response => response.json())
.then(data => {
  const selectProveedores = document.getElementById('proveedorProducto');
  data.forEach(proveedor => {
    const option = document.createElement('option');
    option.value = proveedor.IdProveedor;
    option.text = proveedor.nombre;
    selectProveedores.appendChild(option);
  });
});

fetch('../php/cargarCategorias.php')
.then(response => response.json())
.then(data => {
  const selectCategorias = document.getElementById('categoriaProducto');
  data.forEach(categoria => {
    const option = document.createElement('option');
    option.value = categoria.IdCategoria;
    option.text = categoria.nombreCategoria;
    selectCategorias.appendChild(option);
  });
});


function cerrarCategoria() {
  document.getElementById('overlay').style.display = 'none';
  document.getElementById('producto').style.display = 'none';
}


// Cargar productos al iniciar
cargarProductos();

function cargarProductos() {
  fetch('../php/producto.php', {
    method: 'POST',
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ action: "cargarProductos" })
  })
  .then(response => response.json())
  .then(data => {
    let tbody = document.getElementById('listarProductos');
    tbody.innerHTML = ''; // Limpiar la tabla antes de agregar los productos

    data.forEach(producto => {
      let tr = document.createElement('tr');
      tr.innerHTML = `
        <td>${producto.IdProducto}</td>
        <td><img src="${producto.imagen}" width="50" height="50"></td>
        <td>${producto.nombreProducto}</td>
        <td>${producto.descripción}</td>
        <td>${producto.valorProducto}</td>
        <td>${producto.cantidad}</td>
        <td>${producto.proveedor}</td>
        <td>${producto.categoria}</td>
        <td>
          <button class="btn btn-warning" onclick="abrirModalEditar(${producto.IdProducto})">Editar</button>
          <button class="btn btn-danger" onclick="eliminarProducto(${producto.IdProducto})">Eliminar</button>
        </td>
      `;
      tbody.appendChild(tr);
    });
  })
  .catch(error => console.error("Error cargando productos:", error));
}

// ✅ Función para abrir el modal de edición y cargar los datos del producto
function abrirModalEditar(id) {
  fetch('../php/producto.php', {
    method: 'POST',
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify({ action: "obtenerProducto", IdProducto: id })
  })
  .then(response => response.json())
  .then(producto => {
    document.getElementById('editarNombre').value = producto.nombreProducto;
    document.getElementById('editarValor').value = producto.valorProducto;
    document.getElementById('editarDescripcion').value = producto.descripción;
    document.getElementById('editarCantidad').value = producto.cantidad;
    document.getElementById('modalEditar').dataset.id = id; // Guardar el ID en el modal
    document.getElementById('modalEditar').style.display = 'block';
  })
  .catch(error => console.error("Error obteniendo producto:", error));
}

// ✅ Función para cerrar el modal de edición
function cerrarEdicion() {
  document.getElementById('modalEditar').style.display = 'none';
}

// ✅ Función para guardar los cambios del producto editado
function enviarCambios() {
  let idProducto = document.getElementById('modalEditar').dataset.id;
  let datos = {
    action: "editarProducto",
    IdProducto: idProducto,
    nombreProducto: document.getElementById('editarNombre').value,
    valorProducto: document.getElementById('editarValor').value,
    descripción: document.getElementById('editarDescripcion').value,
    cantidad: document.getElementById('editarCantidad').value
  };

  fetch('../php/producto.php', {
    method: 'POST',
    headers: { "Content-Type": "application/json" },
    body: JSON.stringify(datos)
  })
  .then(response => response.json())
  .then(data => {
    alert(data.message);
    if (data.success) {
      cerrarEdicion();
      cargarProductos(); // Recargar la tabla con los datos actualizados
    }
  })
  .catch(error => console.error("Error guardando cambios:", error));
}

// ✅ Función para eliminar un producto
function eliminarProducto(id) {
  if (confirm("¿Estás seguro de que quieres eliminar este producto?")) {
    fetch('../php/producto.php', {
      method: 'POST',
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ action: "eliminarProducto", IdProducto: id })
    })
    .then(response => response.json())
    .then(data => {
      alert(data.message);
      if (data.success) {
        cargarProductos(); // Recargar la tabla después de eliminar
      }
    })
    .catch(error => console.error("Error eliminando producto:", error));
  }
}

document.addEventListener("DOMContentLoaded", function () {
  cargarCategorias();
});

function cargarCategorias() {
  fetch("../php/categorias.php")
      .then(response => response.json())
      .then(data => mostrarCategorias(data))
      .catch(error => console.error("Error al cargar las categorías:", error));
}

function mostrarCategorias(categorias) {
  const contenedor = document.getElementById("contenedor-categorias");
  contenedor.innerHTML = ""; // Limpiar antes de agregar nuevas tarjetas

  if (categorias.error) {
      contenedor.innerHTML = `<p>Error: ${categorias.error}</p>`;
      return;
  }

  categorias.forEach(categoria => {
      const card = document.createElement("div");
      card.classList.add("card");

      card.innerHTML = `
          <h3>${categoria.nombreCategoria} (Código: ${categoria.codigoCategoria})</h3>
          <p>${categoria.descripción}</p>
          <span class="estado">${categoria.estado}</span>
          <button>Ver más</button>

      `;

      contenedor.appendChild(card);
  });
}

// Recargar automáticamente cuando se agregue una nueva categoría
setInterval(cargarCategorias, 5000); // Se recarga cada 5 segundos

document.addEventListener("DOMContentLoaded", function () {
  cargarProveedores();

  // Recargar la lista de proveedores cada 10 segundos
  setInterval(cargarProveedores, 10000);

  // Capturar el formulario y enviarlo por AJAX
  const form = document.getElementById("form-proveedor");
  if (form) {
      form.addEventListener("submit", function (event) {
          event.preventDefault(); // Evitar que la página se recargue de inmediato

          const formData = new FormData(form);
          
          fetch("../php/proveedores.php", {
              method: "POST",
              body: formData
          })
          .then(response => response.text())
          .then(data => {
              console.log("Proveedor agregado:", data);
              alert("Proveedor agregado exitosamente.");
              
              // Recargar la lista de proveedores inmediatamente
              cargarProveedores();
              
              // Opcional: Recargar toda la página después de 2 segundos
              setTimeout(() => {
                  location.reload();
              }, 2000);
          })
          .catch(error => console.error("Error al agregar proveedor:", error));
      });
  }
});

// ✅ Función para cargar proveedores y actualizar la lista
function cargarProveedores() {
  fetch("../php/proveedores.php")
      .then(response => response.json())
      .then(data => {
          const container = document.getElementById("proveedores-container");
          container.innerHTML = ""; // Limpiar el contenedor antes de actualizar

          data.forEach(proveedor => {
              const card = document.createElement("div");
              card.classList.add("tarjeta");

              card.innerHTML = `
                  <h3>${proveedor.nombre}</h3>
                  <p><strong>Dirección:</strong> ${proveedor.direccion}</p>
                  <p><strong>Teléfono:</strong> ${proveedor.telefono}</p>
                  <p><strong>Email:</strong> ${proveedor.email}</p>
                  <button class="ver-mas">Ver más</button>
              `;

              container.appendChild(card);
          });
      })
      .catch(error => console.error("Error cargando proveedores:", error));
}

