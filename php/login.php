<?php
    $login_valide = "me";
    $pwd_valide = "me";

    // on teste si nos variables sont définies
    if (isset($_POST['login']) && isset($_POST['pwd'])) {

        // on vérifie les informations du formulaire, si pseudo et pwd ok ...
        if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {
            
            // on démarre la session
            session_start ();
            echo "session start";

            // on enregistre les paramètres dans des variables
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['pwd'] = $_POST['pwd'];

            header ('location: index.php');

        }
        else {
            // si info non valide, on utilise alors un petit javascript lui signalant ce fait
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        
        }
    }
    // else {
    //     echo 'Les variables du formulaire ne sont pas déclarées.';
    // }

?>
<form action="" method="post">
    login :<input type="text" name="login"><br />
    mot de passe :<input type="password" name="pwd"><br />
    <input type="submit" value="Connexion">
</form>