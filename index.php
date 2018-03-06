<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My IRC</title>
</head>
<body>
                        <!-- LOGIN -->
    <?php if (!isset($_SESSION['login']) && !isset($_SESSION['pwd'])): ?>
        <section class="login">
            <?php require "php/login.php" ?>
        </section>
    <?php endif; ?>
                        <!-- IRC -->
    <?php if (isset($_SESSION['login']) && isset($_SESSION['pwd'])): ?>
        <section class="chat">
            <?php require "php/chat.php" ?>
                <div class="disconnect">
                    <?php require "php/exit.php" ?>
                </div>
        </section>
    <?php endif; ?>

</body>
</html>