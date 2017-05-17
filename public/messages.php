<?php
    $title = 'Social Web App - Messages';
    include 'template/head.php';
    require_once ( __DIR__ . '/../src/utils/session.php' );
    require_once ( __DIR__ . '/../src/utils/connect.php' );
    require_once ( __DIR__ . '/../src/Messages.php' );
    require_once ( __DIR__ . '/../src/Users.php' );

    $user = new Users();
    $allUsers = $user->loadAllUsers($conn);
    $message = new Messages();
    $allMessages = $message->loadAllMessages($conn);
?>
<body class="message" xmlns="http://www.w3.org/1999/html">
    <section class="nav">
        <ul>
            <li><a href="posts.php">Posts</a></li>
            <li><a href="#">My Account</a></li>
            <li><a href="/Workshops/SocialPortal/src/modules/logout.php">Logout</a></li>
        </ul>
    </section>
    <section class="friends">
        <div class="friends-info col-md-2">
            <h2>Chat with:</h2>
            <form id="form" action="../src/modules/add_msg.php" method="post">
                <input hidden name="show_user" value="true">
                <?php
                $i = 0;
                $currentUser = $_SESSION['loggedUser'][1];
                while ($i < count($allUsers)) {
                    $usrId = $allUsers[$i]->getId();
                    $userName = $allUsers[$i]->getUserName();

                    if ($usrId != $currentUser){
                        echo "<ul class=\"friend-info_item\" data-id=\"$usrId\">
                            <label><input type='radio' id='friend-id' name='friend_id' value='$usrId'>
                                <img class=\"friend-info_ico\" src=\"img/blue-user-icon.png\">
                                <p>$userName</p>
                            </label>";
                        echo '</ul>';
                    }
                    $i++;
                }
                ?>
                <button id="show-msg" type="submit" class="hidden"></button>
            </form>
        </div>
    </section>
    <section class="content">
        <div class="show-msg col-md-offset-1 col-md-6">
                    <h3 class="show-msg_info">Choose a person to talk.</h3>

        </div>
    </section>
    <section class="message-form">
        <div class="col-md-offset-1 col-md-8">
            <form action="../src/modules/add_msg.php" method="post">
                <input hidden name="show_user" value="false">
                <div class="form-group">
                    <label for="message">What's app?<span id="friend-name"></span></label>
                    <input hidden id="friend-id" name="friend_id" value="2">
                    <textarea rows="3" class="form-control" id="message" name="message" placeholder="Message"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Send Message</button>
            </form>
        </div>
    </section>
<?php
include 'template/footer.php';