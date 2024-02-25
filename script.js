window.addEventListener('scroll', () => {
    const content = document.querySelector('.hidden-content');
    const contentPosition = content.getBoundingClientRect().top;
    const screenPosition = window.innerHeight / 2.5; // Modifica il valore se necessario per cambiare quando appare l'elemento
  
    if (contentPosition < screenPosition) {
      content.classList.add('visible');
    }
  });
  