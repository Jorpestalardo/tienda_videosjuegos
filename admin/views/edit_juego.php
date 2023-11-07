<?PHP 
$id = $_GET['id'] ?? FALSE;
$juego = (new Juego()) -> consola_x_id($id);
$personajes = (new Personajes ())->todos_los_personajes();
$consolas = (new Consola())->catalogo_completo();
$creadores = (new Creadores())->catalogo_completo();

//echo "<pre>";
//print_r($juego);
//echo"</pre>";
//?>
<div class="container">
<div class="row my-5 justify-content-center">
<div class="card col-sm-10 p-5 sombra-form m-5">
    <div class="col">

        <h1 class="text-center mb-5 fw-bold">Editar Juego "<?= $juego->getNombreProducto(); ?>"</h1>
        <div class="row mb-5 d-flex align-items-center">

            <form class="row g-3 sombra-form" action="actions/edit_juego_acc.php?id=<?= $juego->getproductoId(); ?>"" method="POST" enctype="multipart/form-data">
                
                            <div class="col-md-4 mb-3">
                                <label for="creadores_id" class="form-label mb-2 fw-bold">Creador/es:</label>
                                <select class="form-select" name="creadores_id"
                                    id="creadores_id" required>
                                    <option value="" selected disabled>Elija una opcion</option>
                                    <?PHP foreach ($creadores as $C){ ?>
                                        <option value="<?= $C->getCreadores_id() ?>" 
                                        <?= $C->getCreadores_id() == $juego->getCreadores_id() ? "selected" : "" ?>>
                                        <?= $C->getNombre_completo() ?></option>
                                    <?PHP } ?>
                                </select>
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="personaje_id" class="form-label mb-2 fw-bold">Personaje principal:</label>
                                <select class="form-select" name="personaje_id"
                                    id="personaje_id" required>
                                    <option value="" selected disabled>Elija una opcion</option>
                                    <?PHP foreach ($personajes as $P){ ?>
                                        <option value="<?= $P->getPersonaje_id() ?>"
                                        <?= $P->getPersonaje_id() == $juego->getPersonaje_id() ? "selected" : "" ?>>
                                        <?= $P->getPersonaje() ?></option>
                                    <?PHP } ?>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="consola_id" class="form-label mb-2 fw-bold">Consola:</label>
                                <select class="form-select" name="consola_id"
                                    id="consola_id" required>
                                    <option value="" selected disabled>Elija una opcion</option>
                                    <?PHP foreach ($consolas as $C){ ?>
                                        <option value="<?= $C->getConsola_id() ?>"
                                        <?= $C->getConsola_id() == $juego->getConsola_id() ? "selected" : "" ?>>
                                        <?= $C->getNombre() ?></option>
                                    <?PHP } ?>
                                </select>
                            </div>

            <div class="col-md-4 mb-3">
                <label for="nombre" class="form-label mb-2 fw-bold">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $juego->getNombreProducto(); ?>" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="anio" class="form-label mb-2 fw-bold">Año:</label>
                <input type="number" class="form-control" id="anio" name="anio" value="<?= $juego->getAnio(); ?>" required>
            </div>

            <div class="col-md-12 mb-5">
                <label for="descripcion" class="form-label mb-2 fw-bold">Descripción:</label>
                <textarea class="form-control" id="descripcion" name="descripcion"> <?= $juego->getDescripcion(); ?>"</textarea>
            </div>
            <div class="col-md-12 mb-3">
					<label class="form-label d-block mb-2 fw-bold">Personajes Secundarios:</label>
					<?PHP
					foreach ($personajes as $P) {
						$ps_selected = $juego->getPersonajes_secundarios_ids();				
					?>
						<div class="form-check form-check-inline">
							<input class="form-check-input" type="checkbox" name="personajes_secundarios[]" id="personajes_secundarios_<?= $P->getPersonaje_id() ?>" value="<?= $P->getPersonaje_id() ?>" 
							<?= in_array($P->getPersonaje_id(), $ps_selected) ? "checked" : "" ?>>
							<label class="form-check-label mb-2" for="personajes_secundarios_<?= $P->getPersonaje_id() ?>"><?= $P->getPersonaje() ?></label>
						</div>
					<?PHP } ?>
				</div>
            
            <div class="col-md-2 mb-3">
                <label for="precio" class="form-label mb-2 fw-bold">Precio:</label>
                <input type="number" class="form-control" id="precio" name="precio" value="<?= $juego->getPrecio(); ?>" required>
            </div>
            
            <div class="col-md-2 mb-3">
            <label for="imagen" class="form-label mb-2 fw-bold">Imágen actual:</label>
			<img src="../img/juegos/<?= $juego->getImg(); ?>" alt="<?= $juego->getAlt(); ?>" class="img-fluid rounded shadow-sm d-block">
			<input class="form-control" type="hidden" id="imagen_og" name="imagen_og" value="<?= $juego->getImg(); ?>">
            </div>
            
            <div class="col-md-4 mb-3">
			<label for="imagen" class="form-label mb-2 fw-bold">Reemplazar Imagen:</label>
			<input class="form-control" type="file" id="imagen" name="imagen">
		</div>
                <div class="col-md-3 mb-3">
                    <label for="alt" class="form-label mb-2 fw-bold">Alt (Descripción breve de la imagen):</label>
                    <input type="text" class="form-control" id="alt" name="alt" value="<?= $juego->getAlt(); ?>" required>
                </div>

            <div class="col-md-3 mb-3">
                <label for="player" class="form-label mb-2 fw-bold">¿De a cuantos se puede jugar?</label>
                <select class="form-select" name="player" id="player" required>
                    <option value="" selected disable>Elija una opción</option>
                    <option <?= $juego->getPlayer() == "1" ? "selected" : "" ?>>1</option>
                    <option <?= $juego->getPlayer() == "2" ? "selected" : "" ?>>2</option>
                </select>
            </div>

            <div class="boton d-flex justify-content-center mb-2">
            <button class="btn botonColorido" type="submit">Editar Juego</button>
        </div>           
        </form>
            </div>
        </div>
        </div>
    </div>
</div>