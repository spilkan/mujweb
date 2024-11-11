function calculate() {
    const cislo1 = parseFloat(document.getElementById("cislo1").value);
    const cislo2 = parseFloat(document.getElementById("cislo2").value);
    const operace = document.getElementById("operace").value;
    
    let vysledek;

    switch (operace) {
        case "+":
            vysledek = cislo1 + cislo2;
            break;
        case "-":
            vysledek = cislo1 - cislo2;
            break;
        case "*":
            vysledek = cislo1 * cislo2;
            break;
        case "/":
            if (cislo2 !== 0) {
                vysledek = cislo1 / cislo2;
            } else {
                vysledek = "Nelze dělit nulou!";
            }
            break;
        default:
            vysledek = "Neplatná operace";
    }

    document.getElementById("vysledek").textContent = vysledek;
}