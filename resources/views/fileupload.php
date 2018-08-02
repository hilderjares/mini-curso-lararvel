<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File</title>
</head>
<body>
	<form action="<?= $rota; ?>" enctype="multipart/form-data" method="POST">
		<input type="hidden" name="_token" value="<?= csrf_token(); ?>" >
		<p><input type="file" name="imagem"></p>
		<p><button type="submit">Fazer Upload</button></p>
	</form>
	
	<?php if(isset($path)):

	$path = Session::get('path');
	$url = url('').DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$path;

	?>

	<p><img src="<?= $url ?>" height="150" width="150"></p>
	
	<?php endif; ?>

	<p><?= Session::get('success'); ?></p>
</body>
</html>