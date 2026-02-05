async function calcularSumatorio() {
    // 1. Cojo los números de los inputs del HTML
    const n1 = document.getElementById('numero1').value;
    const n2 = document.getElementById('numero2').value;

    // 2. Se los envío a Symfony
    const response = await fetch('/suma', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ n1: parseInt(n1), n2: parseInt(n2) })
    });

    // 3. Recibo el JSON y lo plasmo
    const data = await response.json();
    document.getElementById('resultado').innerText = `El total es: ${data.total}`;
}