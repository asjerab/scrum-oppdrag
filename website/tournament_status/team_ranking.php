<?php

global $pdo;
require_once '../register/register_handler.php';
require_once '../../login_system/includes/dbh.inc.php';
require_once '../../login_system/includes/config_session.inc.php';
require_once '../../login_system/includes/signup_view.inc.php';
require_once '../../login_system/includes/login_view.inc.php';
require_once '../teams/team_reg_handler.php';

// Query to select teams and their points, sorted by points in descending order
$sql = "SELECT team_name, points FROM teams ORDER BY points DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$teams = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teams Ranking</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h2>Teams Ranking</h2>
<table>
    <tr>
        <th>Team Name</th>
        <th>Points</th>
    </tr>
    <?php foreach ($teams as $team): ?>
        <tr>
            <td><a href="team_info.php?team_name=<?php echo urlencode($team['team_name']); ?>"><?php echo $team['team_name']; ?></a></td>
            <td><?php echo $team['points']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
