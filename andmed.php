<?php
	$automark = "";
	



?>

<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title>Parklasse registreerimine</title>
	<link rel="stylesheet" type="text/css" href="style/general.css">
	
</head>
<body>
	<h1>Sisesta andmed</h1>
	<form method="POST">
		<label>Auto mark </label>
		<input name="$automark" type="mark" value="<?php echo $automark; ?>">
		</form>

	<form method="POST">
		<label>Numbrimärk </label>
		<input name="$automark" type="mark" value="<?php echo $automark; ?>">
		</form>

	<form>
	<TR>
    <TD class = "select">Kere tüüp        
    </TD>   
    <TD ALIGN="center">
       <select>        
            <option value="sõiduauto">sõiduauto</option>
            <option value="buss">buss</option>
            <option value="maastur">maastur</option>
            <option value="mootorratas">mootorratas</option>
			<option value="veok">veok</option>
			<option value="haagis">haagis</option>
			<option value="limusiin">limusiin</option>
       </select>
    </TD>        
</TR>
</form>		
		
	
	
	
	<TR>
    <TD class = "select">Kere värvus         
    </TD>   
    <TD ALIGN="center">
       <select>        
            <option value="roheline">roheline</option>
            <option value="roosa">roosa</option>
            <option value="must">must</option>
            <option value="punane">punane</option>
			<option value="kollane">kollane</option>
			<option value="valge">valge</option>
			<option value="sinine">sinine</option>
			<option value="hall">hall</option>
       </select>
    </TD>        
</TR>
	
	
	
	
	<form>
	<input type="submit" value="Sisesta">
	<br><br>
	</form>
	 
</body>
</html>
	