<?php

    switch ($_REQUEST['action']){
        case 'setUser':
            session_destroy();
            session_start();
            $_SESSION['username'] = $_REQUEST['user'];
        break;
    }
?>