<?php
	require_once "../../db/connections.php";
	mysql_db_connect(3,$conn);
	if (!$conn->connect_error) {
		$id = $_GET["id"];
		$nome = htmlspecialchars($_REQUEST['txtNome']);
		$login = htmlspecialchars($_REQUEST['txtLogin']);
		$senha = htmlspecialchars($_REQUEST['txtSenha']);
		$admin = htmlspecialchars($_REQUEST['radioAdmin']);
				
		$senhacrip = base64_encode($senha);
		// prepara
		$sql = "UPDATE usuario set login = ?, nome = ?, senha = ?, Admin = ? where id= ?";
		
		$stmt = $conn->prepare($sql);
		// vincula parametros ao comando SQL
		$stmt->bind_param("sssii", $login, $nome, $senhacrip, $admin, $id);
		
		// seta os parametros e executa
		if ($stmt->execute() == true)
			echo "<h3>Registros alterados com sucesso!!</h3>";
		else{
			echo "<h3>Erro alterando os registros" . $stmt->error . "</h3>";
		}
		
		$conn->close();
		header("refresh:3; ../../usuarioAdmin/funcoes usuario/alterar.php");
	}
	
?>