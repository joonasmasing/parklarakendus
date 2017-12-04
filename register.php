<?php
	require("functions.php");
	require("config.php");
	$database = "if17_joosep_2";
	
	//kui on juba sisseloginud
	if(isset($_SESSION["userId"])){
		header("Location: sisselogitud.php");
		exit();
	}
	
	$signupPassword = "";
	$signupFirstName = "";
	$signupFamilyName = "";
	$signupEmail = "";
	$gender = "";
	$signupBirthDay = null;
	$signupBirthMonth = null;
	$signupBirthYear = null;
	$signupBirthDate = null;
	$notice = "";
	$loginEmail = "";
	
	$signupFirstNameError = "";
	$signupFamilyNameError = "";
	$signupBirthDayError = "";
	
	$signupEmailError = "";
	$signupPasswordError = "";
	
	
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
	
	//kas klikiti kasutaja loomise nupul
	if(isset($_POST["signupButton"])){
	
		//kas on kasutajanimi sisestatud
		if (isset($_POST["loginEmail"])){
			if (empty ($_POST["loginEmail"])){
				//$loginEmailError ="NB! Ilma selleta ei saa sisse logida!";
			} else {
				$loginEmail = $_POST["loginEmail"];
			}
		}
		
		//kontrollime, kas kirjutati eesnimi
		if (isset($_POST["signupFirstName"])){
			if (empty($_POST["signupFirstName"])){
				$signupFirstNameError ="NB! Väli on kohustuslik!";
			} else {
				$signupFirstName = $_POST["signupFirstName"];
			}
		}
		
		//kontrollime, kas kirjutati perekonnanimi
		if (isset($_POST["signupFamilyName"])){
			if (empty ($_POST["signupFamilyName"])){
				$signupFamilyNameError ="NB! Väli on kohustuslik!";
			} else {
				$signupFamilyName = $_POST["signupFamilyName"];
			}
		}
		
		
		
		
		
		//kontrollime, kas kirjutati kasutajanimeks email
		if (isset ($_POST["signupEmail"])){
			if (empty ($_POST["signupEmail"])){
				//$signupEmailError ="NB! Väli on kohustuslik!";
			} else {
				$signupEmail = $_POST["signupEmail"];
			}
		}
		
		
		if (isset ($_POST["signupPassword"])){
			if (empty ($_POST["signupPassword"])){
				$signupPasswordError = "NB! Väli on kohustuslik!";
			} else {
				//polnud tühi
				if (strlen($_POST["signupPassword"]) < 8){
					$signupPasswordError = "NB! Liiga lühike salasõna, vaja vähemalt 8 tähemärki!";
				}
			}
		}
		
		//KIRJUTAN UUE KASUTAJA ANDMEBAASI
		if(empty($signupFirstNameError) and empty($signupFamilyNameError) and empty($signupEmailError) and empty($signupPasswordError)
		){
			echo "Hakkan salvestama! \n";
			$signupPassword = hash("sha512", $_POST["signupPassword"]);
			//echo $signupPassword;
			//ühendus serveriga
			$database = "if17_joosep_2";
			$mysqli = new mysqli($serverHost, $serverUsername, $serverPassword, $database);
			//käsk andmebaasile
			$stmt = $mysqli->prepare("INSERT INTO autobaasVeeb (firstname, lastname, email, password) VALUES ( ?, ?, ?, ?)");
			echo $mysqli->error;
			//s - string, tekst
			//i - integer, täisarv
			//d - decimal, ujukomaarv
			$stmt->bind_param("ssss", $signupFirstName, $signupFamilyName, $signupEmail, $signupPassword);
			//$stmt->execute();
			if ($stmt->execute()){
				echo "Õnnestus!";
			} else {
				echo "Tekkis viga: " .$stmt->error;
			}
		}
	}
		
	
	
	

	
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Parklarakendus</title>
	<link rel="stylesheet" type="text/css" href="style/general.css">
</head>
	<h1> Registreeri oma kasutaja </h1>
<body>
	
	
	<form method="POST">
		<label>Eesnimi </label>
		<input name="signupFirstName" type="text" value="<?php echo $signupFirstName; ?>">
		<span><?php echo $signupFirstNameError; ?></span>
		<br>
		<label>Perekonnanimi </label>
		<input name="signupFamilyName" type="text" value="<?php echo $signupFamilyName; ?>">
		<span><?php echo $signupFamilyNameError; ?></span>
		<br>
		
		<label>Kasutajanimi (E-post) </label>
		<input name="signupEmail" type="email" value="<?php echo $signupEmail; ?>">
		<span><?php echo $signupEmailError; ?></span>
		<br>
		<label>Parool </label>
		<input name="signupPassword" placeholder="8-märgiline salasõna" type="password"><span><?php echo $signupPasswordError; ?></span>
		<br><br>

		
		<input name="signupButton" type="submit" value="Registreeri kasutaja"><span><?php echo $notice; ?>
		
		<p><a type="submit" href="esileht.php">Tagasi esilehele</a></p>
		<p>Kasutaja olemas?<a type="submit" href="login.php"> Sisselogimise lehele</a></p>
		
	
	
	</form>
<hr>
</body>
</html>


