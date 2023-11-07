<?PHP
$creadores = (new Creadores())->catalogo_completo();
?>
<div class="container">
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de Creadores</h1>
        <div class="row mb-5 d-flex align-items-center">

            <div>
				<?= (new Alerta())->get_alertas(); ?>
			</div>
            
            <table class="table">
                <thead>
                    <tr><th width="20%"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Biografía</th>
                        <th scope="col">Compañía</th>
                        <th scope="col">alt</th>
                        <th scope="col">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($creadores as $creador) { ?>
                        <tr>
                            <td><img src="../img/creadores/<?= $creador->getImg(); ?>" alt="<?= $creador->getAlt(); ?>" class="img-fluid rounded shadow-sm"></td>
                            <td><?= $creador->getNombre_completo(); ?></td>
                            <td><?= $creador->getBiografia(); ?></td>
                            <td><?= $creador->getCompany(); ?></td>
                            <td><?= $creador->getAlt(); ?></td>
                            <td>
                                <a href="index.php?sec=edit_creador&id=<?= $creador->getCreadores_id(); ?>" role="button" class="d-block btn btn-sm btn-editar">Editar</a>
                                <a href="index.php?sec=delete_creador&id=<?= $creador->getCreadores_id(); ?>" role="button" class="d-bock btn btn-sm btn-eliminar mt-1">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

                <a href="index.php?sec=add_creador" class="btn botonColorido mt-5">Cargar nuevo creador</a>
            </div>


        </div>
    </div>
</div>

