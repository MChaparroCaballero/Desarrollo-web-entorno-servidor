function loadDoc() {
var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200){
document.getElementById("numero").innerHTML =this.responseText;
}};
xhttp.open("GET", "aleatorio.php", true);
xhttp.send();
return false;
}
setInterval(loadDoc, 5000);