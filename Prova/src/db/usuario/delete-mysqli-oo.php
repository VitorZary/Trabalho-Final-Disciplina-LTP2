<?php
	require_once "../connections.php";
	mysql_db_connect(2,$conn);
	if (!$conn->connect_error) {
		$id = htmlspecialchars($_REQUEST['id']);
		
		// comando sql para remover o registro
		$sql = "DELETE FROM usuario WHERE id=?";
		$stmt = $conn->prepare($sql);
		$stmt = $conn->prepare($sql);
		// vincula parametros ao comando SQL
		$stmt->bind_param("i", $id);
		// seta os parametros e executa
		if ($stmt->execute() == true)
			echo "<h3>Registro removido com sucesso!!</h3>";
		else{
			echo "<h3>Erro removendo registro" . $stmt->error . "</h3>";
		}
		$conn->close();
	}
	header("refresh:3; ../../usuarioAdmin/funcoes usuario/remover.php");
	
?>