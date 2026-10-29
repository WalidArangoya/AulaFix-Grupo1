class Incidencia {

    constructor(
        id,
        titulo,
        prioridad,
        estado
    ) {

        this.id = id;
        this.titulo = titulo;
        this.prioridad = prioridad;
        this.estado = estado;

    }

    obtenerResumen() {

        return `${this.titulo} - ${this.estado}`;

    }

}