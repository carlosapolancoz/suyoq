function resetear() {
    document.getElementById("FVS").reset();
    document.getElementById("FVC").reset();
}

function marcado() {
    if (document.form.termin.checked) {
        document.form.submit();
    } else {
        alert("Debes esta de acuerdo con la poíticas de privacidad de la página");
        document.form.termin.focus();
        return false;
    }

}

document.getElementById("anio").innerHTML = new Date().getFullYear();