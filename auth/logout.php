<?php
    session_start();
    setcookie('user_id', '');
    // setcookie('user_psw', '');
    session_destroy();
header("location: /index.php");