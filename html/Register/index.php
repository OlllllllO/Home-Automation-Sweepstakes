<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- Add to Head -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registration</title>
<?php include 'lang/language_en.php';?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src='//www.google.com/recaptcha/api.js'></script>
<script src="assets/js/jquery-1.9.1.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
<!-- jQuery Form Validation code -->
<script type="text/javascript" language="JavaScript">
<!--
//File upload button
$(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
// Phone allows for internatonal numbers and ext 
jQuery.validator.addMethod("phone", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, ""); 
  return this.optional(element) || phone_number.length > 9 &&
    phone_number.match(/^((\+)?[1-9]{1,2})?([-\s\.\(\)\])?((\(\d{1,4}\))|\d{1,4})(([-\s\.\(\)\])?[0-9]{1,12}){1,2}(\s*(ext|x)\s*\.?:?\s*([0-9]+))?$/);
}, "<?php echo $feedback_02;?>");

// Removes Error Message When reCaptcha is Checked Valid
function recaptchaCallback() {
  $('#hiddenRecaptcha').valid();
};

// Set Max File Attachment Size 
$.validator.addMethod(
    "maxfilesize",
    function (value, element) {
        return this.optional(element) || (element.files && element.files[0]
                               && element.files[0].size < 1024 * 1024 * 4); // Set the * 4) 4MB to max mb and test
    },
    'Maximum file size limit is 4MB'
);

$(function () {
   
$("#jqbsForm").validate({
        ignore: ".ignore",
    
        invalidHandler : function() {
            $('html, body').animate({
                scrollTop: $("#jqbsForm").offset().top // scroll top to your form on error
            }, 'slow' );
        },
        // Specify the validation rules
        rules: {
           fullname: { //Fullname
                required: true,
                minlength: 3
            },
            email: { //Email
                required: true,
                email: true
            },
            phone: { //Phone
          required: true, // true to require
                minlength: 6
            },
      file: { // Attachment 1
                required: false, // required: false not a required field, required: true required field
                accept: "jpg|jpe|jpeg|png|mp3|wav|aac|rtf|odt|doc|docx|pdf|txt|html", // Add file types you wish to accept
                maxfilesize: true  // Set false if unlimited size
            },
            comment: { //Message
                required: false,
                minlength: 0,
                maxlength: 160
      },
      hiddenRecaptcha: {
                required: function () {
                if (grecaptcha.getResponse() == '') {
                     return true;
                } else {
                     return false;
          }
        }       
           },
       },

        // Specify the validation error messages
        messages: {
            fullname: {
                required: "<?php echo $feedback_03;?>",
                minlength: "<?php echo $feedback_04;?>"
            },
            email: {
                required: "<?php echo $feedback_05;?>",
                email: "<?php echo $feedback_06;?>"
            },
            phone: {
                minlength: "<?php echo $feedback_07;?>"
            },
      file: { // Attachment 1 message
                required: "<?php echo $feedback_08;?>", // Required will only show up if rules are set to true required above
                accept: "<?php echo $feedback_09;?>"
            },
      comment: {
                required: "<?php echo $feedback_10;?>",
                minlength: "<?php echo $feedback_11;?>",
                maxlength: "<?php echo $feedback_12;?>"
            },
      hiddenRecaptcha: {
                required: "<?php echo $feedback_13;?>"
            },
      submitHandler: function(form) // CALLED ON SUCCESSFUL VALIDATION
                {
                window.location.replace='/'; // Add your custom form submitted redirect page full path here the forward slash / will redirect to your home page
      }
        },
   });

});
// Counter
function limitText(limitField, limitCount, limitNum) {
    if (limitField.value.length > limitNum) {
        limitField.value = limitField.value.substring(0, limitNum);
    } else {
        limitCount.value = limitNum - limitField.value.length;
    }
}

// Focus
(function() {

  // Create input element for testing
  var inputs = document.createElement('input');
  
  // Create the supports object
  var supports = {};
  
  supports.autofocus   = 'autofocus' in inputs;
  supports.required    = 'required' in inputs;
  supports.placeholder = 'placeholder' in inputs;

  // Fallback for autofocus attribute
  if(!supports.autofocus) {
    
  }
  
  // Fallback for required attribute
  if(!supports.required) {
    
  }

  // Fallback for placeholder attribute
  if(!supports.placeholder) {
    
  }

})();
// Textarea Coubtdown
function limitTextCount(limitField_id, limitCount_id, limitNum)
{
    var limitField = document.getElementById(limitField_id);
    var limitCount = document.getElementById(limitCount_id);
    var fieldLEN = limitField.value.length;

    if (fieldLEN > limitNum)
    {
        limitField.value = limitField.value.substring(0, limitNum);
    }
    else
    {
        limitCount.innerHTML = (limitNum - fieldLEN) + ' Countdown';
    }
}
-->
</script>
<style type="text/css">
.outer-margin {
   margin:3px;
}
.container{
  max-width:500px;
  }
::-webkit-input-placeholder {
    color:#888;
}
:-moz-placeholder {
    color:#888;
}
::-moz-placeholder {
    color:#888;
}
:-ms-input-placeholder {
    color:#888;
}
/* Placeholder disappears on focus */
input:focus::-webkit-input-placeholder  {color:transparent !IMPORTANT;}
input:focus::-moz-placeholder   {color:transparent !IMPORTANT;}
input:-moz-placeholder   {color:transparent !IMPORTANT;}
textarea:focus::-webkit-input-placeholder  {color:transparent !IMPORTANT;}
textarea:focus::-moz-placeholder   {color:transparent !IMPORTANT;}
textarea:-moz-placeholder   {color:transparent !IMPORTANT;}
textarea{ height:70px !IMPORTANT;}
input.file[type="text"] {
  background-color:white;
  border-radius:3px !IMPORTANT;    
}
.input-row {
  display:block;
  min-height:85px;
  margin-bottom:-5px;
}
#bg {
  width: 10; 
  height: 10;
}
.style1
        {
            
    background-size:100%;
    background-color: #FFFFFF;
    background-position: top;
        }
</style>
<!-- End Head -->
</head>
<body class="style1">
<!-- Place All in Body -->
<div class="outer-margin">
  
<table align="center">
<tr align="center">
<center><h1><font><?php echo "$heading_01"; ?></font></h1><a href="index_de.php">Switch to German</a></center>

</br>
</br>
<center><h2><?php echo "$heading_02"?></h2></center>

<p><center><?php echo $heading_03;?></center></p>
<center><?php echo $heading_03a;?></center>
<center><?php echo $heading_03b;?></center>

<center><?php echo $disclaim_01;?></center>
</br>
  </tr>
<tr align="center">
  <td>
  <div class="input-column">
    <img src="pic.jpg" alt="Portrait">  
  </div>
  </td>
  <td>
      <div class="container jfbs-form">
    <form name="jqbsForm" id="jqbsForm" action="assets/formmailatt.php" method="post" enctype='multipart/form-data' autocomplete="on">
      <!-- Text input-->
      <div class="input-row">
        <label class="control-label" for="fullname"><?php echo $label_01;?></label>
        <div class="inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input  name="fullname" autofocus="autofocus" id="fullname" placeholder="Full Name *" class="form-control" type="text">
          </div>
          <label style="color:red; font-weight:normal;" class="error" for="fullname" generated="true"></label>
        </div>
      </div>
      <!-- Text input-->
      <div class="input-row">
        <label class="control-label" for="email"><?php echo $label_02;?></label>
        <div class="inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
            <input name="email" id="email" placeholder="Email *" class="form-control" type="text">
          </div>
          <label style="color:red; font-weight:normal;" class="error" for="email" generated="true"></label>
        </div>
      </div>
      <!-- Text input-->
      <div class="input-row">
        <label class="control-label" for="phone"><?php echo $label_03;?></label>
        <div class="inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
            <input name="phone" id="phone" placeholder="Cell Phone" class="form-control optional phone" type="text">
          </div>
          <label style="color:red; font-weight:normal;" class="error" for="phone" generated="true"></label>
        </div>
      </div>
      
      <!-- Text area dashdasharrow -->
      <div style="display:block; min-height:120px; margin-top:-5px;">
        <label class="control-label" for="comment"><?php echo $label_04;?></label>
        <div class="inputGroupContainer">
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
            <textarea class="form-control" name="comment" id="comment" placeholder="Message *" onKeyUp="limitTextCount('comment', 'divcount', 160);" onKeyDown="limitTextCount('comment', 'divcount', 160);"></textarea>
          </div>
          <span id="divcount" style="font-size:0.8em; color:#999999; margin-top:4px; float:right;"><?php echo $label_05;?></span>
          <label style="color:red; font-weight:normal;" class="error" for="comment" generated="true"></label>
        </div>
      </div>
      <!-- NoCaptcha dashdasharrow 
      <div style="display:block; min-height:130px;">
        <label class="control-label" for="hiddenRecaptcha">Security</label>
        <!-- Google No Captcha Human Security Scripts dashdasharrow 
        <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
        <div class="g-recaptcha" data-theme="Light" data-sitekey="6LeB6RIUAAAAAJ3S-5f6_4Z8zFqqPv1ky8vqq1pk" data-callback="recaptchaCallback" style="transform:scale(0.90);-webkit-transform:scale(0.90);transform-origin:0 0;-webkit-transform-origin:0 0; color:transparent; font-weight:normal; line-height:0px;" tabindex="6"> </div>
        <div>
          <label style="color:red; font-weight:normal; position:relative; top:-10px;" class="error" for="hiddenRecaptcha" generated="true"></label>
        </div>
      </div>
      <!-- Button -->
      <div class="input-row" style="margin-bottom:-20px;">
        <div>
          <!-- For sliver button change btn-primary to btn-default - you can add button width:100%; for full width button -->
          <input type="submit" value="Submit" class="btn btn-primary" style="width:100%; position:relative;">
        </div>
        <table>
  <tr>
  <span id="divcount" style="font-size:0.8em; color:#999999; margin-top:4px; float:right;"><center><?php echo $disclaim_02;?><i><a href="/Register/assets/ELC Dragonboard Sweeps 2017-Final.htm">Official Sweepstake Rules</a></i><?php echo $disclaim_03;?></center></span>
</tr>
</table>
      </div>
    </form>
  </div>
  </td>
</tr>
  </table>

</div>
</body>
</html>
