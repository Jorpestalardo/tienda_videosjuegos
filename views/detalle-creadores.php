<?PHP

$id = $_GET['id'] ?? FALSE;
$Creadores = new Creadores();
$creadores = $Creadores->get_x_id($id);


?>
<section class="detalle-creadores container">
<div class="row">

<?PHP if (isset($creadores)) { ?>
	<h1 class="text-center my-5"> <?= $creadores->getNombre_completo(); ?></h1>
    <div class="col">
            <div class="card mb-5">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="img/creadores/<?= $creadores->getImg(); ?>" class="img-fluid p-4" alt="Portada de <?= $creadores->getAlt(); ?>">
                    </div>
                    <div class="col-md-7 d-flex flex-column p-3">
                        <div class="card-body flex-grow-0">
                            <p class="fs-4 m-0 fw-bold creador"><?= $creadores->getNombre_completo(); ?></p>
                            <h2 class="card-title fs-2 mb-4"><?= $creadores->getCompany(); ?></h2>
                            <p class="card-text"><?= $creadores->getBiografia(); ?></p>
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