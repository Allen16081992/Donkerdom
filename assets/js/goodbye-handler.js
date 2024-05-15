"use strict";
// Function to redirect to index page after a countdown
function redirectToIndexPage() {
    let countdown = 8; // Countdown duration in seconds

    // Update countdown timer every second
    let timerInterval = setInterval(function() {
        countdown--;
        document.getElementById('countdown').textContent = countdown;
        document.getElementById('countdownText').textContent = countdown;

        // Redirect to index page when countdown reaches 0
        if (countdown <= 0) {
            clearInterval(timerInterval); // Stop the timer interval
            window.location.href = 'index.html'; // Redirect to index page
        }
    }, 1000); // Update every 1000 milliseconds (1 second)
}

// Call redirectToIndexPage function after page load
window.onload = function() {
    redirectToIndexPage();
};