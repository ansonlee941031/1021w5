
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
    <?php
require_once "header.php";
try {
  $postid = "";
  $company = "";
  $content = "";
  $pdate = "";
  if ($_GET) {
    require_once 'db.php';
    $action = $_GET["action"]??"";
    if ($action=="confirmed"){
      //delete data
      $postid = $_GET["postid"];
      $sql="delete from job where postid=?";
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "i", $postid);
      $result = mysqli_stmt_execute($stmt);
      mysqli_close($conn);
      header('location:job.php');
    }
    else{
      //show data
      $postid = $_GET["postid"];
      $sql="select postid, company, content, pdate from job where postid=?";    
      // $result = mysqli_query($conn, $sql);
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, $sql);
      mysqli_stmt_bind_param($stmt, "i", $postid);
      $res = mysqli_stmt_execute($stmt);
      if ($res){
        mysqli_stmt_bind_result($stmt, $postid, $company, $content, $pdate);
        mysqli_stmt_fetch($stmt);
      }
    }//confirmed else
    mysqli_close($conn);
  }//$_GET
} catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>
<div class="container">
  <table class="table table-bordered table-striped">
    <tr>
      <td>編號</td>
      <td>求才廠商</td>
      <td>求才內容</td>
      <td>刊登日期</td>
    </tr>
    <tr>
      <td><?=$postid?></td>
      <td><?=$company?></td>
      <td><?=$content?></td>
      <td><?=$pdate?></td>
    </tr>
  </table>
  <a href="job_delete.php?postid=<?=$postid?>&action=confirmed" class="btn btn-danger">刪除</a>
</div>
<?php
require_once "footer.php";
?>