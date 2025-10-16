<?php 

include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';

$review = getById('review', $_GET['id']);
?>
<h2>
  Review
</h2>
<table class="table">
  <tr class="table__row">
    <td class="table__cell">id</td>
    <td class="table__cell">Name</td>
    <td class="table__cell">Review</td>
    <td class="table__cell">Rate</td>
    <td class="table__cell">Created at</td>
    <td class="table__cell">Updated at</td>
  </tr>
  <tr class="table__row">
    <td class="table__cell"><?= $review['id'] ?></td>
    <td class="table__cell"><?= $review['names'] ?></td>
    <td class="table__cell"><?= $review['review'] ?></td>
    <td class="table__cell"><?= $review['rate'] ?></td>
    <td class="table__cell"><?= $review['created_at'] ?></td>
    <td class="table__cell"><?= $review['updated_at'] ?></td>
  </tr>
</table>
<a href="?app=<?= $app ?>&view=update&id=<?= $review['id'] ?>">Update</a>
<a href="?app=<?= $app ?>&view=delete&id=<?= $review['id'] ?>">Delete</a>

<!-- Вместо ссылки на удаление можно использовать форму с POST запросом -->
<!-- <form action="/users/delete.php" method="post">
      <input type="hidden" name="id" value="<?= $user['id'] ?>">
      <button type="submit">Delete</button>
    </form> -->