<?php
// файл token.php
session_start();

function generateToken() {
    if (empty($_SESSION['token'])) {
    	$_SESSION['token'] = bin2hex(random_bytes(32));
	}
	return $_SESSION['token'];
}

function validateToken($token) {
	return $token === $_SESSION['token'];
}
?>