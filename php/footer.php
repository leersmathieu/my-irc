<?php 

    if (isconnected()){
        echo "connected as ".$_SESSION['login']." (".$_SESSION['pseudo'].")";
    }
    else {
        echo "not connected";
    }

?>