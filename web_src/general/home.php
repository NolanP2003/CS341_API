
<!DOCTYPE html>
<html>
<head>
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar bg-blue">
            <a class="navbar-brand" href="https://etown.edu/">
                <img id="logo" src="../includes/images/logo.png" alt="Logo" width='100px.'>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="settings.php">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">
                            <i class="fas fa-info-circle"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../games/menu.php">
                            <i class="fas fa-gamepad"></i> Games
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <section id="welcome">
            <br>
            <div id="welcome-text">Welcome to the Etown Gaming Website!</div>
            <br>
            <div id="welcome-subtext">This website will primarily be used for open houses and 
                new student events to introduce them to some of the
                facts and traditions that shape the lives of Etown
                college students. Prospective students will be asked questions,
                and if answered correctly, Etown themed games will be accessible
                to play.
            </div>
        </section>
        <section id="game">
            <br>
            <div id="welcome-text">Start Playing</div>
            <br>
            <div id="welcome-subtext">Answer a trivia question, play a round of hangman! 
                Learn more about Elizabethtown and try to get on the leaderboard!
            </div>
            <br>
            <!-- Links start button image and uses that to route to game menu. -->
            <a href="user.php"><img src = "../includes/images/start_button.png" class="center" width='140px.'></a>
        </section>
    </main>

</body>
</html>

