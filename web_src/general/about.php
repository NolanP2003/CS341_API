<html>
<head>
    <title>About</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar bg-blue">
        <a class="navbar-brand" href="index.php">
            <img id="logo" src="../includes/images/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
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

    <main>
        <section id="welcome">
            <br>
            <div id="welcome-text">Our Vision</div>
            <br>
            <div id="welcome-subtext">This website will primarily be used for open houses and 
                new student events to introduce them to some of the
                facts and traditions that shape the lives of Etown
                college students. Prospective students will be asked questions,
                and if answered correctly, Etown themed games will be accessible
                to play.
            </div>
            <br>
        </section>
        <section id="team">
            <div id="welcome-text-2">Founding Team</div>
            <br>
            <div id="welcome-subtext-2">Our team came together during Professor Reddig's Software Engineering class.
                We had a vision and creative freedom, and here we are.
        </div>
        <br><br>
    </main>
</body>
</html>
<?php
require_once "../includes/footer.php";
?>