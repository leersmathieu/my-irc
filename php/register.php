<?php
    

    // on teste si nos variables sont définies
    if (isset($_POST['register'])){

        // on vérifie les informations du formulaire, si pseudo et pwd ok ...
        if (isset($_POST['loginreg']) AND isset($_POST['pwdreg'])) {
            
            $login_register = $_POST['loginreg'];
            $pwd_register = $_POST['pwdreg'];


           

        }
        else {
            
            echo 'info non valide';
        
        }
    }
    // else {
    //     echo 'variables non déclarées.';
    // }

?>
<form action="" method="post">
    Entrez un login :<input type="text" name="loginreg"><br />
    Entrez un mot de passe :<input type="password" name="pwdreg"><br />
    Pseudo :<input type="text" name="pseudo"><br />
    <input type="submit" value="Inscription" name="register">
</form>