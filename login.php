<?php
	require("config.php");
	
	$loginEmail = "";
	
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
		<input type="submit" value="Logi sisse">
	
	<p><a type="submit" href="esileht.php">Tagasi esilehele</a></p>
	
	</form>
		
</body>
</html>