<section class="container">
<div id="contacto" class="d-flex justify-content-center m-5">
            <div class="card col-sm-6 p-5 sombra-form">
                <h1 class="contacto mb-3">Contacto</h1>
                <p> Dejanos tu consulta y en breve nos comunicaremos con vos!</p>
                <div class="mb-2">
                    <form action="index.php?sec=datos_envio" method="POST" class="sombra-form">
                        <div class="mb-4">
                            <label for="nombre" class="mb-1 fw-bold">Nombre</label>
                            <img src="img/contacto/silueta.png" class="p-1 mb-1">
                            <input type="text" class="form-control" name="nombre" placeholder="Ej: Julian" required>
                        </div>
                        <div class="mb-2">
                            <label for="apellido" class="mb-1 fw-bold">Apellido</label>
                            <img src="img/contacto/silueta.png" class="p-1 mb-1">
                            <input type="text" class="form-control" name="apellido" placeholder="Ej: Gonzalez" required>
                        </div>
                        <div class="mb-2">
                            <label for="mail" class="mb-1 fw-bold">Mail</label>
                            <img src="img/contacto/mail.png" class="p-1 mb-1">
                            <input type="text" class="form-control" name="mail" placeholder="Ej: JulianGonzalez@hotmail.com" required>
                        </div>
                        <div class="mb-2">
                            <label for="mensaje" class="mb-1 fw-bold">Mensaje</label>
                            <img src="img/contacto/mensaje.png" class="p-1 mb-1">
                            <textarea name="mensaje" id="mensaje" class="form-control" placeholder="Escriba su mensaje aqui" required></textarea>
                        </div>
                        <div class="boton d-flex justify-content-center mb-2">
                            <button class="btn botonColorido m-5" type="submit">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            

        </section>