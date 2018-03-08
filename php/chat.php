


    

    
        <?php
            

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
                                     DESC LIMIT 0,9
                                     ");

            $lastmess = $lastmess->fetchAll(PDO::FETCH_ASSOC);
            foreach ($lastmess as $value){

                echo "<h2>".$value['name']."</h2>".
                "<p>".$value['msg']."</p>"."<br />";
                
            }
            // print_r($lastmess)
            
        ?>
