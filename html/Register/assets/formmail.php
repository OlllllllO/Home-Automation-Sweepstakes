<?php
 
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
 
    $email_to = "youremail@domain.com"; // Add your email email@domain.com
 
    $email_subject = "Contact Form"; // Received email subject
 
 // GO TO NEAR BOTTOM OF PAGE AND CHANGE TO YOUR CUSTOM REDIRECT PAGE   
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
     
 
    // validation expected data exists
 
    if(!isset($_POST['fullname']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['phone']) ||
 
        !isset($_POST['comment'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
   
 
    $fullname = $_POST['fullname']; // required
 
    $email_from = $_POST['email']; // required
 
    $phone = $_POST['phone']; // not required
 
    $comment = $_POST['comment']; // required
 
    $email_message = "Form results.\n\n"; // Email Heading
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
     
 
    $email_message .=  "Full Name:".clean_string($fullname)."\n";
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
    $email_message .= "Phone: ".clean_string($phone)."\n";
 
    $email_message .= "comment: ".clean_string($comment)."\n";
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers); 
header('Location: redirect.html'); // your custom redirect after submit, replace redirect.html with full path i.e. http://www.yourdomain.com/redirect.html
 
?>


<!-- include your own success html here - will only show if redirct fails -->
Thank you! <br>
Your submission has been sent.


<?php
 
}
 
?>
