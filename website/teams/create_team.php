<?php

global $pdo;
require_once '../../login_system/includes/dbh.inc.php';
require_once '../../login_system/includes/config_session.inc.php';
require_once '../../login_system/includes/signup_view.inc.php';
require_once '../../login_system/includes/login_view.inc.php';
require_once 'team_reg_handler.php';
require_once 'register_team.php';
require_once '../register/register_handler.php'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Your Team</title>
    <link rel="stylesheet" href="../styling/style.css" type="text/css">
    <link rel="icon" href="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/6d3ec584-2e85-44b1-8b64-10e51065e312/dfzfcdx-e0f84c2c-4658-427a-9c03-050f796d4fd1.jpg/v1/fill/w_892,h_896,q_70,strp/shadow_wizard_money_gang_by_ladyduck666_dfzfcdx-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTYwOCIsInBhdGgiOiJcL2ZcLzZkM2VjNTg0LTJlODUtNDRiMS04YjY0LTEwZTUxMDY1ZTMxMlwvZGZ6ZmNkeC1lMGY4NGMyYy00NjU4LTQyN2EtOWMwMy0wNTBmNzk2ZDRmZDEuanBnIiwid2lkdGgiOiI8PTE2MDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.p_BoM8BxbWan57r2xfkHPARvLdiAGAwwlZ8WteEMD3w"        type="image/x-icon"/>
</head>
<body>
<main>
<nav class="navbar">
    <div><a href="../index/index.php">Home</a></div>
    <div><a href="../teams/available_teams.php">Browse available teams</a></div>
    <div><a href="../teams/create_team.php">Register your own team</a></div>
    <div><a href="../teams/all_teams.php">Browse all teams</a></div>
    <div><a href="../tournament_status/team_ranking.php">Browse team rankings</a></div>
    <div><a href="../tournament_status/upcoming_games.php">Browse upcoming games</a></div>
    <div><a href="../register/register_status.php">Your Register Status</a></div>
    <div style="color: white">
        <?php
        if (isset($_SESSION['user_id'])){
            echo 'Logged in as ' . $_SESSION['user_username'];
        } else{
            echo '<div><a href="../../login_system/index.php">Log in</a></div>';
        }
        ?>
    </div>
</nav>


<?php
$user_id = $_SESSION['user_id'];
if (isset($_SESSION['user_id']) && !didUserRegTeam($pdo, $user_id) && checkUserRegistration($pdo, $user_id)){
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "Admin";
    $dbname = "scrum_users";

// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $team_leader_id = $_SESSION['user_id'];
    echo '<div class="center_form"><form action="../teams/register_team.php" method="post">
    <div class="form_text">Input your nickname here</div>
    <input type="text" required placeholder="Nickname..." name="member_1">
    <div class="form_text">Input your team name here...</div>
    <input type="text" required placeholder="Team Name..." name="team_name">';
    echo '<button type="submit">Submit!</button>

</form></div>';
} else if (!isset($_SESSION['user_id'])) {
    echo '<h1 class="webText">Log in to register and participate in the fun!';
} else if(didUserRegTeam($pdo, $user_id)){
    echo '<h1 class="webText">You already registered a team, get ready to play';
} else if(!checkUserRegistration($pdo, $user_id)){
    echo '<h1 class="webText">You are already registered in team, get ready to play';
}
?>

</main>

<footer class="footer">
    <div class="container">
        <p class="footer-text">&copy; <?php echo date("Y"); ?> Scrum. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
