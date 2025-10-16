<?php 
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';

$recipes = getAll('recipe');
?>

<h2>
  All Recipes
</h2>
<?php foreach($recipes as $recipe): ?>
<p>
  <a href="/?app=<?= $app ?>&view=show&id=<?= $recipe['id'] ?>">
    <?= $recipe['title'] ?>
  </a>
</p>
<?php endforeach; ?>
<?php 
// Альтернативный вариант. Такой подход тоже работает, но так делать нежелательно
/* 
foreach($users as $user){
  echo '<p>' . 
  '<a href="/CRUD/show.php?id=' . $user['id'] . '">' .
  $user['username'] 
  . '</a>'
  . '</p>';
}
*/