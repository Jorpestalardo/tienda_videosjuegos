    <div class="container">
        <div class="d-flex justify-content-center">
    <div class="card col-sm-6 p-5 m-5 sombra-form d-flex">
    <h1 class="text-center fs-2 my-5 mb-3 contacto">Registro</h1>
        <form class="row g-3 sombra-form" action="admin/actions/agregar_contacto_acc.php" method="POST" enctype="multipart/form-data">
        <div class="d-flex flex-column">
            <h2 class="fs-3 text-center mb-3">Ingresa tus datos:</h2>
            <div class="mb-2">
                            <label for="email" class="form-label mb-2 fw-bold">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="nombre@gmail.com" required>
                        </div>
                        <div class="mb-2">
                            <label for="nombre_usuario" class="form-label mb-2 fw-bold">Nombre de usuario</label>
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="" required>
                        </div>
                        <div class="mb-2">
                            <label for="nombre_completo" class="form-label mb-2 fw-bold">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" placeholder="" required>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label mb-2 fw-bold" >Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-2">
                        <label for="rol" class="form-label mb-2 fw-bold">Rol</label>
                    <select class="form-select mb-3" name="rol" id="rol" required>
                        <option value="" selected disabled>Elija una opcion</option>
                            <option value="usuario">Usuario</option>
                            <option value="admin" disabled>Admin</option>
                        </select>
                        </div>

                        <div class="boton d-flex justify-content-center mb-2">
                        <button class="btn botonColorido" type="submit">Registrarse</button>
                    </div>

        <form>
</div>
</div>
<div>
