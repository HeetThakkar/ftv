<?php 
		include('config.php');

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">  
    <link rel="stylesheet" type="text/css" href="css/style.css">  

    <title>Document</title>
</head>
<body onload="DrawCaptcha3();">
<section class="main_sec">
<div class='main_login_container'>

<div class='login_main'>
<?php  if(!isset($_SESSION['id']) && !isset($_COOKIE['id']) ) { ?>  
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

            <input type="text" class="captcha_value captcha_value3 log_inp" id="txtCaptcha3" style="background-image:url(images/bg_captcha.jpg); text-align:center; border:none; font-weight: bold; font-family:Modern" onclick="DrawCaptcha3();"/>
            <input type='text' placeholder='Enter Captcha*' id='txtInput3' name='captcha' class='log_inp'>
            <p class='error error7' id='error7'></p>
            
            <div class='main_sub'><input type='buton' class='bot_sub bot_sub1' value='Submit' id='bot_sub1'> </div>
        </form>
    </div>
    <div class='form_div form_div2'>
        <form id='login_form'>
            <input type='text' placeholder='Email/Username*' name='email' class='log_inp email_inp1'>
            <p class='error error8'></p>           
            <input type='password' placeholder='Password*' name='' class='log_inp password_inp1'>
            <p class='view'>view</p>

            <p class='error error9'></p>
            <input type="text" class="captcha_value captcha_value3 log_inp" id="txtCaptcha4" style="background-image:url(images/bg_captcha.jpg); text-align:center; border:none; font-weight: bold; font-family:Modern" onclick="DrawCaptcha3();"/>
            <input type='text' placeholder='Enter Captcha*' name='captcha' class='log_inp' id='txtInput4' >
            <p class='error error10' id="error10"></p>

            <div class='main_sub'><input type='radio' value='yes' name="remember">Remember Me </div>
            <div class='main_sub'><input type='buton' class='bot_sub bot_sub2' value='Submit' id='bot_sub2'> </div>
        </form>
    </div>


    <?php  }

    else{ ?>
        <script>
       
            window.location.href = 'home.php';
       
    </script>

   <?php  }
    ?>
</div>
</div>
</section>


<script type="text/javascript">

//Created / Generates the captcha function

function DrawCaptcha3() {

    var a = Math.ceil(Math.random() * 6) + '';

    var b = Math.ceil(Math.random() * 6) + '';

    var c = Math.ceil(Math.random() * 6) + '';

    var d = Math.ceil(Math.random() * 6) + '';

    var e = Math.ceil(Math.random() * 6) + '';

    var f = Math.ceil(Math.random() * 6) + '';

    var g = Math.ceil(Math.random() * 6) + '';

    var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' ' + f;

    document.getElementById("txtCaptcha3").value = code
    document.getElementById("txtCaptcha4").value = code

    function check3() {

var input = document.getElementById("txtInput3")

console.log(input.value);



var cap = removeSpaces(document.getElementById('txtCaptcha3').value);

if (input.value == cap) {

    $.ajax({

        type: "post",

        data: $("#getaquoteform").serialize(),

        url: "mailactionnew1.php",

        success: function(res) {

            $(".gaqerror").html(res)

        },

        error: function(res) {

            console.log(res)

        }

    })

} else if (!input.value) {

    document.getElementById("gaqerror").innerHTML = "please enter captcha";

} else {



    document.getElementById("gaqerror").innerHTML = "invalid captcha";

}

}


}
function removeSpaces(string) {

return string.split(' ').join('');

}

</script>
<script src="js/jquery-3.5.1.min.js"></script>
<script>
	$(document).ready(function() {	


    $(".opt2").click(function(){
	
			$(".opt2").css({"background": "#fff"});
			$(".opt1").css({"background": "#ddd"});
			$(".form_div1").css({"display": "none"});
			$(".form_div2").css({"display": "block"});

});
$(".opt1").click(function(){
	
    $(".opt1").css({"background": "#fff"});
    $(".opt2").css({"background": "#ddd"});
    $(".form_div2").css({"display": "none"});
    $(".form_div1").css({"display": "block"});

});
$(".name_inp").on("keyup",function(){
    $(".error1").html('');
                $(".name_inp").css({"border": "1px solid #ddd"});
    $.ajax({
		type:"post",data:$("#registration_form").serialize(),url:"name-validation.php",success:function(res){
					if (res != "") {
				$(".error1").html(res);
                $(".name_inp").css({"border": "1px solid red"});

			}
			
			
			},error:function(res){console.log(res)}
	})
});
$(".email_inp").on("keyup",function(){
    $(".error2").html('');
                $(".email_inp").css({"border": "1px solid #ddd"});
    $.ajax({
		type:"post",data:$("#registration_form").serialize(),url:"email-validation.php",success:function(res){
					if (res != "") {
				$(".error2").html(res);
                $(".email_inp").css({"border": "1px solid red"});

			}
			
			
			},error:function(res){console.log(res)}
	})
});
$(".username_inp").on("keyup",function(){
    $(".error3").html('');
                $(".username_inp").css({"border": "1px solid #ddd"});
    $.ajax({
		type:"post",data:$("#registration_form").serialize(),url:"username-validation.php",success:function(res){
					if (res != "") {
				$(".error3").html(res);
                $(".username_inp").css({"border": "1px solid red"});

			}
			
			
			},error:function(res){console.log(res)}
	})
});
$(".password_inp").on("keyup",function(){
    $(".error5").html('');
                $(".password_inp").css({"border": "1px solid #ddd"});
    $.ajax({
		type:"post",data:$("#registration_form").serialize(),url:"password-validation.php",success:function(res){
					if (res != "") {
				$(".error5").html(res);
                $(".password_inp").css({"border": "1px solid red"});

			}
			
			
			},error:function(res){console.log(res)}
	})
});
$(".cpassword_inp").on("keyup",function(){
    $(".error6").html('');
                $(".cpassword_inp").css({"border": "1px solid #ddd"});
    $.ajax({
		type:"post",data:$("#registration_form").serialize(),url:"cpassword-validation.php",success:function(res){
					if (res != "") {
				$(".error6").html(res);
                $(".cpassword_inp").css({"border": "1px solid red"});

			}
			
			
			},error:function(res){console.log(res)}
	})
});
$(".mobile_inp").on("keyup",function(){
    $(".error4").html('');
                $(".mobile_inp").css({"border": "1px solid #ddd"});
    $.ajax({
		type:"post",data:$("#registration_form").serialize(),url:"phone-validation.php",success:function(res){
					if (res != "") {
				$(".error4").html(res);
                $(".mobile_inp").css({"border": "1px solid red"});

			}
			
			
			},error:function(res){console.log(res)}
	})
});

$(".logout").on("click",function(){
  
    $.ajax({
		type:"post",data:$("#login_form").serialize(),url:"logout.php",success:function(res){
            $(".login_main").html(res);
        },error:function(res){console.log(res)}
	})
    setTimeout(function(){
    DrawCaptcha3();
},50000);
});
$(".bot_sub2").on("click",function(){

    
var input = document.getElementById("txtInput4")

console.log(input.value);



var cap = removeSpaces(document.getElementById('txtCaptcha4').value);

if (input.value == cap) {
  
  $.ajax({
      type:"post",data:$("#login_form").serialize(),url:"login.php",success:function(res){

        if (res == "Password Does not match" ) {
				$(".error9").html(res);
                $(".password_inp1").css({"border": "1px solid red"});

			}
            else if (res == "User not registered" ) {
				$(".error8").html(res);
                $(".email_inp1").css({"border": "1px solid red"});

			}
        else if (res != ""){
                $(".login_main").html(res);
            }
            else{

            }


      },error:function(res){console.log(res)}
  })
} else if (!input.value) {

document.getElementById("error10").innerHTML = "please enter captcha";

} else {



document.getElementById("error10").innerHTML = "invalid captcha";

}
});


$(".bot_sub1").click(function(){


var input = document.getElementById("txtInput3")

console.log(input.value);



var cap = removeSpaces(document.getElementById('txtCaptcha3').value);

if (input.value == cap) {

 
    $(".error").html('');
    $(".log_inp").css({"border": "1px solid #ddd"});
    $.ajax({
		type:"post",data:$("#registration_form").serialize(),url:"registration-validation.php",success:function(res){
					if (res == "Please Enter Full Name Without Special Characters & Dots" ) {
				$(".error1").html(res);
                $(".name_inp").css({"border": "1px solid red"});

			}
            else if (res == "Please Enter valid Email-Id"  || res=="Email already registered available") {
				$(".error2").html(res);
                $(".email_inp").css({"border": "1px solid red"});

			}
            else if (res == "Enter Country Code Followed by 10 digit mobile number" || res=="Mobile Must contain valid country code including +" || res=="Mobile Must contain  + only once" || res=="Please Enter only 10 Digit Mobile Number Without Space" || res=="Mobile already registered available") {
				$(".error3").html(res);
                $(".mobile_inp").css({"border": "1px solid red"});

			}
            else if (res == "Please Enter Password" || res=="Your Password Must Contain At Least 8 Characters!" || res=="Your Password Must Contain At Least 1 Number!" || res=="Your Password Must Contain At Least 1 Capital Letter!"|| res=="Your Password Must Contain At Least 1 Special Character!") {
				$(".error5").html(res);
                $(".password_inp").css({"border": "1px solid red"});

			}
            else if (res == "Confirm password is required" || res=="Password does not match" ) {
				$(".error6").html(res);
                $(".cpassword_inp").css({"border": "1px solid red"});

			}
            else if (res == "enter username" || res=="Username not available" ) {
				$(".error3").html(res);
                $(".username_inp").css({"border": "1px solid red"});

			}
            else if (res != ""){
                $(".login_main").html(res);
            }
            else{

            }
            

			
			
			},error:function(res){console.log(res)}
	})

} else if (!input.value) {

    document.getElementById("error7").innerHTML = "please enter captcha";

} else {



    document.getElementById("error7").innerHTML = "invalid captcha";

}



});

$('.view').on('mousedown', function() {
    $(".password_inp").attr({"type": "text"});
    $(".password_inp1").attr({"type": "text"});
}).on('mouseup mouseleave', function() {
    $(".password_inp").attr({"type": "password"});
    $(".password_inp1").attr({"type": "password"});

});

});
</script>

</body>
</html>