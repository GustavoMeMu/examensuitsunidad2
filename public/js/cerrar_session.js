const cerrar_session = () => {
    fetch("app/controller/cerrar_sesion.php")
    .then(respuesta => respuesta.json())
    .then(async (respuesta) => {
        await Swal.fire({icon: "success",title:'Sesion Finalizada'});
        window.location = "login.php";
    });
}

document.getElementById('btn-cerrar').addEventListener('click',() => {
    cerrar_session();
});
