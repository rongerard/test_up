<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container mt-5">
    <div id="header">
        <img id="logo" src="img/sort a element logo.png">
    </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card" id = "info3">
                <div class="card-body">

                        <h3 class="card-title">User Profile</h3>
                        <p class="card-text">View and edit your profile.</p>
                        <a href="profile.php" class="btn btn-primary">View Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" id = "info3">
                    <div class="card-body">
                        <h3 class="card-title">Play the Game</h3>
                        <p class="card-text">Start playing the game now!</p>
                        <a href="game.html" class="btn btn-success">Play</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card" id = "info3">
                    <div class="card-body">
                        <h3 class="card-title">How to Play</h3>
                        <p class="card-text">Learn how to play the game.</p>
                        <a href="htp.html" class="btn btn-info">How to Play</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" id = "info3">
                    <div class="card-body">
                        <h3 class="card-title">About the Game</h3>
                        <p class="card-text">Learn more about the game.</p>
                        <a href="about.html" class="btn btn-secondary">About</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card" id = "info3">
                    <div class="card-body">
                        <h3 class="card-title">User Statistics</h3>
                        <!-- Display user statistics here -->
                        
                        
                        <p class="card-text">Username:<?php echo $_SESSION["sessionUsername"]?> </p>
                        <p class="card-text">Email: <?php echo $_SESSION["sessionEmail"]; ?></p>
                        <p class="card-text">Level: 10</p>
                        <p class="card-text">Experience: 5000</p>
                        <!-- Add more statistics as needed -->
                    </div>


                </div>
            </div>
        </div>

        <div id="data-container"></div>
    </div>
</body>
<script src=script.js></script>

</html>