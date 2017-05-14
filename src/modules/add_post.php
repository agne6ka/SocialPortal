<?php

require_once( __DIR__ . '/../utils/connect.php');
require_once ( __DIR__ . '/../utils/session.php' );
require_once ( ROOT . '/src/Posts.php' );

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tittle = "";
    $text = "";

    if (strlen(trim($_POST['tittle'])) >= 3 && strlen(trim($_POST['tittle'])) <= 25){
        $tittle = $_POST['tittle'];
    }else {
        die("<p>Error: Tittle must have over 3 up to 25 character.</p>");
    }
    if (strlen(trim($_POST['text'])) >= 3 && strlen(trim($_POST['text'])) <= 255) {
        $text = ($_POST['text']);
    } else {
        die("<p>Error: Text must have over 3 up to 255 character.</p>");
    }

    echo $tittle . ' ' . $text;
    $userId = $_SESSION['loggedUser'][1];
    var_dump($_SESSION['loggedUser']);
} else {
    echo 'Check request method';
    die;
}

$post = new Posts();
$post->setUserId($userId);
$post->setPostTittle($tittle);
$post->setPostText($text);
$post->setPostDate();

$createPost = $post->createPost($conn);

if ( $createPost === True){
    header('Location: //localhost/Workshops/SocialPortal/public/posts.php');
}else {
    echo 'Something went wrong';
}

$conn->close();
$conn = null;