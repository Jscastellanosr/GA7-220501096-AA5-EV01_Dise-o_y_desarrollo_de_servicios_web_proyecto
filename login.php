<?php

session_start();

require 'database.php';

if(!empty($_POST['email']) && !empty($_POST['password'])){
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $result = $records->fetch(PDO::FETCH_ASSOC);
    

    $message = '';

    if(!empty($result) && (count($result) > 0 && password_verify($_POST['password'], $result['password']))) {

         $_SESSION['users_id'] = $result['id'];
         header('Location: /evidenciaLogin');
         
    }else{
        $message = 'sorry, you could not sign in';
        
    }
}

?>


<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <?php
    require 'partials/header.php'
    ?>

    <h1>Login</h1>
    <span>or <a href="signup.php">Sign up</a> </span>

    <?php
        if(!empty($message)):
    ?>
    <p class="msg"><?= $message?></p>
    <?php endif; ?>
    


    <form action="login.php" method="post">

        <input type="text" name="email" placeholder="Enter your e-mail">
        <input type="password" name="password" placeholder="Enter your password">
        <input type="submit" value="Enviar">
    </form>

        
</body>
</html>