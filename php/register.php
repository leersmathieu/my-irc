<?php
    

   
    if (isset($_POST['register'])){

        if (isset($_POST['loginreg']) AND isset($_POST['pwdreg'])) {
            
            $login_register = $_POST['loginreg'];
            $pwd_register = $_POST['pwdreg'];
            $pseudo = $_POST['pseudo'];

            $registration = $conn->prepare("INSERT INTO user 
                                        (name, mdp, pseudo) 
                                        VALUES(?, ?, ?)");

                $registration->execute(array(
                    $login_register,
                    $pwd_register,
                    $pseudo
                ));
           

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
    <label for="loginreg">Choisis un username</label>
    <input type="text" name="loginreg"><br />
    <label for="pwdreg">Choisis un password</label>
    <input type="password" name="pwdreg"><br />
    <label for="pseudo">Choisis un pseudo</label>
    <input type="text" name="pseudo"><br />
    <input type="submit" value="Inscription" name="register">
</form>