<?php 
include('header.php'); 


// 五組帳號、密碼、姓名、身分
$users = [
    "root"  => ["password" => "password", "name" => "管理員", "role" => "teacher"],
    "user1" => ["password" => "pw1", "name" => "小明",   "role" => "student"],
    "user2" => ["password" => "pw2", "name" => "小華",   "role" => "student"],
    "user3" => ["password" => "pw3", "name" => "小美",   "role" => "student"],
    "user4" => ["password" => "pw4", "name" => "小強",   "role" => "student"],
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $account = $_POST["account"] ?? "";
    $password = $_POST["password"] ?? "";
    $redirect = $_POST["redirect"] ?? "success.php";

    if (isset($users[$account]) && $users[$account]["password"] === $password) {
        // 登入成功
        $_SESSION["account"] = $account;
        $_SESSION["name"] = $users[$account]["name"];
        $_SESSION["role"] = $users[$account]["role"];

        header("Location: $redirect");
        exit;
    } else {
        // 登入失敗
        header("Location: login.php?msg=" . urlencode("帳號或密碼錯誤") . "&redirect=" . urlencode($redirect));
        exit;
    }
}

$msg = $_GET["msg"] ?? "";
$redirect = $_GET["redirect"] ?? "success.php";
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title mb-4">登入</h4>
                    <form method="post" action="login.php">
                        <input type="hidden" name="redirect" value="<?=htmlspecialchars($redirect)?>">
                        <div class="mb-3">
                            <label for="account" class="form-label">帳號</label>
                            <input type="text" class="form-control" id="account" name="account" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">密碼</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">登入</button>
                    </form>
                    <?php if ($msg): ?>
                        <div class="alert alert-danger mt-3"><?=htmlspecialchars($msg)?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>