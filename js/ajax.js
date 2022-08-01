/* Este archivo ajax.js ya esta vinculado con el index.php mediante el archivo llamado script.php*/
const formularios_ajax = document.querySelectorAll(".FormularioAjax");

function enviar_formulario_ajax(e) {
    e.preventDefault();

    let enviar = confirm("Quieres enviar el formulario");

    if (enviar == true) {
        let data = new FormData(this);
        let method = this.getAttribute("method");
        let action = this.getAttribute("action");

        let encabezados = new Headers();

        let config = {
            method: method,
            headers: encabezados,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };

        fetch(action, config)
            .then(respuesta => respuesta.text())
            .then(respuesta => {
                let contenedor = document.querySelector(".form-rest");
                contenedor.innerHTML = respuesta;
            })
    }
}


//A traves de un forEach recorremos los formularios
formularios_ajax.forEach(formularios => {
    formularios.addEventListener("submit", enviar_formulario_ajax);
})