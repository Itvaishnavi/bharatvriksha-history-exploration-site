document.getElementById('locationForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Get form values
    const place = document.getElementById('place').value;
    const state = document.getElementById('state').value;
    const city = document.getElementById('city').value;
    const description = document.getElementById('description').value;
    const imageFile = document.getElementById('image').files[0];

    // Create a FileReader to read the image
    const reader = new FileReader();
    reader.onload = function(e) {
        const responseDiv = document.getElementById('response');
        responseDiv.innerHTML = `
            <h2>Thank you for your submission!</h2>
            <p><strong>Place:</strong> ${place}</p>
            <p><strong>State:</strong> ${state}</p>
            <p><strong>City:</strong> ${city}</p>
            <p><strong >Description:</strong> ${description}</p>
            <img src="${e.target.result}" alt="Uploaded Image" style="max-width: 100%; height: auto; border-radius: 5px; margin-top: 10px;">
        `;

        // Show a popup alert
        alert("Form submitted successfully!");

        // Redirect to the same page after 2 seconds
        setTimeout(() => {
            window.location.reload();
        }, 2000);
    };

    // Read the image file as a data URL
    if (imageFile) {
        reader.readAsDataURL(imageFile);
    }

    // Clear the form
    this.reset();
});