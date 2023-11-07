<?PHP
$id = $_GET['id'] ?? FALSE;
$consola = (new Consola())->get_x_id($id);
?>
<div class="container">
<div class="row my-5 justify-content-center g-3">
<div class="card col-sm-10 p-5 sombra-form m-5 d-flex flex-column align-items-center ">
<h1 class="fs-3 text-center mb-5 fw-bold">¿Está seguro que desea eliminar esta consola "<?= $consola->getNombre(); ?>"?</h1>
	<div class="col-12 col-md-6">
		<img src="../img/juegos/<?= $consola->getImg(); ?>" alt="<?= $consola->getAlt(); ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">
    <h2 class="fs-4">Datos del consola:</h2>
        <ul>
            <li>
			<p class="fs-6 mb-2 fw-bold">Nombre:</p>
			<p><?= $consola->getNombre(); ?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Año:</p>
			<p><?= $consola->getAnio(); ?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Descripcion:</p>
			<p><?= $consola->getDescripcion();?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Precio:</p>
			<p><?= $consola->getPrecio(); ?></p>
            </li>
            <li>
            <p class="fs-6">Alt:</p>
			<p><?= $consola->getAlt(); ?></p>
            </li>
        </ul>
		<div class="boton d-flex justify-content-center mb-2">
			<a href="actions/delete_consola_acc.php?id=<?= $consola->getconsola_id(); ?>" role="button" class="btn btn-eliminar mt-4">Eliminar Consola</a>
			</div>
	</div>
</div>


</div>