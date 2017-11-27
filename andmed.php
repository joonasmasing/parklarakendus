<?php
	$automark = "";
	



?>

<!DOCTYPE html>
<html lang="et">
<head>
	<meta charset="utf-8">
	<title> Auto andmete baas</title>
	
</head>
<body>
	<h1>Otsi autot</h1>
	<p>Sisesta admeid, et leida autot.</p>
	<form method="POST">
		<label>Auto mark </label>
		<input name="$automark" type="mark" value="<?php echo $automark; ?>">
		<br><br>
		</form>
	
	<form method="POST">
		<label>Auto mudel </label>
		<input name="$automark" type="mark" value="<?php echo $automark; ?>">
		<br><br>
		</form>
	
	<form method="POST">
		<label>Numbrimärk </label>
		<input name="$automark" type="mark" value="<?php echo $automark; ?>">
		<br><br>
		</form>
	
	<form method="POST">
		<label>VIN kood </label>
		<input name="$automark" type="mark" value="<?php echo $automark; ?>">
		<br><br>
		</form>
	
	<form method="POST">
		<label>Kategooria </label>
		<input name="$automark" type="mark" value="<?php echo $automark; ?>">
		<br><br>
		</form>
	
	<form>
	<TR>
    <TD class = "select">Kere tüüp        
    </TD>   
    <TD ALIGN="center">
       <select>        
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
       </select>
    </TD>        
</TR>
</form>		
		
	
	
	
	<TR>
    <TD class = "select">Kere värvus         
    </TD>   
    <TD ALIGN="center">
       <select>        
            <option value="Roheline">Roheline</option>
            <option value="Roosa">Roosa</option>
            <option value="Must">Must</option>
            <option value="Punane">Punane</option>
       </select>
    </TD>        
</TR>
	
	
	
	
	<form>
	<input type="submit" value="Otsi">
	<br><br>
	</form>
	 
</body>
</html>
	