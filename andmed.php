<?php
	require("functions.php");
	require("config.php");
	$database = "if17_joosep_2";
	
	$signupTyyp = "";
	$signupV2rv = "";
	$signupRegnr = "";
	$signupMark = "";
	$signupMarkError = "";
	$signupRegnrError = "";	
	$signupTyypError = "";
	$signupV2rvError = "";
	
	
	
	if(isset($_POST["loginButton"])){
		//Õige mark
		if (isset ($_POST["signupMark"])){
			if (empty ($_POST["signupMark"])){
				$loginMarkError ="NB! Sellist marki ei eksisteeri!.";
			} else {
				$loginMark = $_POST["signupMark"];
			}
		}
		
		if(!empty($signupMark)){
			$notice = signIn($signupMark, $_POST["signupMark"]);
		}
		
	}
	
	
		if(isset($_POST["loginButton"])){
		//Õige reg nr
		if (isset ($_POST["signupRegnr"])){
			if (empty ($_POST["signupRegnr"])){
				$loginRegnrError ="NB! Reg. nr. peab olema korrektne.";
			} else {
				$loginRegnr = $_POST["signupRegnr"];
			}
		}
		
		if(!empty($signupRegnr)){
			$notice = signIn($signupRegnr, $_POST["signupRegnr"]);
		}
		
	}
	if(isset($_POST["loginButton"])){
		//Õige keretüüp
		if (isset ($_POST["signupTyyp"])){
			if (empty ($_POST["signupTyyp"])){
				$loginTyypError ="NB! Selline keretüüp ei sobi!";
			} else {
				$loginTyyp = $_POST["signupTyyp"];
			}
		}
		
		if(!empty($signupTyyp)){
			$notice = signIn($signupTyyp, $_POST["signupTyyp"]);
		}
		
	}
	if(isset($_POST["loginButton"])){
		//Õige värv
		if (isset ($_POST["signupV2rv"])){
			if (empty ($_POST["signupV2rv"])){
				$loginV2rvError ="NB! Imelik värv.";
			} else {
				$loginV2rv = $_POST["signupV2rv"];
			}
		}
		
		if(!empty($signupV2rv)){
			$notice = signIn($signupV2rv, $_POST["signupV2rv"]);
		}
		
	}
	
		//KIRJUTAN UUED ANDMED ANDMEBAASI
		if(empty($signupMarkError) and empty($signupRegnrError) and empty($signupTyypError) and empty($signupV2rvError)
		){
			echo "Hakkan parkima! \n";
			if (isset($_POST["signupMark"]) and ($_POST["signupRegnr"]) and ($_POST["signupTyyp"]) and ($_POST["signupV2rv"]))
			{
				$signupMark = $_POST["signupMark"];
				$signupRegnr = $_POST["signupRegnr"];
				$signupTyyp = $_POST["signupTyyp"];
				$signupV2rv = $_POST["signupV2rv"];
			}
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
	<title>Auto andmete registreerimine</title>
	<link rel="stylesheet" type="text/css" href="style/general.css">
	
</head>
<body>
	<h1>Sisesta auto andmed</h1>
	 
	 
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
	