<?PHP 
$miCarrito = new Carrito;
$items = $miCarrito->get_carrito();


?>

<h1 class="text-center fs-2 my-5">Tu Resumen</h1>
<div class="container">
<?PHP if (count($items)) { ?>
        <form  action="admin/actions/finalizar_compra_acc.php" method="POST" enctype="multipart/form-data">
        <div class="row my-5 justify-content-center">
        <div class="card col-sm-10 p-5 sombra-form m-5">    
        <table class="table">

                <thead>
                    <tr>
                        <th scope="col" width="10%">Portada</th>
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
                                <p><?= $item['cantidad']?></p>
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3">$<?= number_format($item['precio'], 2, ",", ".") ?></p>
                            </td>
                            <td class="text-end align-middle">
                                <p class="h5 py-3"> $<?= number_format($item['cantidad'] * $item['precio'], 2, ",", ".") ?></p>
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
                    </div>
                    </div>
        <div class="row my-5 justify-content-center">
            <div class="card col-sm-10 p-5 sombra-form m-5">
            <h2>Información de Envio</h2>
            <div class="mb-2">
                            <label for="nombreComprador">Nombre Completo</label>
                            <input type="text" class="form-control" name="nombreComprador" placeholder="Ej: Julian Gonzalez" required>
                        </div>
                        <div class="mb-2">
                            <label for="mail">Mail</label>
                            <input type="text" class="form-control" name="mail" placeholder="Ej: JulianGonzalez@hotmail.com" required>
                        </div>
                        <div class="mb-2">
                            <label for="direccion">Dirección</label>
                            <textarea name="direccion" id="direccion" class="form-control" placeholder="Escriba su direccion aqui" required></textarea>
                        </div>
                    </div>
                    </div>

        <div class="row my-5 justify-content-center">
            <div class="card col-sm-10 p-5 sombra-form m-5">
            <h2>Datos de Pago</h2>
            <div class="mb-2">
                            <label for="numeroTarjeta">Numero de la tarjeta</label>
                            <input type="text" class="form-control" id="numeroTarjeta" name="numeroTarjeta" placeholder="xxxx-xxxx-xxxx-xxxx" required>
                        </div>
                        <div class="mb-2">
                            <label for="nombreTarjeta">Nombre completo del titular</label>
                            <input type="text" class="form-control" id="nombreTarjeta" name="nombreTarjeta" placeholder="" required>
                        </div>
                        <div class="mb-2">
                            <label for="codigo" class="form-label">Código</label>
                            <input type="password" class="form-control" id="codigo" name="codigo" required>
                        </div>
                        <div class="mb-2">
                        <label for="pago" class="form-label">Método de Pago</label>
                    <select class="form-select" name="pago" id="pago" required>
                        <option value="" selected disabled>Elija una opcion</option>
                            <option value="debito">Débito</option>
                            <option value="credito">Crédito</option>
                            <option value="debito">Efectivo</option>
                        </select>
                        </div>
                    </div>
                    </div>


            <div class="boton d-flex justify-content-center mb-5">
            <button class="btn botonColorido" type="submit">Finalizar Compra</button>

            </div>
            </form>
            <?PHP }else{ ?>
                <h2 class="fs-4 text-center mb-5">Su carrito está vacio</h2>
                <p class="text-center">Te ofrecemos una amplia variedad de Juegos en nuestro catálogo.</p>
                <a href="index.php?sec=catalogo_completo" role="button" class="btn botonColorido m-4">Ver Catalogo</a>

        <?PHP } ?>