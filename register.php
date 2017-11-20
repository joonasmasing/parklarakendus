<?php
	//alustame sisselogimist
	require("../../config.php");
	$database = "if17_joosep_2";
	
	$signupFirstName = "";
	$signupFamilyName = "";
	$gender = "";
	$signupEmail = "";
	$signupBirthDay = null;
	$signupBirthMonth = null;
	$signupBirthYear = null;
	$signupBirthDate = "";
	
	$loginEmail = "";
	$notice = "";
	$signupFirstNameError = "";
	$signupFamilyNameError = "";
	$signupBirthDayError = "";
	$signupGenderError = "";
	$signupEmailError = "";
	$signupPasswordError = "";
	
	$loginEmailError ="";
	
	
	
	//sisselogimise funktsioon
	function signIn($email, $password){
		$notice = "";
		//ühendus serveriga
		$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		$stmt = $mysqli->prepare("SELECT id, firstname, lastname, email, password FROM autobaasVeeb WHERE email = ?");
		$stmt->bind_param("s", $email);
		$stmt->bind_result($id, $firstnameFromDb, $lastnameFromDb, $emailFromDb, $passwordFromDb);
		$stmt->execute();
		
		//kontrollime vastavust
		if ($stmt->fetch()){
			$hash = hash("sha512", $password);
			if ($hash == $passwordFromDb){
				$notice = "Logisite sisse!";
				
				//Määran sessiooni muutujad
				$_SESSION["userId"] = $id;
				$_SESSION["firstname"] = $firstnameFromDb;
				$_SESSION["lastname"] = $lastnameFromDb;
				$_SESSION["userEmail"] = $emailFromDb;
				
				//liigume edasi pealehele (main.php)
				header("Location: main.php");
				exit();
			} else {
				$notice = "Vale salasõna!";
			}
		} else {
			$notice = 'Sellise kasutajatunnusega "' .$email .'" pole registreeritud!';
		}
		$stmt->close();
		$mysqli->close();
		return $notice;
	}
	
	//kasutaja salvestamise funktsioon
	function signUp($signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword){
		//loome andmebaasiühenduse
		
	$mysqli = new mysqli($GLOBALS["serverHost"], $GLOBALS["serverUsername"], $GLOBALS["serverPassword"], $GLOBALS["database"]);
		//valmistame ette käsu andmebaasiserverile
		$stmt = $mysqli->prepare("INSERT INTO autobaasVeeb (firstname, lastname, email, password) VALUES (?, ?, ?, ?)");
		echo $mysqli->error;
		//s - string
		//i - integer
		//d - decimal
		$stmt->bind_param("sssiss", $signupFirstName, $signupFamilyName, $signupBirthDate, $gender, $signupEmail, $signupPassword);
		//$stmt->execute();
		if ($stmt->execute()){
			echo "\n Õnnestus!";
		} else {
			echo "\n Tekkis viga : " .$stmt->error;
		}
		$stmt->close();
		$mysqli->close();
	}
	
	//kui on juba sisse loginud
	if(isset($_SESSION["userId"])){
		header("Location: main.php");
		exit();
	}
	
	
	
	if(isset($_POST["loginButton"])){
		//kas on kasutajanimi sisestatud
		if (isset ($_POST["loginEmail"])){
			if (empty ($_POST["loginEmail"])){
				$loginEmailError ="NB! Sisselogimiseks on 	vajalik kasutajatunnus (e-posti aadress)!";
			} else {
				$loginEmail = $_POST["loginEmail"];
			}
		}
		
		if(!empty($loginEmail) and !empty($_POST["loginPassword"])){
			//echo "Alustan sisselogimist!";
			//$hash = hash("sha512", $_POST["loginEmail"]);
			$notice = signIn($loginEmail, $_POST["loginPassword"]);
			//$notice = signIn($loginEmail, $hash);
		}
		
	}//if loginButton
	
	
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Parklarakendus</title>
</head>
	<h1> Registreeri oma kasutaja </h1>
<body>
	
	
	<form>
	<input name="userName" method="POST" placeholder="Kasutajanimi" type="text">
	<input name="userRegister" type="SUBMIT" value="Loo kasutaja"
	<p></p>
	
	
	</form>
<hr>
</body>
</html>


