<?php
    $request = $conn->prepare("SELECT count(*)
                                FROM user
                                WHERE name = ? AND mdp = ?");

    $request->execute(array($_POST['login'],$_POST['pwd']));
    $number = $request->fetchColumn();
    
$request = $conn->prepare("SELECT pseudo
                            FROM user
                            WHERE name = ? AND mdp = ?");
$request->execute(array($_POST['login'],$_POST['pwd']));

$table_pseudo=$request->fetchAll(PDO::FETCH_ASSOC);
// print_r($table_pseudo);


    
    if ( isset($_POST['connection'])){

         if( $number > 0) {

            // echo $number;
            
            // on démarre la session
            // session_start ();
            echo "session start";

            // on enregistre les paramètres dans des variables
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['pwd'] = $_POST['pwd'];
            $_SESSION['pseudo'] = $table_pseudo[0]['pseudo'];
            // print_r ($_SESSION['pseudo']);
            

            header ('location: index.php');
    }

        
        else {
            // si info non valide, on utilise alors un petit script pour alerter
            echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        
        }
    
    }

?>

<form action="" method="post">
        <label for="login">login</label>
        <input type="text" name="login"><br />
        <label for="password">password</label>
        <input type="password" name="pwd"><br />
        <input type="submit" value="Connexion" name="connection">
</form>
