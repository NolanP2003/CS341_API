document.addEventListener("DOMContentLoaded", function () {
    const wordList = ["TRUMAN", "CONRAD", "BLUEJAY", "BOWERS", "FOUNDERS", "SCHLOSSER", "ELIZABETHTOWN", "JAYNEST", "THOMPSON", "BRINSER"];

    let word = selectRandomWord(wordList);
    let guessedWord = initializeGuessedWord(word);
    let attempts = 6;

    const wordDisplay = document.getElementById("word-display");
    const guessInput = document.getElementById("guess");
    const guessButton = document.getElementById("guess-button");
    const attemptCount = document.getElementById("attempt-count");

    renderWordDisplay();

    guessButton.addEventListener("click", function () {
        const guess = guessInput.value.toUpperCase();
        if (guess.length === 1 && guess.match(/[A-Z]/)) {
            handleGuess(guess);
        } else {
            alert("Please enter a single letter.");
        }
        guessInput.value = "";
    });

    function selectRandomWord(wordList) {
        return wordList[Math.floor(Math.random() * wordList.length)];
    }

    function initializeGuessedWord(word) {
        return "_".repeat(word.length).split("");
    }

    function renderWordDisplay() {
        wordDisplay.textContent = guessedWord.join(" ");
    }

    function handleGuess(letter) {
        if (attempts > 0) {
            if (word.includes(letter)) {
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
