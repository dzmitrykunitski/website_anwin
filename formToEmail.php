<?php if(isset($_POST['submit'])) {
 
    $email_to = "kunitskidzmitry@gmail.com";
    
     //andrey.fanoberov@hotmail.com
    
    $email_subject = "Contacten";
 
    function died($error) {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
 
    if(!isset($_POST['naam']) ||
        !isset($_POST['voornaam']) ||
        !isset($_POST['email']) ||
        !isset($_POST['bericht'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
 
    $naam = $_POST['naam']; 
    $voornaam = $_POST['voornaam']; 
    $email = $_POST['email']; 
    $bericht = $_POST['bericht']; 
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$naam)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
 
    
  if(!preg_match($string_exp,$voornaam)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
 

  if(strlen($bericht) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Naam: ".clean_string($naam)."\n";
    $email_message .= "Voornaam: ".clean_string($voornaam)."\n";
    $email_message .= "Email: ".clean_string($email)."\n";
    $email_message .= "Bericht: ".clean_string($bericht)."\n";

$headers = 'From: '.$email."\r\n".
'Reply-To: '.$email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
    
    echo 'The message has been sent. Thank you.'
    
?>


<?php
}
?>
