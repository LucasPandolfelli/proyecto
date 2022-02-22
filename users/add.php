<?php

include('../header.php');

if ($_POST) {

	$name = $_POST['name'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$street = $_POST['street'];
	$streetnumber = $_POST['streetnumber'];

	if ($name != '' && $lastname != '' && $email != '' && $password != '' && $street != '' && $streetnumber != ''){
		$sql = "INSERT INTO users (name, lastname, email, password, street, streetnumber) VALUES ('$name', '$lastname', '$email', '$password', '$street', '$streetnumber')";

		if ($mysqli->query($sql) === TRUE) {
			$success = "Se ha añadido correctamente un nuevo usuario";
		} else {
			echo "Error: " . $sql . "<br>" . $mysqli->error;
		}
	} 

	else {
		$error = "debe completar todos los campos";
	}

}

?>



<div class="container py-5">
	<h3 class="text-dark">Añadir usuario</h3>
	<div class="card p-4">
		<form method="post" class="mb-0">
			<div class="row mb-2">
				<div class="col-6">
					<label for="name" class="mb-1">Nombre</label>
					<input class="form-control form-control-sm" type="text" aria-label="name" name="name" required>
				</div>
				<div class="col-6">
					<label for="lastname" class="mb-1">Apellido</label>
					<input class="form-control form-control-sm" type="text" aria-label="lastname" name="lastname" required>
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-6">
					<label for="email" class="mb-1">Email</label>
					<input class="form-control form-control-sm" type="email" aria-label="email" name="email" required>
				</div>
				<div class="col-6">
					<label for="password" class="mb-1">Contraseña</label>
					<input class="form-control form-control-sm" type="password" aria-label="password" name="password" required>
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-6">
					<label for="street" class="mb-1">Calle</label>
					<input class="form-control form-control-sm" type="text" aria-label="street" name="street" required>
				</div>
				<div class="col-6">
					<label for="streetnumber" class="mb-1">Numero</label>
					<input class="form-control form-control-sm" type="number" aria-label="streetnumber" name="streetnumber" required>
				</div>
			</div>
			<div class="row justify-content-center">
				<button type="submit" class="w-auto py-2 px-4 fw-bold bg-dark text-white">Enviar</button>
			</div>
			<div class="row justify-content-center mt-3">
				<?php if(isset($success)) { ?>
					<p class="w-auto text-success"><?= $success; ?></p>
				<?php } ?>
				<?php if(isset($error)) { ?>
					<p class="w-auto text-danger"><?= $error; ?></p>
				<?php } ?>
			</div>
		</form>
	</div>
</div>





<?php

include('../footer.php');

?>