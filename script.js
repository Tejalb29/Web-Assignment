let currentSlide = 0;
const slidesLeft = document.querySelectorAll('.carousel-left .slide');
const slidesRight = document.querySelectorAll('.carousel-right .slide');

function showNextSlide() {
    // Transition the current slide to inactive
    slidesLeft[currentSlide].classList.remove('active');
    slidesLeft[currentSlide].classList.add('inactive');

    slidesRight[currentSlide].classList.remove('active');
    slidesRight[currentSlide].classList.add('inactive');

    // Move to the next slide
    currentSlide = (currentSlide + 1) % slidesLeft.length;

    // Transition the new slide to active
    slidesLeft[currentSlide].classList.remove('inactive');
    slidesLeft[currentSlide].classList.add('active');

    slidesRight[currentSlide].classList.remove('inactive');
    slidesRight[currentSlide].classList.add('active');
}

// Automatically slide every 5 seconds
setInterval(showNextSlide, 7000);