<!DOCTYPE html>

<?php

$pildi_number=rand(1, 6);

?>

<html>

<head>

<title>Parklarakendus</title>

</head>

<body bgcolor="#ADAD85">
<center><h1>Tere tulemast!</h1>
 <form action="/register.php"> 
  <input type="submit" value="Registeeru">
  <form action="/login.php"> 
  <input type="submit" value="Logi sisse">
  </form>
<p></p>

<?php

if ($pildi_number==1)
{
echo '<img src="pildid/parkla.jpg" alt="parkla märk">';
}else if ($pildi_number==2)
{
echo '<img src="pildid/luksparkla.jpg" alt="luks parkla">';
}else if ($pildi_number==3)
{
echo '<img src="pildid/muruparkla.jpg" alt="luks parkla">';
}

?>

<img src="pildid/parkla.jpg" alt="parkla märk" style="width:500px;height:600px;">
<img src="pildid/luksparkla.jpg" alt="luks parkla" style="width:500px;height:600px;">
<img src="pildid/muruparkla.jpg" alt="muru parkla" style="width:500px;height:600px;">
<img src="pildid/ostukesksueparkla.jpg" alt="ostukeskuse parkla" style="width:500px;height:600px;">
<img src="pildid/siseparkla.jpg" alt="sise parkla" style="width:500px;height:600px;">
<img src="pildid/tyhiparkla.jpg" alt="tyhi parkla" style="width:500px;height:600px;">
</center>
</body>