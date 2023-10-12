<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE,edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../stylesheets/gameMenu.css">
    <title>Menu for game page</title>
</head>
<body>
    


    <div id="welcome-message">
        <p>Welcome to our game selection page!</p>
    </div>

    <div id="game-select">
        <label for="game-selector">Select a game: </label>
        <select id="game-selector" onchange="loadGame(this)">
            <option value="">Select a game</option>
            <option value="hangman">Hangman</option>
            <option value="flappybird">Flappy Bird</option>
            <option value="pacman">Pacman</option>
        </select>
    </div>

    <script>
        function loadGame(select) {
            const selectedGame = select.value;
            if (selectedGame) {
                window.location.href = selectedGame + "/" + selectedGame + ".php";
            }
        }
    </script>
</body>
</html>
