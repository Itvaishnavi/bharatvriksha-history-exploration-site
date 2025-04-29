document.addEventListener('DOMContentLoaded', function() {
    const ratingInput = document.getElementById('rating');
    const ratingValue = document.getElementById('ratingValue');

    // Display the initial value
    ratingValue.textContent = ratingInput.value;

    // Event listener for input change
    ratingInput.addEventListener('input', function() {
        ratingValue.textContent = this.value; // Update the displayed value
    });
});