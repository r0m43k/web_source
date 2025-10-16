<?php 
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';

$reviews = getAll('review');
?>

<h2>
  All reviews
</h2>
<?php foreach($reviews as $review): ?>
<p>
  <a href="/?app=<?= $app ?>&view=show&id=<?= $review['id'] ?>">
    <?= $review['names'] ?>
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