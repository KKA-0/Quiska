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

function closeAlert() {
	$('#alert').css('display', 'none')
	console.log('Alert closed');
}

function signinContainer() {
	console.log("signinContainer..")
	$('.signup-fields').css('display', 'none');
	$('.signup-image').css('display', 'none');
	$('.signin-fields').css('display', 'initial');
	$('.signin-image').css('display', 'initial');
}
function signupContainer() {
	console.log("signupContainer..")
	$('.signup-fields').css('display', 'initial');
	$('.signup-image').css('display', 'initial');
	$('.signin-fields').css('display', 'none');
	$('.signin-image').css('display', 'none');
}

function home() {
	window.location.href = '../index.php';
}

function preventDefault(data) {
	event.preventDefault();
	if (data == "login") {
		mail = $('#email_login').val()
		pass = $('#password_login').val()
		if (mail == "" || pass == "") {
			if (mail == "") {
				$("#alert").css('display', 'initial')
				$("#alert_text").text("Email is Required")
			} else if (pass == "") {
				$("#alert").css('display', 'initial')
				$("#alert_text").text("Password is Required")
			}
		}
		else {
			$("#alert").css('display', 'none')
			console.warn(`email=${mail}&password=${pass}`)
			request = $.ajax({
				url: "./../backend/login.php",
				type: "post",
				data: `email_login=${mail}&password_login=${pass}`
			});
			request.done(function (data) {
				console.log("Hooray, it worked!", data);
				if (data == "errorUser") {
					console.warn(data);
					$("#alert").css('display', 'initial')
					$("#alert_text").text("Error: User not Found, please check email or password")
				}
				else if (data == "google") {
					$("#alert").css('display', 'initial')
					$("#alert_text").text("Incorrect Password")
					// setTimeout(() => { document.location.reload(); }, 2000);
				}
				else {
					console.warn(data);
					$("#alert").css('display', 'initial')
					$("#alert_text").text("Success, Welcome Back")
					setTimeout(() => { document.location.reload(); }, 2000);
				}
			});
			request.fail(function (data) {
				console.log("User not Found");
				$("#alert").css('display', 'initial')
				$("#alert_text").text('User not Found')
			});
		}
	}
	else if (data == "signup") {
		console.log("post for signup...")
		fname = $('#name').val()
		username = $('#username').val()
		mail = $('#email').val()
		pass = $('#password').val()
		Cpass = $('#confirm_password').val()
		if (fname == "") {
			$("#alert").css('display', 'initial')
			$("#alert_text").text("Name is Required")
		} else if (username == "") {
			$("#alert").css('display', 'initial')
			$("#alert_text").text("username is Required")
		} else if (mail == "") {
			$("#alert").css('display', 'initial')
			$("#alert_text").text("Email is Required")
		} else if (pass == "") {
			$("#alert").css('display', 'initial')
			$("#alert_text").text("Password is Required")
		} else if (Cpass == "") {
			$("#alert").css('display', 'initial')
			$("#alert_text").text("Confirm Password is Required")
		}
		else {
			console.log(`name=${fname}&username=${username}&email=${mail}&password=${pass}&confirm_password=${Cpass}`)
			$("#alert").css('display', 'none')
			request = $.ajax({
				url: "./../backend/signup.php",
				type: "post",
				data: `name=${fname}&username=${username}&email=${mail}&password=${pass}&confirm_password=${Cpass}`
			});
			request.done(function (data) {
				console.log("Hooray, it worked!", data);
				if (data == "1") {
					$("#alert").css('display', 'initial')
					$("#alert_text").text("Passwords should match")
				}
				else if (data == "2") {
					$("#alert").css('display', 'initial')
					$("#alert_text").text("This username is already taken")
				}
				else if (data == "3") {
					$("#alert").css('display', 'initial')
					$("#alert_text").text("This email is already registered")
				} else {
					$("#alert").css('display', 'initial')
					$("#alert_text").text("Awesome! Your email has been registered")
				}
			});
		}
	}
	else if (data == "pubForm") {
		console.log("pubForm")
		var pubName = $('#pubName').val()
		var pubMess = $("#pub-textarea").val()
		if (pubMess == "") {
			$("#alert").css('display', 'initial')
			$("#alert_text").text("Type a Message!")
		}
		else {
			if (pubName == "") {
				pubName = "Anomalous";
			}
			console.log("Public form ready to be send...");
			request = $.ajax({
				url: './backend/pubform.php',
				type: 'post',
				data: `name=${pubName}&mess=${pubMess}`
			});
			request.done(function (data) {
				console.log("Request Success", data);
				$('#alert').css('display', 'initial');
				$('#alert_text').text('Awesome! Your Comment Added!')
				$('#pubName').val("")
				$("#pub-textarea").val("")
			})
		}
	}
	else {
		$("#alert").css('display', 'initial')
		$("#alert_text").text("Unknown Request!")
	}
}

if (window.history.replaceState) {
	window.history.replaceState(null, null, window.location.href);
}

function preference() {
	console.log("preference..");
	if ($('#preference').prop('checked')) {
		$('#navbar').css('background', '#0c0c0c');
		$('#navbar').css('color', 'white')
		$('nav ul li .fcka').css('color', 'white')
		$('body, .container-dashboard').css('background', '#222222')
		document.cookie = "preference=checked"
	} else {
		$('#navbar').css('background', 'white');
		$('#navbar').css('color', 'black')
		$('nav ul li .fcka').css('color', 'black')
		$('body, .container-dashboard').css('background', 'whitesmoke')
		document.cookie = "preference=unchecked"
	}
}

// Mobile NavBar Items Show
function navbarForMobile() {
	if ($('#mobile_hb_items').hasClass('show')) {
		console.log('hide navbarForMobile')
		$('#mobile_hb_items').removeClass('show')
		$('#mobile_hb_items').css('display', 'none')
		$('body').css('overflow', '')
	}
	else {
		console.log('show navbarForMobile')
		$('#mobile_hb_items').addClass('show')
		$('#mobile_hb_items').css('display', 'initial')
		$('body').css('overflow', 'hidden')
	}
}

function sayitLinkCopy() {
	$("#alert").css('display', 'initial')
	$("#alert_text").text("Link Copied to ClipBoard")
	navigator.clipboard.writeText($("#sayit_link").val());
}

function closeTutorial() {
	console.log("closeTutorial")
	$(".quizOptionsSettings").css('display', 'none')
}
function addQuizOption() {
	const nodeList = document.querySelectorAll(".answer-input");
	const total_input = nodeList.length;
	console.log(total_input);

	if (total_input === 2) {
		$('.add-options').append(`<input type="text" onchange="previewTitleUpdate()" class="answer-input" id="OptionC" placeholder="Option C">`)
		$('.optionsDivPreview').append(`<div class="option ansOptionsDiv">
	  <span class="ansPreviewText" id="ansPreviewText_C">Option C</span>
  </div>`)

	} else if (total_input === 3) {
		$('.add-options').append(`<input type="text" onchange="previewTitleUpdate()" class="answer-input" id="OptionD" placeholder="Option D">`)
		$('.optionsDivPreview').append(`<div class="option ansOptionsDiv">
		<span class="ansPreviewText" id="ansPreviewText_D">Option D</span>
	</div>`)
	} else {
		alert("Maximum number of attempts reached");
		console.log("Else is working");
	}
}

function previewTitleUpdate() {
	titleValue = $('.question-input').val()
	$('#titlePreviewText').text(titleValue)
	ansAvalue = $('#OptionA').val()
	$('#ansPreviewText_A').text(ansAvalue)
	ansBvalue = $('#OptionB').val()
	$('#ansPreviewText_B').text(ansBvalue)
	ansCvalue = $('#OptionC').val()
	$('#ansPreviewText_C').text(ansCvalue)
	ansDvalue = $('#OptionD').val()
	$('#ansPreviewText_D').text(ansDvalue)
}