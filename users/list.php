<?php 
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';
$users = getAll('users');
$token = generateToken();
?>

<h2>
  All Users
</h2>
<?php foreach($users as $user): ?>
<p>
  <a href="/?app=<?= $app ?>&view=show&id=<?= $user['id'] ?>">
    <?= $user['username'] ?>
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