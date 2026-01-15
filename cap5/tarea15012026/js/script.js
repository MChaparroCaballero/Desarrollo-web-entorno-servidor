/**Función para realizar el login del usuario. Envía las credenciales al servidor y maneja la respuesta*/
function login(){
    // Obtener los valores del formulario
    var usuario = document.getElementById("usuario").value;
    var contrasena = document.getElementById("contrasena").value;
    
    // Preparar los datos para enviar
    var datos = "usuario=" + usuario + "&clave=" + contrasena;
    
    // Crear petición AJAX
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        // Cuando la petición se completa exitosamente
        if (this.readyState == 4 && this.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            
            // Si el login fue exitoso
            if (respuesta.login) {
                // Eliminar mensaje de error previo si existe
                var alertError = document.getElementById("alertError");
                if (alertError) {
                    alertError.remove();
                }
                
                // Guardar datos en sessionStorage para que sean visibles en DevTools > Application
                sessionStorage.setItem('usuario', respuesta.nombre);
                sessionStorage.setItem('logueado', 'true');
                if (respuesta.num_productos !== undefined) {
                    sessionStorage.setItem('num_productos', respuesta.num_productos);
                }
                
                // Ocultar el formulario de login
                var formulario = document.getElementById("formularioLogin");
                formulario.classList.add("d-none");
                
                // Ocultar el botón de "Aceptar"
                var botonIniciar = document.getElementById("btnIniciarSesion");
                botonIniciar.classList.add("d-none");
                
                // Mostrar el botón de "Cerrar Sesión"
                var botonCerrar = document.getElementById("btnCerrarSesion");
                botonCerrar.classList.remove("d-none");
                botonCerrar.style.display = "inline";
                
                // Mostrar el nombre del usuario
                var apodo = document.getElementById("datosUsuario");
                apodo.classList.remove("d-none");
                apodo.style.display = "inline";
                apodo.innerHTML = "Bienvenido " + respuesta.nombre;
            } else {
                // Si el login falló (usuario/contraseña incorrectos) se muestra el error rojo con un alert
                var alertError = document.getElementById("alertError");
                if (!alertError) {
                    // Creamos el alert 
                    alertError = document.createElement("div");
                    alertError.id = "alertError";
                    alertError.className = "alert alert-danger alert-dismissible fade show m-0 ms-3";
                    alertError.style.padding = "0.5rem 1rem";
                    alertError.innerHTML = `
                        <strong>Error:</strong> ${respuesta.mensaje}
                        <button type="button" class="btn-close" style="padding: 0.25rem;" onclick="this.parentElement.remove()"></button>
                    `;
                    document.getElementById("contenedorLogin").appendChild(alertError);
                } else {
                    // Actualizar el mensaje si ya existe
                    alertError.innerHTML = `
                        <strong>Error:</strong> ${respuesta.mensaje}
                        <button type="button" class="btn-close" style="padding: 0.25rem;" onclick="this.parentElement.remove()"></button>
                    `;
                }
            }
           
        }
    };
    
    // Enviar petición POST al servidor
    xhttp.open("POST", "../back/login.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(datos);
}


/**Función para cerrar la sesión del usuario,limpia los datos de sesión del servidor y del navegador*/
function cerrarSesion() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            
            if (respuesta.status === "ok") {
                // Limpiar sessionStorage del navegador
                sessionStorage.clear();
                
                // Volver a mostrar el formulario de login
                var formulario = document.getElementById("formularioLogin");
                formulario.classList.remove("d-none");
                
                // Mostrar el botón de "Aceptar"
                var botonIniciar = document.getElementById("btnIniciarSesion");
                botonIniciar.classList.remove("d-none");
                
                // Ocultar los datos del usuario
                document.getElementById("datosUsuario").classList.add("d-none");
                
                // Ocultar el botón de "Cerrar Sesión"
                document.getElementById("btnCerrarSesion").classList.add("d-none");

                // Limpiar los campos del formulario
                document.getElementById("usuario").value = "";
                document.getElementById("contrasena").value = "";
                
            }
        }
    };
    // Llamar al archivo logout.php para destruir la sesión en el servidor
    xhttp.open("GET", "../back/logout.php", true);
    xhttp.send();
}

/*Función para cargar las categorías disponibles desde el servidor*/
function cargarCategorias(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Parsear la respuesta JSON con las categorías
            var categorias = JSON.parse(this.responseText);
            var contenedor = document.getElementById("contenedorCategorias");
            contenedor.innerHTML = "";

            // Crear un elemento <li> para cada categoría
            categorias.forEach(cat => {
                var li = document.createElement("li");
                li.className = "nav-item";
                
                // Crear el enlace con el evento onclick para cargar productos
                li.innerHTML = `<a class="nav-link" href="#" onclick="cargarProductos(this, ${cat.CodCat})">${cat.Nombre}</a>`;
                
                contenedor.appendChild(li);
            });
        }
    };
    // Solicitar las categorías al servidor
    xhttp.open("GET", "../back/categorias.php?cargarCats=true", true);
    xhttp.send();
}
function cargarProductos(elemento, id){
    // Resaltar la pestaña activa quitando la clase 'active' de todas las demás
    var links = document.querySelectorAll('.nav-link');
    links.forEach(l => l.classList.remove('active'));
    elemento.classList.add('active');

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Respuesta del servidor:", this.responseText);
            
            try {
                var productos = JSON.parse(this.responseText);
                var contenedor = document.getElementById("contenedorProductos");
                contenedor.innerHTML = "";

                // Verificar si hay error en la respuesta
                if (productos.error) {
                    contenedor.innerHTML = "<p class='text-center w-100 text-danger'>Error: " + productos.error + "</p>";
                    return;
                }

                // Verificar si no hay productos
                if (productos.length === 0) {
                    contenedor.innerHTML = "<p class='text-center w-100'>No hay productos disponibles.</p>";
                    return;
                }

                // Crear una tarjeta (card) para cada producto
                productos.forEach(p => {
                    contenedor.innerHTML += `
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm d-flex flex-column">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">${p.Nombre}</h5>
                                    <p class="card-text text-muted small">${p.Descripcion}</p>
                                    <hr>
                                    <div class="mb-3">
                                        <span class="badge bg-secondary">Stock: ${p.Stock}</span>
                                    </div>
                                    <div class="mt-auto text-center">
                                        <button class="btn btn-sm btn-success w-100">Áñadir</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                });
            } catch (e) {
                console.error("Error al procesar los productos:", e);
            }
        }
    };
    // Solicitar los productos de la categoría seleccionada
    xhttp.open("GET", "../back/productos.php?catID=" + id, true);
    xhttp.send();
}

/**Función para verificar si hay una sesión activa en el servidor Se ejecuta al cargar la página para mantener al usuario logueado después de refrescar*/
function verificarSesion() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var respuesta = JSON.parse(this.responseText);
            console.log("Estado de sesión:", respuesta);
            
            // Si hay una sesión activa en el servidor
            if (respuesta.logueado) {
                // Guardar datos en sessionStorage para que sean visibles en DevTools > Application
                sessionStorage.setItem('usuario', respuesta.nombre);
                sessionStorage.setItem('email', respuesta.email);
                sessionStorage.setItem('logueado', 'true');
                if (respuesta.num_productos !== undefined) {
                    sessionStorage.setItem('num_productos', respuesta.num_productos);
                }
                if (respuesta.codCarro !== undefined) {
                    sessionStorage.setItem('codCarro', respuesta.codCarro);
                }
                
                // Ocultar el formulario de login
                var formulario = document.getElementById("formularioLogin");
                formulario.classList.add("d-none");
                
                // Ocultar el botón de "Aceptar"
                var botonIniciar = document.getElementById("btnIniciarSesion");
                botonIniciar.classList.add("d-none");
                
                // Mostrar el nombre del usuario
                var apodo = document.getElementById("datosUsuario");
                apodo.classList.remove("d-none");
                apodo.style.display = "inline";
                apodo.innerHTML = respuesta.nombre;
                
                // Mostrar el botón de "Cerrar Sesión"
                var botonCerrar = document.getElementById("btnCerrarSesion");
                botonCerrar.classList.remove("d-none");
                botonCerrar.style.display = "inline";
            }
        }
    };
    // Consultar al servidor si hay una sesión activa
    xhttp.open("GET", "../back/comprobar_sesion.php", true);
    xhttp.send();
}


window.onload = function() {
    cargarCategorias();           // Cargar las pestañas de categorías
    verificarSesion();            // Verificar si hay sesión activa (clave para mantener login)
    cargarProductosPorDefecto(1); // Mostrar productos de la primera categoría
};

//Similar a cargarProductos, pero se ejecuta automáticamente sin click del usuario, es para cargar un predefinido//
function cargarProductosPorDefecto(idCategoria) {
    console.log("Cargando productos de categoría:", idCategoria);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Respuesta productos por defecto:", this.responseText);
            try {
                var productos = JSON.parse(this.responseText);
                var contenedor = document.getElementById("contenedorProductos");
                contenedor.innerHTML = "";

                // Verificar si hay error en la respuesta
                if (productos.error) {
                    contenedor.innerHTML = "<p class='text-center w-100 text-danger'>Error: " + productos.error + "</p>";
                    return;
                }

                // Verificar si no hay productos
                if (productos.length === 0) {
                    contenedor.innerHTML = "<p class='text-center w-100'>No hay productos disponibles.</p>";
                    return;
                }

                // Crear una tarjeta (card) para cada producto
                productos.forEach(p => {
                    contenedor.innerHTML += `
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 shadow-sm d-flex flex-column">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">${p.Nombre}</h5>
                                    <p class="card-text text-muted small">${p.Descripcion}</p>
                                    <hr>
                                    <div class="mb-3">
                                        <span class="badge bg-secondary">Stock: ${p.Stock}</span>
                                    </div>
                                    <div class="mt-auto text-center">
                                        <button class="btn btn-sm btn-success w-100">Áñadir</button>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                });
                
                // Marca la primera categoría como activa después de un pequeño delay
                // (para asegurar que las categorías ya se han cargado)
                setTimeout(() => {
                    var primerLink = document.querySelector('.nav-link');
                    if (primerLink) {
                        primerLink.classList.add('active');
                    }
                }, 100);
            } catch (e) {
                console.error("Error al procesar los productos:", e);
            }
        }
    };
    // Solicitar los productos de la categoría especificada
    xhttp.open("GET", "../back/productos.php?catID=" + idCategoria, true);
    xhttp.send();

}
