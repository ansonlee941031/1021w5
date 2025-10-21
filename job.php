<?php
$title = "求才資訊列表";
require_once "header.php";
try {
  require_once 'db.php';
  $order = $_POST["order"]??"";
  $searchtxt = mysqli_real_escape_string($conn, $_POST["searchtxt"] ?? "");
  $date_start = $_POST["date_start"] ?? "";
  $date_end = $_POST["date_end"] ?? "";
  // 日期區間相反時自動交換
  if ($date_start && $date_end && $date_start > $date_end) {
    [$date_start, $date_end] = [$date_end, $date_start];
  }
  $where = [];
  if ($searchtxt) {
    $where[] = "(company like '%$searchtxt%' or content like '%$searchtxt%')";
  }
  if ($date_start) {
    $where[] = "pdate >= '$date_start'";
  }
  if ($date_end) {
    $where[] = "pdate <= '$date_end'";
  }
  $sql = "select * from job";
  if (count($where) > 0) {
    $sql .= " where " . implode(' and ', $where);
  }
  if ($order) {
    $sql .= " order by $order";
  }
  $result = mysqli_query($conn, $sql);
?>
<div class="container">
<form action="job.php" method="post">
  <div class="row g-2 align-items-center mb-2">
    <div class="col-auto">
      <select name="order" aria-label="選擇排序欄位" class="form-select">
        <option selected value="">選擇排序欄位</option>
        <option value="company" <?=($order=="company")?'selected':''?>>求才廠商</option>
        <option value="content" <?=($order=="content")?'selected':''?>>求才內容</option>
        <option value="pdate" <?=($order=="pdate")?'selected':''?>>刊登日期</option>
      </select>
    </div>
    <div class="col-auto">
      <input placeholder="搜尋廠商及內容" value="<?=htmlspecialchars($searchtxt)?>" type="text" name="searchtxt" class="form-control">
    </div>
    <div class="col-auto">
      <input type="date" name="date_start" class="form-control" value="<?=htmlspecialchars($date_start)?>" placeholder="起始日期">
    </div>
    <div class="col-auto">
      <span>~</span>
    </div>
    <div class="col-auto">
      <input type="date" name="date_end" class="form-control" value="<?=htmlspecialchars($date_end)?>" placeholder="結束日期">
    </div>
    <div class="col-auto">
      <input class="btn btn-primary" type="submit" value="搜尋">
    </div>
  </div>
</form>
<table class="table table-bordered table-striped" id="job_table">
 <thead>
   <tr>
    <th>求才廠商</th>
    <th>求才內容</th>
    <th>日期</th>
   </tr>
 </thead>
 <tbody>
 <?php
 while($row = mysqli_fetch_assoc($result)) {?>
 <tr>
  <td><?=$row["company"]?></td>
  <td><?=$row["content"]?></td>
  <td><?=$row["pdate"]?></td>
 </tr>
 <?php
  }
 ?>
 </tbody>
</table>
</div>
<?php
  mysqli_close($conn);
}
//catch exception
catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
require_once "footer.php";
?>