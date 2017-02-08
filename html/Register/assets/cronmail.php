<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//require_once('Mail.php');
//require_once('Mail/mime.php');
require '../PHPMailer/PHPMailerAutoload.php';
 //$from = "Qualcomm<@infotrak.us>";

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
			$mail->Password   = "gmail4c_rmistr";            // GMAIL password
			$mail->IsHTML(true);
			$mail->CharSet = 'UTF-8';

			$mail->SetFrom('ELC@portland.com', 'Qualcomm DragonBoard™ 410c Sweepstakes');

			$mail->AddReplyTo("dragonboard410csweepstakes@gmail.com","Qualcomm DragonBoard™ 410c Sweepstakes");

			$mail->Subject    = $subject;

			//$mail->AltBody    = $body; // optional, comment out and test

			$mail->MsgHTML($body);

			$address = $to;
			$mail->AddAddress($address, $fullname);
      $mail->Addcc("c_rmistr@qti.qualcomm.com","Rajan Mistry");

			$mail->AddAttachment("registration_list.csv");      // attachment
			
			if(!$mail->Send()) {
			  echo "Mailer Error: " . $mail->ErrorInfo;
			} else {
			  echo "Message sent!";
			}

       
} // End Function send_mail() 


    $email = "cjorgens@qti.qualcomm.com";
    $fullname = "Christine";
 
    $to = $email;

 $subject = "Qualcomm DragonBoard™ 410c Sweepstakes Registration list";
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

$body .= "Dear ".$fullname.",</br>";
$body.= '
  <p>Attached is the registration list for the sweepstakes!</br>Please remove duplicates! :)</br></p></td>   
   
  <tr><td>
    <p>Drawings will be held in the Qualcomm booth #(201) once each day: </p>
    <p>Tue, Feb. 21 at 3pm – 4 prizes</p>
    <p>Wed, Feb. 22 at 3pm – 4 prizes</p>
    <p>Thu, Feb. 23 at 1pm – 2 prizes</p>
    
    <p>Entrants must be present at drawing to win. Maximum one prize per entrant for entire Sweepstakes.</p>
    <p style="font-size:14px">NO PAYMENT OR PURCHASE NECESSARY TO ENTER OR WIN.  A PAYMENT OR PURCHASE DOES NOT IMPROVE YOUR CHANCES OF WINNING.  See Official Rules at the Qualcomm booth #(201) at ELC for details, including eligibility requirements and entry deadlines.</p>
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
    send_email($to,$fullname,$subject,$body);
?>