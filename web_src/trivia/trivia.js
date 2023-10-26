const triviaQuestions = [
    {
        question: "What is the capital of France?",
        answers: ["Paris", "London", "Berlin", "Madrid"],
        correctAnswer: "Paris"
    },
    {
        question: "What is the largest planet in our solar system?",
        answers: ["Earth", "Mars", "Jupiter", "Venus"],
        correctAnswer: "Jupiter"
    },
    // Add more questions and answers as needed
];

let currentQuestionIndex = 0;

function displayRandomQuestion() {
    const questionContainer = document.getElementById("question-container");
    const question = triviaQuestions[currentQuestionIndex].question;
    const answers = triviaQuestions[currentQuestionIndex].answers;

    questionContainer.innerHTML = `<p>${question}</p>`;
    
    answers.forEach(answer => {
        const answerButton = document.createElement("button");
        answerButton.textContent = answer;
        answerButton.addEventListener("click", () => checkAnswer(answer));
        questionContainer.appendChild(answerButton);
    });
}

function checkAnswer(selectedAnswer) {
    const correctAnswer = triviaQuestions[currentQuestionIndex].correctAnswer;
    if (selectedAnswer === correctAnswer) {
        document.getElementById("question-container").classList.add("green-background"); // Add green background class
        setTimeout(() => {
            document.getElementById("question-container").classList.remove("green-background"); // Remove green background class
            currentQuestionIndex++;
            if (currentQuestionIndex < triviaQuestions.length) {
                displayRandomQuestion();
            } else {
                const confirmation = confirm("Congratulations! You've completed the trivia. Click OK to go to the game page.");
                if (confirmation) {
                    window.location.href = "../games/menu.php";
                }
            }
        }, 1000);
    } else {
        document.getElementById("question-container").classList.add("red-background");
        setTimeout(() => {
            document.getElementById("question-container").classList.remove("red-background");
    }, 1000);
    }
}



window.onload = displayRandomQuestion;

