window.addEventListener('scroll', () => {
    const content = document.querySelector('.hidden-content');
    const contentPosition = content.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 2.2; // Modifica il valore se necessario per cambiare quando appare l'elemento
  
    if (contentPosition < screenPosition) {
      content.classList.add('visible');
    }
  });
  
  document.addEventListener("DOMContentLoaded", function() {
    var cardsWrapper = document.querySelector('.cards-anim');
    var cards = document.querySelectorAll('.card');

    function isInViewport(element) {
        var rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    function animateCards() {
        cards.forEach(function(card, index) {
            setTimeout(function() {
                card.classList.add('animated');
            }, index * 500); // 500 millisecondi = 0.5 secondi
        });
    }

    window.addEventListener('scroll', function() {
        if (isInViewport(cardsWrapper)) {
            animateCards();
            window.removeEventListener('scroll', this);
        }
    });
});