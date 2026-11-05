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

// Selecciona solo las filas que tengan atributo data-id
document.querySelectorAll("tr[data-id]").forEach(tr => {
    
    // Crea un objeto Incidencia por fila con los datos que PHP dejó en los
    // atributos data-*. dataset convierte data-titulo en tr.dataset.titulo.
    new Incidencia({
        id: Number(tr.dataset.id),
        titulo: tr.dataset.titulo,
        descripcion: tr.dataset.descripcion,
        aula: tr.dataset.aula,
        prioridad: tr.dataset.prioridad,
        estado: tr.dataset.estado
    });

});

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