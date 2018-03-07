

<div class="menu">
    <form action="" method="post" name="disconnect">
        <input type="submit" value="Disconnect" name="dc">
    </form>
</div>
    <ol class="chat">
        <?php
            echo "Lancement Chat"."<br />";

            if (!empty($_POST['message'])){

                $msg = $_POST['message'];
                echo $msg;

                $request = $conn->prepare("INSERT INTO message 
                                        (msg, user_id) 
                                        VALUES( ?, ?)");

                $request->execute(array($msg, 2
                ));

               
            }
        ?>
    </ol>
<form action="" method="post">    
<input class="textarea" type="text" placeholder="Type here!" name="message" />
<!-- <input type="submit" name="send" value="envoyer"> -->
<div class="emojis">

</div>
</form>