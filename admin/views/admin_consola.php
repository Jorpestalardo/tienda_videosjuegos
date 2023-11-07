<?PHP
$consolas = (new Consola())->catalogo_completo();
?>
<div class="container">
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de Consolas</h1>
        <div class="row mb-5 d-flex align-items-center">

            <div>
				<?= (new Alerta())->get_alertas(); ?>
			</div>

            <table class="table">
                <thead>
                    <tr><th width="20%"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Año</th>
                        <th scope="col">Descripion</th>
                        <th scope="col">Precio</th>
                        <th scope="col">alt</th>
                        <th scope="col">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($consolas as $consola) { ?>
                        <tr>
                            <td><img src="../img/juegos/<?= $consola->getImg(); ?>" alt="<?= $consola->getAlt(); ?>" class="img-fluid rounded shadow-sm"></td>
                            <td><?= $consola->getNombre(); ?></td>
                            <td><?= $consola->getAnio(); ?></td>
                            <td><?= $consola->getDescripcion(); ?></td>
                            <td>$<?= $consola->getPrecio(); ?></td>
                            <td><?= $consola->getAlt(); ?></td>
                            <td>
                                <a href="index.php?sec=edit_consola&id=<?= $consola->getConsola_id(); ?>" role="button" class="d-block btn btn-sm btn-editar">Editar</a>
                                <a href="index.php?sec=delete_consola&id=<?= $consola->getConsola_id(); ?>" role="button" class="d-bock btn btn-sm btn-eliminar mt-1">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

                <a href="index.php?sec=add_consola" class="btn botonColorido mt-5">Cargar nueva consola</a>
            </div>


        </div>
    </div>
</div>