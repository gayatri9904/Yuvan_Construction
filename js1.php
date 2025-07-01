<?php
header("Content-type: application/javascript");
?>

document.addEventListener("DOMContentLoaded", function () {
    // Typing effect for hero text
    const phrases = [
        "From Imagination to Creation",
        "Building Dreams, One Brick at a Time.",
        "Turning Blueprints into Reality.",
        "Modern Architecture"
    ];

    const animatedText = document.querySelector(".animated-text");
    let currentPhraseIndex = 0;
    let currentCharIndex = 0;
    let isDeleting = false;

    function typeEffect() {
        const currentPhrase = phrases[currentPhraseIndex];

        if (isDeleting) {
            currentCharIndex--;
        } else {
            currentCharIndex++;
        }

        animatedText.textContent = currentPhrase.substring(0, currentCharIndex);

        if (!isDeleting && currentCharIndex === currentPhrase.length) {
            setTimeout(() => (isDeleting = true), 1000);
        } else if (isDeleting && currentCharIndex === 0) {
            isDeleting = false;
            currentPhraseIndex = (currentPhraseIndex + 1) % phrases.length;
        }

        setTimeout(typeEffect, isDeleting ? 50 : 100);
    }
    typeEffect();

    // Scroll Animation for Services Section
    const serviceCards = document.querySelectorAll(".service-card");

    function revealServices() {
        const triggerBottom = window.innerHeight * 0.85;

        serviceCards.forEach((card) => {
            const cardTop = card.getBoundingClientRect().top;
            if (cardTop < triggerBottom) {
                card.style.opacity = 1;
                card.style.transform = "translateY(0)";
            }
        });
    }

    window.addEventListener("scroll", revealServices);
    revealServices();


    
});



