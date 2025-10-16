<?php 
session_start();
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';
$token = generateToken();
$user = getById('users', $_GET['id']);

if(!empty($_POST)){
  if(validateToken($_POST['token'])){
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
    $userId = $_GET['id'];
    $now = (new DateTime())->format('d-m-Y H:i:s');
  update('users',  [
    'id' => $_GET['id'],
    'username' => $username,
    'password' => $password,
    'age' => $age,
    'updated_at' => $now
  ]);   
  header("Location: /?app=$app&view=show&id=$userId");
  }
  else{
    echo 'Wrong token!!!';
    exit();
  }
  
}

?>

<h2>
  Update User
</h2>

<form action="" method="post" class="form">
<input type="hidden" name="token" value="<?php echo $token; ?>">

  <div class="form__field">
    <label for="username" class="form__label">
      Username:
    </label>
    <input type="text" id="username" name="username" class="form__input" value="<?= $user['username'];?>">
  </div>

  <div class="form__field">
    <label for="password" class="form__label">
      Password:
    </label>
    <input type="password" id="password" name="password" class="form__input" value="<?= $user['password'];?>">
  </div>

  <div class="form__field">
    <label for="age" class="form__label">
      Age:
    </label>
    <input type="number" id="age" name="age" class="form__input" value="<?= $user['age'];?>">
  </div>

  <button type="submit">Send</button>
</form>