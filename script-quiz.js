const questions = [
    {
        question: "Chi ha vinto il pallone d'oro nel 2016?",
        answers: [
            { text: "Messi", correct: false},
            { text: "Ronaldo", correct: true},
            { text: "Benzema", correct: false},
            { text: "Modric", correct: false},
        ]
    },
    {
        question: "Quando Luka Modric vinse il suo primo pallone d'oro, per che club giocava?",
        answers: [
            { text: "Nel Barcellona", correct: false},
            { text: "Nell'inter", correct: false},
            { text: "Nella Juventus", correct: false},
            { text: "Nel Real Madrid", correct: true},
        ]
    },
    {
        question: "A che età Cristiano Ronaldo vinse il suo quinto pallone d'oro?",
        answers: [
            { text: "Aveva 32 anni", correct: true},
            { text: "Aveva 28 anni", correct: false},
            { text: "Non ha vinto cinque palloni d'oro", correct: false},
            { text: "Aveva 27 anni", correct: false},
        ]
    },
    {
        question: "Cosa vinse Lionel Messi con l'Inter Miami nel 2023 per vincere il pallone d'oro?",
        answers: [
            { text: "Vinse la champions league", correct: false},
            { text: "Vinse il premio di miglior marcatore dell'anno", correct: false},
            { text: "Vinse il campionato con il maggior numero di assist nell'anno solare", correct: false},
            { text: "Non vinse nulla con l'Inter Miami ma vinse con l'argentina il mondiale", correct: true},
        ]
    },
    {
        question: "Karim Benzema quanti palloni d'oro ha vinto nella sua carriera?",
        answers: [
            { text: "Ha vinto 3 palloni d'oro", correct: false},
            { text: "Ha vinto 2 palloni d'oro", correct: false},
            { text: "Ha vinto 1 pallone d'oro e uno d'argento", correct: false},
            { text: "Ha vinto 1 pallone d'oro", correct: true},
        ]
    },
    {
        question: "Chi ha vinto più palloni d'oro di messi?",
        answers: [
            { text: "Cristiano Ronaldo", correct: false},
            { text: "Nessuno ne ha vinti quanti lui", correct: true},
            { text: "Johan Cruyff", correct: false},
            { text: "Van Basten", correct: false},
        ]
    },
    {
        question: "Quanti palloni d'oro bisogna avere, ora come ora, per essere sicuri di entrare nella top-10 di giocatoricon più palloni d'oro?",
        answers: [
            { text: "Ne bastano 2", correct: false},
            { text: "Ne basta 1", correct: false},
            { text: "Almeno 3", correct: true},
            { text: "Almeno 4", correct: false},
        ]
    },
    {
        question: "Di che nazionalità è Alfredo Di Stefano?",
        answers: [
            { text: "Italiana", correct: false},
            { text: "Era argentino", correct: false},
            { text: "Era ispano-argentino", correct: true},
            { text: "Spagnola", correct: false},
        ]
    },
    {
        question: "Che club accomuna Ronaldo Nazario e Rummenigge?",
        answers: [
            { text: "Hanno entrambi giocato nell'Internazionale", correct: true},
            { text: "Hanno entrambi giocato per la nazionale francese", correct: false},
            { text: "Hanno entrambi giocato nel Bayern Monaco", correct: false},
            { text: "Non hanno giocato nelle stesse squadre", correct: false},
        ]
    },
    {
        question: "Nella top-10 giocatori con più palloni d'oro c'è solo un difensore quale?",
        answers: [
            { text: "Kevin Keegan", correct: false},
            { text: "Franz Beckenbauer", correct: true},
            { text: "Marco Van Basten", correct: false},
            { text: "Nessun difensore nella top-10", correct: false},
        ]
    },
];

const questionElement = document.getElementById("question");
const answerButtons = document.getElementById("answer__button");
const nextButton = document.getElementById("next__btn");
const psdpButton = document.getElementById("psdp__btn");

let currentQuestionIndex = 0;
let score = 0;

function startQuiz(){
    currentQuestionIndex = 0;
    score = 0;
    nextButton.innerHTML = "Prossima";
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
    psdpButton.style.display = "none"
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
    nextButton.innerHTML = "Riprova!";
    nextButton.style.display = "block";
    psdpButton.innerHTML = "<a href='psdp.html' class = 'noDecoration'>Soluzioni!</a>";
    psdpButton.style.display = "block";
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



