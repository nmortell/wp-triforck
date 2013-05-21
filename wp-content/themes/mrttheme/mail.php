<?php $firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$message = $_POST['essay'];
$formcontent="From: $firstname $lastname \n Message: $message";
$recipient = "nmortelli@gmail.com";
$subject = "Volunter Essay Submission"
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>
