console.log("js working...");
const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

function closeAlert(){
	$('#alert').css('display', 'none')
	console.log('Alert closed');
}

function signinContainer(){
	console.log("signinContainer..")
	$('.signup-fields').css('display', 'none');
	$('.signup-image').css('display', 'none');
	$('.signin-fields').css('display', 'initial');
	$('.signin-image').css('display', 'initial');
}
function signupContainer(){
	console.log("signupContainer..")
	$('.signup-fields').css('display', 'initial');
	$('.signup-image').css('display', 'initial');
	$('.signin-fields').css('display', 'none');
	$('.signin-image').css('display', 'none');
}

function home(){
	window.location.href = '../index.php';
}

function preventDefault(data) {
	event.preventDefault();
	if(data == "login"){
		mail = $('#email_login').val()
		pass = $('#password_login').val()
		if(mail == "" || pass == ""){
			if(mail == ""){
				$("#alert").css('display','initial')
				$("#alert_text").text("Email is Required")
			}else if (pass == ""){
				$("#alert").css('display','initial')
				$("#alert_text").text("Password is Required")
			}
		}
		else{
			$("#alert").css('display','none')
			console.warn(`email=${mail}&password=${pass}`)
			request = $.ajax({
				url: "./../backend/login.php",
				type: "post",
				data: `email_login=${mail}&password_login=${pass}`
			});
			request.done(function (data){
				console.log("Hooray, it worked!", data);
				if(data == "errorUser"){
					$("#alert").css('display','initial')
					$("#alert_text").text("Error: User not Found, please check email or password")
				}
				else{
					$("#alert").css('display','initial')
					$("#alert_text").text("Successfully, Welcome Back")
					setTimeout(() => { document.location.reload(); }, 2000);
				}
			});
			request.fail(function (data){
				console.log("User not Found");
				$("#alert").css('display','initial')
				$("#alert_text").text('User not Found')
			});
		}
	}
	else if(data == "signup"){
		console.log("post for signup...")
		fname = $('#name').val()
		username = $('#username').val()
		mail = $('#email').val()
		pass = $('#password').val()
		Cpass = $('#confirm_password').val()
		if (fname == ""){
			$("#alert").css('display','initial')
			$("#alert_text").text("Name is Required")
		}else if (username == ""){
				$("#alert").css('display','initial')
				$("#alert_text").text("username is Required")
		}else if(mail == ""){
			$("#alert").css('display','initial')
			$("#alert_text").text("Email is Required")
		}else if (pass == ""){
			$("#alert").css('display','initial')
			$("#alert_text").text("Password is Required")
		}else if (Cpass == ""){
			$("#alert").css('display','initial')
			$("#alert_text").text("Confirm Password is Required")
		}
		else{
			console.log(`name=${fname}&username=${username}&email=${mail}&password=${pass}&confirm_password=${Cpass}`)
			$("#alert").css('display','none')
			request = $.ajax({
				url: "./../backend/signup.php",
				type: "post",
				data: `name=${fname}&username=${username}&email=${mail}&password=${pass}&confirm_password=${Cpass}`
			});
			request.done(function (data){
				console.log("Hooray, it worked!", data);
				if(data == "1"){
					$("#alert").css('display','initial')
					$("#alert_text").text("Passwords should match")
				}
				else if(data == "2"){
					$("#alert").css('display','initial')
					$("#alert_text").text("This username is already taken")
				}
				else if(data == "3"){
					$("#alert").css('display','initial')
					$("#alert_text").text("This email is already registered")
				}else{
					$("#alert").css('display','initial')
					$("#alert_text").text("Awesome! Your email has been registered")
				}
			});
		}
	}
	else if(data == "pubForm"){
		console.log("pubForm")
	}
}

if(window.history.replaceState)
{
	window.history.replaceState(null, null, window.location.href);
}

function preference()
{	
	console.log("preference..");
	if ($('#preference').prop('checked')) {
		$('#navbar').css('background', '#0c0c0c');
		$('#navbar').css('color', 'white')
		$('nav ul li .fcka').css('color', 'white')
		$('body, .container-dashboard').css('background', '#222222')
		document.cookie="preference=checked"
	  } else {
		$('#navbar').css('background', 'white');
		$('#navbar').css('color', 'black')
		$('nav ul li .fcka').css('color', 'black')
		$('body, .container-dashboard').css('background', 'whitesmoke')
		document.cookie="preference=unchecked"
	  }
}

// Mobile NavBar Items Show
function navbarForMobile(){
	if($('#mobile_hb_items').hasClass('show')){
	  console.log('hide navbarForMobile')
	  $('#mobile_hb_items').removeClass('show')
	  $('#mobile_hb_items').css('display', 'none')
	  $('body').css('overflow', '')
	}
	else{
	  console.log('show navbarForMobile')
	  $('#mobile_hb_items').addClass('show')
	  $('#mobile_hb_items').css('display', 'initial')
	  $('body').css('overflow', 'hidden')
	}
  }



// setTimeout(function() {
// 	console.log("timer...")
//     var prefer = $.cookie("preference");
//     console.log(prefer);
//     if (prefer == "checked") {
//         preferenceFromcookie("checked");
//     } else {
//         preferenceFromcookie("unchecked");
//         console.log("unchecked");
//     }
// }, 2000); // 2000 milliseconds = 2 seconds


// function preferenceFromcookie(preferenceCookie){
// 	if(preferenceCookie == 'checked'){
// 		$('#navbar').css('background', '#0c0c0c');
// 		$('#navbar').css('color', 'white')
// 		$('nav ul li .fcka').css('color', 'white')
// 	}else if(preferenceCookie = 'unchecked'){
// 		$('#navbar').css('background', 'white');
// 		$('#navbar').css('color', 'black')
// 		$('nav ul li .fcka').css('color', 'black')
// 	}
// }

// console.log(prefer)