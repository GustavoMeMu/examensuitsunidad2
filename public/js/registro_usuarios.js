let editar;
let btnEditar = false;

const obtener_datos = () => {
    let tablaProducto = document.getElementById('tabla_productos');
    fetch("app/controller/obtener_datos.php")
    .then(respuesta => respuesta.json())
    .then((respuesta) => {
        let contenido = ''; 
        respuesta.map((dato) => {
        contenido += `
            <tr>
                <td>${dato['producto']}</td>
                <td>$${dato['precio']}</td>
                <td>${dato['cantidad']}</td>
                <td>
                    <button class="btn btn-warning me-3 editar" data-btn="editar" data-id="${dato['id_producto']}" data-nombre="${dato['producto']}" data-precio="${dato['precio']}" data-cantidad="${dato['cantidad']}">
                        Editar
                        <i class="bi bi-pencil-square"></i>
                    </button>
                    <button class="btn btn-danger eliminar" data-btn="eliminar" data-id="${dato['id_producto']}">
                        Eliminar
                        <i class="bi bi-trash3-fill"></i>
                    </button>
                </td>
            </tr>
            `; 
        });
        tablaProducto.innerHTML = contenido;
    });
}

const registrar_producto = () => {
    let nombre_p = document.getElementById('nombre').value;
    let precio_p = document.getElementById('precio').value;
    let cantidad_p = document.getElementById('cantidad').value;
    let data = new FormData();
    data.append("nombre_p",nombre_p); 
    data.append("precio_p",precio_p); 
    data.append("cantidad_p",cantidad_p);
    fetch("app/controller/registro_productos.php",{
        method:"POST",
        body: data
    })
    .then(respuesta => respuesta.json())
    .then(async respuesta => {
        if (respuesta[0] == 1) {
            await Swal.fire({icon: "success",title:`${respuesta[1]}`});
            obtener_datos();
            document.getElementById('nombre').value = '';
            document.getElementById('precio').value = '';
            document.getElementById('cantidad').value = '';
        } else if(respuesta[0] == 0) {
            Swal.fire({icon: "error",title:`${respuesta[1]}`});
        }
    })
}

const editar_producto = () => {
    let nombre_p = document.getElementById('nombre').value;
    let precio_p = document.getElementById('precio').value;
    let cantidad_p = document.getElementById('cantidad').value;
    let data = new FormData();
    data.append('idInput',editar);
    data.append("nombre_p",nombre_p); 
    data.append("precio_p",precio_p); 
    data.append("cantidad_p",cantidad_p); 
    fetch(`app/controller/actualizar_producto.php`,{
        method:"POST",
        body: data
    })
    .then(res => res.json())
    .then(async (res) => {
        if (res[0] == 1) {
            await Swal.fire({icon: "success",title:`${res[1]}`});
            obtener_datos();
            btnEditar = false;
            document.getElementById('nombre').value = '';
            document.getElementById('precio').value = '';
            document.getElementById('cantidad').value = '';
            document.getElementById('btn-registrar-producto').classList.remove('editar_producto');
            document.getElementById('btn-registrar-producto').classList.add('registrar_producto');
            document.getElementById('btn-registrar-producto').textContent = 'Registrar producto';
        } else if(res[0] == 0) {
            Swal.fire({icon: "error",title:`${res[1]}`});
        }
    })
} 

const eliminar_producto = () => {
    let data = new FormData();
    data.append('idInput',editar);
    fetch('app/controller/eliminar_producto.php', {
        method: 'POST',
        body: data
    })
    .then(respuesta => respuesta.json())
    .then(async respuesta => {
        if (respuesta[0] == 1) {
            await Swal.fire({icon: "success",title:`${respuesta[1]}`});
            obtener_datos();
        } else if(respuesta[0] == 0) {
            await Swal.fire({icon: "error",title:`${respuesta[1]}`});
        }
    })
}

document.addEventListener('DOMContentLoaded',() => {
    obtener_datos();
});

document.getElementById('btn-registrar-producto').addEventListener('click',() => {
    if (!btnEditar) {
        registrar_producto();
    } else {
        editar_producto();
    }
});

document.getElementById('tabla_productos').addEventListener('click', (e) => {
    if (e.target.classList.contains('editar')) {
        document.getElementById('nombre').value = e.target.dataset.nombre;
        document.getElementById('precio').value = e.target.dataset.precio;
        document.getElementById('cantidad').value = e.target.dataset.cantidad;

        document.getElementById('btn-registrar-producto').classList.remove('registrar_producto');
        document.getElementById('btn-registrar-producto').classList.add('editar_producto');
        document.getElementById('btn-registrar-producto').textContent = 'Editar Producto';

        editar = e.target.dataset.id;
        btnEditar = true;
    }
    if (e.target.classList.contains('eliminar')) {
        Swal.fire({
            icon: "warning",
            text: "Estas seguro de eliminar este producto?",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar producto"
          }).then((result) => {
            if (result.isConfirmed) {
                editar = e.target.dataset.id;
                eliminar_producto();
            }
          });
    }
});