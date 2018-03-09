<?php 

    if (isconnected()){
        echo "<p>connected as ".$_SESSION['login']." (".$_SESSION['pseudo'].")</p>";
    }
    else {
        echo "not connected";
    }

?>