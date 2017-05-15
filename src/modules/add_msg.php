<?php

require_once( __DIR__ . '/../utils/connect.php');
require_once ( __DIR__ . '/../utils/session.php' );
require_once ( ROOT . '/src/Users.php' );
require_once ( ROOT . '/src/Messages.php' );

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = "";
    $friendId = "";
    $showUser="";
    $msgText = "";

    if($_POST['show_user'] === 'true'){

        if($_POST['friend_id'] != ''){
            $friendId = $_POST['friend_id'];
        } else {
            die("<p>Error: You must choose person to chat.</p>");
        }
    } else {
        if (strlen(trim($_POST['message'])) >= 3 && strlen(trim($_POST['message'])) <= 255) {
            $msgText = $_POST['message'];
        } else {
            die("<p>Error: Text must have over 3 up to 255 character.</p>");
        }
        if($_POST['friend_id'] != ''){
            $friendId = $_POST['friend_id'];
        } else {
            die("<p>Error: You must choose person to chat.</p>");
        }
    }

    $userId = $_SESSION['loggedUser'][1];

} else {
    echo 'Check request method';
    die;
}

var_dump($_POST);

if ($_POST['show_user'] === 'true'){
    echo '<p>Edit post.</p>';
    $message = new Messages();
    $message = $message->loadMessageByUserId($conn, $friendId);
} else {
    $message = new Messages();
    $message->setFromUser($friendId);
    $message->setMessage($msgText);
    $message->setUserId($userId);
    $message->setMsgDate();

    var_dump($message);

    $createMsg = $message->createMessage($conn);
    var_dump($createMsg);

    if ( $createMsg === True){
        header('Location: //localhost/Workshops/SocialPortal/public/messages.php');
    }else {
        echo 'Something went wrong';
    }
}

$conn->close();
$conn = null;