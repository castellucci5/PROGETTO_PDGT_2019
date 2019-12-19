
<!DOCTYPE HTML>
<html>

<head>
    
	<title>PAGINA DI LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
	<div id="frm">
	 <form action="loginaccess.php"  method="post">
		<p>
			<label>Username:</label>
			<input type="text" id="user" name="user"/>
		</p>
		<p>
			<label>Password:</label>
			<input type="password" id="pass" name="pass"/>
		</p>
		<p>
			<input type="submit" id="btn" value="Login" />
		</p>
        <?PHP include'verifica_login.php';  ?> 
       
	</form>
        
	</div>
</body>
</html>