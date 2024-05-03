<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Page</title>
</head>
<body>
<h2>Add Points to Team</h2>
<form action="tournament_handler.php" method="post">
    <label for="team_name">Team Name:</label>
    <input type="text" id="team_name" name="team_name" required><br><br>

    <label for="points">Points to Add:</label>
    <input type="number" id="points" name="points" required><br><br>

    <button type="submit">Add Points</button>
</form>
</body>
</html>
