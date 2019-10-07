<?php

    include ('../config.php');

    switch ($_REQUEST['action']){

        case "sendMessage":

            session_start();

            $query = $db->prepare("INSERT INTO messages SET user=?,  message=?");

            $run = $query->execute([$_SESSION['username'], $_REQUEST['message']]);

            if ($run){
                echo 1;
                exit;
            }

        break;
        case "getMessages":

            $query = $db->prepare("SELECT * FROM messages ");

            $run = $query->execute();

            $rs = $query->fetchAll(PDO::FETCH_OBJ);

            $chat = '';

            session_start();

            foreach ($rs as $message){
                $chat .=    '<div class="single-message '.(($_SESSION['username']==$message->user)?'right':'left').'">
                                <div>
                                    <strong>'.$message->user.': </strong><p>'.$message->message.'</p>
                                </div>
                                <span>'.date('d/m/Y h:i',strtotime($message->date)).'</span>
                            </div>
                            <div class="clear"></div>';
            }
            foreach ($rs as $message){
                $chat .=    '<div class="single-message '.(($_SESSION['username']==$message->user)?'right':'left').'">
                                <div>
                                    <strong>'.$message->user.': </strong><p>'.$message->message.'</p>
                                </div>
                                <span>'.date('d/m/Y h:i',strtotime($message->date)).'</span>
                            </div>
                            <div class="clear"></div>';
            }
            foreach ($rs as $message){
                $chat .=    '<div class="single-message '.(($_SESSION['username']==$message->user)?'right':'left').'">
                                <div>
                                    <strong>'.$message->user.': </strong><p>'.$message->message.'</p>
                                </div>
                                <span>'.date('d/m/Y h:i',strtotime($message->date)).'</span>
                            </div>
                            <div class="clear"></div>';
            }
            foreach ($rs as $message){
                $chat .=    '<div class="single-message '.(($_SESSION['username']==$message->user)?'right':'left').'">
                                <div>
                                    <strong>'.$message->user.': </strong><p>'.$message->message.'</p>
                                </div>
                                <span>'.date('d/m/Y h:i',strtotime($message->date)).'</span>
                            </div>
                            <div class="clear"></div>';
            }
            foreach ($rs as $message){
                $chat .=    '<div class="single-message '.(($_SESSION['username']==$message->user)?'right':'left').'">
                                <div>
                                    <strong>'.$message->user.': </strong><p>'.$message->message.'</p>
                                </div>
                                <span>'.date('d/m/Y h:i',strtotime($message->date)).'</span>
                            </div>
                            <div class="clear"></div>';
            }

            echo $chat;

        break;

    }

?>