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