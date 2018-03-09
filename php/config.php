<?php
    session_start(); //la session démarre dés le début
    
    $servername = "localhost";  //
    $username = "root";         // <== variable connection
    $password = "root";         //

    try {
        $conn = new PDO("mysql:host=$servername;dbname=irc", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        }
                                // CONNECTION //
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }

/////////////////////////////////////////////////////////////////////////////////////////////////////

    function isconnected(){ // Fonction 'est connecté' 

        if (!isset($_SESSION['login']) OR !isset($_SESSION['pwd'])){
            return False;
        }
        if (empty($_SESSION['login']) OR empty($_SESSION['pwd'])){
            return False;
        }
        return True;

    }
?>