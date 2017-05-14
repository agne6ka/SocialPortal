<?php
    $title = 'Social Web App - Posts';
    include 'template/head.php';
    require_once ( __DIR__ . '/../src/utils/session.php' );
    require_once ( __DIR__ . '/../src/utils/connect.php' );
    require_once ( __DIR__ . '/../src/Posts.php' );
    require_once ( __DIR__ . '/../src/Users.php' );

    $post = new Posts();
    $allPosts = $post->loadAllPosts($conn);
?>
<body class="posts">
    <section class="nav">
        <ul>
            <li><a href="#">Messages</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="/Workshops/SocialPortal/src/modules/logout.php">Logout</a></li>
        </ul>
    </section>
    <section class="profile">
        <div class="user-info col-lg-offset-1 col-lg-3">
            <div class="user-info_logo">
                <img class="user-info_ico" src="img/blue-user-icon.png">
                <p class="user-info_name"><?php echo $_SESSION['loggedUser'][0] ?></p>
            </div>
        </div>
    </section>
    <section class="post-form">
        <div class="col-lg-6">
            <h2>Spread the news!</h2>
            <form action="../src/modules/add_post.php" method="post">
                <input hidden id="post-id" name="post_id">
                <div class="form-group">
                    <label for="tittle">Post tittle</label>
                    <input type="text" class="form-control" id="tittle" name="tittle" placeholder="Tittle">
                </div>
                <div class="form-group">
                    <label for="text">Post text</label>
                    <textarea rows="3" class="form-control" id="text" name="text" placeholder="Text"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </section>
    <section class="content">
        <div class="posts col-lg-offset-4 col-lg-6">
            <?php
                $i = 0;
                while ($i < count($allPosts)) {
                    $postTittle = $allPosts[$i]->getPostTittle();
                    $postText = $allPosts[$i]->getPostText();
                    $postDate = $allPosts[$i]->getPostDate();
                    $postUserId = $allPosts[$i]->getUserId();
                    $user = new Users();
                    $userData = $user->loadUserById($conn, $postUserId);
                    $userName = $userData->getUsername();

                    echo "<div class=\"posts_item\" data-id=\"$i\">
                            <h2 class=\"posts_item__tittle\">$postTittle</h2>
                            <p class=\"posts_item__text\">$postText</p>
                            <p>$postDate</p>
                            <p>Created by $userName</p>";

                    if ($_SESSION['loggedUser'][0] === $userName){
                        echo "<a class='btn-edit' href='#'>Edit</a>";
                    }
                    echo '</div>';
                    $i++;
                }
            ?>
        </div>
    </section>
<?php
include 'template/footer.php';