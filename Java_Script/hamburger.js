const hamburger = document.querySelector('.hamburger');
const navMenu = document.querySelector('.navbar ul');
  hamburger.addEventListener('click', () => {
   navMenu.classList.toggle('show');
});
