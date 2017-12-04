<!DOCTYPE html>

<?php
require("functions.php");
	
	//kui pole sisseloginud, siis sisselogimise lehele
	if(!isset($_SESSION["userId"])){
		header("Location: login.php");
		exit();
	}
	
	//kui logib välja
	if (isset($_GET["logout"])){
		//lõpetame sessiooni
		session_destroy();
		header("Location: login.php");
		exit();
	}
	
	$picture_number=rand(1, 6);

?>

<html>
	<head>
	<title>Parklarakendus</title>
		<link rel="stylesheet" type="text/css" href="style/general.css">
	</head>

	<body>
		<h1>Oled edukalt sisse loginud. </h1>
		<form action="andmed.php"> 
		<input type="submit" value="Sisesta andmed">
		</form>
		<form action="alustaparkimist.php"> 
		<input type="submit" value="Alusta parkimist">
		<p><a href="?logout=1">Logi välja</a>!</p>
		</form>
		<p></p>

<?php
if ($picture_number==1)
{
echo '<img src="pildid/parkla.jpg" alt="parkla märk" style="width:400px;height:200px;">';
}else if ($picture_number==2)
{
echo '<img src="pildid/luksparkla.jpg" alt="luks parkla" style="width:400px;height:200px;">';
}else if ($picture_number==3)
{
echo '<img src="pildid/muruparkla.jpg" alt="luks parkla" style="width:400px;height:200px;">';
}else if ($picture_number==4)
{
echo '<img src="pildid/ostukesksueparkla.jpg" alt="ostukeskuse parkla" style="width:400px;height:200px;">';
}else if ($picture_number==5)
{
echo '<img src="pildid/siseparkla.jpg" alt="sise parkla" style="width:400px;height:200px;">';
}else if ($picture_number==6)
{
echo '<img src="pildid/tyhiparkla.jpg" alt="tyhi parkla" style="width:400px;height:200px;">';
}

?>
	</body>
</html>

