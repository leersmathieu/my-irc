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
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My IRC</title>
</head>
<body>
    <div class="chat">                 <!-- LOGIN -->
        <?php if (!isconnected()): ?>
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
        <?php if (isconnected()): ?>
            <div class="menu-icon">
                <?php require "php/exit.php" ?>
            </div>
            <section>
                <?php require "php/chat.php" ?>
                
            </section>
        <?php endif; ?>
            <?php print_r($_SESSION);
            if (isconnected()){
                echo "connected";
            }
            else {
                echo "no connected";
            } ?>    
    </div> 
</body>
</html>