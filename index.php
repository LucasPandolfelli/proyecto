<?php

include('header.php');

$sql = "SELECT title, content FROM posts";
$result = $mysqli->query($sql); 

?>

<div class="container py-5"> 
	<div class="row justify-content-end mb-5">
		<a href="posts/add.php" class="w-auto a-btn py-2 px-4">Nuevo post</a>
	</div>
	<div class="row">
		<h3 class="mb-3">Posteos</h3>
		<?php
		if ($result->num_rows > 0) {
			?>
			<div class="row">
				<?php while ($row = $result->fetch_assoc()) { ?>
					<div class="col-4">
						<div class="card p-3">
							<img class="card-img-top" src="https://bulma.io/images/placeholders/1280x960.png" alt="Card image cap">
							<div class="card-body">
								<h5 class="card-title"><?=$row['title'];?></h5>
								<p class="card-text"><?=$row['content'];?></p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		<?php } else { ?>
			<div>No hay registros</div>
		<?php } ?>
	</div>
</div>







<?php

include('footer.php');

?>


