<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario</title>
</head>
<style type="text/css">
	body{
		margin: 0;
		padding: 0;
	}
	.header{
		background-color: #2EB40F;
		height: 80px;
		padding: 15px;

	}
	.header p{
		font-size: 25px;
		color: #373434;
		font-family: arial;
	}
	.corpo{
		padding: 5px;
	}

	.corpo label{
		font-size: 20px;
		color: #373434;
		font-family: arial;
	}
	.corpo input{
		height: 10px;
		width: 180px;
		border: 1px solid #2EB40F;
		padding: 15px;
	}
	.corpo button{
		height: 50px;
		width: 100px;
		border: none;
		background-color: #2EB40F;
		font-size: 20px;
		color: #373434;
		font-family: arial;
	}
	.corpo button a{
		text-decoration: none;
		color: #373434;
		font-family: arial;
	}
	.corpo button a:active{
		color: #373434;
		font-family: arial;
	}
	.error p{
		font-family: arial;
		font-size: 15px;
		color: #FF0000;
	}

</style>
<body>
	<div class="all">
		<div class="header">
			<p>Formulario</p>
		</div>
		<div class="error">
				<?php 

				if(isset($errors) && count($errors) > 0){
					foreach ($errors->all() as $error) {

						echo "<p>{$error}</p>";
					}
				}

				?>
		</div>
		<div class="corpo">
			<form action="<?php echo $url; ?>" method="POST">
			<input type="hidden" name="_token" value="<?php print(csrf_token()); ?>">
				<p><label>Nome</label></p>
				<p><input type="text" name="nome"></p>
				
				<p><label>Idade</label></p>
				<p><input type="number" name="idade"></p>

				<p><label>Email</label></p>
				<p><input type="email" name="email"></p>

				<p>
					<button type="submit" name="button">Validar</button>
					<button><a href="<?php echo $index; ?>">Cancelar</a></button>
				</p>
			</form>
		</div>
	</div>	
</body>
</html>