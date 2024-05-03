<?php
// Include database connection

global $pdo;
require_once '../register/register_handler.php';
require_once '../../login_system/includes/dbh.inc.php';
require_once '../../login_system/includes/config_session.inc.php';
require_once '../../login_system/includes/signup_view.inc.php';
require_once '../../login_system/includes/login_view.inc.php';
require_once '../teams/team_reg_handler.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get team name and points from the form
    $team_name = $_POST['team_name'];
    $points = $_POST['points'];

    // Query to update points for the selected team
    $sql = "UPDATE teams SET points = points + :points WHERE team_name = :team_name";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':points', $points, PDO::PARAM_INT);
    $stmt->bindParam(':team_name', $team_name);

    // Execute the statement
    $stmt->execute();

    // Redirect back to the tournament page
    header('Location: tournament_page.php');
    exit;
}
?>
