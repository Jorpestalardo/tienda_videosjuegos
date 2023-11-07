<?PHP
$personajes = (new Personajes())->todos_los_personajes();
?>
<div class="container">
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de Personajes</h1>
        <div class="row mb-5 d-flex align-items-center">
            <div>
				<?= (new Alerta())->get_alertas(); ?>
			</div>
            
            <table class="table">
                <thead>
                    <tr><th width="20%"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripion</th>
                        <th scope="col">alt</th>
                        <th scope="col">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($personajes as $personaje) { ?>
                        <tr>
                            <td><img src="../img/personajes/<?= $personaje->getImg(); ?>" alt="<?= $personaje->getAlt(); ?>" class="img-fluid sombra"></td>
                            <td><?= $personaje->getPersonaje(); ?></td>
                            <td><?= $personaje->getDescripcion(); ?></td>
                            <td><?= $personaje->getAlt(); ?></td>
                            <td>
                                <a href="index.php?sec=edit_personaje&id=<?= $personaje->getPersonaje_id(); ?>" role="button" class="d-block btn btn-sm btn-editar">Editar</a>
                                <a href="index.php?sec=delete_personaje&id=<?= $personaje->getPersonaje_id(); ?>" role="button" class="d-bock btn btn-sm btn-eliminar mt-1">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

                <a href="index.php?sec=add_personaje" class="btn botonColorido mt-5">Cargar nuevo personaje</a>
            </div>


        </div>
    </div>
</div>