<?php

require_once '../login_system/includes/dbh.inc.php';
require_once '../login_system/includes/config_session.inc.php';
require_once '../login_system/includes/signup_view.inc.php';
require_once '../login_system/includes/login_view.inc.php';
function insertNewMember(object $pdo, string $nickname, string $selectedTeam)
{
    $query = "UPDATE teams
        SET 
            member_1 = CASE 
                        WHEN team_name = '$selectedTeam' AND member_1 IS NULL THEN '$nickname'
                        ELSE member_1
                     END,
            member_2 = CASE 
                        WHEN team_name = '$selectedTeam' AND member_2 IS NULL THEN '$nickname'
                        ELSE member_2
                     END,
            member_3 = CASE 
                        WHEN team_name = '$selectedTeam' AND member_3 IS NULL THEN '$nickname'
                        ELSE member_3
                     END,
            member_4 = CASE 
                        WHEN team_name = '$selectedTeam' AND member_4 IS NULL THEN '$nickname'
                        ELSE member_4
                     END
        WHERE team_name = '$selectedTeam'";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':selectedTeam', $selectedTeam);
    $stmt->bindParam(':nickname', $nickname);

// Execute the statement
    $stmt->execute();
}

function registerUser(object $pdo, int $user_id, string $register_status){
    $query = "INSERT INTO register (register_status, user_login_id) VALUES ($register_status, $user_id)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':register_status', $register_status);
    $stmt->bindParam(':user_id', $user_id);

// Execute the statement
    $stmt->execute();
}

function isUserRegistered($pdo, $user_id)
{
    $query = "SELECT register_status FROM register where user_login_id = '$user_id'";

    $stmt = $pdo->prepare($query);
// Execute the statement
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function checkUserRegistration(object $pdo, string $user_id){
    if (!isUserRegistered($pdo, $user_id)){
        return true;
    } else{
        return false;
    }
}