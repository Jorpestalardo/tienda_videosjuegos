<?PHP

$id = $_GET['id'] ?? FALSE;
$miJuego = new Juego();
$juego = $miJuego->consola_x_id($id);


?>
<section class="detalle-juego container">
<div class="row">

<?PHP if (isset($juego)) { ?>
	<h1 class="text-center my-5"> <?= $juego->getNombreProducto(); ?></h1>
    <div class="col">
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="img/juegos/<?= $juego->getImg(); ?>" class="img-fluid p-4 sombra" alt="Portada de <?= $juego->getAlt(); ?>">
                    </div>
                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body flex-grow-0">
                            <p class="fs-4 m-0 fw-bold consola"><?=  $juego->getConsola()->getNombre(); ?></p>
                            <h2 class="card-title fs-2 mb-4"><?= $juego->getNombreProducto(); ?></h2>
                            <p class="card-text"><?= $juego->getDescripcion() ?></p>
                            <p class="card-text">Año: <?= $juego->getAnio(); ?></p>

                        </div>
    <ul class="list-group list-group-flush border-top border-bottom">
        <li class = "list-group-item"> 
            <h3 class="mb-3">Personaje Principal</h3>
            <div class="row">
            <div class="col-4"><img src="img/personajes/<?= $juego->getPersonajes()->getImg(); ?>" alt=" <?= $juego->getPersonajes()->getAlt() ?>" class="img-fluid sombra"></div>
                <div class="col-8">
                    <h3 class="fs-5 text-danger"><?= $juego->getPersonajes()->getPersonaje(); ?></h3>
                    <p class="text-dark fst-italic"><?= $juego->getPersonajes()->getDescripcion(); ?></p>
                </div>
            </div>
        </li >
    </ul>
    <ul class="list-group list-group-flush border-top border-bottom">
        <li class="list-group-item">
            <h3 class="mb-3">Personajes Secundarios</h3>
            <?PHP foreach ($juego->getPersonajes_secundarios() as $value) { ?>
                
                <div class="row pb-3 mb-3 border-bottom">
                    <div class="col-9">
                        <h3 class="fs-5 text-danger"><?= $value->getPersonaje(); ?></h3>
                        <p class="text-dark fst-italic"><?= $value->getDescripcion(); ?></p>
                    </div>
                    <div class="col-3"><img src="img/personajes/<?= $value->getImg() ?>" alt=" <?= $juego->getPersonajes()->getAlt() ?>" class="img-fluid sombra"></div>

                    </div>
            <?PHP  } ?>
        </li>
    </ul>
    <ul class="list-group list-group-flush border-top border-bottom">
        <li class="list-group-item">
            <h3 class="mb-3">Creadores</h3>
            <div class="row">
            <div class="col-4"><img src="img/creadores/<?= $juego->getCreadores()->getImg(); ?>" alt=" <?= $juego->getCreadores()->getAlt() ?>" class="img-fluid rounded shadow-sm"></div>
                <div class="col-8">
                    <h3 class="fs-5 text-danger"><?= $juego->getCreadores()->getNombre_completo(); ?></h3>
                    <p class="text-dark fst-italic">Biografia: <?= $juego->getCreadores()->getBiografia(); ?></p>
                    <p class="text-dark fst-italic">Company: <?= $juego->getCreadores()->getCompany(); ?></p>
                </div>
            </div>
            </li>
        </ul>
                        <div class="card-body flex-grow-0 mt-auto">
                            <div class="fs-3 mb-3 fw-bold text-center text-success"><img src="img/coin.png" alt="moneda"><?= $juego->getPrecio(); ?></div>
                            <div class="row <?= $userData ? "d-none" : "" ?>">
                                <p class="fw-bold text-center text-muted">Para comprar este producto debes loguearte: <a class="btn btn-sm botonColorido fw-bold" href="index.php?sec=login">Inicia sesión</a></p>
                            </div>
    <form action="admin/actions/add_item_acc.php" method="GET" class="row <?= $userData ? "" : "d-none" ?>">
        <div class="col-6 d-flex align-items-center">
                    <label for="c" class="fw-bold me-2">Cantidad: </label>
                    <input type="number" class="form-control" value="1" name="c" id="c">
                </div>
                <div class="col-6">
                    <input type="submit" value="COMPRAR" class="btn botonColorido w-100 fw-bold">
                    <input type="hidden" value="<?= $id ?>" name="id" id="id">
                </div>
    </form>
</div>
                    </div>
                </div>
            </div>

    
<?PHP }else{?>
        <div class="col mb-2">
            <h2>No se encontraron productos</h2>
        </div>
        <?PHP }?> 
</div>
</section>

