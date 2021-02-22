<?php
	require_once "../../db/connections.php";
	mysql_db_connect(3,$conn);

	if(!$conn->connect_error){
		//cria a query
		
		$sql = "SELECT id, nome, fornecedor, tipo, descricao, preco FROM produtos";
		
		//executa a query e armazena o resultado
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
		// imprime os dados retornados
			echo "<table style='width: 50%;'>";
			echo "<tr><th>Id</th><th>Nome</th><th>Fornecedor</th><th>Tipo</th><th>Descricao</th><th>Preco</th></tr>";
			while($row = $result->fetch_assoc()) {
				echo "<tr><td>" . $row["id"] . "</td><td>" . $row["nome"]. "</td><td>" . $row["fornecedor"]. "</td><td>". $row["tipo"]. "</td><td>". $row["descricao"]. "</td><td>" . $row["preco"].
				
				"</td><td>"."<a href='../../db/produtos/delete-mysqli-oo2.php?id=". $row["id"] ."'>REMOVER</a>".
				"</td><td>"."<a href='alterar3.php?nome=" . $row["nome"]. "&fornecedor=". $row["fornecedor"] ."&id=". $row["id"] ."&tipo=". $row["tipo"]."&descricao=". $row["descricao"]."&preco=". $row["preco"] . "'>ALTERAR</a>" ."</td></tr>";
			}
			echo "</table>";
		} else {
			echo "<p><b>A consulta não retornou resultados.</b></p><br>";
		}
		$conn->close();
	}
?>