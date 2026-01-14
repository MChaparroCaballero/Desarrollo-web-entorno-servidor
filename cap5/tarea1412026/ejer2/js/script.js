function sumar(){
    var num1 = document.getElementById("num1").value;
    var num2 = document.getElementById("num2").value;

    var datos = "num1=" + num1 + "&num2=" + num2;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("resultado").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "sumar.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(datos);
}
