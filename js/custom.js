// Show "Scroll to Top" button
const scrollTopBtn = document.getElementById("scrollTopBtn");

function handleScroll() {
    updateCounters(); // Handles number counters

    // Show/hide scroll to top button
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        scrollTopBtn.classList.add("show");
    } else {
        scrollTopBtn.classList.remove("show");
    }
}

window.onscroll = handleScroll;

// Scroll to top function
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
}

//<!-- ------------------- Bottom to Top Scroll Button End -------------------->

function toggleLanguage() {
    const currentLang = document.documentElement.lang;
    if (currentLang === "en") {
        document.documentElement.lang = "sw";
        alert("Lugha imebadilishwa kuwa Kiswahili.");
    } else {
        document.documentElement.lang = "en";
        alert("Language switched to English.");
    }
}

// Owl Coarousel for Package Section
$(document).ready(function () {
    $('.owl-package').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        margin: 2,
        autoplay: true,
        autoplayHoverPause: false,
        animateIn: '',
        autoplayTimeout: 5000,
        autoplaySpeed: 3000,
        autoHeight: false,
        navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1199: {
                items: 3
            }
        }
    });
});
// Owl Coarousel for Testimonial Section
$(document).ready(function () {
    $('.owl-testimonial').owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        autoplayHoverPause: false,
        animateIn: '',
        autoplayTimeout: 5000,
        autoplaySpeed: 3000,
        autoHeight: false,
        navText: ["<i class='fa-solid fa-chevron-left'></i>", "<i class='fa-solid fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            }
        }
    });
});
// Number Counter in Featured Section
let counters = document.querySelectorAll('.count');
let speed = 200; // Speed of the count-up

function updateCounters() {
    counters.forEach(counter => {
        if (isElementInViewport(counter) && !counter.dataset.animated) {
            let target = +counter.getAttribute('data-target');
            let count = 0;
            let increment = target / speed;
            counter.dataset.animated = "true"; // Prevents re-triggering

            let interval = setInterval(() => {
                count += increment;
                if (count >= target) {
                    clearInterval(interval);
                    count = target;
                }
                counter.innerText = Math.ceil(count);
            }, 10); // Adjusted for smoother animation
        }
    });
}

function isElementInViewport(el) {
    let rect = el.getBoundingClientRect();
    return rect.top <= window.innerHeight && rect.bottom >= 0;
}

document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".gallery-slider", {
        slidesPerView: 2,  // Show 2 images at a time
        spaceBetween: 5,  // Gap between slides
        loop: true,
        autoplay: {
            delay: 2500,  // Auto-slide every 2.5 seconds
            disableOnInteraction: false,  // Continue sliding after user interaction
        },
        speed: 800,  // Smooth transition speed
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            1024: { slidesPerView: 3 },  // 2 slides on desktop
            768: { slidesPerView: 2 },   // 2 slides on tablet
            480: { slidesPerView: 1 },   // 1 slide on mobile
        }
    });
});


