// Hamburger menu toggle
function hamburg() {
    const dropdown = document.querySelector('.dropdown');
    dropdown.style.transform = 'translateY(0)';
}

function cancel() {
    const dropdown = document.querySelector('.dropdown');
    dropdown.style.transform = 'translateY(-500px)';
}

// Typewriter effect
const typewriterText = document.querySelector('.typewriter-text');
const words = ['Web Developer', 'UI/UX Designer', 'Frontend Developer', 'JavaScript Enthusiast'];
let wordIndex = 0;
let charIndex = 0;

function typeWriter() {
    if (charIndex < words[wordIndex].length) {
        typewriterText.textContent += words[wordIndex].charAt(charIndex);
        charIndex++;
        setTimeout(typeWriter, 100); // Adjust speed here
    } else {
        setTimeout(deleteWriter, 2000); // Wait before deleting
    }
}

function deleteWriter() {
    if (charIndex > 0) {
        typewriterText.textContent = typewriterText.textContent.substring(0, charIndex - 1);
        charIndex--;
        setTimeout(deleteWriter, 100); // Adjust speed here
    } else {
        wordIndex = (wordIndex + 1) % words.length; // Move to the next word
        setTimeout(typeWriter, 500); // Wait before typing the next word
    }
}

// Start typewriter effect when the page is loaded
window.onload = () => {
    typeWriter();
};

// Initialize AOS (Animate On Scroll)
AOS.init({
    offset: 200, // Offset for scroll animation trigger
    duration: 1000, // Duration of animation
    easing: 'ease-in-out', // Easing for animation
    delay: 100, // Delay for animation
});