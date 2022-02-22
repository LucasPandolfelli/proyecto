<?php
include('../header.php');


$id = $_GET['id'];

	

	


	if ($_POST) {


		$name = $_POST['name'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$street = $_POST['street'];
		$streetnumber = $_POST['streetnumber'];

		if ($name != '' && $lastname != '' && $email != '' && $street != '' && $streetnumber != '') {

			$sql = "UPDATE users SET name = '$name', lastname = '$lastname', email = '$email', street = '$street', streetnumber = '$streetnumber' WHERE id = $id";

			if ($mysqli->query($sql) === TRUE) {

				$success = "Campos actualizados";

			} else {
				echo "Error: " . $sql . "<br>" . $mysqli->error;
			}

		} else {
			$error = "Debe completar todos los campos";
		}


	}

	

	
	$sql = "SELECT id, name, lastname, email, street, streetnumber FROM users WHERE id = $id";
	$result = $mysqli->query($sql);
	$user = $result->fetch_assoc();


?>


<div class="container py-5">
	<h3 class="text-dark">Editar usuario</h3>
	<div class="card p-4">
		<form method="post" class="mb-0">
			<div class="row mb-2">
				<div class="col-6">
					<label for="name" class="mb-1">Nombre</label>
					<input class="form-control form-control-sm" type="text" aria-label="name" name="name" required value="<?=$user['name'];?>">
				</div>
				<div class="col-6">
					<label for="lastname" class="mb-1">Apellido</label>
					<input class="form-control form-control-sm" type="text" aria-label="lastname" name="lastname" required value="<?=$user['lastname'];?>">
				</div>
			</div>
			<div class="row mb-4">
				<div class="col-6">
					<label for="street" class="mb-1">Calle</label>
					<input class="form-control form-control-sm" type="text" aria-label="street" name="street" required value="<?=$user['street'];?>">
				</div>
				<div class="col-6">
					<label for="streetnumber" class="mb-1">Numero</label>
					<input class="form-control form-control-sm" type="number" aria-label="streetnumber" name="streetnumber" required value="<?=$user['streetnumber'];?>">
				</div>
			</div>
			<div class="row mb-2">
				<div class="col-6">
					<label for="email" class="mb-1">Email</label>
					<input class="form-control form-control-sm" type="email" aria-label="email" name="email" required value="<?=$user['email'];?>">
				</div>
			</div>
			<div class="row mt-4 justify-content-center">
				<button type="submit" class="w-auto py-2 px-4 fw-bold bg-dark text-white">Actualizar</button>
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