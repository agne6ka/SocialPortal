<?php
    $title = 'Social Web App - Posts';
    include 'template/head.php';
?>
<body class="posts">
    <section class="nav">
        <ul>
            <li><a href="#">Messages</a></li>
            <li><a href="#">My Account</a></li>
        </ul>
    </section>
    <section class="content">
        <div class="user-info col-lg-offset-1 col-lg-3">
            <div class="user-info_logo">
                <img class="user-info_ico" src="img/blue-user-icon.png">
                <p class="user-info_name">Name</p>
            </div>
        </div>
        <div class="posts col-lg-6">
            <div class="posts_item">
                <h2>Post tittle</h2>
                <p>Post text</p>
            </div>
            <div class="posts_item">
                <h2>Post tittle</h2>
                <p>Post text</p>
            </div>
        </div>
    </section>
</body>
</html>
<?php

//$post_1 = new Posts();
//$post_1->setMessage('tekst');
//$post_1->setUserId($user_2);
//$newPost = $post_1->createPost($conn);
//var_dump($newPost);