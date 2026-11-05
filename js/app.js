class Incidencia {
    static todos=[];
    fechaCreacion;
    fechaConfirm;

    constructor({ id, titulo, descripcion = "", aula, prioridad, estado }) {
        this.id = id;
        this.titulo = titulo;
        this.descripcion = descripcion;
        this.aula = aula;
        this.prioridad = prioridad;
        this.estado = estado;
        Incidencia.todos.push(this);
    }

    static eliminar(id) {
        Incidencia.todos = Incidencia.todos.filter(i => i.id !== id);
    }
}

// Crear un objeto por cada incidencia recuperada (solo existe en index.php)
document.querySelectorAll("tr[data-id]").forEach(tr => {
    new Incidencia({
        id: Number(tr.dataset.id),
        titulo: tr.dataset.titulo,
        descripcion: tr.dataset.descripcion,
        aula: tr.dataset.aula,
        prioridad: tr.dataset.prioridad,
        estado: tr.dataset.estado
    });
});

let incidenciaActual = null;
const btnCrear = document.querySelector("#crearIncidencia");
const btnConfirmar = document.querySelector("#confirmarIncidencia");

function crear(){
    incidenciaActual = new Incidencia({
        id: Incidencia.todos.length,
        titulo: document.getElementById("titulo").value,
        prioridad: document.getElementById("prioridad").value,
        aula: document.getElementById("aula").value,
        estado: false
    });
    incidenciaActual.fechaCreacion = new Date().toLocaleString();
}

function confirmar(){
    if(incidenciaActual.estado==false){
        incidenciaActual.estado=true;
        incidenciaActual.fechaConfirm= new Date().toLocaleString();
    }
}

if (btnCrear) btnCrear.addEventListener("click", crear);
if (btnConfirmar) btnConfirmar.addEventListener("click", confirmar);


//Popup eliminar
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
        const id = Number(formularioActivo.querySelector('[name="id"]').value);
        Incidencia.eliminar(id);
        formularioActivo.submit(); 
    }
}