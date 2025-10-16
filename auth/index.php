<?php
// файл index.php
session_start();
require_once 'token.php';
$token = generateToken();
?>

<!DOCTYPE html>
<html>
<head>
	<title>CSRF Protection Form</title>
</head>
<body>
	<form method="POST" action="submit.php">
    	<input type="hidden" name="token" value="<?php echo $token; ?>">
    	Username: <input type="text" name="username"><br>
    	Password: <input type="password" name="password"><br>
    	<input type="submit" value="Submit">
	</form>
</body>
</html>