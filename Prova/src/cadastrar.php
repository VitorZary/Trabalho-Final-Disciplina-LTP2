<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="descrição" content="exercícios de fixação">
	<meta name="keywords" content="PHP, HTML, JavaScript, CSS">
	<meta name="autor" content="Wilson Prates de Oliveira">
	<meta name="viewport" content="width=device-width, initial-	scale=1.0">
	<title>Aula 7: arrays e variáveis superglobais</title>
	
	<!-- css interno -->
	<style type="text/css">
		body{
    		background-color: #87CEFA;
		}
		p{
			text-align:center;
			font-size: 20px;
		}
		h1{
			text-align:center;
		}
		h2{
			text-align:center;
		}
		#titulo{
			margin-top: 100px;
			color: #2a2eb8;
		}
		#cadastrar{
			font-size: 14px;
		}
		#erro{
			color:red;
		}
		
	</style>
<head>
<body>
	<h1 id="titulo">Registrar</h1>
		<h2>Informe os dados:</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Nome: <input type="text" name="txtNome" required></p>
		<p>Login: <input type="text" name="txtLogin" required></p>
		<p>Senha: <input type="password" name="txtSenha" required></p>
		<p>Repita a senha: <input type="password" name="txtSenha2" required></p>
		<p>Deseja ser Administrador? <input type="radio" id="radioYes" name="radioAdmin" value="1">Sim <input type="radio" id="radioNo" name="radioAdmin" value="0" checked>Não</p>
		
		<p><input type="submit" value="Registrar"></p>
	</form>

<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		require_once "db/connections.php";
		mysql_db_connect(3,$conn);
		$senha = htmlspecialchars($_REQUEST['txtSenha']);
		$senha2 = htmlspecialchars($_REQUEST['txtSenha2']);
		
		if($senha != $senha2){
			echo '<p id="erro">Senhas nao correspondem<p>';
		}else{
			if (!$conn->connect_error){
				// prepara
				$stmt = $conn->prepare("INSERT INTO usuario(nome, login, senha, Admin) VALUES (?, ?, ?, ?)");
				// vincula parametros ao comando SQL
				$stmt->bind_param("sssi", $nome, $login, $senhacrip, $admin);
				// seta os parametros e executa
				
				$nome = htmlspecialchars($_REQUEST['txtNome']);
				$login = htmlspecialchars($_REQUEST['txtLogin']);
				$senha = htmlspecialchars($_REQUEST['txtSenha']);
				$admin = htmlspecialchars($_REQUEST['radioAdmin']);
				
				$senhacrip = base64_encode($senha);
				
				$stmt->execute();
				echo "<h2>Registro inserido com sucesso!!</h2><br>";

				
				
				$stmt->close();
				$conn->close();
				header("refresh:3; ../index.php");
			}
		}
		
	}
?>

</body>
</html>