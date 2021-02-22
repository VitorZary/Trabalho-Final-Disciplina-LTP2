<?php
	require_once "../../db/connections.php";
	mysql_db_connect(3,$conn);
	if (!$conn->connect_error) {
		$id = $_GET["id"];
		$nome = htmlspecialchars($_REQUEST['txtNome']);
		$fornecedor = htmlspecialchars($_REQUEST['txtFornec']);
		$tipo = htmlspecialchars($_REQUEST['txtTipo']);
		$descricao = htmlspecialchars($_REQUEST['txtDesc']);
		$preco = htmlspecialchars($_REQUEST['txtPreco']);
		// prepara
		$sql = "UPDATE produtos set nome= ?, fornecedor= ?, tipo =?, descricao=?, preco=? where id= ?";
		
		$stmt = $conn->prepare($sql);
		// vincula parametros ao comando SQL
		$stmt->bind_param("sssssi", $nome, $fornecedor, $tipo, $descricao, $preco, $id);
		
		// seta os parametros e executa
		if ($stmt->execute() == true){
			echo "<h3>Registros alterados com sucesso!!</h3>";
		}
				
		else{
			echo "<h3>Erro alterando os registros" . $stmt->error . "</h3>";
		}
		
		$conn->close();
		header("refresh:3; ../../usuarioAdmin/funcoes produto/alterar.php");
	}
	
?>