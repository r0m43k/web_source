<?php
// файл db/connection.php

// Для подключения к СУБД MySQL можно задать такие настройки:

// $user = 'user'; //имя пользователя, по умолчанию это root
// $pass = 'user'; //пароль, по умолчанию пустой

// $host = 'localhost'; //имя или адрес хоста, где находится СУБД, на локальном компьютере это localhost
// $db = 'app_db'; //имя базы данных
// $port = 3306; // номер порта для СУБД MySQL по умолчанию - 3306, для СУБД PostggreSQL - 5432
// $charset = 'utf8mb4';
// $dsn = "mysql:dbname=$db;host=$host;port=$port;charset=$charset";


$path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'pdo' . DIRECTORY_SEPARATOR; // Определяем абсолютный путь для директории, в которой будет хранится файл с базой данных в формате sqlite
$dsn = 'sqlite:' . $path . 'dbfile.sqlite';

try {
    $pdo = new PDO($dsn); // Для подключения к СУБД Sqlite.
    // $pdo = new PDO($dsn, $user, $pass); // Для подключения к СУБД MySQL с настройками выше
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo 'PDO DB connected'; // На этапе отладки можно раскомментировать эту строку. Тогда сообщение будет выведено на экран. В дальнейшем это сообщение будет мешать. 
} catch (PDOException $e) {
    echo $e->getMessage();
}