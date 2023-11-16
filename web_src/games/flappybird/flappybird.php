<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flappy Bird Game</title>
    <link rel="stylesheet" href="../../stylesheets/flappybird.css">
    <link rel="stylesheet" href="../../stylesheets/pacman.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar bg-blue">
        <a class="navbar-brand" href="index.php">
            <img id="logo" src="../../includes/images/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../../general/index.php">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../general/settings.php">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" href="../../general/about.php">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="../menu.php">
                        <i class="fas fa-gamepad"></i> Games
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <main>
        <h1>Welcome to FlappyJay! Use the "Up" arrow to move the bluejay</h1>
        <div id="score-container">
            <p id="score-text">Score: 0</p>
        </div>
    <div id="game-container">
        <img id="bird" src="images/bluejaygif.gif" alt="Flappy Bird">
        <div class="pipe" id="pipeTop1"></div>
        <div class="pipe" id="pipeBottom1"></div>
        <div class="pipe" id="pipeTop2"></div>
        <div class="pipe" id="pipeBottom2"></div>
        
    </div>
    <script src="flappybird.js"></script>
    </main>
</body>
</html>

