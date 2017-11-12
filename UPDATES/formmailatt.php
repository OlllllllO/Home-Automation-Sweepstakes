<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//require_once('Mail.php');
//require_once('Mail/mime.php');
require '../PHPMailer/PHPMailerAutoload.php';
 //$from = "Qualcomm<@infotrak.us>";

?>
<SCRIPT LANGUAGE="JavaScript">
function Minimize() 
{
window.innerWidth = 100;
window.innerHeight = 100;
window.screenX = screen.width;
window.screenY = screen.height;
alwaysLowered = true;
}
function Closeme()
{
  var popup = window.open(location, '_self', '');
popup.close();
popup.blur();
}
</SCRIPT>
<?php

function send_email($to, $fullname, $subject, $body) { 
       
         
        $mail             = new PHPMailer();

        $mail->IsSMTP(); // telling the class to use SMTP
      $mail->Host       = "gmail.com"; // SMTP server
      $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
                                                 // 1 = errors and messages
                                                 // 2 = messages only
      $mail->SMTPAuth   = true;                  // enable SMTP authentication
      $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
      $mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
      $mail->Port       = 587;                   // set the SMTP port for the GMAIL server
      $mail->Username   = "dragonboard410csweepstakes@gmail.com";  // GMAIL username
      $mail->Password   = "";            // GMAIL password
      $mail->IsHTML(true);
      $mail->CharSet = 'UTF-8';

      $mail->SetFrom('QualcommBooth@IoTAustin.com', 'Qualcomm DragonBoard™ 410c Sweepstakes');

      $mail->AddReplyTo("dragonboard410csweepstakes@gmail.com","Qualcomm DragonBoard™ 410c Sweepstakes");

      $mail->Subject    = $subject;

      //$mail->AltBody    = $body; // optional, comment out and test

      $mail->MsgHTML($body);

      $address = $to;
      $mail->AddAddress($address, $fullname);

      $mail->AddAttachment("../pic.jpg");      // attachment
      
      if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
      } else {
        echo "Message sent!";
      }

       
} // End Function send_mail() 


if ($_SERVER['REQUEST_METHOD']=="POST"){

 
   
   // here, we'll start the message body.
   // this is the text that will be displayed
   // in the e-mail
   // validation expected data exists
   
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
 
    $email = $_POST['email']; // required
 
    $phone = $_POST['phone']; // not required
 
    $comment = $_POST['comment']; // required
 
    $message = "Form results.\n\n"; // Email Heading
     
     date_default_timezone_set("America/Los_Angeles");
      $time = date("m/d/Y h:i:sa");
     
                // write the information to the csv file

                  $list = array (
                    array($fullname,$email,$phone,$comment,$time)
                  );
                //print_r($list);
                  $fp = fopen('registration_list.csv', 'a');

                foreach ($list as $fields) {
                  fputcsv($fp, $fields);
                }

                fclose($fp);

 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }  
 
    $to = $email;
 $subject = "Qualcomm DragonBoard™ 410c Sweepstakes";
 //$body = "Dear ".clean_string($fullname).",\n";
 $body = '
 <html>
<head>
<title>email message</title>
<meta charset="utf-8" http-equiv="Content-Type" content="text/html;">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
<tr>
    <td align="left">';

$body .= "Dear ".clean_string($fullname).",</br>";
$body.= '
  <p>Thank you for your entry to the Qualcomm DragonBoard™ 410c Sweepstakes.  You have been entered for a Chance to Win one DragonBoard™ 410c development board by Arrow Electronics, featuring the Qualcomm® Snapdragon™ 410 processor from Qualcomm Technologies, Inc.</br></p></td>   
   
  <tr><td>
    <p>Drawings will be held in the Qualcomm booth #(140) once each day: </p>
    <p>Tue, Mar. 28 at 5pm – 2 prizes</p>
    <p>Wed, Mar. 29 at 3:30pm – 2 prizes</p>
    <p>Entrants must pick up their prize in person within one hour after the drawing time for that day. Maximum one prize per entrant for entire Sweepstakes.</p>
    <p>Learn more about the DragonBoard 410c at <i><a href="www.96Boards.org/dragonboard">www.96Boards.org/dragonboard</a></i>, and check out DragonBoard 410c projects and source code examples at <i><a href="www.developer.qualcomm.com/project">www.developer.qualcomm.com/project</a></i>.</p>
    <p style="font-size:14px">NO PAYMENT OR PURCHASE NECESSARY TO ENTER OR WIN.  A PAYMENT OR PURCHASE DOES NOT IMPROVE YOUR CHANCES OF WINNING.  See Official Rules at the Qualcomm booth #(140) at Enterprise IoT Summit for details, including eligibility requirements and entry deadlines.</p>
  </td></tr>
  </tr>
    <td>
    <p style="font-size:14px">
    </br>This email was sent by:</br>
    Qualcomm Technologies, Inc.</br>
    5775 Morehouse Drive</br>
    San Diego, CA 92121</br>
    USA</br></br>
    © 2017 Qualcomm Technologies, Inc. All rights reserved.
    Nothing in these materials is an offer to sell any of the components or devices referenced herein. Qualcomm is a registered trademark of Qualcomm Incorporated, used with permission.
    Other trademarks are property of their respective owners. Qualcomm products and/or services referenced herein are property of Qualcomm Technologies, Inc. or its subsidiaries.
    </p></td>
 <tr bgcolor="#ECECEC" align="center">
 <td>
    <a href="http://path.qualcomm.com/Q0tS0YW0Tl1D00m0C00j590">Privacy</a>  |   <a href="http://path.qualcomm.com/p0500T00kS000mmWCD09Yt1">Terms of Use  </a>
    </td></tr>
</table>

</body>
</html>
 ';
    //send_email($to,$fullname,$subject,$body);



?>



<!-- include your own success html here - will only show if redirct fails -->
<center><h1>Thank you for your entry to the DragonBoard™ 410c Sweepstakes!</h1></center>
<center><h2>Your entry form has been submitted.</h2></center> 
<center><h2>Drawings will be held in the Arrow stand #33 once each day:</h2></center>
<center><h2>Sat, Aug. 26 at 16:00 – 5 prizes</h2></center>
<center><h2>Sun, Aug. 27 at 16:00 – 5 prizes</h2></center>
<center><h2>Entrants must pick up their prize in person within one hour after the drawing time for that day. Maximum one prize per entrant for entire Sweepstakes.</h2></center>

<center><h1>Danke für deine Teilnahme am Arrow Gewinnspiel für ein DragonBoard™ 410c</h1></center>
<center><h2>Deine Registrierung war erfolgreich.</h2></center> 
<center><h2>Die Zeihung der Gewinner erfolgt am Arrow-Stand (#33):</h2></center>
<center><h2>Samstag, Aug. 26 at 16:00 – 5 prizes</h2></center>
<center><h2>Sonntag, Aug. 27 at 16:00 – 5 prizes</h2></center>
<center><h2>Teilnehmer müssen den Preis persönlich am gleichen Tag entgegen nehmen. Pro Teilnehmer ist nur eine Registrierung möglich.</h2></center>

<?php
// echo "$body";
$deletethis = "../pic.jpg";
unlink($deletethis);
}
 
?>
<SCRIPT LANGUAGE="JavaScript">
setTimeout('Closeme()',5000);
</script>