<?PHP

$miconsola = new consola();
$productos = $miconsola->catalogo_completo();


?>
<section class="consolas container">
<h1 class="text-center mb-5 mt-5 fw-bold">Todos nuestros productos:</h1>
<h2 class="fs-1 text-center mb-5 mt-5 fw-bold">Consolas</h2>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

<?PHP if (count($productos)) { ?>
    <?PHP foreach ($productos as $consola){ ?>
        <div class="col">
        <div class="card mb-3">
        <picture>
        <img src="img/juegos/<?= $consola->getImg(); ?>" class="card-img-top sombra p-3" alt="<?= $consola->getAlt();?>">
    </picture>
            
            <div class="card-body">
                <h3 class="fs-6 m-0 fw-bold consola">Titulo: "<?= $consola->getNombre(); ?>"</h3>
                <p class="card-text">Descripción: <?= $consola->descripcion_reducida(); ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="datos">Año:</span> <?= $consola->getAnio(); ?></li>
            </ul>
            <div class="card-body">
                <div class="fs-3 mb-3 fw-bold text-center">
                <p><img src="img/coin.png" alt="moneda"><?= $consola->getPrecio(); ?></p>
                </div>
                <a href="index.php?sec=detalle-consolas&id=<?= $consola->getConsola_id(); ?>" class="btn botonColorido w-100 fw-bold">VER MÁS</a>
            </div>

        </div>
    </div>
    <?PHP } ?>   
    <?PHP }else{?>
        <div class="col mb-2">
            <h2>No se encontraron productos</h2>
        </div>
        <?PHP }?> 

        

</div>


<?PHP

$miJuego = new Juego();
$productos = $miJuego->catalogo_completo();

?>
<section class="catalogo_completo container">
    <h4 class="fs-1 text-center mb-5 mt-5 fw-bold">¡Juegos!</h4>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
<?PHP if (count($productos)) { ?>
    <?PHP foreach ($productos as $juego){ ?>
        <div class="col">
            <div class="card mb-3">
                <picture>
                    <img src="img/juegos/<?= $juego->getImg(); ?>" class="card-img-top sombra p-3" alt="<?= $juego->getAlt();?>">
                </picture>
            
            <div class="card-body">
                <p class="fs-6 m-0 fw-bold consola">Consola:  <?=  $juego->getConsola()->getNombre()?></p>
                <h5 class="card-title fs-5">Titulo: "<?= $juego->getNombreProducto(); ?>"</h5>
                <p class="card-text">Descripción: <?= $juego->descripcion_reducida();?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="datos">Año:</span> <?= $juego->getAnio(); ?></li>
                <li class="list-group-item"><span class="datos">Creadores:</span><a href="index.php?sec=detalle-creadores&id=<?= $juego->getCreadores_id(); ?>"><?= $juego->getCreadores()->getNombre_completo();?></a> </li>
            </ul>
            <div class="card-body">
                <div class="fs-3 mb-3 fw-bold text-center text-success"><img src="img/coin.png" alt="moneda"><?= $juego->getPrecio(); ?></div>
                <a href="index.php?sec=detalle-juegos&id=<?= $juego->getProductoId(); ?>" class="btn botonColorido w-100 fw-bold">VER MÁS</a>
            </div>

        </div>
    </div>
    <?PHP } ?>   
    <?PHP }else{?>
        <div class="col mb-2">
            <h2>No se encontraron productos</h2>
        </div>
        <?PHP }?> 

</div>

</div>
    </section>