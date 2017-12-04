<?php
	require("config.php");
	require("functions.php");
	
	//kui on sisseloginud, siis kohe sisselogitud.php lehele
	if (isset($_SESSION["userId"])){
		header("Location: sisselogitud.php");
		exit();
	}
	
	$signupFirstName = "";
	$signupEmail = "";
	$loginEmail = "";
	$notice = "";
	$signupFirstNameError = "";
	$signupEmailError = "";
	$signupPasswordError = "";
	
	$loginEmailError ="";
	
	//kas logitakse sisse
	if (isset($_POST["loginButton"])){
		
		//kas on kasutajanimi sisestatud
		if (isset ($_POST["loginEmail"])){
			if (empty ($_POST["loginEmail"])){
				$loginEmailError ="NB! Sisselogimiseks on vajalik kasutajatunnus (e-posti aadress)!";
			} else {
				$loginEmail = $_POST["loginEmail"];
			}
		}
		
		if(!empty($loginEmail) and !empty($_POST["loginPassword"])){
			//echo "Login sisse!";
			//kutsun sisselogimise funktsiooni
			$notice = signIn($loginEmail, $_POST["loginPassword"]);
		}
	}//if loginButton
	
	
	
	
	

	
	//echo $serverHost;
?>

<!DOCTYPE html>
<html lang="et">
	<head>
		<meta charset="utf-8">
		<title>Sisselogimine või uue kasutaja loomine</title>
		<link rel="stylesheet" type="text/css" href="style/general.css">
	</head>
<body>
	<h1>Logi sisse!</h1>
	<form method="POST">
		<label>Kasutajanimi (E-post): </label>
		<input name="loginEmail" placeholder="Sisesta e-mail" type="email" value="<?php echo $loginEmail; ?>">
		<br><br>
		<label>Salasõna: </label>
		<input name="loginPassword" placeholder="Salasõna" type="password">
		<br><br>
		<input name="loginButton" type="submit" value="Logi sisse"><span><?php echo $notice; ?>
	
		<p><a type="submit" href="esileht.php">Tagasi esilehele</a></p>
	
	</form>
		
</body>
</html>