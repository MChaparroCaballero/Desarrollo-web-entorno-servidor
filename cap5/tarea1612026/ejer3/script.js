var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var productos = JSON.parse(this.responseText);
            for (var i = 0; i < productos.length; i++) {
                  document.getElementById("resultado").innerHTML += "<p>" + productos[i].CodProd + "  " + productos[i].Nombre + "  " + productos[i].Descripcion + " con un peso de   " + productos[i].Peso + " kilos y un stock de  " + productos[i].Stock + " petenece a la categoria " + productos[i].Categoria + "</p><br>";
          }
        }
    };

    xhttp.open("GET", "datos.php", true);
    xhttp.send();