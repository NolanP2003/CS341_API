<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pacman Games</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/pacman.css">
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
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../general/settings.php">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="hidden" href="../../general/settings.php">
                                <i class="fas fa-cog hidden"></i> Settings
                            </a>
                        </li>
                    <?php } ?>
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
                <!-- Checking whether to display login or logout button. -->
                <?php if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../general/logout.php">
                            <i class="fas fa-key"></i> Logout
                        </a>
                    </li>
                    <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../../general/login.php">
                            <i class="fas fa-key"></i> Login
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </nav>
<main>
    
    
    <h1 id="Welcome">Welcome to Pac-Man! Click the screen to start the game.</h1>
<div class="pacman-container">
    <svg id="pacmanSVG"
         version="1.1"
         baseProfile="full"
         width="550"
         height="550"
         viewbox="0 0 400 400">
    </svg>
    <script src="pacman.js"></script>
    <div>
        <p>Content provided by Johan Hasselqvist and Lars Gunther.</p>
        <p>Source: <a href="https://github.com/Hasselmannen/pacman/blob/master/README.markdown">Johan Hasselqvist's GitHub</a></p>
    </div>
</div>
</main>
</body>
</html>
