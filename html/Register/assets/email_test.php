<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
 require_once "Mail.php";
 $timenow = microtime(true);
 echo "$timenow<br>";
 $from = "Support<abc@infotrak.us>";
 echo "From : $from<br>";
 $to = "rajan.mistry@live.com";
 echo "To : $to<br>";
 $subject = "Subject: New Email Gateway Test";
 echo "Subject : $subject<br>";
 $body = "This is the Test Body</b>";
 echo "body : $body<br>";
 
 $host = "ssl://smtp.gmail.com";
 $port = "465";
 $username = "rmistr.c@gmail.com";
 $password = "gmail4c_rmistr";
    echo "$host : $username : $password<br>";
 
 $headers = array ('From' => $from,
   'To' => $to,
   'Subject' => $subject);
 $smtp = Mail::factory('smtp',
   array ('host' => $host,
   'port' => $port,
     'auth' => true,
     'username' => $username,
     'password' => $password));
 
// for ($k = 0; $k < 100; $k++){
 $mail = $smtp->send($to, $headers, $body);
//
 if (PEAR::isError($mail)) {
   echo("<p>" . $mail->getMessage() . "</p>");
   
  } else {
   echo("<p>$k Message successfully sent!</p>");

  }
  //}
  $timenow = microtime(true);
 echo "$timenow<br>";





 ?>