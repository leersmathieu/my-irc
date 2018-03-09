<?php
    if (isset($_POST['dc'])){ // Si on appuie sur disconnect ...

        sanitize($_POST['dc']);

        // On détruit les variables de notre session
        session_unset ();

        // On détruit notre session
        session_destroy ();
        echo "fin de session";

        // redirection/refresh
        header ('location: index.php');
    }
?>

<!-- Bouton disconnect -->
<form action="" method="post" name="disconnect">
    <input type="submit" value="Disconnect" name="dc">
</form>

