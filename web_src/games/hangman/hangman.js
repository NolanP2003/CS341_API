document.addEventListener("DOMContentLoaded", function () {
    let word = '';
    let guessedWord = '';
    let attempts = 6;

    const wordDisplay = document.getElementById("word-display");
    const guessInput = document.getElementById("guess");
    const guessButton = document.getElementById("guess-button");
    const attemptCount = document.getElementById("attempt-count");
    const guessedLettersList = document.getElementById("guessed-letters-list");
    const guessedLetters = [];

    // Initial setup
    randomWord();

    // Event listener for clicking the "Guess" button
    guessButton.addEventListener("click", function () {
        handleGuess(guessInput.value.toUpperCase());
        guessInput.value = "";
    });

    // Event listener for Enter key presses in the guess input field
    guessInput.addEventListener("keypress", function (event) {
        const guess = guessInput.value.toUpperCase();
        if (event.key === "Enter") {
            if (guess.length === 1 && guess.match(/[A-Z]/)) {
                handleGuess(guess);
            } else {
                alert("Please enter a single letter.");
            }
            guessInput.value = "";
            event.preventDefault();
        }
    });

    function randomWord() {
        fetch('http://localhost/CS341_API/data_src/api/hangman/word.php', { method: 'get' })
            .then(response => response.json())
            .then(data => {
                word = data.word;
                guessedWord = initializeGuessedWord(word);
                renderWordDisplay();
            })
            .catch(console.error);
    }

    function initializeGuessedWord(word) {
        return "_".repeat(word.length).split("");
    }

    function renderWordDisplay() {
        wordDisplay.textContent = guessedWord.join(" ");
    }

    function handleGuess(letter) {
        if (attempts > 0) {
            if (guessedLetters.includes(letter)) {
                alert(letter + " has already been guessed.");
            } else if (word.includes(letter)) {
                guessedLetters.push(letter);
                guessedLettersList.textContent = guessedLetters.join(", ");
                for (let i = 0; i < word.length; i++) {
                    if (word[i] === letter) {
                        guessedWord[i] = letter;
                    }
                }
                renderWordDisplay();
                if (guessedWord.join("") === word) {
                    endGame("Congratulations! You guessed the word: " + word);
                }
            } else {
                attempts--;
                attemptCount.textContent = attempts;
                guessedLetters.push(letter);
                guessedLettersList.textContent = guessedLetters.join(", ");
                if (attempts === 0) {
                    endGame("Sorry, you're out of attempts. The word was: " + word);
                }
            }
        }
    }

    function endGame(message) {
        alert(message);
        guessInput.disabled = true;
        guessButton.disabled = true;
    }
});
