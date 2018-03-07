<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=irc", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

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
        <header>
            <section class="login">
                <?php require "php/login.php" ?>
            </section>
            <section class="register">
                <?php require "php/register.php" ?>
            </section>
        </header>
    <?php endif; ?>
                        <!-- IRC -->
    <?php if (isset($_SESSION['login']) && isset($_SESSION['pwd'])): ?>
        <section class="chat">
            <?php require "php/chat.php" ?>
            <?php require "php/exit.php" ?>
        </section>
    <?php endif; ?>

</body>
</html>