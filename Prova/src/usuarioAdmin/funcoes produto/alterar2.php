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
						<a href="../funcoes usuario/consultar.php"><li>Consultar</li></a>
						<a href="../funcoes usuario/alterar.php"><li>Alterar</li></a>
						<a href="../funcoes usuario/inserir.php"><li>Inserir</li></a>
						<a href="../funcoes usuario/remover.php"><li>Remover</li></a>
						<a href="../funcoes usuario/listar.php"><li>Listar</li></a>
					</ul>
				</li>
				<li>Produtos
					<ul>
						<a href="../funcoes produto/consultar.php"><li>Consultar</li></a>
						<a href="../funcoes produto/alterar.php"><li>Alterar</li></a>
						<a href="../funcoes produto/inserir.php"><li>Inserir</li></a>
						<a href="../funcoes produto/remover.php"><li>Remover</li></a>
						<a href="../funcoes produto/listar.php"><li>Listar</li></a>
					</ul>
				</li>
			</ul>
			
			<p id="saudacao">Bem vindo <?php echo $_SESSION["nome"]; ?>!!</p>
			<p id="sair"><a id="linkSair" href="../sair.php">Fazer Logout</a></p>
		</nav>
	</div>
	
	<h1 >Inserir Produto</h1>
		<h2 id="titulo">Informe os dados:</h2>
	<form method="post" action="../../db/produtos/update-prepared-mysqli-oo-where-Admin.php?id=<?php echo $_GET["id"];?>">
		<p>Nome: <input type="text" name="txtNome" value="<?php echo $_GET["nome"];?>" required></p>
		<p>Fornecedor: <input type="text" name="txtFornec" value="<?php echo $_GET["fornecedor"];?>" ></p>
		<p>Tipo: <input type="text" name="txtTipo" value="<?php echo $_GET["tipo"];?>" ></p>
		<p>Descrição: <input type="text" name="txtDesc" value="<?php echo $_GET["descricao"];?>"></p>
		<p>Preco: <input type="text" name="txtPreco" value="<?php echo $_GET["preco"];?>" required></p>
		
		
		<p><input type="submit" value="Inserir Produto"></p>
	</form>
	
</body>
</html>