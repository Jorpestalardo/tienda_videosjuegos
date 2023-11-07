<?PHP
$id = $_GET['id'] ?? FALSE;
$creador = (new Creadores())->get_x_id($id);
?>
<div class="container">
<div class="row my-5 justify-content-center g-3">
<div class="card col-sm-10 p-5 sombra-form m-5 d-flex flex-column align-items-center ">
<h1 class="fs-3 text-center mb-5 fw-bold">¿Está seguro que desea eliminar este creador "<?= $creador->getNombre_completo(); ?>"?</h1>
	<div class="col-12 col-md-6">
		<img src="../img/creadores/<?= $creador->getImg(); ?>" alt="<?= $creador->getAlt(); ?>" class="img-fluid rounded shadow-sm d-block mx-auto mb-3">	
    <h2 class="fs-4">Datos del creador:</h2>
        <ul>
            <li>
			<p class="fs-6 mb-2 fw-bold">Nombre:</p>
			<p><?= $creador->getNombre_completo(); ?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Biografia:</p>
			<p><?= $creador->getBiografia(); ?></p>
            </li>
            <li>
			<p class="fs-6 mb-2 fw-bold">Company:</p>
			<p><?= $creador->getCompany();?></p>
            </li>
            <li>
            <p class="fs-6 mb-2 fw-bold">Alt:</p>
			<p><?= $creador->getAlt(); ?></p>
            </li>
        </ul>
		<div class="boton d-flex justify-content-center mb-2">
			<a href="actions/delete_creador_acc.php?id=<?= $creador->getCreadores_id(); ?>" role="button" class="btn btn-eliminar mt-4">Eliminar Creador</a>
			</div>
	</div>
</div>
</div>