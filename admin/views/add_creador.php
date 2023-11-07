<div class="container">
<div class="row my-5 justify-content-center">
<div class="card col-sm-10 p-5 sombra-form m-5">
    <div class="col">
        <h1 class="text-center mb-5">
            Agregar un nuevo creador o creadores
        </h1>
        <div class="row mb-5 d-flex align-items-center">
        </div>
    </div>
    <form class="row g-3 sombra-form" action="actions/add_creador_acc.php" method="POST" enctype="multipart/form-data">
        <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label mb-2 fw-bold">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="col-md-12 mb-3">
            <label for="biografia" class="form-label mb-2 fw-bold">Biografia:</label>
            <textarea class="form-control" id="biografia" name="biografia"></textarea>
        </div>

        
        <div class="col-md-12 mb-3">
            <label for="company" class="form-label mb-2 fw-bold">Compañía:</label>
            <textarea class="form-control" id="company" name="company"></textarea>
        </div>


        <div class="col-md-6 mb-3">
            <label for="alt" class="form-label mb-2 fw-bold">Alt:</label>
            <input type="text" class="form-control" id="alt" name="alt" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="imagen" class="form-label mb-2 fw-bold">Imagen</label>
            <input class="form-control" type="file" id="imagen" name="imagen" required>
        </div>


        <div class="boton d-flex justify-content-center mb-2">
            <button class="btn botonColorido" type="submit">Cargar Creador</button>
        </div>
    </form>
</div>
</div>
</div>

