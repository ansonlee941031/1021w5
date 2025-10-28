<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
<?php
require_once "header.php";
try {
  require_once 'db.php';
  $msg="";
?>
<div class="container">
<form action="job_insert.php" method="post">
  <div class="mb-3 row">
    <label for="_company" class="col-sm-2 col-form-label">求才廠商</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="company" id="_company" placeholder="公司名稱" required>
    </div>
  </div>
  <div class="mb-3">
    <label for="_content" class="form-label">求才內容</label>
    <textarea class="form-control" name="content" id="_content" rows="10" required></textarea>
  </div>
  <input class="btn btn-primary" type="submit" value="送出">
  <?=$msg?>
</form>
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