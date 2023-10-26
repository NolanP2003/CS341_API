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
        document.body.style.backgroundColor = "green";
        setTimeout(() => {
            document.body.style.backgroundColor = "";
            currentQuestionIndex++;
            if (currentQuestionIndex < triviaQuestions.length) {
                displayRandomQuestion();
            } else {
                alert("Congratulations! You've completed the trivia.");
            }
        }, 1000);
    } else {
        alert("You are wrong dumbass!!!")
    }
}

window.onload = displayRandomQuestion;

