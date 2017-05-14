<?php
    $title = 'Social Web App - Welcome';
    include ( __DIR__ . '/template/head.php' );
    require_once ( __DIR__ . '/../src/utils/connect.php' );
    require_once ( __DIR__ . '/../src/Posts.php' );
?>

<body class="welcome">
    <section class="hero">
        <h1 class="text-center">Welcome to Social Web App</h1>
    </section>
    <section class="col-lg-12 form">
        <div class="form_login col-lg-offset-1 col-lg-4">
            <h2>Zaloguj się</h2>
            <form action="../src/modules/login.php" method="post">
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
            <form action="../src/modules/register.php" method="post">
                <div class="form-group">
                    <label for="name">Name and surname</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Jan Kowalski">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="jan.kowalski@mail.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </section>
</body>
</html>