<?php
	//kõik AB'iga seonduv
	
	// ühenduse loomiseks kasuta
	require_once("configglobal.php");
	$database = "if15_kati";
	//paneme sessiooni käima, kasutada $_SESSION muutujad
	session_start();
	
	
	// lisame kasutaja ab'i
	function createUser(){
		//globals on muutuja kõigist php failidest mis on ühendatud
		$mysqli = new mysqli($GLOBALS[servername], $GLOBALS[server_username], $GLOBALS[server_password], $GLOBALS[database]);
		
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?, ?)");
		$stmt->bind_param("ss", $create_email, $password_hash);
		$stmt->execute();
		$stmt->close();
		
		$mysqli->close();		
	}
	
	//logime sisse
	function loginUser(){
		
		$mysqli = new mysqli($servername, $server_username, $server_password, $database);
		
		$stmt = $mysqli->prepare("SELECT id, email FROM user_sample WHERE email=? AND password=?");
		$stmt->bind_param("ss", $email, $password_hash);
		$stmt->bind_result($id_from_db, $email_from_db);
		$stmt->execute();
		echo $stmt->error;
		
		$stmt->close();
		$mysqli->close();
                   
	}
	
?>