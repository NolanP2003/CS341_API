<!DOCTYPE html>
<html>
<head>
    <title>Hangman Game</title>
    <link rel="stylesheet" type="text/css" href="../../stylesheets/hangman.css">
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
    <h1>Hangman Game</h1>
    
        <p>Guess the word by entering a letter.</p>
        <div class="hangman-container">
            <div class="word-display" id="word-display"></div>
            <div class="attempts">
                <p>Incorrect Attempts Left: <span id="attempt-count">6</span></p>
            </div>
            <div class="input-section">
                <input type="text" id="guess" maxlength="1">
                <button id="guess-button" tabindex="0">Guess</button>
            </div>
        </div>

        <div id="guessed-letters-box">
            <h2>Guessed Letters</h2>
            <div id="guessed-letters-list"></div>
        </div>
        <br>
        <img id="bird-cycle" src="../../../web_src/games/hangman/images/nest.png" width=300 height=300>
    </main>
    <script src="hangman.js"></script>
</body>
</html>
