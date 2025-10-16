<?php 
session_start();
include_once $dbPath .  'db.php';
require_once $tokenPath . 'token.php';
$token = generateToken();
$review = getById('review', $_GET['id']);

if(!empty($_POST)){
  if(validateToken($_POST['token'])){
    $names = filter_input(INPUT_POST, 'names', FILTER_SANITIZE_STRING);
    $review = filter_input(INPUT_POST, 'review', FILTER_SANITIZE_STRING);
    $rate = filter_input(INPUT_POST, 'rate', FILTER_SANITIZE_STRING);
    $userId = $_GET['id'];
    $now = (new DateTime())->format('d-m-Y H:i:s');
  update('review',  [
    'id' => $_GET['id'],
    'names' => $names,
    'review' => $review,
    'rate' => $rate,
    'updated_at' => $now,
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
  Update Review
</h2>
<form action="" class="form" method="post">
<input type="hidden" name="token" value="<?php echo $token; ?>">

  <div class="form__field">
    <label for="title" class="form__label">
      Title:
    </label>
    <input type="text" id="names" name="names" class="form__input" value="<?= $review['names'];?>">
  </div>
  
  <div class="form__field">
    <label for="description" class="form__label">
      Description:
    </label>
    <input type="text" id="review" name="review" class="form__input" value="<?= $review['review'];?>">
  </div>
  
  <div class="form__field">
    <label for="kcal" class="form__label">
      Rate:
    </label>
    <input type="number" id="rate" name="rate" class="form__input" value="<?= $review['rate'];?>">
  </div>

  <button type="submit">Send</button>
</form>
