<?php

global $pdo;
require_once '../../login_system/includes/dbh.inc.php';
require_once '../../login_system/includes/config_session.inc.php';
require_once '../../login_system/includes/signup_view.inc.php';
require_once '../../login_system/includes/login_view.inc.php';
require_once 'register_handler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nickname = $_POST['nickname'];
    $selectedTeam = $_POST['selectedTeam'];
    $user_id = $_SESSION['user_id'];
    $register_status = 'Registered';
    if (checkUserRegistration($pdo, $user_id)) {
    insertNewMember($pdo, $nickname, $selectedTeam);
    registerUser($pdo, $user_id, $register_status);
    echo 'Succesfully registered, go back home';
echo '<link rel="stylesheet" href="../../website/styling/style.css" type="text/css">';
echo '<button class="homeBtn" onclick="window.location.href =' . "'../index/index.php'" . '">Home</button>';

} else{
        echo 'You already registered yourself on a team';
        echo '<link rel="stylesheet" href="../../website/styling/style.css" type="text/css">';
        echo '<button class="homeBtn" onclick="window.location.href =' . "'../index/index.php'" . '">Home</button>';
    }
}