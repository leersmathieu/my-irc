

<div class="menu">
    <form action="" method="post" name="disconnect">
        <input type="submit" value="Disconnect" name="dc">
    </form>
</div>
    <ol class="chat">
        <?php
            echo "Lancement Chat"."<br />";

            if (isset($_POST['message']) ){
                $message = $_POST['message'];
                echo $message;
            }
        ?>
    </ol>
<form action="" method="post">    
<input class="textarea" type="text" placeholder="Type here!" name="message" />
<!-- <input type="submit" name="send" value="envoyer"> -->
<div class="emojis">

</div>
</form>