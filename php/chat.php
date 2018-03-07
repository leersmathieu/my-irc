


    

    <ol class="chat">
        <?php
            echo "Lancement Chat"."<br />";

            if (!empty($_POST['message'])){

                $msg = $_POST['message'];

                $request = $conn->prepare("INSERT INTO message 
                                        (msg, user_id) 
                                        VALUES( ?, ?)");

                $request->execute(array($msg, 2
                ));

               
            }

            $lastmess = $conn->query("SELECT *
                                     FROM message 
                                     JOIN user 
                                     ON message.user_id = user.id 
                                     ORDER BY message.id 
                                     DESC LIMIT 0,10
                                     ");

            $lastmess = $lastmess->fetchAll(PDO::FETCH_ASSOC);
            foreach ($lastmess as $value){

                echo "<div class='self'>".$value['name']."</div>"."<br />".
                "<span class='msg'>".$value['msg']."</span>"."<br />";
                
            }
            // print_r($lastmess)
            
        ?>
    </ol>
<form action="" method="post">    
<input class="textarea" type="text" placeholder="Type here!" name="message" />
<!-- <input type="submit" name="send" value="envoyer"> -->
<div class="emojis">

</div>
</form>