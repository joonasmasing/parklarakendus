<!DOCTYPE html>

<?php
	
	
	$picture_number=rand(1, 6);



?>

<html>
<head>
<title>Parklarakendus</title>
<link rel="stylesheet" type="text/css" href="style/general.css">
</head>

<body>
<h1>Tere tulemast!</h1>
<form action="register.php"> 
<input type="submit" value="Registeeru">
</form>
<form action="login.php"> 
<input type="submit" value="Logi sisse">
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

