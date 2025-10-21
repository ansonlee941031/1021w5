<?php
require_once "header.php";
try {
  require_once 'db.php';
  $sql="select * from job";
  $result = mysqli_query($conn, $sql);
?>
<div class="container">
    <table id="jobTable" class="table table-bordered table-striped">
        <thead>
            <tr>
                <td>求才廠商</td>
                <td>求才內容</td>
                <td>日期</td>
            </tr>
        </thead>
        <tbody>
            <?php
            while($row = mysqli_fetch_assoc($result)) {?>
            <tr>
                <td><?= htmlspecialchars($row["company"]) ?></td>
                <td><?= htmlspecialchars($row["content"]) ?></td>
                <td><?= htmlspecialchars($row["pdate"]) ?></td>
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

catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
require_once "footer.php";
?>