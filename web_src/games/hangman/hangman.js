document.addEventListener("DOMContentLoaded", function () {
    // const wordList = ["TRUMAN", "CONRAD", "BLUEJAY", "BOWERS", "FOUNDERS", "SCHLOSSER", "ELIZABETHTOWN", "JAYNEST", "THOMPSON", "BRINSER"];
    // His name is actually blue, according to an anonymous user
    // NO HIS NAME WILL NEVER BE BLUE I REFUSE!!!!!!!!!!!!!!!!
    
    let word = ''; // selectRandomWord(wordList);
    let guessedWord = ''; // initializeGuessedWord(word);
    let attempts = 6;
    randomWord(); // Doesn't return anything, so no variable

    const wordDisplay = document.getElementById("word-display");
    const guessInput = document.getElementById("guess");
    const guessButton = document.getElementById("guess-button");
    const attemptCount = document.getElementById("attempt-count");
    const guessedLettersList = document.getElementById("guessed-letters-list");
    const guessedLetters = [];

    // renderWordDisplay();
    
    guessButton.addEventListener("click", function () {
        const guess = guessInput.value.toUpperCase();
        if (guess.length === 1 && guess.match(/[A-Z]/)) {
            handleGuess(guess);
        } else {
            alert("Please enter a single letter.");
        }
        guessInput.value = "";
    });

    /* Selecting a random word Take 2 */
    function randomWord() {
        fetch('http://localhost/CS341_API/data_src/api/hangman/word.php', {method: 'get',}) // (CS363 GET; Default?)
            .then(response => response.json()) // get response from json, {poof} data, store in response
            .then(data => {word = data.word; guessedWord = initializeGuessedWord(word); renderWordDisplay();}) // takes word value and stores it in var word 
            .catch(console.error); // Erroring?
    } // r and d are parameters in the arrow function
    
    /*function selectRandomWord(wordList) { Sorry, Nolan
        return wordList[Math.floor(Math.random() * wordList.length)];
    } */

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
            }
            else if (word.includes(letter)) {
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
                guessedLetters.push(letter); // get guessed letter
                guessedLettersList.textContent = guessedLetters.join(", "); // put guessed letter into a list
                
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
