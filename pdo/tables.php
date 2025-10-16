<?php

// файл db/tables.php

require_once 'connection.php';

try {
    //$pdo->exec("DROP TABLE IF EXISTS users");
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username VARCHAR(50) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        age VARCHAR(3) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($sql);
    //echo "Table 'users' created successfully.<br>";

    //$pdo->exec("DROP TABLE IF EXISTS recipe");
    //echo "Table 'recipe' deleted successfully.<br>";
$sqlRecipe = "CREATE TABLE IF NOT EXISTS recipe (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    kcal INTEGER NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";
    $pdo->exec($sqlRecipe);
    //echo "Table 'recipe' created successfully.<br>";
    //$pdo->exec("DROP TABLE IF EXISTS review");
    //echo "Table 'review' deleted successfully.<br>";
    $sqlReview = "CREATE TABLE IF NOT EXISTS review (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        names VARCHAR(255),
        review TEXT,
        rate INTEGER,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sqlReview);
    //echo "Table 'review' created successfully.<br>";
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>