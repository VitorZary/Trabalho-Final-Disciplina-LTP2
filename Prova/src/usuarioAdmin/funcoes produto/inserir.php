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
			<p id="sair"><a id="linkSair" href="../sair.php">">Fazer Logout</a></p>
		</nav>
	</div>
	
	<h1 >Inserir Produto</h1>
		<h2 id="titulo">Informe os dados:</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Nome: <input type="text" name="txtNome" required></p>
		<p>Fornecedor: <input type="text" name="txtFornec" ></p>
		<p>Tipo: <input type="text" name="txtTipo" ></p>
		<p>Descrição: <input type="text" name="txtDesc"></p>
		<p>Preco: <input type="text" name="txtPreco" required></p>
		
		
		<p><input type="submit" value="Inserir Produto"></p>
	</form>

<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		require_once "../../db/connections.php";
		mysql_db_connect(3,$conn);
	
		
		
		
			if (!$conn->connect_error){
				// prepara
				$stmt = $conn->prepare("INSERT INTO produtos(id, nome, fornecedor, tipo, descricao, preco) VALUES (default, ?, ?, ?, ?, ?)");
				// vincula parametros ao comando SQL
				$stmt->bind_param("ssssd", $nome, $fornecedor, $tipo, $descricao, $preco);
				// seta os parametros e executa
				
				$nome = htmlspecialchars($_REQUEST['txtNome']);
				$fornecedor = htmlspecialchars($_REQUEST['txtFornec']);
				$tipo = htmlspecialchars($_REQUEST['txtTipo']);
				$descricao = htmlspecialchars($_REQUEST['txtDesc']);
				$preco = htmlspecialchars($_REQUEST['txtPreco']);
				
				$stmt->execute();
				echo "<h2>Produto inserido com sucesso!!</h2><br>";

				
				
				$stmt->close();
				$conn->close();
				
				header("refresh:1.5; inserir.php");
			}
		}
		
	
?>

</body>
</html>