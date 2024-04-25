<?php

require_once '../login_system/includes/config_session.inc.php';
require_once '../login_system/includes/signup_view.inc.php';
require_once '../login_system/includes/login_view.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scrum Index</title>
    <link rel="icon" href="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/6d3ec584-2e85-44b1-8b64-10e51065e312/dfzfcdx-e0f84c2c-4658-427a-9c03-050f796d4fd1.jpg/v1/fill/w_892,h_896,q_70,strp/shadow_wizard_money_gang_by_ladyduck666_dfzfcdx-pre.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9MTYwOCIsInBhdGgiOiJcL2ZcLzZkM2VjNTg0LTJlODUtNDRiMS04YjY0LTEwZTUxMDY1ZTMxMlwvZGZ6ZmNkeC1lMGY4NGMyYy00NjU4LTQyN2EtOWMwMy0wNTBmNzk2ZDRmZDEuanBnIiwid2lkdGgiOiI8PTE2MDAifV1dLCJhdWQiOlsidXJuOnNlcnZpY2U6aW1hZ2Uub3BlcmF0aW9ucyJdfQ.p_BoM8BxbWan57r2xfkHPARvLdiAGAwwlZ8WteEMD3w"        type="image/x-icon"/>
</head>
<body>
<main>

<nav>
    <div><a href="teams/available_teams.php">Browse available teams</a></div>
    <div><a href="teams/all_teams.php">Browse all teams</a></div>
    <div><a href="tournament_status/team_ranking.php">Browse team rankings</a></div>
    <div><a href="tournament_status/upcoming_games.php">Browse upcoming games</a></div>
    <div><a href="register/register_status.php">Your Register Status</a></div>
    <div><a href="../login_system/index.php"></a>Log In</div>
    <!-- TODO: Login check with username display -->
</nav>

<form action="register/register.php">

    <div>Input your nickname here</div>
    <input type="text" required placeholder="Nickname..." >
    <div>Browse the available teams before you select one</div>
    <input type="text">

    <button type="submit">Submit!</button>

</form>

</main>

<footer>
    <!-- TODO: Footer -->
</footer>

</body>
</html>