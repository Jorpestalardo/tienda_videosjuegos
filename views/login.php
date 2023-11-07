<div class="container">
	<div class="row my-5 justify-content-center">
    	<div class="col col-md-5 d-flex flex-column align-items-center">
			<div>
				<?= (new Alerta())->get_alertas(); ?>
			</div>
			<div class="card col-sm-10 p-5 sombra-form">
			<h1 class="text-center mb-3 fw-bold contacto">Inciar Sesión</h1>

			<form class="row g-3 sombra-form" action="admin/actions/auth_login.php" method="POST">
				<div class="col-12 mb-3">
					<label for="username" class="form-label mb-2 fw-bold">Nombre de Usuario</label>
					<input type="text" class="form-control" id="username" name="username" required>
				</div>
				<div class="col-12 mb-3">
					<label for="pass" class="form-label mb-2 fw-bold">Password</label>
					<input type="password" class="form-control" id="pass" name="pass" required>
				</div>
					<div class="boton d-flex justify-content-center mb-2">
                        <button class="btn botonColorido" type="submit">Inciar Sesión</button>
                    </div>
				<div class="col-12">
					<p>Si no estas registrado:</p>
				<a href="index.php?sec=registrarse" class="btn btn-editar">Registrarse</a>
				</div>

			</form> 
		</div>          
		</div>
    </div>
</div>
