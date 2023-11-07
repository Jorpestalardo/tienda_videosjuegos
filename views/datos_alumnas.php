<?PHP

$nuevaAlumna = new Alumna();
$alumnas = $nuevaAlumna->alumnas_informacion();

?>
<section class="container datos_alumnas">
<h1 class="text-center pt-5">Datos de las Alumnas</h1>
<div class="row d-flex justify-content-md-between">
<?PHP if (count($alumnas)) { ?>
    <?PHP foreach ($alumnas as $alumna){ ?>
        
<div class="col-sm-12 col-md-6 col-lg-5 m-1">
    <div class="card shadow-sm align-items-center">
            <img src="img/<?= $alumna->getImg(); ?>" class="fotoAlumna">
        <div class="card-body">
                <p class="card-text">Alumna De la Escuela Davinci</p>
                <p class="h4"><?= $alumna->getNombre(); ?> <?= $alumna->getApellido(); ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="h5">
                    <ul>
                        <li class="card-text infoAlumna"><span class="datos">Edad:</span> <?= $alumna->getEdad(); ?></li>
                        <li class="card-text infoAlumna"><span class="datos">Correo:</span> <?= $alumna->getMail(); ?></li>
                        <li class="card-text infoAlumna"><span class="datos">Instagram:</span> <?= $alumna->getInstagram(); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    
                    
    <?PHP } ?>   
    <?PHP }else{?>
        <div class="col mb-2">
            <h2>No se encontró información de las alumnas</h2>
        </div>
    <?PHP }?>
</div>
    </section>