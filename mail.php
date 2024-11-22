<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $num_people_names = htmlspecialchars($_POST['num_people_names']);
    $food_intolerances = htmlspecialchars($_POST['food_intolerances']);
    $additional_notes = htmlspecialchars($_POST['additional_notes']);
    $attendance = htmlspecialchars($_POST['attendance']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please try again.";
        exit;
    }

    // Define the recipient email and subject
    $to = "pedroanjinhosilva04@gmail.com"; // Replace with your email
    $subject = "Casamento R.S.V.P from $email";

    // Create the email body
    $body = "You have received a new R.S.V.P response:\n\n";
    $body .= "Email: $email\n";
    $body .= "Número de pessoas/nomes: $num_people_names\n";
    $body .= "Intolerâncias alimentares: $food_intolerances\n";
    $body .= "Notas adicionais: $additional_notes\n";
    $body .= "Confirma presença no casamento? $attendance\n";

    // Set the email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your response! We are excited to celebrate with you!";
    } else {
        echo "There was an error sending your response. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>