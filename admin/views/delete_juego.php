<?PHP
$id = $_GET['id'] ?? FALSE;
$juego = (new Juego())->consola_x_id($id);

?>
<div class="container">
<div class="row my-5 justify-content-center g-3">
<div class="card col-sm-10 p-5 sombra-form m-5 d-flex flex-column align-items-center ">
<h1 class="fs-3 text-center mb-5 fw-bold">¿Está seguro que desea eliminar el juego <?= $juego->getNombreProducto(); ?>?</h1>
	<div class="col-12 col-md-6">
		<img src="../img/juegos/<?= $juego->getImg(); ?>" alt="<?= $juego->getAlt(); ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
		
    <h2 class="fs-4">Datos del juego:</h2>
        <ul>
        <li>
			<p class="fs-6 mb-2 fw-bold">Nombre:</p>
			<p><?= $juego->getNombreProducto(); ?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Consola:</p>
			<p><?= $juego->getConsola()->getNombre(); ?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Año:</p>
			<p><?= $juego->getAnio(); ?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Descripcion</p>
			<p><?= $juego->getDescripcion(); ?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Precio:</p>
			<p><?= $juego->getPrecio(); ?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Player:</p>
			<p><?= $juego->getPlayer(); ?></p>
            </li>
            <li>
            <p class="fs-6 mb-2 fw-bold">Alt:</p>
			<p><?= $juego->getAlt(); ?></p>
            </li>
        </ul>
		<div class="boton d-flex justify-content-center mb-2">
			<a href="actions/delete_juego_acc.php?id=<?= $juego->getproductoId(); ?>" role="button" class="btn btn-eliminar mt-4">Eliminar Juego</a>
			</div>
		</div>
</div>

</div>