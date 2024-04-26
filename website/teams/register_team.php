<?php

global $pdo;
require_once '../../login_system/includes/dbh.inc.php';
require_once '../../login_system/includes/config_session.inc.php';
require_once '../../login_system/includes/signup_view.inc.php';
require_once '../../login_system/includes/login_view.inc.php';
require_once 'team_reg_handler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $team_leader_id = $_SESSION['user_id'];
    $team_name = $_POST['team_name'];
    $member_1 = $_POST['member_1'];

    if (isTeamRegistered($pdo, $team_name)){
        echo 'Team already registered';
    } else{
        registerTeam($pdo, $team_leader_id, $team_name, $member_1);
        echo '<link rel="stylesheet" href="../styling/style.css" type="text/css">';
        echo '<h1 class="webText">Team registered, go back to index and wait to play!';
        echo '<button class="homeBtn" onclick="window.location.href = ' . "'../index/index.php" . '">Home</button>';
    }
}