function checkAnswer() {
    var answer = document.querySelector('input[name="answer"]:checked').value;
    var result = document.getElementById('result');

    if (answer === "1") {
        result.textContent = "Corretto! messi merda";
    } else {
        result.textContent = "Sbagliato! coglione messi fa cagare";
    }
}
