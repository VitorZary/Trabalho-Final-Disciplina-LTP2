<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		require_once "../../db/connections.php";
		mysql_db_connect(3,$conn);

		if ($conn) {
			$nome = htmlspecialchars($_REQUEST['txtNome']);
			// prepara
			$sql = "SELECT id, nome, fornecedor, tipo, descricao, preco FROM produtos where nome = ?";
			$stmt = $conn->prepare($sql);
			// vincula parametros ao comando SQL
			$stmt->bind_param("s", $nome);
			// seta os parametros e executa
			$stmt->execute();
			$result = $stmt->get_result();
				
			if ($result->num_rows > 0) {
				echo "<table style='width: 50%;'>";
				echo "<tr><th>Id</th><th>Nome</th><th>Fornecedor</th><th>Tipo</th><th>Descricao</th><th>Preco</th></tr>";
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"]. "</td><td>" . $row["fornecedor"]. "</td><td>". $row["tipo"]. "</td><td>". $row["descricao"]. "</td><td>" . $row["preco"].
					"</td><td>". "<a href='../../db/produtos/delete-mysqli-oo.php?id=". $row["id"] ."'>REMOVER</a>". "</td></tr>";
				}
				echo "</table>";
			} else {
				echo "<b><p>A consulta não retornou resultados.</p></b><br>";
			}
			$conn->close();
		}
	}
?>