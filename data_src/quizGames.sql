use u413142534_quizgames;

CREATE TABLE IF NOT EXISTS user (
    userID INT AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    PRIMARY KEY (userID)
);
CREATE TABLE IF NOT EXISTS trivia (
	questionID INT AUTO_INCREMENT,
    question VARCHAR(255) NOT NULL,
    PRIMARY KEY (questionID)
);
CREATE TABLE IF NOT EXISTS answer (
	answerID INT NOT NULL AUTO_INCREMENT,
    questionID INT NOT NULL,
    triv_answer varchar(255) DEFAULT ("Google it"),
    is_Correct boolean NOT NULL,
    PRIMARY KEY (answerID),
    FOREIGN KEY (questionID) REFERENCES trivia (questionID)
);
CREATE TABLE IF NOT EXISTS hangman (
	wordID INT NOT NULL AUTO_INCREMENT,
    word varchar(50) NOT NULL,
    PRIMARY KEY (wordID)
);