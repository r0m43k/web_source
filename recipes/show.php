<?php 

include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';

$recipe = getById('recipe', $_GET['id']);
?>
<h2>
  Recipe Details
</h2>
<table class="table">
  <tr class="table__row">
  <td class="table__cell">Id</td>
    <td class="table__cell">Title</td>
    <td class="table__cell">Description</td>
    <td class="table__cell">Kcal</td>
    <td class="table__cell">Created at</td>
    <td class="table__cell">Updated at</td>
  </tr>
  <tr class="table__row">
  <td class="table__cell"><?= $recipe['id'] ?></td>
    <td class="table__cell"><?= $recipe['title'] ?></td>
    <td class="table__cell"><?= $recipe['description'] ?></td>
    <td class="table__cell"><?= $recipe['kcal'] ?></td>
    <td class="table__cell"><?= $recipe['created_at'] ?></td>
    <td class="table__cell"><?= $recipe['updated_at'] ?></td>
  </tr>
</table>
<a href="?app=<?= $app ?>&view=update&id=<?= $recipe['id'] ?>">Update</a>
<a href="?app=<?= $app ?>&view=delete&id=<?= $recipe['id'] ?>">Delete</a>

<!-- Вместо ссылки на удаление можно использовать форму с POST запросом -->
<!-- <form action="/users/delete.php" method="post">
      <input type="hidden" name="id" value="<?= $user['id'] ?>">
      <button type="submit">Delete</button>
    </form> -->