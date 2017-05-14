<?php

require_once( __DIR__ . '/../utils/connect.php');
require_once ( ROOT . '/src/Users.php' );

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = "";
    $email = "";
    $password = "";

    var_dump($_POST);

    if ((isset($_POST['name']) === true && strlen(trim($_POST['name'])) > 5)){
        $name = $_POST['name'];
    }else {
        die('Name should be string and have more than 5 character.<br>');
    }
    if ((isset($_POST['email']) === true && strlen(trim($_POST['email'])) > 5)){
        $email = $_POST['email'];
    }else {
        die('Wrong email.<br>');
    }
    if ( strlen(trim($_POST['password'])) > 5 && preg_match('~[0-9]~', $_POST['password'])) {
        $password = ($_POST['password']);
    } else {
        die('Password must have more than 5 character and number<br>');
    }

} else {
    echo 'Check request method';
    die;
}

$user = new Users();
$user->setUsername($name);
$user->setEmail($email);
$user->setHashedPassword($password);
$userSaved = $user->saveToDB($conn);

if ($userSaved === True) {
    session_start();
    $_SESSION['loggedUser'] = [$getUserName, $getUserId, $email];
    header('Location: //localhost/Workshops/SocialPortal/public/posts.php');
}else {
    echo "<p>Something went wrong: $name $email $password</p>";
}

$conn->close();
$conn = null;