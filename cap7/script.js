function cargarEquipos() {
var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        console.log("Estado:", this.readyState, "Status:", this.status);
        console.log("Respuesta:", this.responseText);
        if (this.readyState == 4 && this.status == 200) {
            try {
                var equipos = JSON.parse(this.responseText);
                var htmlFilas = "";
                for (var i = 0; i < equipos.length; i++) {
                    var e= equipos[i];
                htmlFilas += `
                    <tr>
                        <td>${e.Nombre}</td>
                    </tr>
                `;
                     }
                     document.getElementById("cuerpoTabla").innerHTML = htmlFilas;
            } catch(err) {
                console.error("Error JSON:", err);
            }
        }
    };

    xhttp.open("GET", "encontrar_todos_equipos.php", true);
    xhttp.send();}