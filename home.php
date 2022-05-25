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

    <title>Home</title>
</head>
<body>
<section class="main_sec">
<div class='main_login_container'>

<div class='login_main'>
<?php 


if(!isset($_SESSION['id']) && !isset($_COOKIE['id']) ) { ?>
<script>
    window.location.href = 'index.php';

</script>

<?php } else {
if(isset($_SESSION['id'])){
    $id=  $_SESSION['id'];
}
else{
    $id=  $_COOKIE['id'];
}
      
        $sql = "SELECT *
FROM users
WHERE id='$id'  ";
$result = mysqli_query($dbC,$sql);
if(mysqli_num_rows($result)>0){
while ($row = $result->fetch_assoc()) {
        $output="";
	$ip = $_SERVER['REMOTE_ADDR'];

        $output.="<p class='details'>id: ".$_COOKIE['id']."</p>";
        $output.="<p class='details'>Name: ".$row['name']."</p>";
        $output.="<p class='details'>Name: ".$row['name']."</p>";
        $output.="<p class='details'>Email: ".$row['email']."</p>";
        $output.="<p class='details'>Mobile: ".$row['mobile']."</p>";
        $output.="<p class='details'>Username: ".$row['username']."</p>";
        $output.="<p class='details'>IP Address: ".$ip."</p>";
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
        $output.= $details->city.', '. $details->region.', '. $details->country.', Long, Lat :'. $details->loc;
        $output.=" <div class='main_sub'><p class='logout'>Log Out</p> </div>";
        echo $output;
    }
}
}

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