<?php
    $request = $conn->prepare("SELECT count(*)
                                FROM user
                                WHERE name = ? AND mdp = ?");

    $request->execute(array($_POST['login'],$_POST['pwd']));
    $number = $request->fetchColumn();
    

   
    
    // on teste si nos variables sont définies
    if ( isset($_POST['connection']))
     {
         if( $number > 0) {

        // on vérifie les informations du formulaire, si pseudo et pwd ok ...
            echo $number;
            
            // on démarre la session
            // session_start ();
            echo "session start";

            // on enregistre les paramètres dans des variables
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['pwd'] = $_POST['pwd'];

            header ('location: index.php');
    }

        
        else {
            // si info non valide, on utilise alors un petit script pour alerter
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        
        }
    
    }

?>
<form action="" method="post">
    login :<input type="text" name="login"><br />
    mot de passe :<input type="password" name="pwd"><br />
    <input type="submit" value="Connexion" name="connection">
</form>