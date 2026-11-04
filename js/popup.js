let formularioActivo = null;

const modal = document.getElementById("modalEliminar");

// Esta función se activa al dar clic en "Eliminar" en la tabla
function confirmarEliminacion(formPasado) {
    formularioActivo = formPasado; // Guardamos el formulario que se ha pulsado
    modal.style.display = "flex";  // Enseñamos el popup en medio de la pantalla
    return false;                  // Detiene el envío a eliminar.php de momento
}

// Esta función se activa al darle a "Cancelar" en el popup
function cerrarPopup() {
    modal.style.display = "none";  // Oculta el popup
}

// Esta función se activa al darle a "Eliminar" en el popup
function procederEliminar() {
    if (formularioActivo) {
        formularioActivo.submit(); // Envía el formulario original guardado con el ID correcto
    }
}