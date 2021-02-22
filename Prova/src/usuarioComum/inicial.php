<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="descrição" content="exercícios de fixação">
	<meta name="keywords" content="PHP, HTML, JavaScript, CSS">
	<meta name="autor" content="Wilson Prates de Oliveira">
	<meta name="viewport" content="width=device-width, initial-	scale=1.0">
	<title>Aula 7: arrays e variáveis superglobais</title>
	
	<link rel="stylesheet" type="text/css" href="../../css/estilo.css" media="screen" />
		
	</style>
<head>
<body>
	
	<div >
		<nav class="menu">
			<ul>
				<li>Usuario
					<ul>
						<a href="funcoes usuario/consultar.php"><li>Consultar</li></a>
						<a href="funcoes usuario/alterar.php"><li>Alterar</li></a>
						<a href="funcoes usuario/listar.php"><li>Listar</li></a>
					</ul>
				</li>
			</ul>
			
			<p id="saudacao">Bem vindo <?php echo $_SESSION["nome"]; ?>!!</p>
			<p id="sair"><a id="linkSair" href="sair.php">Fazer Logout</a></p>
		</nav>
	</div>
</body>
</html>