const burger = document.querySelector('.burger');
const modalMenu = document.getElementById('modalBurger');
const underline = document.getElementsByClassName("underline");
burger.addEventListener('click', () => {
	burger.classList.toggle('active');
	modalMenu.classList.toggle('active-menu');
    while (underline.length)
    underline[0].classList.remove("underline");
});
