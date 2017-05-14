<?php

session_start();

unset($_SESSION['loggedUser']);

require_once ( __DIR__ . '/../utils/session.php' );
