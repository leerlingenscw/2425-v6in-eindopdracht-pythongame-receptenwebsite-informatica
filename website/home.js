const image = document.querySelector('.home-image img');
function checkScroll() {
    const scrollPosition = window.scrollY; 
    const triggerPoint = 200;
    if (scrollPosition > triggerPoint) {
        image.classList.add('rotate');
    } else {
        image.classList.remove('rotate'); 
    }
}

window.addEventListener('scroll', checkScroll);
 
