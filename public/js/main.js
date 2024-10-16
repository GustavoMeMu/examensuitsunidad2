const validar_usuario = () => {
    let usuario = document.getElementById('usuario-id').value; // Cambiado a usuario
    let pass = document.getElementById('pass-id').value;
    let data = new FormData();
    data.append("usuario", usuario); 
    data.append("pass", pass); 
    fetch("app/controller/login.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(async respuesta => {
        if (respuesta[0] == 1) {
            await Swal.fire({
                icon: "success",
                title: `${respuesta[1]}`,
                timer: 1000, 
                showConfirmButton: false 
            });
            window.location = respuesta[2]; // Redirige según el rol
        } else {
            Swal.fire({
                icon: "error",
                title: `${respuesta[1]}`,
                timer: 1000, 
                showConfirmButton: false 
            });
        }
    });
}

window.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('btn-ingresar')) {
        document.getElementById('btn-ingresar').addEventListener('click', () => {
            validar_usuario(); // Llama a la función para validar el usuario
        });
    }
});
const registrar_usuario = () => {
    let usuario = document.getElementById('usuario').value; // Cambiado a usuario
    let pass = document.getElementById('pass').value;
    let data = new FormData();
    data.append("usuario", usuario); 
    data.append("pass", pass); 
    fetch("app/controller/registro.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(async respuesta => {
        if (respuesta[0] == 1) {
            await Swal.fire({
                icon: "success",
                title: `${respuesta[1]}`,
                timer: 1000, 
                showConfirmButton: false 
            });
            window.location = "login.php";
        } else {
            Swal.fire({
                icon: "error",
                title: `${respuesta[1]}`,
                timer: 1000, 
                showConfirmButton: false 
            });
        }
    });
}

window.addEventListener('DOMContentLoaded', () => {
    if (document.getElementById('btn-registrar')) {
        document.getElementById('btn-registrar').addEventListener('click', () => {
            registrar_usuario();
        });
    }
});
