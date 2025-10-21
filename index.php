<?php
// 1. 引用 header 和資料庫連線設定
include('header.php');
require_once('db.php'); 

// 2. 準備並執行 SQL 查詢
$sql = "SELECT * FROM event ORDER BY id DESC"; 
$result = mysqli_query($conn, $sql);
?>

<div class="container my-5">
    <h2 class="mb-4">最新活動</h2>
    <div class="row">

        <?php
        // 3. 開始 while 迴圈，只用來重複產生 col
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <div class="col-md-6 mb-4">
                <div class="card h-100 bg-white text-dark">
                    <div class="card-body d-flex flex-column">
                        <h3 class="card-title"><?= htmlspecialchars($row['name']) ?></h3>
                        <p class="card-text">
                            <?= htmlspecialchars($row['description']) ?>
                        </p>
                    </div>
                </div>
            </div>

        <?php
        } 
        ?>

    </div> </div> <?php
// 4. 關閉資料庫連線並引用 footer
mysqli_close($conn);
include('footer.php');
?>