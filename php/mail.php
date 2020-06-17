<?php

// Collect the data from the form.
$full_name = htmlspecialchars($_POST["form_lastname"]);
$email = htmlspecialchars($_POST["form_email"]);

$message = htmlspecialchars($_POST["form_message"]);

// Paste your mail here.
$myemail = "jo3005@gmail.com";

// Setting a content type.
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8";

// The message title which will be displayed in your mail box.
$subject = "New message from MyPortfolio!";

// Get the HTML template
$html_template = file_get_contents('../html/mail-template-contacts.html');


// Injecting variables in the HTML template
$html_template = str_replace('<% fullName %>', $full_name, $html_template);
$html_template = str_replace('<% email %>', $email, $html_template);
$html_template = str_replace('<% message %>', $message, $html_template);

// Send the mail.
mail($myemail, $subject, $html_template, $headers);

?>