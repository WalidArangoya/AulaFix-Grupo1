    class Incidencia {
        static todos=[];
        fechaCreacion;
        fechaConfirm;
        constructor() {
            this.id = Incidencia.todos.length;
            this.titulo = document.getElementById("titulo").value;
            this.prioridad = document.getElementById("prioridad").value;
            this.aula = document.getElementById("aula").value;
            this.estado = false;
            Incidencia.todos.push(this);
        }
    }
    let incidenciaActual = null;
    const btnCrear = document.querySelector("#crearIncidencia");
    const btnConfirmar = document.querySelector("#confirmarIncidencia");
    function crear(){
        incidenciaActual = new Incidencia();
        incidenciaActual.fechaCreacion = new Date().toLocaleString();
    }
    function confirmar(){
        if(incidenciaActual.estado==false){
            incidenciaActual.estado=true;
            incidenciaActual.fechaConfirm= new Date().toLocaleString();
        }
    }
    btnCrear.addEventListener("click", crear);
    btnConfirmar.addEventListener("click", confirmar);
