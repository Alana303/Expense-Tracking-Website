document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent default form submission

        // Get input values
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let phone = document.getElementById("phone").value.trim();
        let subject = document.getElementById("subject").value.trim();
        let message = document.getElementById("message").value.trim();

        // Simple validation
        if (!name || !email || !phone || !subject || !message) {
            alert("All fields are required!");
            return;
        }

        if (!validateEmail(email)) {
            alert("Please enter a valid email address.");
            return;
        }

        if (!validatePhone(phone)) {
            alert("Please enter a valid phone number.");
            return;
        }

        // Simulate successful submission
        alert("Your message has been sent successfully!");

        // Reset form
        form.reset();
    });

    function validateEmail(email) {
        let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    function validatePhone(phone) {
        let re = /^\+?\d{10,13}$/; // Accepts international and local numbers
        return re.test(phone);
    }
});

// Newsletter Subscription Form Handling
document.addEventListener("DOMContentLoaded", function () {
    const newsletterForm = document.querySelector("#newsletter form");

    newsletterForm.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevents the default form submission

        const emailInput = newsletterForm.querySelector("input[type='email']");
        const email = emailInput.value.trim();

        if (validateEmail(email)) {
            alert("Thank you for subscribing! 🎉 You will now receive updates.");
            emailInput.value = ""; // Clear input field after successful subscription
        } else {
            alert("❌ Please enter a valid email address.");
        }
    });

    // Function to validate email format
    function validateEmail(email) {
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Regex for email validation
        return emailPattern.test(email);
    }
});
