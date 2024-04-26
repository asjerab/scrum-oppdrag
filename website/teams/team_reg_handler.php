<?php

require_once '../../login_system/includes/dbh.inc.php';
require_once '../../login_system/includes/config_session.inc.php';
require_once '../../login_system/includes/signup_view.inc.php';
require_once '../../login_system/includes/login_view.inc.php';

function getTeams(object $pdo, string $team_name)
{
    $query = "SELECT team_name FROM teams where team_name = '$team_name'";

    $stmt = $pdo->prepare($query);
// Execute the statement
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function isTeamRegistered(object $pdo, string $team_name)
{
    if (getTeams($pdo, $team_name)){
        return true;
        //found team
    } else{
        return false;
        //dint find team
    }
}

function registerTeam(object $pdo, int $team_leader_id, string $team_name, string $member_1)
{
    $query = "INSERT INTO teams (team_leader_id, team_name, member_1) VALUES (:team_leader_id, :team_name, :member_1)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':team_leader_id', $team_leader_id, PDO::PARAM_INT);
    $stmt->bindParam(':team_name', $team_name, PDO::PARAM_STR);
    $stmt->bindParam(':member_1', $member_1, PDO::PARAM_STR);

    // Execute the statement
    $stmt->execute();
}

function userRegTeam(object $pdo, string $user_id)
{
    $query = "SELECT team_leader_id FROM teams where team_leader_id = '$user_id'";

    $stmt = $pdo->prepare($query);
// Execute the statement
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function didUserRegTeam(object $pdo, string $user_id)
{
    if (userRegTeam($pdo, $user_id)){
        return true;
    }else{
        return false;
    }
}