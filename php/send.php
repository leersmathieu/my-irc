 <?php 
    if (!empty($_POST['message']) AND isset($_POST['message'])){ 

        $msg = sanitize($_POST['message']);
        
        $prequest = $conn->query("SELECT id
                                    FROM user
                                    WHERE name = '".$_SESSION['login']."'");

                                    // on récupère l'id de l'user connecté a la session

        $user_id = $prequest->fetch();


        $request = $conn->prepare("INSERT INTO message 
                                (msg, user_id) 
                                VALUES( ?, ?)");

        $request->execute(array($msg, $user_id['id'])); // on envoie le message ainsi que l'user_id dans la database
        
        
    }
?>
<div class='send'>
    <form action="" method="post" name="sending">
        <input class="textarea" type="text" placeholder="Type here!" name="message" autofocus="auto" />
    </form>
</div>