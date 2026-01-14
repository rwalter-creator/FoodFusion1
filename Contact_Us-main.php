<?php

/* require __DIR__ . '/app/config/config.php';

//Save contact form data to db
$messages = new Messages($conn);
$errormsg = '';
if (isset($_POST['submitted'])) {
    $message_sender = $_POST['name'];
    $sender_email = $_POST['email'];
    $message_subject = $_POST['subject'];
    $message = $_POST['message'];
    $message_date = date('Y-m-d H:i:s');


    $contact = $messages->create($message_sender, $sender_email, $message_subject, $message, $message_date);

    if ($contact) {
        echo 'Message submitted successfully';
    } else {
        echo 'Unable to send message';
    }
} */

?>

<main class="container py-4">

    <section class="hero-section">
        <h1 class="hero-title">Contact Us</h1>
        <p class="hero-description">
            We’d love to hear from you! Whether you have questions, feedback, or recipe requests, reach out using the form below.
        </p>
    </section>


    <!-- Contact Form -->
    <form id="contact-form" class="contact-form" method="POST" action="#">
        <label for="name">Your Name:</label>
        <input id="name" name="name" type="text" required><br>

        <label for="email">Your Email:</label>
        <input id="email" name="email" type="email" required><br>

        <label for="subject">Subject:</label>
        <input id="subject" name="subject" type="text" required><br>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea><br>

        <button type="submit" form="contact-form" name="submitted" class="btn btn-primary">Send Message</button>
    </form>


    <!-- Contact Info -->
    <section class="contact-info">
        <h2>Our Details</h2>
        <p><strong>Email:</strong> support@foodfusion.com</p>
        <p><strong>Phone:</strong> +1 (868) 741-FOOD</p>
        <p><strong>Address:</strong> 123 Foodfusion Plaza, Port of Spain</p>
        <p>Follow us on:
            #Facebook</a> |
            #Instagram</a> |
            #YouTube</a>
        </p>
    </section>
</main>