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
	
	<link rel="stylesheet" type="text/css" href="../../../css/estilo.css" media="screen" />

<head>
<body>
	
	<div >
		<nav class="menu">
			<ul>
				<li>Usuario
					<ul>
						<a href="consultar.php"><li>Consultar</li></a>
						<a href="alterar.php"><li>Alterar</li></a>
						<a href="listar.php"><li>Listar</li></a>
					</ul>
				</li>
			</ul>
			
			<p id="saudacao">Bem vindo <?php echo $_SESSION["nome"]; ?>!!</p>
			<p id="sair"><a id="linkSair" href="../sair.php">Fazer Logout</a></p>
		</nav>
	</div>
	
		<h1 >Aterar Usuário</h1>
		<h2 id="titulo">Altere os dados:</h2>
		<form method="post" action="../../db/usuario/update-prepared-mysqli-oo-where.php?id=<?php echo $_SESSION["id"];?>">
			<p>Nome: <input type="text" name="txtNome" value="<?php echo $_SESSION["nome"]?>" required></p>
			<p>Login: <input type="text" name="txtLogin" value="<?php echo $_SESSION["login"]; ?>" required></p>
			<p>Senha: <input type="password" name="txtSenha" required></p>
			<p>Repita a senha: <input type="password" name="txtSenha2" required></p>
			
			<p><input type="submit" value="Salvar Usuario"></p>
		</form>
	
</body>
</html>