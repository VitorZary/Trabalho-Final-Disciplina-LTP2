<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		require_once "../../db/connections.php";
		mysql_db_connect(3,$conn);

		if ($conn) {
			$nome = htmlspecialchars($_REQUEST['txtNome']);
			// prepara
			$sql = "SELECT id, login, nome, senha, Admin FROM usuario where nome = ?";
			$stmt = $conn->prepare($sql);
			// vincula parametros ao comando SQL
			$stmt->bind_param("s", $nome);
			// seta os parametros e executa
			$stmt->execute();
			$result = $stmt->get_result();
				
			if ($result->num_rows > 0) {
				echo "<table style='width: 50%;'>";
				echo "<tr><th>Id</th><th>Login</th><th>Senha</th><th>Nome</th><th>Administrador</th></tr>";
				// mostra os dados retornados em uma tabela
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["id"] . "</td><td>" . $row["login"]. "</td><td>" . $row["senha"]. "</td><td>". $row["nome"]. "</td><td>". ($row["Admin"]==1?"Sim":"Não"). "</td></tr>";
				}
				echo "</table>";
			} else {
				echo "<b><p>A consulta não retornou resultados.</p></b><br>";
			}
			$conn->close();
		}
	}
?>