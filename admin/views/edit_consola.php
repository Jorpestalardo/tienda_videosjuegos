<?PHP 
$id = $_GET['id'] ?? FALSE;
$consola = (new Consola()) -> get_x_id($id);

//echo "<pre>";
//print_r($consola);
//echo"</pre>";
//?>
<div class="container">
<div class="row my-5 justify-content-center">
<div class="card col-sm-10 p-5 sombra-form m-5">
    <div class="col">
        <h1 class="text-center mb-5">Editar datos de consola "<?= $consola->getNombre(); ?>"</h1>
        <div class="row mb-5 d-flex align-items-center">
        </div>
    </div>
    <form class="row g-3 sombra-form" action="actions/edit_consola_acc.php?id=<?= $consola->getConsola_id(); ?>" method="POST" enctype="multipart/form-data">
        <div class="col-md-6 mb-3">
            <label for="nombre" class="form-label mb-2 fw-bold">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $consola->getNombre(); ?>" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="anio" class="form-label mb-2 fw-bold">Año:</label>
            <input type="text" class="form-control" id="anio" name="anio" value="<?= $consola->getAnio(); ?>" required>
            </div>
            
        <div class="col-md-12 mb-3">
            <label for="descripcion" class="form-label mb-2 fw-bold">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion"><?= $consola->getDescripcion(); ?>
            </textarea>
        </div>

        <div class="col-md-6 mb-3">
            <label for="alt" class="form-label mb-2 fw-bold">Breve descripcion de la Imagen (alt):</label>
            <input type="text" class="form-control" id="alt" name="alt" value="<?= $consola->getAlt(); ?>" required>
        </div>

        <div class="col-md-6 mb-3">
            <label for="precio" class="form-label mb-2 fw-bold">Precio:</label>
            <input type="text" class="form-control" id="precio" name="precio" value="<?= $consola->getPrecio(); ?>" required>
        </div>

        <div class="col-md-2 mb-3">
			<label for="imagen" class="form-label mb-2 fw-bold">Imágen actual</label>
			<img src="../img/juegos/<?= $consola->getImg(); ?>" alt="<?= $consola->getAlt(); ?>" class="img-fluid rounded shadow-sm d-block">
			<input class="form-control" type="hidden" id="imagen_og" name="imagen_og" value="<?= $consola->getImg(); ?>">
		</div>

        <div class="col-md-4 mb-3">
			<label for="imagen" class="form-label mb-2 fw-bold">Reemplazar Imagen:</label>
			<input class="form-control" type="file" id="imagen" name="imagen">
		</div>


        <div class="boton d-flex justify-content-center mb-2">
            <button class="btn botonColorido" type="submit">Editar Consola</button>
        </div>

    </form>
    </div>
</div>
</div>