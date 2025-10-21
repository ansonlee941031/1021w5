<?php
$title = "資管一日營報名";
include('header.php');

// 沒登入就跳回 login
if(!isset($_SESSION['account'])){
    $redirect = $_SERVER['REQUEST_URI'];
    header("Location: login.php?redirect=" . urlencode($redirect));
    exit;
}

$name = $_SESSION['name'];
$role = $_SESSION['role'];
?>

<div class="container mt-4">
  <h2>資管一日營報名</h2>
  <form method="post" action="">

    <div class="mb-3">
      <label class="form-label">活動場次:</label><br>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="session[]" id="morning" value="morning">
        <label class="form-check-label" for="morning">上午場 (150元)</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="session[]" id="afternoon" value="afternoon">
        <label class="form-check-label" for="afternoon">下午場 (100元)</label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="checkbox" name="session[]" id="lunch" value="lunch">
        <label class="form-check-label" for="lunch">午餐 (50元)</label>
      </div>
    </div>

    <button type="submit" class="btn btn-primary">提交報名</button>
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $sessions = $_POST["session"] ?? [];
    $fee = 0;

    if($role === "student"){
        if(in_array("morning",$sessions)) $fee+=150;
        if(in_array("afternoon",$sessions)) $fee+=100;
        if(in_array("lunch",$sessions)) $fee+=50;
    }

    echo "<div class='alert alert-info mt-3'>";
    if($role === "teacher"){
        echo "$name ，您是老師，免費參加。";
    }else{
        echo "$name ，您要繳交 $fee 元。";
    }
    echo "</div>";
}
?>
</div>

<?php include('footer.php'); ?>
