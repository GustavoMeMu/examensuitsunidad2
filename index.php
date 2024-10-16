<?php
require_once("./app/config/dependencias.php");

session_start();
if (!isset($_SESSION['usuario'])) {
    header("location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= CSS . "bootstrap.min.css"; ?>">
    <link rel="stylesheet" href="<?= CSS . "inicio.css"; ?>"> 
    <link rel="stylesheet" href="<?= ICONS . "bootstrap-icons.css"; ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <title>Formulario de datos</title>
</head>

<body class="vh-100">
    
    <div class="row m-4 c-datos"> 
        <div class="d-flex justify-content-around align-items-center w-100">
            <h3 class="text-center m-0">Bienvenido</h3>
            <p style="color: #2d3a4b; font-size: 2.2rem; text-decoration: underline; margin-top: 10px;" class="text-center m-0">
                <?= $_SESSION['usuario']['usuario'] ?>
            </p>

            <div>
                <button class="btn btn-secondary" id="btn-editar" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal">
                    Editar Sesión
                </button>

                <button class="btn btn-danger" id="btn-cerrar">
                    Cerrar sesión
                </button>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-8 p-5">
            <form action="./index.php" method="post" class="p-4">
                <h2 class="text-center mb-4">Registrar Alumno</h2>
                <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
                    <span class="input-group-text"><i class="bi bi-box"></i></span>
                    <input type="text" class="form-control" id="nombre" placeholder="Ingrese el nombre del alumno" name="nombre_p" value="">
                </div>
                <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
                    <span class="input-group-text"><i class="bi bi bi-box"></i></span>
                    <input type="text" class="form-control" id="precio" placeholder="Ingrese el apellido" name="precio_p" value="">
                </div>
                <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
                    <span class="input-group-text"><i class="bi bi bi-box"></i></span>
                    <input type="text" class="form-control" id="cantidad" placeholder="Ingrese año de ingreso" name="cantidad_p" value="">
                </div>
                <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
                    <span class="input-group-text"><i class="bi bi bi-box"></i></span>
                    <input type="text" class="form-control" id="cantidad" placeholder="Ingrese la carrera" name="cantidad_p" value="">
                </div>
                <div class="input-group mt-3 c-input px-2 p-1 rounded-3">
                    <span class="input-group-text"><i class="bi bi bi-box"></i></span>
                    <input type="text" class="form-control" id="cantidad" placeholder="Ingrese fecha de nacimiento" name="cantidad_p" value="">
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <button type="button" id="btn-registrar-producto" class="btn btn-success fs-4 registrar_producto">Registrar alumno</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-12 p-5">
            <table class="table">
                <thead>
                    <tr style="background-color: #76c7c0; color: #2d3a4b;">
                        <th scope="col">Nombre</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tabla_productos">
                    <tr>
                        <td>Nombre del alumno</td>
                        <td>usuario</td>
                        <td>Contraseña</td>
                        <td>
                            <button class="action-btn">Editar</button>
                            <button class="action-btn">Eliminar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editNombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="editNombre" placeholder="Nombre">
                    </div>
                    <div class="mb-3">
                        <label for="editApellido" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="editApellido" placeholder="Apellido">
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="editPassword" class="form-label">Nueva Contraseña</label>
                        <input type="password" class="form-control" id="editPassword" placeholder="Contraseña Actual" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" id="guardarCambios">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <script src="./public/js/alerts.js"></script>
    <script src="./public/js/registro_productos.js"></script>
    <script src="./public/js/cerrar_session.js"></script>
    <script src="./public/js/editar_sesion.js"></script>

</body>

</html>
