<?php

session_start();

if(!isset($_SESSION['loggedUser'])) {
    header('Location: //localhost/Workshops/SocialPortal/public/index.php');
};