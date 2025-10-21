<?php
session_start();
include __DIR__ . '/db.php'; 

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$account_raw = isset($_POST['account']) ? $_POST['account'] : '';
$password_raw = isset($_POST['password']) ? $_POST['password'] : '';

$account = mysqli_real_escape_string($conn, $account_raw);
$password = mysqli_real_escape_string($conn, $password_raw);

$sql = "SELECT id, name, role FROM user WHERE account = '$account' AND password = '$password'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row['id'];
    $_SESSION['user_name'] = $row['name'];
    $_SESSION['user_role'] = $row['role'];
    header('Location: index.php');
    exit;
} else {
    $_SESSION['login_error'] = '帳號或密碼錯誤';
    header('Location: login.php');
    exit;
}
