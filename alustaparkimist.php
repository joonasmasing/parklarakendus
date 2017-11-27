<!DOCTYPE html>

<?php

$picture_number=rand(1, 6);

?>

<html>
<head>
<title>Alusta parkimist.</title>
<link rel="stylesheet" type="text/css" href="style/general.css">
</head>

<body>
<h1>Vali sobiv aeg</h1>
<input type="number" name="quantity" min="0" max="99" value="0">aastat<br>
<input type="number" name="quantity" min="0" max="12" value="0">kuud<br>
<input type="number" name="quantity" min="0" max="4" value="0">nädalat<br>
<input type="number" name="quantity" min="0" max="7" value="0">päeva<br>
<input type="number" name="quantity" min="0" max="24" value="0">tundi<br>


<form action="andmed.php"> 
<input type="submit" value="Saada">
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

