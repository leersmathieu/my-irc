<?php
    $request = $conn->prepare("SELECT count(*) 
                                FROM user
                                WHERE name = ? AND mdp = ?");
                                // compte le nombre de ligne ou la condition est respectée ( 0 ou 1 en général )

    $request->execute(array($_POST['login'],$_POST['pwd']));

    $number = $request->fetchColumn(); // récupération du nombre

    $request = $conn->prepare("SELECT pseudo
                            FROM user
                            WHERE name = ? AND mdp = ?");
                            // récupère le pseudo correspondant au login

    $request->execute(array($_POST['login'],$_POST['pwd']));

    $table_pseudo=$request->fetchAll(PDO::FETCH_ASSOC); //récupération du pseudo dans un tableau
    // print_r($table_pseudo);


    
    if ( isset($_POST['connection'])){ // si on appuie sur connection

        sanitize($_POST['connection']);

         if( $number > 0) { // et que l'identifiant existe dans la base de donnée

            
            $sessionlogin = htmlspecialchars($_POST['login']);               
            $sessionpwd = htmlspecialchars($_POST['pwd']);                   
            $sessionpseudo = htmlspecialchars($table_pseudo[0]['pseudo']);  

                //recupération variable dans session avec sécurité//
                
            $_SESSION['login'] = sanitize($sessionlogin);               
            $_SESSION['pwd'] = sanitize($sessionpwd);                   
            $_SESSION['pseudo'] = sanitize($sessionpseudo);            
            // print_r ($_SESSION['pseudo']);
            

            header ('location: index.php'); // refresh de la page //
        }

        else {

            // si info non valide, on utilise alors un petit script pour alerter
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        
        }
    
    }

?>
<!-- Formulaire login -->
<form action="" method="post">
    <label for="login">login</label>
    <input type="text" name="login"><br />
    <label for="password">password</label>
    <input type="password" name="pwd"><br />
    <input type="submit" value="Connexion" name="connection">
</form>
