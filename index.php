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


        function isconnected(){
            if (!isset($_SESSION['login']) OR !isset($_SESSION['pwd'])){
                return False;
            }
            if (empty($_SESSION['login']) OR empty($_SESSION['pwd'])){
                return False;
            }
            return True;

        }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="stylesheets/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My IRC</title>
    </head>

    <body>
        <div class="chat">
            <!-- LOGIN -->
            <?php if (!isconnected()): ?>
                <header>
                    <section class="login">
                        <?php require "php/login.php" ?>
                    </section>
                    <img src="assets/test.png" alt="Default image">
                    <section class="register">
                        <?php require "php/register.php" ?>
                    </section>
                </header>
            <?php endif; ?>

            <!-- IRC -->
            <?php if (isconnected()): ?>
                <div class="menu-icon">
                    <?php require "php/exit.php" ?>
                </div>
                <section class='new'>
                    <h2> Welcome to the chat </h2>
                </section>
                <section class="message">
                    <?php require "php/chat.php" ?>
                </section>
                <div class='send'>
                    <form action="" method="post" name="sending">
                        <input class="textarea" type="text" placeholder="Type here!" name="message" />
                        <!-- <input type="submit" name="send" value="envoyer"> -->
                        <div class="emojis"></div>
                    </form>
                </div>
            <?php endif; ?>
            <footer>
                <?php 
                    if (isconnected()){
                        echo "connected";
                    }
                    else {
                        echo "not connected";
                    }
                ?>
            </footer>
        </div>
    </body>

</html>