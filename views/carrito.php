<?PHP 
$miCarrito = new Carrito;
$items = (new Carrito)->get_carrito();

?>

<h1 class="text-center fs-2 my-5">Carrito de Compras</h1>
<div class="container">
<?PHP if (count($items)) { ?>
        <form action="admin/actions/update_items_acc.php" method="POST">
        <div class="row my-5 justify-content-center">
            <div class="card col-sm-10 p-5 sombra-form m-5">
            <table class="table">

                <thead>
                    <tr>
                        <th scope="col" width="20%">Portada</th>
                        <th scope="col" width="15%">Datos del producto</th>
                        <th scope="col" width="10%">Cantidad</th>
                        <th class="text-end" scope=" col" width="15%">Precio Unitario</th>
                        <th class="text-end" scope="col" width="15%">Subtotal</th>
                        <th class="text-end" scope="col" width="10%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?PHP foreach ($items as $key => $item) { ?>
                        <tr>
                            <td><img src="img/juegos/<?= $item['imagen']?>" alt="<?= $item['alt'] ?>" class="img-fluid rounded shadow-sm"></td>

                            <td class="align-middle">
                                <h2 class="fs-3"> 
                                <?= $item['nombre']?>
                                </h2>
                            </td>
                            <td class="align-middle">
                                <label for="c<?= $key ?>" class="visually-hidden">Cantidad</label>
                                <input type="number" class="form-control" value="<?= $item['cantidad'] ?>" id="c<?= $key ?>" name="c[<?= $key ?>]">
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3">$<?= number_format($item['precio'], 2, ",", ".") ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3"> $<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <a href="admin/actions/remove_item_acc.php?id=<?= $key ?>" class="btn btn-sm btn-eliminar">Eliminar</a>
                            </td>
                        </tr>
                    <?PHP } ?>

                    <tr>
                        <td colspan="4" class="text-end">
                            <h2 class="fs-3 py-3">Total:</h2>
                        </td>
                        <td class="text-end">
                            <p class="fs-5 py-3">$<?= number_format($miCarrito->precio_total(), 2, ",", ".") ?></p>
                        </td>
                        <td></td>
                    </tr>
                </tbody>



            </table>
                    
            <div class="d-flex justify-content-between">
            <input type="submit" value="Actualizar Cantidades" class="btn btn-sm botonColorido m-4">
            <a href="admin/actions/clear_items_acc.php" role="button" class="btn btn-eliminar m-4">Vaciar Carrito</a>
            <a href="index.php?sec=catalogo_completo" role="button" class="btn btn-editar m-4">Ver Catalogo</a>
            <a href="index.php?sec=finalizar_compra" role="button" class="btn btn-finalizar m-4">Comprar</a>
            </div>
            
            </div>
                    </div>


            </form>
        <?PHP }else{ ?>
            <div class="row my-5 justify-content-center">
<div class="card col-sm-10 p-5 sombra-form m-5">
                <h2 class="fs-4 text-center mb-5">Su carrito está vacio</h2>
                <p class="text-center">Te ofrecemos una amplia variedad de Juegos en nuestro catálogo.</p>
                <a href="index.php?sec=catalogo_completo" role="button" class="btn botonColorido m-4">Ver Catalogo</a>
                </div>
                    </div>

        <?PHP } ?>

    
</div>