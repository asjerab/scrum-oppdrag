<?php
// Include database connection

global $pdo;
require_once '../register/register_handler.php';
require_once '../../login_system/includes/dbh.inc.php';
require_once '../../login_system/includes/config_session.inc.php';
require_once '../../login_system/includes/signup_view.inc.php';
require_once '../../login_system/includes/login_view.inc.php';
require_once '../teams/team_reg_handler.php';



// Get team name from the URL parameter
$team_name = $_GET['team_name'] ?? '';

// Query to select team information by team name
$sql = "SELECT * FROM teams WHERE team_name = :team_name";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':team_name', $team_name);
$stmt->execute();
$team = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Information</title>
</head>
<body>
<h2>Team Information</h2>
<?php if ($team): ?>
    <h3><?php echo $team['team_name']; ?></h3>
    <p>Points: <?php echo $team['points']; ?></p>
    <p>Member 1: <?php echo $team['member_1']; ?></p>
    <p>Member 2: <?php echo $team['member_2']; ?></p>
    <p>Member 3: <?php echo $team['member_3']; ?></p>
    <p>Member 4: <?php echo $team['member_4']; ?></p>
    <!-- Add more team information as needed -->
<?php else: ?>
    <p>Team not found.</p>
<?php endif; ?>
<a href="team_ranking.php">Back to Ranking</a>
</body>
</html>
