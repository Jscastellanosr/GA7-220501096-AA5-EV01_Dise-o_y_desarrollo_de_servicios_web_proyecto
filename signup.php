<?php
require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])){
    
    $sql = "INSERT INTO users (email, password) VALUE (:email, :password)";
    $stmt = $conn-> prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if($stmt->execute()){
        $message='new user successfully created';
    }else{
        $message='we could not create a new user';
    }
} 
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Signup</title>
</head>
<body>
    <?php
    require 'partials/header.php'
    ?>

    <?php
    if(!empty($message)): ?>
    <p><?=$message ?></p>
    <?php endif; ?>
       

    <h1>Sign up</h1>
    <span>or <a href="login.php">Login</a> </span>

    <form action="signup.php" method="post">

        <input type="text" name="email" placeholder="Enter your e-mail">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="password" name="psswrd_Confirm" placeholder="Confirm your password">
        <input type="submit" value="Enviar">
    </form>

</body>
</html>