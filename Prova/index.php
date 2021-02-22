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
			color: #2a2eb8;
		}
		#titulo{
			margin-top: 100px;
			text-align:center;
		}
		#cadastrar{
			font-size: 14px;
		}
		#erro{
			color: red;
		}
		
	</style>
<head>
<body>
	<h1>Sistema</h1>
	<h2 id="titulo">Login</h2>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Login: <input type="text" name="txtLogin" required></p>
		<p>Senha: <input type="password" name="txtSenha" required></p>
		<p id="cadastrar">Não possui login? <a href="src/cadastrar.php">Clique aqui e Registre-se</a></p>
		<p><input type="submit" value="Entrar"></p>
	</form>

<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		require_once "src/db/connections.php";
		mysql_db_connect(3,$conn);
		
		if (!$conn->connect_error) {
			$login = htmlspecialchars($_REQUEST['txtLogin']);
			$senha = htmlspecialchars($_REQUEST['txtSenha']);
			$senhacrip = base64_encode($senha);
			
			$sql = "SELECT id, login, senha, nome, Admin FROM usuario";
			
			$result = $conn->query($sql);
			
			$achou= 0;
			if ($result->num_rows > 0) {
				
				while($row = $result->fetch_assoc()) {
					if($row["login"]==$login && $row["senha"]==$senhacrip){
						$achou = 1;
						session_start();
						
						$_SESSION["id"] = $row["id"];
						$_SESSION["login"] = $row["login"];
						$_SESSION["nome"] = $row["nome"];
						$_SESSION["Admin"] = $row["Admin"];
						
						if($row["Admin"] == '0'){
							header("Location: src/usuarioComum/inicial.php");
						}else{
							header("Location: src/usuarioAdmin/inicialAdmin.php");
						}
						
					}
				}
			}
			
			if($achou == 0){
				echo "<p id='erro'>Não foi encontrado um registro com a combinação desse usuario/senha informado!</p>";
			}
			
			$conn->close();
		}
		
		
		
		
	}
?>

</body>
</html>