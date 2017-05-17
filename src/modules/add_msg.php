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
    $errors = [];

    if($_POST['show_user'] === 'true'){

        if($_POST['friend_id'] != ''){
            $friendId = intval($_POST['friend_id']);
        } else {
            $errors =+ "Error: You must choose person to chat.";
        }
    } else {
        if (strlen(trim($_POST['message'])) >= 3 && strlen(trim($_POST['message'])) <= 255) {
            $msgText = $_POST['message'];
        } else {
            $errors =+ "Error: Text must have over 3 up to 255 character.";
        }
        if($_POST['friend_id'] != ''){
            $friendId = $_POST['friend_id'];
        } else {
            $errors =+ "Error: You must choose person to chat.";
        }
    }

    $userId = $_SESSION['loggedUser'][1];

    if ($errors){
        echo json_encode($errors);
    }

} else {
    echo 'Check request method';
    die;
}

if ($_POST['show_user'] === 'true'){
    $message = new Messages();
    $allMessages = Messages::loadAllMessages($conn);
    $arr = array();


    $i = 0;
    while ($i < count($allMessages)) {
        $getMessage = $allMessages[$i]->getMessage();
        $msgDate = $allMessages[$i]->getMsgDate();
        $msgUserFrom = $allMessages[$i]->getFromUser();
        $msgUserId = $allMessages[$i]->getUserId();
        $msgId = $allMessages[$i]->getId();
        $user = new Users();
        $userData = $user->loadUserById($conn, $msgUserFrom);
        $userName = $userData->getUsername();

        if ($msgUserFrom == $friendId && $userId == $msgUserId){
            if ($allMessages != null) {
                $arr[] = array(
                    "id" => "$msgId",
                    "message" => "$getMessage",
                    "date" => "$msgDate",
                    "user_from" => "$userName",
                    "user_to" => "$msgUserId"
                );
            }
        }

        $i++;
    }

    if (count($arr) !=0 ){
        echo json_encode($arr);
    } else {
        echo json_encode(['no_message'=>'There is no msg for this user']);
    }

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