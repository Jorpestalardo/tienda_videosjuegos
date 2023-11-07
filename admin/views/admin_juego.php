<?PHP

$juegos = (new Juego())->catalogo_completo();
$personajes = (new Personajes ())->todos_los_personajes();

?>
<div class="container">
<div class="row my-5">
    <div class="col">
        <h1 class="text-center mb-5 fw-bold">Administración de Juegos</h1>
        <div class="row mb-5 d-flex align-items-center">

            <div>
				<?= (new Alerta())->get_alertas(); ?>
			</div>
            
            <table class="table">
                <thead>
                    <tr><th width="20%"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Consola</th>
                        <th scope="col">Año</th>
                        <th scope="col">Descripion</th>
                        <th scope="col">Personaje/s secundario/s</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Player</th>
                        <th scope="col">Alt</th>
                        <th scope="col">acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($juegos as $juego) { ?>
                        <tr>
                            <td><img src="../img/juegos/<?= $juego->getImg(); ?>" alt="<?= $juego->getAlt(); ?>" class="img-fluid rounded shadow-sm"></td>
                            <td><?= $juego->getNombreProducto(); ?></td>
                            <td><?= $juego->getConsola()->getNombre(); ?></td>
                            <td><?= $juego->getAnio(); ?></td>
                            <td><?= $juego->getDescripcion(); ?></td>
                            <td>
                            <?PHP                               
                            foreach ($juego->getPersonajes_secundarios() as $PS) {                                
                                echo "<p>" . $PS->getPersonaje() . "</p>";
                            }
                            ?>
                            </td>
                            </td>
                            <td>$<?= $juego->getPrecio(); ?></td>
                            <td><?= $juego->getPlayer(); ?></td>
                            <td><?= $juego->getAlt(); ?></td>
                            <td>
                                <a href="index.php?sec=edit_juego&id=<?= $juego->getproductoId(); ?>" role="button" class="d-block btn btn-sm btn-editar">Editar</a>
                                <a href="index.php?sec=delete_juego&id=<?= $juego->getproductoId(); ?>" role="button" class="d-bock btn btn-sm btn-eliminar mt-1">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>
                </tbody>
            </table>

                <a href="index.php?sec=add_juego" class="btn botonColorido mt-5">Cargar nuevo juego</a>
            </div>


        </div>
    </div>
</div>