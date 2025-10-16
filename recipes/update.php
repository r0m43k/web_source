<?php 
session_start();
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';
$token = generateToken();
$recipes = getById('recipe', $_GET['id']);

if(!empty($_POST)){
  if(validateToken($_POST['token'])){
  }
  else{
    echo 'Wrong token!!!';
    exit();
  }
  $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
  $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
  $kcal = filter_input(INPUT_POST, 'kcal', FILTER_SANITIZE_STRING);
  $userId = $_GET['id'];
  $now = (new DateTime())->format('d-m-Y H:i:s');
  update('recipe',  [
    'id' => $_GET['id'],
    'title' => $title,
    'description' => $description,
    'kcal' => $kcal,
    'updated_at' => $now
  ]);   
  header("Location: /?app=$app&view=show&id=$userId");
}

?>

<h2>
  Update Recipe
</h2>
<form action="" class="form" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>">

  <div class="form__field">
    <label for="title" class="form__label">
      Title:
    </label>
    <input type="text" id="title" name="title" class="form__input" value="<?= $recipes['title'];?>">
  </div>

  <div class="form__field">
    <label for="description" class="form__label">
      Description:
    </label>
    <input type="text" id="description" name="description" class="form__input" value="<?= $recipes['description'];?>">
  </div>

  <div class="form__field">
    <label for="kcal" class="form__label">
      Kcal:
    </label>
    <input type="number" id="kcal" name="kcal" class="form__input" value="<?= $recipes['kcal'];?>">
  </div>

  <button type="submit">Send</button>
</form>
