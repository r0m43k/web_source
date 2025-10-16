<?php 
session_start();
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';
$token = generateToken();
$cookie = setcookie("review", "name", time() + (60 * 60 * 24 * 30), "/");
// Отладочный код, чтобы посмотреть содержимое GET и POST запросов.

//echo "<h2>GET запрос</h2>"; 
//var_dump($_GET);
//echo "<hr2>";

//echo "<h2>POST запрос</h2>";
//var_dump($_POST);
//echo "<hr2>";

if(!empty($_POST)){
  if(validateToken($_POST['token'])){
    $names = filter_input(INPUT_POST, 'names', FILTER_SANITIZE_STRING);
    $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_STRING);
    $rate = filter_input(INPUT_POST, 'rate', FILTER_SANITIZE_STRING);
    $now = (new DateTime())->format('d-m-Y H:i:s');
    $id = create('review', [
    'names' => $names,
    'review' => $review,
    'rate' => $rate,
    'created_at' => $now,
    'updated_at' => $now
  ]);
  //$id = false;
  if($id){
    //echo 'Review created'; // Вместо вывода сообщения лушче сделать перенаправление на страницу с созданной записью или списком всех записей. 
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
  Create review:
</h2>

<form action="" class="form" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>">

  <div class="form__field">
    <label for="names" class="form__label">
      Tiltle:
    </label>
    <input type="text" id="names" name="names" class="form__input">
  </div>

  <div class="form__field">
    <label for="rate" class="form__label">
      Review:
    </label>
    <input type="text" id="review" name="review" class="form__input">
  </div>

  <div class="form__field">
    <label for="rate" class="form__label">
      Rate:
    </label>
    <input type="number" id="rate" name="rate" class="form__input">
  </div>

  <button type="submit">Send</button>
</form>