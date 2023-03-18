<?php
    require('./php/apiRepository.php');
    session_start();
    echo get_role($_SESSION['token']);
    echo get_id($_SESSION['token']);
?>