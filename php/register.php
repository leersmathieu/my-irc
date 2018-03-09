<?php

    if (isset($_POST['register'])){ // Si on appuie sur 'register'

        sanitize($_POST['register']);

        if (isset($_POST['loginreg']) AND isset($_POST['pwdreg']) AND isset($_POST['pseudo'])) { //si...
            
            $login_register = htmlspecialchars($_POST['loginreg']);
            $pwd_register = htmlspecialchars($_POST['pwdreg']); // on récupère les valeurs POST dans des variables et on up la sécurité
            $pseudo = htmlspecialchars($_POST['pseudo']);

            $login_register = sanitize($login_register);
            $pwd_register = sanitize($pwd_register); 
            $pseudo = sanitize($pseudo);

            $registration = $conn->prepare("INSERT INTO user  
                                        (name, mdp, pseudo) 
                                        VALUES(?, ?, ?)");
                                                            // Et on les ajoutes à la database
            $registration->execute(array($login_register,$pwd_register,$pseudo)); 
           
        }

        else {
            
            echo 'info non valide';
        
        }
    }

?>

<!-- Formulaire d'inscription -->
<form action="" method="post">
    <label for="loginreg">Choisis un username</label>
    <input type="text" name="loginreg"><br />
    <label for="pwdreg">Choisis un password</label>
    <input type="password" name="pwdreg"><br />
    <label for="pseudo">Choisis un pseudo</label>
    <input type="text" name="pseudo"><br />
    <input type="submit" value="Inscription" name="register">
</form>