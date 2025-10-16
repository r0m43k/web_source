<?php 
session_start();
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';
$token = generateToken();

if(isset($_GET['id']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
  // Вместо удаления сразу можно вывести пользователю вопрос для подтверждения удаления записи. Тогда на странице можно вывести данные записи и кнопку для удаления с методом пост. 
  // Подумайте, как это сделать. 
  if (validateToken($_POST['token'])) {
    delete('recipe', $_GET['id']);
    header("Location: /?app=$app&view=list");
    exit();
  }
  else {
    echo "Wrong token!";
    exit();
  }
  
}
?>

<h2>Вы действительно хотите удалить рецепт?</h2>

<form method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>">
    <button type="submit">Удалить</button>
    <a href="/?app=<?= $app ?>&view=list">Отмена</a>
</form>