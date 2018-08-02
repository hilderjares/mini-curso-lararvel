<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Pagina Inicial</title>
</head>
<style type="text/css">
	body{
		margin: 0;
		padding: 0;
	}
	ul {
	    list-style-type: none;
	    margin: 0;
	    padding: 0;
	    overflow: hidden;
	    background-color: #333;
	}

	li {
    	float: left;
	}

	li a {
	    display: block;
	    color: white;
	    text-align: center;
	    padding: 14px 16px;
	    text-decoration: none;
	}

	li a:hover:not(.active) {
    	background-color: #4CAF50;
	}

	.active {
    	background-color: #4CAF50;
	}

	table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
}
</style>
<body>
	<div class="menu">
		<ul>
			<li><a href="<?php echo $cadastrar; ?>">Cadastrar</a></li>
			<li><a href="">Email</a></li>
			<li><a href="">Teste</a></li>
		</ul>
	</div>
	<div class="corpo">
		<table>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Idade</th>
				<th>Email</th>
			</tr>
			<?php foreach ($clientes as $value) { ?>
			<tr>
				<td>
					<?php print($value->id_cliente); ?>	
				</td>
				<td>
					<?php print($value->nome); ?>	
				</td>
				<td>
					<?php print($value->idade); ?>
				</td>
				<td>
					<?php print($value->email); ?>
				</td>
			</tr>
			<?php } ?>
		</table>
		<div class="mensagem">
			<?php 

				$message = filter_input(INPUT_GET,'message');
				$mensagem = isset($message)? $message : "";
				echo $mensagem;

			?>
		</div>
	</div>
</body>
</html>