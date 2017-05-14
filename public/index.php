<?php
    $title = 'Social Web App - Welcome';
    include 'template/head.php';
    require_once '../src/utils/connect.php';
    require_once '../src/Users.php';
    require_once '../src/Posts.php';
?>

<body class="welcome">
    <section class="hero">
        <h1 class="text-center">Welcome to Social Web App</h1>
    </section>
    <section class="col-lg-12 form">
        <div class="form_login col-lg-offset-1 col-lg-4">
            <h2>Zaloguj się</h2>
            <form action="../src/modules/register.php">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="jan.kowalski@mail.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
        <div class="form_register col-lg-offset-1 col-lg-4">
            <h2>Nie masz konta? Zarejestruj&nbsp;się.</h2>
            <form action="../src/modules/register.php">
                <div class="form-group">
                    <label for="name">Name and surname</label>
                    <input type="text" class="form-control" id="name" placeholder="Jan Kowalski">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" placeholder="jan.kowalski@mail.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>

<?php

//$user_1 = new Users();
//$user_1->setUsername('januszek');
//$user_1->setEmail('januszek666@gmail.com');
//$user_1->setHashedPassword('Dupa1');
//$user_1->saveToDB($conn);


//$user_1 = $user_1->loadUserById($conn, 1);
//var_dump($user_1);
//$user_1->delete($conn);
//var_dump($user_1->loadAllUsers($conn));

$user_2 = new Users();
//$user_2->setUsername('andrzej');
//$user_2->setEmail('andrzej@gmail.com');
//$user_2->setHashedPassword('KochamKasie12');
//$user_2->saveToDB($conn);

$user_2 = $user_2->loadUserById($conn, 2);
var_dump($user_2);
//$user_2->setEmail('new.andrzej@gmail.com');
//$user_2->saveToDB($conn);

//var_dump($user_2->getEmail());
//var_dump($user_2->loadAllUsers($conn));