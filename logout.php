<?php

session_start();

if(isset($_SESSION['user_id']))
{
    unset($_SESSION['user_id']);
}

header("location: /html/login_page.html");
die;

?>