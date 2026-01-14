function sumar() {
    console.log("1. Entrando en la función sumar"); // Chivato 1

    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;
    
    console.log("2. Valores capturados:", num1, num2); // Chivato 2

    var datos = "num1=" + num1 + "&num2=" + num2;
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        console.log("4. Estado de la petición:", this.readyState); // Chivato 3
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultado").innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "sumar.php?v=" + Math.random(), true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    console.log("3. Enviando datos..."); // Chivato 4
    xhttp.send(datos);
    console.log("Petición lanzada a: sumar.php con los datos: " + datos);
}