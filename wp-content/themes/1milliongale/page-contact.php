<?php
/*
 * Template Name: Contact Page
 */
get_header(); // Get the site header
?>

<main class="container nosidebar">
    <div class="main-content">
        <h1>Contact Us</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
            // Sanitize the form data
            $name = sanitize_text_field($_POST["name"]);
            $email = sanitize_email($_POST["email"]);
            $message = sanitize_textarea_field($_POST["message"]);
        
            // Confirmation email details
            $subject_to_user = "Thank you for contacting us!";
            $headers_to_user = "From: no-reply@yourdomain.com\r\nReply-To: no-reply@yourdomain.com\r\nContent-Type: text/plain; charset=UTF-8";
            $body_to_user = "Hi $name,\n\nThank you for reaching out! We've received your message and will get back to you soon.\n\nHere’s a copy of your message:\n\n$message\n\nBest regards,\nYour Company Name";
        
            // Send the confirmation email to the user
            $user_email_sent = wp_mail($email, $subject_to_user, $body_to_user, $headers_to_user);
        
            if ($user_email_sent) {
                echo "<p style='color:green;'>Message sent successfully. A confirmation email has been sent to your email address.</p>";
            } else {
                echo "<p style='color:red;'>Error sending confirmation email.</p>";
            }
        }
        
        
        ?>

        <form id="contact-form" method="post" action="">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit" name="submit" id="submit">Send</button>
        </form>

        <div id="response"></div> <!-- This will display the response message -->

        <p>texto</p>

        <script>
            document.getElementById("contact-form").addEventListener("submit", function (event) {
                event.preventDefault();  // Prevents the form from reloading the page

                var formData = new FormData(this); // Collects form data

                // Perform the AJAX request
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "", true);  // Send the form data to the same page

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText); // Log the response from the server
                        document.getElementById("response").innerHTML = "<p style='color:green;'>Message sent successfully.</p>";
                    } else {
                        console.log("Error response: " + xhr.responseText); // Log the error response
                        document.getElementById("response").innerHTML = "<p style='color:red;'>Error sending message.</p>";
                    }
                };

                xhr.send(formData);  // Send the form data to the server
            });
        </script>

    </div>
</main>

<?php get_footer(); // Get the site footer ?>