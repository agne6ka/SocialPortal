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
        <div class="friends-info col-lg-2">
            <h2>Chat with:</h2>
<!--        <p class="user-info_name">--><?php //echo $_SESSION['loggedUser'][0] ?><!--</p>-->
            <form action="../src/modules/add_msg.php" method="post">
                <input hidden name="show_user" value="true">
                <?php
                $i = 0;
                while ($i < count($allUsers)) {
                    $usrId = $allUsers[$i]->getId();
                    $userName = $allUsers[$i]->getUserName();
                    echo "<ul class=\"friend-info_item\" data-id=\"$usrId\">
                            <label><input type='radio' id='friend-id' name='friend_id' value='$usrId'>
                                <img class=\"friend-info_ico\" src=\"img/blue-user-icon.png\">$userName
                            </label>";
                    echo '</ul>';
                    $i++;
                }
                ?>
                <button id="show-msg" type="submit" class="hidden"></button>
            </form>
        </div>
    </section>
    <section class="content">
        <div class="show-msg col-lg-offset-1 col-lg-6">
            <?php
                if (count($allMessages) === 0){
                    echo '<h3 class="show-msg_info">Choose a person to talk.</h3>';
                }
                $i = 0;
                while ($i < count($allMessages )) {
                    $getMessage = $allMessages[$i]->getMessage();
                    $msgDate = $allMessages[$i]->getMsgDate();
                    $msgUserId = $allMessages[$i]->getUserId();
                    $msgId = $allMessages[$i]->getId();
                    $user = new Users();
                    $userData = $user->loadUserById($conn, $msgUserId);
                    $userName = $userData->getUsername();

                    echo "<div class=\"message_item\">
                            <p class=\"message_item__text\">$getMessage</p>
                            <p>$msgDate</p>
                            <p>Created by $userName</p>";
                    echo '</div>';
                    $i++;
                }
            ?>
        </div>
    </section>
    <section class="message-form">
        <div class="col-lg-6">
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