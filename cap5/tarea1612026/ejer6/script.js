function iniciarSesion() {
    var gmail = document.getElementById("gmail").value;
    var password = document.getElementById("password").value;
var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var RESPUESTA = JSON.parse(this.responseText);
            alert(RESPUESTA.mensaje);
            
        }

    };
    var parametros = "gmail=" + gmail + "&password=" + password;
    xhttp.open("POST", "datos.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(parametros);
}