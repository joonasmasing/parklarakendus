<?php

$parking_space = null;

if (isset ($_POST['parking_lots'])){
	$parking_space=intval($_POST["parking_lots"]);
}
	
$parking_lots=['luksparkla', 'muruparkla', 'ostukekuse parkla', 'siseparkla', 'majaesine parkla'];
$pricesForHour = [5,.2,2,1,0];
$pricesForDay = [5,.2,2,1,0];
$pricesForWeek = [5,.2,2,1,0];
$parking_lots2 = "";
$parking_lots2 .= '<select name="parking_lots" id="parking_lots">' ."\n";
$parking_lots2 .= '<option value="" selected disabled>vali parkla</option>' ."\n";

foreach ($parking_lots as $key=>$lot){
		if ($key + 1 === $parking_space){
			$parking_lots2 .= '<option value="' .($key + 1) .'" selected>' .$lot ."</option> \n";
		} else {
			$parking_lots2 .= '<option value="' .($key + 1) .'">' .$lot ."</option> \n";
		}
	}
	$parking_lots2 .= "</select> \n";
	
if (isset($_GET['quantity1']))
{
     $quantity=$_GET['quantity1'];
}	

if (isset($_POST["sendAcceptedData"])){
	echo "Hind: " .$_POST["totalPrice"];
}
?>


<!DOCTYPE html>

<html>
<head>
<title>Alusta parkimist.</title>
<link rel="stylesheet" type="text/css" href="style/general.css">
<script type="text/javascript" src="javascript/priceData.js" defer></script>
</head>

<body>
<h1>Vali sobiv aeg</h1>
<form method="POST">
<input type="number" name="quantity1" id="quantity1" min="0" max="4" value="0">nädalat<br>
<input type="number" name="quantity2" id="quantity2" min="0" max="7" value="0">päeva<br>
<input type="number" name="quantity3" id="quantity3" min="0" max="24" value="0">tundi<br>
<?php
	echo $parking_lots2;
	echo '<input type="hidden" name="priceForHour" id="priceForHour" value="' .implode(",", $pricesForHour) .'">';
	echo '<input type="hidden" name="priceForDay" id="priceForDay" value="' .implode(",", $pricesForDay) .'">';
	echo '<input type="hidden" name="priceForWeek" id="priceForWeek" value="' .implode(",", $pricesForWeek) .'">';
?>

<input type="hidden" name="totalPrice" id="totalPrice" value="">
<input type="submit" value="Saada" name="sendAcceptedData" id="sendAcceptedData">

</form>
<button id="priceBtn">Arvuta hind</button><span id="totalPricePlace"></span>
<?php
if (isset($_GET['quantity1']))
{
//echo $quantity1;
}

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

