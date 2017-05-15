<?php

require_once( __DIR__ . '/../utils/connect.php');
require_once ( __DIR__ . '/../utils/session.php' );
require_once ( ROOT . '/src/Posts.php' );

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = '';

    if($_POST['post_id'] != ''){
        $id = $_POST['post_id'];
    }

} else {
    echo 'Check request method';
    die;
}

if ($id != ''){
    echo '<p>Edit post.</p>';
    $post = new Posts();
    $post = $post->loadPostById($conn, $id);
}

$createPost = $post->delete($conn);

if ( $createPost === True){
    header('Location: //localhost/Workshops/SocialPortal/public/posts.php');
}else {
    echo '<p>Ops... something went wrong.</p>';
}

$conn->close();
$conn = null;