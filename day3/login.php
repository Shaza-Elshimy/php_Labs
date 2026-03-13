<?php
session_start();
require "connection.php"; // الاتصال بالقاعدة
$errors = [];

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email)){
        $errors['email'] = "Email is required";
    }

    if(empty($password)){
        $errors['password'] = "Password is required";
    }

    if(empty($errors)){
        $result = $db->getData("users", "email='$email' AND password='$password'");

        if($result->num_rows > 0){
            $user = $result->fetch_assoc();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['fname'] . " " . $user['lname'];
            $_SESSION['profile_pic'] = $user['profile_pic'];
            header("Location: list.php");
            exit;
        } else {
            $errors['login'] = "Incorrect Email or Password";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Login</h2>
    <form method="POST" class="border p-4 rounded shadow-sm">
        <?php if(isset($errors['login'])): ?>
            <div class="alert alert-danger"><?= $errors['login'] ?></div>
        <?php endif; ?>

        <div class="mb-3">
            <label>Email</label>
            <input type="text" name="email" class="form-control" value="<?= $_POST['email'] ?? '' ?>">
            <?php if(isset($errors['email'])) echo "<small class='text-danger'>{$errors['email']}</small>"; ?>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
            <?php if(isset($errors['password'])) echo "<small class='text-danger'>{$errors['password']}</small>"; ?>
        </div>

        <div class="d-grid">
            <input type="submit" name="login" value="Login" class="btn btn-primary">
        </div>
    </form>
</div>
</body>
</html>