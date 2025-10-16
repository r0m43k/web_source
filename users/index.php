<?php 

include_once $dbPath .  'db.php';
$token = generateToken();

echo "<h2>Session dump</h2>";
var_dump($_SESSION);
echo "<hr>";

echo "<h2>Server dump</h2>";
var_dump($_SERVER);
echo "<hr>";

echo "<h2>Cookie dump</h2>";
var_dump($_COOKIE);
echo "<hr>";

echo "<h2>Request dump</h2>";
var_dump($_REQUEST);
echo "<hr>";