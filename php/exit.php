<form action="" method="post" name="disconnect">
    <input type="submit" value="Disconnect" name="dc">
</form>
<?php
    if (isset($_POST['dc'])){

        // session_start ();
        
        // On détruit les variables de notre session
        session_unset ();

        // On détruit notre session
        session_destroy ();
        echo "fin de session";

        // redirection/refresh
        header ('location: index.php');
    }
?>

