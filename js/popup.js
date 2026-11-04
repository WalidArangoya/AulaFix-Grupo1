let formularioActivo = null;

const modal = document.getElementById("modalEliminar");

function confirmarEliminacion(formPasado) {
    formularioActivo = formPasado; 
    modal.style.display = "flex";  
    return false;                 
}


function cerrarPopup() {
    modal.style.display = "none";  
}


function procederEliminar() {
    if (formularioActivo) {
        formularioActivo.submit(); 
    }
}