<?php 

include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';
$token = generateToken();

$user = getById('users', $_GET['id']);
?>
<h2>
  User Details
</h2>
<table class="table">
  <tr class="table__row">
  <td class="table__cell">Id</td>
    <td class="table__cell">Username</td>
    <td class="table__cell">Age</td>
    <td class="table__cell">Password</td>
    <td class="table__cell">created_at</td>
    <td class="table__cell">updated_at</td>
  </tr>
  <tr class="table__row">
  <td class="table__cell"><?= $user['id'] ?></td>
    <td class="table__cell"><?= $user['username'] ?></td>
    <td class="table__cell"><?= $user['age'] ?></td>
    <td class="table__cell"><?= $user['password'] ?></td>
    <td class="table__cell"><?= $user['created_at'] ?></td>
    <td class="table__cell"><?= $user['updated_at'] ?></td>
  </tr>
</table>
<a href="?app=<?= $app ?>&view=update&id=<?= $user['id'] ?>">Update</a>
<a href="?app=<?= $app ?>&view=delete&id=<?= $user['id'] ?>">Delete</a>

<!-- Вместо ссылки на удаление можно использовать форму с POST запросом -->
<!-- <form action="/users/delete.php" method="post">
      <input type="hidden" name="id" value="<?= $user['id'] ?>">
      <button type="submit">Delete</button>
    </form> -->