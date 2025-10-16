<?php 
session_start();
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';
$token = generateToken();
$cookie = setcookie("recipe", "title", time() + (60 * 60 * 24 * 30), "/");
// Отладочный код, чтобы посмотреть содержимое GET и POST запросов.

//echo "<h2>GET запрос</h2>"; 
//var_dump($_GET);
//echo "<hr2>";

//echo "<h2>POST запрос</h2>";
//var_dump($_POST);
//echo "<hr2>";

if(!empty($_POST)){
  if(validateToken($_POST['token'])){
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $kcal = filter_input(INPUT_POST, 'kcal', FILTER_SANITIZE_STRING);
    $now = (new DateTime())->format('d-m-Y H:i:s');
    $id = create('recipe', [
    'title' => $title,
    'description' => $description,
    'kcal' => $kcal,
    'created_at' => $now,
    'updated_at' => $now
  ]);
  //$id = false;///
  if($id){
    //echo 'Recipe created'; // Вместо вывода сообщения лушче сделать перенаправление на страницу с созданной записью или списком всех записей. 
    header("Location: /?app=$app&view=show&id=$id");
    exit();
    // Подумайте, как это сделать. 
  }
  else{
    //echo 'Error';
    header("Location: /$app/error.php");
    exit();
    // Здесь также можно перенаправить на страницу ошибки. Подумайте, как это сделать. 
  }
  }    
  else{
    echo 'Wrong token!!!';
    exit();
  }
  
}
?>
<h2>
  Create recipe:
</h2>

<form action="" class="form" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>">

  <div class="form__field">
    <label for="title" class="form__label">
      Title:
    </label>
    <input type="text" id="title" name="title" class="form__input">
  </div>

  <div class="form__field">
    <label for="description" class="form__label">
      Description:
    </label>
    <input type="text" id="description" name="description" class="form__input">
  </div>

  <div class="form__field">
    <label for="description" class="form__label">
      Kcal:
    </label>
    <input type="number" id="kcal" name="kcal" class="form__input">
  </div>

  <button type="submit">Send</button>
</form>