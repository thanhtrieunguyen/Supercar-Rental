document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('.car-slider');
    const prevBtn = document.querySelector('.slider-prev');
    const nextBtn = document.querySelector('.slider-next');
    const dots = document.querySelectorAll('.slider-dot');

    let slideIndex = 0;
    const slidesPerView = 4;
    const totalSlides = document.querySelectorAll('.car-slide').length;
    const maxIndex = Math.ceil(totalSlides / slidesPerView) - 1;

    function updateSlider() {
        const slideWidth = document.querySelector('.car-slide').offsetWidth + 20; // width + gap
        slider.style.transform = `translateX(-${slideIndex * slideWidth * slidesPerView}px)`;

        // Update dots
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === slideIndex);
        });
    }

    // Next slide
    nextBtn.addEventListener('click', function() {
        if (slideIndex < maxIndex) {
            slideIndex++;
            updateSlider();
        } else {
            // Loop back to first slide with animation
            slideIndex = 0;
            updateSlider();
        }
    });

    // Previous slide
    prevBtn.addEventListener('click', function() {
        if (slideIndex > 0) {
            slideIndex--;
            updateSlider();
        } else {
            // Loop to last slide
            slideIndex = maxIndex;
            updateSlider();
        }
    });

    // Dot navigation
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            slideIndex = index;
            updateSlider();
        });
    });

    // Touch swipe functionality
    let touchStartX = 0;
    let touchEndX = 0;

    slider.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    });

    slider.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });

    function handleSwipe() {
        const swipeThreshold = 50;
        if (touchEndX < touchStartX - swipeThreshold) {
            // Swipe left - next slide
            if (slideIndex < maxIndex) {
                slideIndex++;
                updateSlider();
            }
        } else if (touchEndX > touchStartX + swipeThreshold) {
            // Swipe right - previous slide
            if (slideIndex > 0) {
                slideIndex--;
                updateSlider();
            }
        }
    }

    // Initialize slider
    updateSlider();

    // Auto slide every 5 seconds
    setInterval(function() {
        if (slideIndex < maxIndex) {
            slideIndex++;
        } else {
            slideIndex = 0;
        }
        updateSlider();
    }, 10000);

    const scrollButton = document.querySelector('.hero-banner__scroll');
    if (scrollButton) {
        scrollButton.addEventListener('click', function() {
            const targetSection = document.querySelector('.best-cars-section');
            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    }

    // Add ID to the how-it-works section for smooth scrolling
    const howItWorksSection = document.getElementById('wrapper1');
    if (howItWorksSection) {
        howItWorksSection.id = 'how-it-works';
    }
});
