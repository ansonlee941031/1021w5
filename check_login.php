<?php
// check_login.php - 簡單的登入檢查範例
session_start();

// 如果沒有登入 session，就導回 login.php
if (empty($_SESSION['user_account'])) {
    // 可記錄嘗試存取的頁面，方便登入後回來
    $_SESSION['after_login_redirect'] = $_SERVER['REQUEST_URI'];
    header('Location: login.php');
    exit;
}

// 若需要更嚴格的檢查（例如檢查角色），可以擴充如下：
// if ($_SESSION['user_role'] !== 'T') {
//     die('無權存取');
// }
