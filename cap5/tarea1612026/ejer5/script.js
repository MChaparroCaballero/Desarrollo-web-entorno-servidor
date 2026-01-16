var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var productos = JSON.parse(this.responseText);
            var htmlFilas = "";
            for (var i = 0; i < productos.length; i++) {
                var p = productos[i];
            htmlFilas += `
                <tr>
                    <td>${p.CodProd}</td>
                    <td>${p.Nombre}</td>
                    <td><span>${p.Categoria}</span></td>
                    <td><small">${p.Descripcion}</small></td>
                    <td class="text-center"><span>${p.Stock}</span></td>
                    <td class="text-end">$${p.Peso}</td>
                </tr>
            `;
                 }
                 document.getElementById("cuerpoTabla").innerHTML = htmlFilas;
        }
    };

    xhttp.open("GET", "datos.php", true);
    xhttp.send();

    function recargarPagina() {
    location.reload();
}