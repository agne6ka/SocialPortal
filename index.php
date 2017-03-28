<?php

require_once 'src/connect.php';
require_once 'src/Users.php';

$user_1 = new Users();
//$user_1->setUsername('januszek');
//$user_1->setEmail('januszek666@gmail.com');
//$user_1->setHashedPassword('Dupa1');
//$user_1->saveToDB($conn);


//$user_1 = $user_1->loadUserById($conn, 1);
var_dump($user_1);
//$user_1->delete($conn);
var_dump($user_1->loadAllUsers($conn));

//$user_2 = new Users();
//$user_2->setUsername('andrzej');
//$user_2->setEmail('andrzej@gmail.com');
//$user_2->setHashedPassword('KochamKasie12');
//$user_2->saveToDB($conn);

//$user_2 = $user_2->loadUserById($conn, 2);

//$user_2->setEmail('new.andrzej@gmail.com');
//$user_2->saveToDB($conn);

//var_dump($user_2->getEmail());
//var_dump($user_2->loadAllUsers($conn));
