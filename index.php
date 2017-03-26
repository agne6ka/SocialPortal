<?php

require_once 'src/connect.php';
require_once 'src/Users.php';

$user_1 = new Users();
$user_1->setUsername('januszek');
$user_1->setEmail('januszek666@gmail.com');
$user_1->setHashedPassword('Dupa1');
$user_1->saveToDB($conn);
var_dump($user_1);