<?php
	require_once "../../db/connections.php";
	mysql_db_connect(3,$conn);

	if(!$conn->connect_error){
		//cria a query
		
		$sql = "SELECT id, login, nome, senha, Admin FROM usuario";
		
		//executa a query e armazena o resultado
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
		// imprime os dados retornados
			echo "<table style='width: 50%;'>";
			echo "<tr><th>Id</th><th>Login</th><th>Senha</th><th>Nome</th><th>Administrador</th></tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"] . "</td><td>" . $row["login"]. "</td><td>" . $row["senha"]. "</td><td>". $row["nome"]. "</td><td>". ($row["Admin"]==1?"Sim":"Não"). "</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<b>A consulta não retornou resultados.</b><br>";
		}
		$conn->close();
	}
?>