<?php
	require_once "parametros.php";
	function mysql_db_connect($tp_conexao, &$conn){
		
		if($tp_conexao == 1){
			db_connect_pdo($conn);
		} elseif ($tp_conexao == 2){
			db_connect_mysqli_procedural($conn);
		} elseif ($tp_conexao == 3){
			db_connect_mysqli_oo($conn);
		} else {
			return null;
		}
	}

	function db_connect_pdo(&$conn){
		try {
			$servername = servername;
			$dbname= prova;
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", username, password);
			// set o PDO modo erro para exception
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			echo "<b>Connected successfully<b><br>";
		} 
		catch(PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
			$conn = null;
		}
	}

	function db_connect_mysqli_procedural(&$conn){
		$conn = mysqli_connect(servername, username, password, db_name);
		// Check a conexão
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		echo "<b>Connected successfully<b><br>";
	}

	function db_connect_mysqli_oo(&$conn){
		// Cria a conexão
		$conn = new mysqli(servername, username, password, db_name);
		// Check a conexão
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		//echo "<b>Connected successfully<b><br>";
	}
?>