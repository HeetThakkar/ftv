<?php 
session_start();
setcookie('id',"", time() - (3600 * 24 * 30), "/");
unset ($_COOKIE['id']);
?>
  <script>
       
       window.location.href = 'index.php';
  
</script>
<?php 
$output='';
$output.="
<div class='opt_main'>
    
<p class='opt opt1'>Register</p>
<p class='opt opt2'>Login</p>
</div>
<div class='form_div form_div1'>
<form id='registration_form'>
    <input type='text' placeholder='Full Name*' name='name' class='log_inp name_inp'>
    <p class='error error1'></p>
    <input type='text' placeholder='Email*' name='email' class='log_inp email_inp'>
    <p class='error error2'></p>

    <input type='text' placeholder='Username*' name='username' class='log_inp username_inp'>
    <p class='error error3'></p>

    <input type='text' placeholder='Mobile*' name='mobile' class='log_inp mobile_inp'>
    <p class='error error4'></p>

    <input type='password' placeholder='Password*' name='password' class='log_inp password_inp'>
    <p class='view'>view</p>
    <p class='error error5'></p>

    <input type='password' placeholder='Confirm Password*' name='cpassword' class='log_inp cpassword_inp'>
    <p class='error error6'></p>

    <input type='text' class='captcha_value captcha_value3 log_inp' id='txtCaptcha3' style='background-image:url(images/bg_captcha.jpg); text-align:center; border:none; font-weight: bold; font-family:Modern' onclick='DrawCaptcha3();'/>
    <input type='text' placeholder='Enter Captcha*' id='txtInput3' name='captcha' class='log_inp'>
    <p class='error error7' id='error7'></p>
    
    <div class='main_sub'><input type='buton' class='bot_sub bot_sub1' value='Submit' id=''> </div>
</form>
</div>
<div class='form_div form_div2'>
<form id='login_form'>
    <input type='text' placeholder='Email/Username*' name='email' class='log_inp email_inp1'>
    <p class='error error8'></p>           
    <input type='password' placeholder='Password*' name='' class='log_inp password_inp1'>
    <p class='view'>view</p>

    <p class='error error9'></p>
    <input type='text' class='captcha_value captcha_value3 log_inp' id='txtCaptcha4' style='background-image:url(images/bg_captcha.jpg); text-align:center; border:none; font-weight: bold; font-family:Modern' onclick='DrawCaptcha3();'/>
    <input type='text' placeholder='Enter Captcha*' name='captcha' class='log_inp' id='txtInput4' >
    <p class='error error10' id='error10'></p>

    <div class='main_sub'><input type='radio' value='yes' name='remember'>Remember Me </div>
    <div class='main_sub'><input type='buton' class='bot_sub bot_sub2' value='Submit' id=''> </div>
</form>
</div>



";


session_destroy();
echo $output;
?>