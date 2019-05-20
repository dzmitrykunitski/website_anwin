<?php $naam = $_POST['naam'];
$voornaam = $_POST['voornaam'];
$email = $_POST['email'];
$bericht = $_POST['bericht'];
$formcontent="From: $naam \n $voornaam \n Bericht: $bericht";
$recipient = "info@anwin.be";
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
?>
