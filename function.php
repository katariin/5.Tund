<?php
	//k�ik AB'iga seonduv
	
	// �henduse loomiseks kasuta
	require_once("../configglobal.php");
	$database = "if15_kati";
	//paneme sessiooni k�ima, kasutada $_SESSION muutujad
	session_start();
	
	
	// lisame kasutaja ab'i
	function createUser(){
		//globals on muutuja k�igist php failidest mis on �hendatud
		$mysqli = new mysqli($GLOBALS[servername], $GLOBALS[server_username], $GLOBALS[server_password], $GLOBALS[database]);
		
		
		$stmt = $mysqli->prepare("INSERT INTO user_sample (email, password) VALUES (?, ?)");
		$stmt->bind_param("ss", $create_email, $password_hash);
		$stmt->execute();
		$stmt->close();
		
		$mysqli->close();		
	}
	
	//logime sisse
	function createCarPlate($car_plate, $color){
		
		$mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("INSERT INTO car_plates (user_id, number_plate, color) VALUES (?, ?, ?)");
		$stmt->bind_param("iss", $_SESSION["id_from_db"], $car_plate, $color);
		
		$message = "";
		
		$stmt->bind_result($id_from_db, $email_from_db);
		if($stmt->execute());
		// see on t�ene siis kui sisestus ab'i �nnestus
		$message="edukalt isestatud andmebaasi"
		}else{
		echo $stmt->error;
		}
		$stmt->close();
		$mysqli->close();
        
        return $message;		
	}
	
	function welcome($name){
		echo "Tere" . $name;
		
	}
	
?>