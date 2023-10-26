<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Website</title>
    <link rel="stylesheet" type="text/css" href="../stylesheets/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <script>
        // This is for form submissions
        document.addEventListener("DOMContentLoaded", function() { // Runs when doc loads
            const form = document.getElementById("add-word"); // Reference to HTML element add-word
            const message = document.getElementById("response"); // Reference to div
            const input = form.querySelector("input[name='word']"); // Reference to input element where user enters word

            form.addEventListener("submit", function(e) { // Listens for submit button
                e.preventDefault(); // Prevents page from reloading to add.php?
                const formData = new FormData(form); // Access to the form data, to send AJAX request

                fetch(form.getAttribute("action"), { // Makes HTTP request
                    method: "POST", body: formData // Sends POST request with form data
                }).then(response => response.json()) // then expects response in JSON format
                .then(data => {message.textContent = data.message; input.value = ''; // Sets message and clears text field
                    message.style.color = data.status === "success" ? "green" : "red"; // Changes color if successful
                }).catch(error => { // Error
                    message.textContext = "An error occurred.";
                    message.style.color = "red";
                });
            });

            const form2 = document.getElementById("delete-word");
            const message2 = document.getElementById("response2");
            const input2 = form2.querySelector("input[name='word']");

            form2.addEventListener("submit", function(e) {
                e.preventDefault();
                const formData = new FormData(form2);

                fetch(form2.getAttribute("action"), {
                    method: "POST", body: formData
                }).then(response => response.json())
                .then(data => {message2.textContent = data.message; input2.value = ''; // data.<message> comes from php
                    message2.style.color = data.status === "success" ? "green" : "red"; // data.<status> comes from php
                }). catch(error => {
                    message2.textContext = "An error occurred.";
                    message2.style.color = "red";
                });
            });
        });
    </script>

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
        <section id="game">
            <br>
            <div id="welcome-text">Hangman Settings</div>
            <form action="../../data_src/api/hangman/add.php" method="post" id="add-word">
                Add A Word: <input type="text" name="word"><br>
                <input type="submit" value="Submit">
                <div id="response"></div>
            </form>
            <br>
            <form action="../../data_src/api/hangman/delete.php" method="post" id="delete-word">
                Delete A Word: <input type="text" name="word"><br>
                <input type="submit" value="Submit">
                <div id="response2"></div>
            </form>
        </section>
    </main>
</body>
</html>