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
            // Process the form here
            $name = sanitize_text_field($_POST["name"]);
            $email = sanitize_email($_POST["email"]);
            $message = sanitize_textarea_field($_POST["message"]);

            $to = "your-email@example.com"; // Replace with your email
            $subject = "New Contact Message from $name";
            $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8";
            $body = "Name: $name\nEmail: $email\nMessage:\n$message";

            if (wp_mail($to, $subject, $body, $headers)) {
                echo "<p style='color:green;'>Message sent successfully.</p>";
            } else {
                echo "<p style='color:red;'>Error sending message.</p>";
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