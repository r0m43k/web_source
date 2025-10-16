<?php
// файл submit.php
session_start();
require_once 'token.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$token = $_POST['token'];

	if (validateToken($token)) {
    	// Токен действителен, продолжить обработку данных
    	echo "Form submitted successfully.<br>";
    	echo "Username: " . htmlspecialchars($username) . "<br>";
    	echo "Password: " . htmlspecialchars($password) . "<br>";
	} else {
    	// Неверный токен, отклонить запрос
    	echo "Invalid CSRF token.";
	}
} else {
	echo "Invalid request method.";
}
?>