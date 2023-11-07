<?PHP

$idC = $_GET['id'] ?? FALSE;
$MiConsola = new Consola();
$consola = $MiConsola->get_x_id($idC);


?>
<section class="detalle-consola container">
<div class="row">

<?PHP if (isset($consola)) { ?>
	<h1 class="text-center my-5"> <?= $consola->getNombre(); ?></h1>
    <div class="col">
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="img/juegos/<?= $consola->getImg(); ?>" class="img-fluid p-4 sombra" alt="Portada de <?= $consola->getAlt(); ?>">
                    </div>
                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body flex-grow-0">
                            <p class="fs-4 m-0 fw-bold consola">Consola Retro</p>
                            <h2 class="card-title fs-2 mb-4"><?= $consola->getNombre(); ?></h2>
                            <p class="card-text"><?= $consola->getDescripcion() ?></p>
                        </div>

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Año: <?= $consola->getAnio(); ?></li>
                        </ul>

                        <div class="card-body flex-grow-0 mt-auto">
                            <div class="fs-3 mb-3 fw-bold text-center text-success"><img src="img/coin.png" alt="moneda"><?= $consola->getPrecio(); ?></div>
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
                    <input type="hidden" value="<?= $idC ?>" name="idC" id="idC">
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
