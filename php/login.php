<?php
    if ( isset($_POST['connection'])){ // si on appuie sur connection

        sanitize($_POST['connection']);

        $request = $conn->prepare("SELECT *
                                FROM user
                                WHERE name = ?");
                                // récupère le pseudo correspondant au login

        $request->execute(array($_POST['login']));

        $table_pseudo=$request->fetch();//récupération du pseudo dans un tableau


        if(password_verify($_POST['pwd'], $table_pseudo['mdp'])){
                  
            $sessionlogin = htmlspecialchars($_POST['login']);               
            $sessionpwd = $_POST['pwd'];                   
            $sessionpseudo = htmlspecialchars($table_pseudo['pseudo']);  

                //recupération variable dans session avec sécurité//
                
            $_SESSION['login'] = sanitize($sessionlogin);               
            $_SESSION['pwd'] = $sessionpwd;
            $_SESSION['pseudo'] = sanitize($sessionpseudo);            
            // print_r ($_SESSION['pseudo']);
            

            header ('location: index.php'); // refresh de la page //
        } 

        else {
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
