<?php

require_once( __DIR__ . '/../utils/connect.php');
require_once ( ROOT . '/src/Users.php' );

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = "";
    $password = "";

    if (strlen(trim($_POST['email'])) >= 1){
        $email = $_POST['email'];
    }else {
        die("<p>Error: Email can't be empty.</p>");
    }
    if (strlen(trim($_POST['password'])) >= 1) {
        $password = ($_POST['password']);
    } else {
        die("<p>Error: Password can't be empty.</p>");
    }

} else {
    echo 'Check request method';
    die;
}

$user = new Users();
$getUser = $user->loadUserByEmail($conn, $email);

if ($getUser != null) {
    $getUserPass = $getUser->getHashedPassword();
    $getUserName = $getUser->getUsername();
    $getUserId = $getUser->getId();
    $verifiePass = $user->verifieHashedPassword($password, $getUserPass);

    if ( $verifiePass === True){
        session_start();
        $_SESSION['loggedUser'] = [$getUserName, $getUserId, $email];
        header('Location: //localhost/Workshops/SocialPortal/public/posts.php');
    }else {
        echo 'Password is not the same' . $verifiePass;
    }
}else {
    echo "<p>Address email does not exist.</p>";
}

$conn->close();
$conn = null;