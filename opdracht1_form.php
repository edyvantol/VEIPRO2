<?php
session_start();
$token = bin2hex(openssl_random_pseudo_bytes (32));
$_SESSION['token'] = $token;
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulier</title>
</head>
<body>
<form action="opdracht1_verwerk.php" method="post">
	<?php
	//token
	?>
	<input type="hidden" name="csrf_token" value="<?php echo $token; ?>">
	<!--username-->
	Username:<input name="username" type="text"><br>
	Username moet beginnen met een hoofdletter en voor de rest kleine letters.<br>
	Username kan ook niet groter zijn dan 15 tekens<br><br>
	<!--telefoon-->
	Phone:<input name="phone" type="tel"><br>
	Telefoonnummer moet mobiele nummer <br><br>
	<!--email-->
	Email: <input name="email" type="email"><br>
	<!--birthday-->
	Birthday: <input name="birthday" type="date"><br>
	YY-MM-DD<br><br>
	<!--new-->
	News:<input type="checkbox" name="checkbox" value="true"><br>
	<!--Gender-->
	Male:<input type="radio" name="gender" value="male" checked><br>
  	Female:<input type="radio" name="gender" value="female"><br>
  	Other:<input type="radio" name="gender" value="other"><br>
	
  <input type="submit" value="formSubmit" name="formSubmit">
</form>
</body>
</html>
</html>
