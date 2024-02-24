const questions = [
    {
        question: "Meglio messi o ronaldo?",
        answers: [
            { text: "Pessi", correct: false},
            { text: "Cr7", correct: true},
            { text: "uguale", correct: false},
            { text: "meglio noslin", correct: false},
        ]
    },
    {
        question: "quanto fa 2+2?",
        answers: [
            { text: "5", correct: false},
            { text: "6", correct: false},
            { text: "2,333 periodico", correct: false},
            { text: "4", correct: true},
        ]
    },
    {
        question: "ciao",
        answers: [
            { text: "ciao", correct: true},
            { text: "bao", correct: false},
            { text: "miao", correct: false},
            { text: "bau", correct: false},
        ]
    },
    {
        question: "Messi parte lo stesooooo",
        answers: [
            { text: "brutto gol", correct: false},
            { text: "talento argentino", correct: false},
            { text: "mazza che bomba", correct: false},
            { text: "NON è VERO!", correct: true},
        ]
    },
    {
        question: "chi ha l'ultima parola nel calcio?",
        answers: [
            { text: "gli arbitri", correct: false},
            { text: "i giocatori più forti", correct: false},
            { text: "i portieri", correct: false},
            { text: "gli uruguagi", correct: true},
        ]
    },
    {
        question: "chi ha i polpacci più grossi del mondo calcistico?",
        answers: [
            { text: "shakiri", correct: true},
            { text: "suarez", correct: false},
            { text: "grealish", correct: false},
            { text: "guarin", correct: false},
        ]
    }
];

const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer__button");
const nextButton = document.getElementById("next__btn");

let currentQuestionIndex = 0;
let score = 0;

function startQuiz(){
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "Next";
    showQuestion();
}

function showQuestion(){
    resetState();
    let currentQuestion = questions[currentQuestionIndex];
    let questionNo = currentQuestionIndex + 1;
    questionElement.innerHTML = questionNo + ". " + currentQuestion.question;

    currentQuestion.answers.forEach(answer => {
        const button = document.createElement("button");
        button.innerHTML = answer.text;
        button.classList.add("btn");
        answerButtons.appendChild(button);
        if(answer.correct){
            button.dataset.correct = answer.correct;
        }
        button.addEventListener("click", selectAnswer);
    });
}

function resetState(){
    nextButton.style.display = "none";
    while(answerButtons.firstChild){
        answerButtons.removeChild(answerButtons.firstChild);
    }
}

function selectAnswer(e){
    const selectedBtn = e.target;
    const isCorrect = selectedBtn.dataset.correct === "true";
    if(isCorrect){
        selectedBtn.classList.add("correct");
        score++;
    }else{
        selectedBtn.classList.add("incorrect");
    }
    Array.from(answerButtons.children).forEach(button => {
        if(button.dataset.correct === "true"){
            button.classList.add("correct");
        }
        button.disabled = true;
    });
    nextButton.style.display = "block"
}

function showScore(){
    resetState();
    questionElement.innerHTML = `Hai fatto ${score} su ${questions.
        length}!`;
    nextButton.innerHTML = "Riprova";
    nextButton.style.display = "block";
}


function handleNextButton(){
    currentQuestionIndex ++;
    if(currentQuestionIndex < questions.length){
        showQuestion();
    }else{
        showScore();
    }
}

nextButton.addEventListener("click", ()=>{
    if(currentQuestionIndex < questions.length){
        handleNextButton();
    }else{
        startQuiz()
    }
});


startQuiz();



