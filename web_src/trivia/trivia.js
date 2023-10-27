const triviaQuestions = []; // empty list

let currentQuestionIndex = 0;
let count = 0; // Counter for number of Correct Answers

// TODO: Prevent repeat questions

function displayRandomQuestion() {
    if (triviaQuestions.length > 0 && currentQuestionIndex < triviaQuestions.length) { // Explain
        const questionContainer = document.getElementById("question-container");
        const question = triviaQuestions[currentQuestionIndex].question;
        const answers = triviaQuestions[currentQuestionIndex].answers;

        questionContainer.innerHTML = `<p>${question}</p>`;

        answers.forEach(answerData=> {
            const answerButton = document.createElement("button");
            answerButton.textContent = answerData.answer;
            answerButton.addEventListener("click", () => checkAnswer(answerData.isCorrect));
            questionContainer.appendChild(answerButton);
        });
    }
}

function randomQuestion() { // Get questions from database
    fetch('http://localhost/CS341_API/data_src/api/trivia/questions.php', {method: 'get'}) // TODO: Change file path for FTP
        .then(response => response.json())
        .then(data => { const question = data.question; const answers = data.answers; // 1 questions with 3 answers
            triviaQuestions.push({question, answers}); // .push adds to arrays
            displayRandomQuestion(); // Just gets called until count hits 3 {Confetti}
    }).catch(error => {
        console.error("Error fetching data", error);
        randomQuestion(); // If it at first you don't fetch, try again and again
    });
}

function checkAnswer(isCorrect) {
    if (isCorrect) { // If true or 1
        document.body.style.backgroundColor = "green";
        document.getElementById("question-container").classList.add("green-background"); // Add green background class
        setTimeout(() => {
            document.body.style.backgroundColor = "";
            document.getElementById("question-container").classList.remove("green-background"); // Remove green background class
            count++;
            currentQuestionIndex++; // Idk 
            if (count < 3) { // Make it count... to 3
                randomQuestion(); // Can get repetitive
            } else if (count === 3){
                confirmationMessage();
            }
        }, 1000);
    } else {
        document.getElementById("question-container").classList.add("red-background");
        setTimeout(() => {
            document.getElementById("question-container").classList.remove("red-background");
        }, 1000);
    }
}

function confirmationMessage() { // You too can be told you are valid
    const confirmation = confirm("Congratulations! You've completed the trivia. Click OK to go to the game page.");
    if (confirmation) {
        window.location.href = "../games/menu.php";
    }
}


window.onload = randomQuestion;