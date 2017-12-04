<?php
	require("functions.php");
	require("config.php");
	$database = "if17_joosep_2";
	
	//kui on juba sisseloginud
	if(isset($_SESSION["userId"])){
		header("Location: main.php");
		exit();
	}
	
	$signupTyyp = "";
	$signupV2rv = "";
	$signupRegnr = "";
	$signupMark = "";
	$signupMarkError = "";
	$signupRegnrError = "";	
	$signupTyypError = "";
	$signupV2rvError = "";
	
	
	
	if(isset($_POST["loginButton"])){
		//kas on mark on sisestatud
		if (isset ($_POST["signupMark"])){
			if (empty ($_POST["signupMark"])){
				$loginMarkError ="NB! Sellist marki ei eksisteeri!.";
			} else {
				$loginMark = $_POST["signupMark"];
			}
		}
		
		if(!empty($signupMark)){
			//echo "Alustan Parkimist!";
			$notice = signIn($signupMark, $_POST["signupMark"]);
			//$notice = signIn($loginEmail, $hash);
		}
		
	}
	
	
		if(isset($_POST["loginButton"])){
		//kas on reg nr on sisestatud
		if (isset ($_POST["signupRegnr"])){
			if (empty ($_POST["signupRegnr"])){
				$loginEmailError ="NB! Reg. nr. peab olema korrektne.";
			} else {
				$loginEmail = $_POST["signupRegnr"];
			}
		}
		
		if(!empty($signupRegnr)){
			//echo "Alustan Parkimist!";
			$notice = signIn($signupRegnr, $_POST["signupRegnr"]);
			//$notice = signIn($loginEmail, $hash);
		}
		
	}
	
	
		//KIRJUTAN UUED ANDMED ANDMEBAASI
		if(empty($signupMarkError) and empty($signupRegnrError) and empty($signupTyypError) and empty($signupV2rvError)
		){
			echo "Hakkan parkima! \n";
			$signupRegnr = $_POST["signupRegnr"];
			//echo $signupPassword;
			//ühendus serveriga
			$database = "if17_joosep_2";
			$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
			//käsk andmebaasile
			$stmt = $mysqli->prepare("INSERT INTO autoandmed (mark, regnr, tyyp, v2rv) VALUES ( ?, ?, ?, ?)");
			echo $mysqli->error;
			//s - string, tekst
			//i - integer, täisarv
			//d - decimal, ujukomaarv
			$stmt->bind_param("ssss", $signupMark, $signupRegnr, $signupTyyp, $signupV2rv);
			//$stmt->execute();
			if ($stmt->execute()){
				echo "Õnnestus!";
			} else {
				echo "Tekkis viga: " .$stmt->error;
			}
		}
?>

<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title>Parklasse registreerimine</title>
	<link rel="stylesheet" type="text/css" href="style/general.css">
	
</head>
<body>
	<h1>Sisesta andmed</h1>
	 
	 
	 	<form method="POST">
		<label>Auto mark </label>
		<input name="signupMark" placeholder="näiteks BMW" type="text" value="<?php echo $signupMark; ?>">
		<br>
		<label>Reg. nr </label>
		<input name="signupRegnr" placeholder="000AAA" type="text" value="<?php echo $signupRegnr; ?>">
		<span><?php echo $signupRegnrError; ?></span>
		<br>
		
		<label>Keretüüp</label>
		<input name="signupTyyp" placeholder="näiteks sedaan" type="text" value="<?php echo $signupTyyp; ?>">
		<br>
		<label>Värv </label>
		<input name="signupV2rv" placeholder="näiteks roheline" type="text">
		<br><br>

		
		<input type="submit" name="signupButton" action="alustaparkimist.php" value="Sisesta andmed!">
		
		<p><a type="submit" href="esileht.php">Tagasi esilehele</a></p>
		<p>Kasutaja olemas?<a type="submit" href="login.php"> Sisselogimise lehele</a></p>
		
	
	
	</form>
</body>
</html>
	