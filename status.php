<?php
$title = "迎新茶會報名";
include('header.php');

if(!isset($_SESSION['account'])){
    $redirect = $_SERVER['REQUEST_URI'];
    header("Location: login.php?redirect=" . urlencode($redirect));
    exit;
}

$name = $_SESSION['name'];
$role = $_SESSION['role'];
?>

<div class="container mt-4">
  <h2>迎新茶會報名</h2>
  <form method="post" action="">
    <div class="mb-3">
      <label class="form-label">晚餐需求:</label><br>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dinner" id="dinner_no" value="0" checked>
        <label class="form-check-label" for="dinner_no">不需要晚餐</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="dinner" id="dinner_yes" value="60">
        <label class="form-check-label" for="dinner_yes">需要晚餐 (60元)</label>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">提交報名</button>
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $dinner_fee = $_POST["dinner"] ?? 0;

    echo "<div class='alert alert-info mt-3'>";
    if($role === "teacher"){
        echo "$name ，您是老師，免費參加。";
    }else{
        if($dinner_fee>0){
            echo "$name ，需要晚餐，請繳 $dinner_fee 元。";
        }else{
            echo "$name ，不需要晚餐，免費參加。";
        }
    }
    echo "</div>";
}
?>
</div>

<?php include('footer.php'); ?>
