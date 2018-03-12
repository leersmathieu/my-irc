<head>
    <meta http-equiv="refresh" content="15">
    <link rel="stylesheet" href="../stylesheets/style.css">
</head>

<section class="message">
                             
<?php

    require "config.php";


   

    $lastmess = $conn->query("SELECT *
                                FROM message 
                                JOIN user 
                                ON user.id = message.user_id 
                                ORDER BY message.id 
                                DESC LIMIT 0,10
                                ");
                    // on sélectionne tout dans la table message ainsi que l'user id correspondant

    $lastmess = $lastmess->fetchAll(PDO::FETCH_ASSOC); // on récupère le tout dans un tableau associatif

    for($i = sizeof($lastmess)-1; $i >= 0; $i--){ //pour chaque ligne du tableau...

        $value = $lastmess[$i]; // on récupère les valeurs du tableau pour chaque ligne
        // print_r($lastmess[$i]);

        echo "<h2>".$value['pseudo']."</h2>". //on indique ce qu'on veux afficher
        "<p>".$value['msg']."</p>"."<br />";

        

    } 
 
?>
