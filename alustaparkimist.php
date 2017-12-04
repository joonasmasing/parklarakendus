<?php

$parking_space = null;

if (isset ($_POST['parking_lots'])){
	$parking_space=intval($_POST["parking_lots"]);
}
	
$parking_lots=['luksparkla', 'muruparkla', 'ostukekuse parkla', 'siseparkla', 'majaesine parkla'];
$parking_lots2 = "";
$parking_lots2 .= '<select name="parking_lots">' ."\n";
$parking_lots2 .= '<option value="" selected disabled>vali parkla</option>' ."\n";

foreach ($parking_lots as $key=>$lot){
		if ($key + 1 === $parking_space){
			$parking_lots2 .= '<option value="' .($key + 1) .'" selected>' .$lot ."</option> \n";
		} else {
			$parking_lots2 .= '<option value="' .($key + 1) .'">' .$lot ."</option> \n";
		}
	}
	$parking_lots2 .= "</select> \n";
	
$quantity=$_GET['quantity'];
?>
<!DOCTYPE html>

<html>
<head>
<title>Alusta parkimist.</title>
<link rel="stylesheet" type="text/css" href="style/general.css">
</head>

<body>
<h1>Vali sobiv aeg</h1>
<input type="number" name="quantity" min="0" max="99" value="0">aastat<br>
<input type="number" name="quantity1" min="0" max="12" value="0">kuud<br>
<input type="number" name="quantity2" min="0" max="4" value="0">nädalat<br>
<input type="number" name="quantity3" min="0" max="7" value="0">päeva<br>
<input type="number" name="quantity4" min="0" max="24" value="0">tundi<br>
<?php
	echo $parking_lots2;
?>

<form action="andmed.php"> 
<input type="submit" value="Saada">
<?php

echo $quantity;


?>
<br>

<p>Luksparka, eesti parim kindlasti. Hind 5€/tund</p>
<img src="pildid/luksparkla.jpg" alt="luksparkla" width="460" height="345">
<p>Muruparkla. Hind 0.2€/tund</p>
<img src="pildid/muruparkla.jpg" alt="muruparkla" width="460" height="345">
<p>Ostukeskuse parkla. Hind 2€/tund.</p>
<img src="pildid/ostukesksueparkla.jpg" alt="ostukeskuseparkla" width="460" height="345">
<p>Siseparkla. Hind 1€/tund</p>
<img src="pildid/siseparkla.jpg" alt="siseparkla" width="460" height="345">
<p>Majaesine parkla. Hind 0.5€/tund</p>
<img src="pildid/tyhiparkla.jpg" alt="tyhiparkla" width="460" height="345">
</body>
</html>

