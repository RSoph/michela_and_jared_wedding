<?php
require '../vendor/autoload.php';
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
$attending = $_POST['attending'];
$guest = $_POST['guest'];

$from = new SendGrid\Email(null, "no-reply@jared_and_michela.com");
$subject = "Website Contact Form:  $name";
$to = new SendGrid\Email(null, "bookergardnerwedding@gmail.com");
$content = new SendGrid\Content("text/plain", "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nAttending: $attending\n\nBringing a plus one: $guest\n\nMessage:\n$message");
$mail = new SendGrid\Mail($from, $subject, $to, $content);

$apiKey = 'SECRET';
$sg = new \SendGrid($apiKey);

$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
echo $response->headers();
echo $response->body();

?>