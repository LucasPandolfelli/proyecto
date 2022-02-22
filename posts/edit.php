<?php
include('../header.php');


$id = $_GET['id'];


	if ($_POST) {


		$title = $_POST['title'];
		$content = $_POST['content'];

		if ($title != '' && $content != '') {

			$sql = "UPDATE posts SET title = '$title', content = '$content' WHERE id = $id";

			if ($mysqli->query($sql) === TRUE) {

				$success = "Campos actualizados";

			} else {
				echo "Error: " . $sql . "<br>" . $mysqli->error;
			}

		} else {
			$error = "Debe completar todos los campos";
		}


	}

	

	
	$sql = "SELECT id, title, content FROM posts WHERE id = $id";
	$result = $mysqli->query($sql);
	$post = $result->fetch_assoc();


?>


<div class="container py-5">
	<div class="row justify-content-center">
		<div class="col-12 col-md-6">
			<h3 class="text-dark mb-3">Añadir post</h3>
			<div class="card p-4">
				<form method="post" class="mb-0">
					<div class="mb-3">
						<label for="name" class="mb-1">Título</label>
						<input class="form-control form-control-sm" type="text" aria-label="title" name="title" required value="<?=$post['title'];?>">
					</div>
					<div class="mb-3">
						<label for="content" class="form-label">Example textarea</label>
						<textarea class="form-control" id="editor" name="content" rows="8"><?=$post['content'];?></textarea>
					</div>
					<div class="d-flex justify-content-center">
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
	</div>
</div>


<script>
	ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.catch( error => {
		console.error( error );
	} );
</script>





<?php

include('../footer.php');

?>