


    

    
        <?php
            

            if (!empty($_POST['message'])){

                $msg = $_POST['message'];
                

                $prequest = $conn->query("SELECT id
                                            FROM user
                                            WHERE name = '".$_SESSION['login']."'");

                $user_id = $prequest->fetch();


                $request = $conn->prepare("INSERT INTO message 
                                        (msg, user_id) 
                                        VALUES( ?, ?)");

                $request->execute(array($msg, $user_id['id']
                ));

               
            }

            $lastmess = $conn->query("SELECT *
                                     FROM message 
                                     JOIN user 
                                     ON user.id = message.user_id 
                                     ORDER BY message.id 
                                     DESC LIMIT 0,9
                                     ");

            $lastmess = $lastmess->fetchAll(PDO::FETCH_ASSOC);
            foreach ($lastmess as $value){

                echo "<h2>".$value['name']."</h2>".
                "<p>".$value['msg']."</p>"."<br />";
                
            }
            // print_r($lastmess)
            
        ?>
