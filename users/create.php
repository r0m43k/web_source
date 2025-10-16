<?php 
session_start();
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';
$token = generateToken();
$cookie = setcookie("username", "user", time() + (60 * 60 * 24 * 30), "/");
// Отладочный код, чтобы посмотреть содержимое GET и POST запросов.
/*
echo "<h2>GET запрос</h2>"; 
var_dump($_GET);
echo "<hr2>";

echo "<h2>POST запрос</h2>";
var_dump($_POST);
echo "<hr2>";
 
var_dump($token);
echo $cookie;
var_dump($cookie);
*/
if(!empty($_POST)){
  if(validateToken($_POST['token'])){
    echo 'token has been successfully validated!<br>';
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    $now = (new DateTime())->format('d-m-Y H:i:s');
    $id = create('users', [
    'username' => $username,
    'password' => $password,
    'age' => $age,
    'created_at' => $now,
    'updated_at' => $now
  ]);
  //$id = false;
  if($id){
    echo 'User created'; // Вместо вывода сообщения лушче сделать перенаправление на страницу с созданной записью или списком всех записей. 
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
  Create User
</h2>

<form action="" class="form" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>">

  <div class="form__field">
    <label for="username" class="form__label">
      Username:
    </label>
    <input type="text" id="username" name="username" class="form__input">
  </div>

  <div class="form__field">
    <label for="password" class="form__label">
      Password:
    </label>
    <input type="password" id="password" name="password" class="form__input">
  </div>

  <div class="form__field">
    <label for="age" class="form__label">
      Age:
    </label>
    <input type="number" id="age" name="age" class="form__input">
  </div>

  <button type="submit">Send</button>
</form>