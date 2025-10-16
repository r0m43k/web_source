<?php
// Старт сессии, если используем сессионные сообщения
session_start();

// Получение сообщения из GET или SESSION
$errorMessage = $_GET['msg'] ?? ($_SESSION['error_message'] ?? 'error');
// Если использовали сессионное сообщение — удалим его после показа
unset($_SESSION['error_message']);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
    <style>
        body {
            background-color:rgb(250, 250, 250);
            color: #c00;
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        .error-box {
            background: #ffffff;
            border: 1px solid #ffffff;
            padding: 20px;
            display: inline-block;
            border-radius: 8px;
        }
        a {
            color: #c00;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="error-box">
        <h1>⚠ Ошибка</h1>
        <p><?= htmlspecialchars($errorMessage) ?></p>
        <p><a href="/">Вернуться на главную</a></p>
    </div>
</body>
</html>
