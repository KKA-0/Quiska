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
	else if(data == "sayit") {
		var privMess = $("#sayitSubmit").val()
		var userID = $("#userIDsayitSubmit").text()
		if (privMess == "" || userID == "") {
			$("#alert").css('display', 'initial')
			$("#alert_text").text("Type a Message!")
		}
		else{
			request = $.ajax({
				url: './../backend/sayitSubmit.php',
				type: 'post',
				data: `id=${userID}&message=${privMess}`
			});
			request.done(function (data) {
				console.log("Request Success", data);
				$('#alert').css('display', 'initial');
				$('#alert_text').text('Awesome! Your Comment Added!')
				$('#sayitSubmit').val("")
			})
		}
		$("#alert").css('display', 'initial')
		$("#alert_text").text("Unknown Request!")
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
		// Light Mode
		localStorage.setItem("preference", "true");
		$('#navbar').css('background', 'white');
		$('#greetuser').css('color', 'black');
		$('#navbar').css('color', 'black')
		$('nav ul li .fcka').css('color', 'black')
		$('body, .container-dashboard').css('background', 'whitesmoke')
	} else {
		// Dark Mode
		localStorage.setItem("preference", "false");
		$('#greetuser').css('color', 'white');
		$('#navbar').css('background', '#0c0c0c');
		$('#navbar').css('color', 'white')
		$('nav ul li .fcka').css('color', 'white')
		$('body, .container-dashboard').css('background', '#222222')
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
function closePreviewDiv() {
	console.log("closePreviewDiv")
	$(".previewDiv").css('display', 'none')
	$(".imgShare").empty()
}
function addQuizOption() {
	const nodeList = document.querySelectorAll(".answer-input");
	const total_input = nodeList.length;
	console.log(total_input);
	const delbutton = document.getElementById("button");
	const addbutton = document.getElementById("submit");

	delbutton.style.display = "flex"

	if (total_input === 2) {
		$('.add-options').append(`<input type="text" onchange="previewTitleUpdate()" class="answer-input" id="OptionC" placeholder="Option C">`)
		$('.optionsDivPreview').append(`<div class="option ansOptionsDiv" id="optionDiv_C">
	  <span class="ansPreviewText" id="ansPreviewText_C">Option C</span>
  </div>`)

	} else if (total_input === 3) {
		$('.add-options').append(`<input type="text" onchange="previewTitleUpdate()" class="answer-input" id="OptionD" placeholder="Option D">`)
		$('.optionsDivPreview').append(`<div class="option ansOptionsDiv" id="optionDiv_D">
		<span class="ansPreviewText" id="ansPreviewText_D">Option D</span>
		</div>`)
		addbutton.style.display = "none"
	} else {
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

function delQuizOption() {
	const nodeList = document.querySelectorAll(".answer-input");
	const delbutton = document.getElementById("button");
	const addbutton = document.getElementById("submit");
	const total_input = nodeList.length;
	console.log(total_input);
	if (total_input === 3) {
		$("#OptionC").remove();
		$("#optionDiv_C").remove();
		delbutton.style.display = "none"
		addbutton.style.display = "block"
	} else if (total_input === 4) {
		$("#OptionD").remove();
		$("#optionDiv_D").remove();
		addbutton.style.display = "block"
	} else {
		console.log("main jeet gya")
	}
}

function displayPreviewSayit(data){
	console.log(data)
	$(".previewDiv").css("display","initial")
	$(".previewSayit_title").text(data)
}

function convertDivToImageAndDownload() {
    // Get the DIV element.
    const div = document.querySelector('.previewSayit_Div');
    $("#downloadImgBtn").css("display", "none");
    $("i.fa.icons.fa-times-circle").css("display", "none");
    $("#shareImgBtn").css("display", "none");

    // Create a canvas element with a higher resolution.
    const canvas = document.createElement('canvas');
    const scale = 4; // You can adjust this scale factor for higher resolution.
    canvas.width = div.offsetWidth * scale;
    canvas.height = div.offsetHeight * scale;
    canvas.style.width = div.offsetWidth + 'px';
    canvas.style.height = div.offsetHeight + 'px';
    const context = canvas.getContext('2d');
    context.scale(scale, scale);

    // Create a configuration object for html2canvas.
    const config = {
        scale: scale, // Set the scale factor for higher resolution.
        useCORS: true, // Allow images from different origins (useful for external images).
    };

    // Render the DIV to the canvas with the specified configuration.
    html2canvas(div, config).then(canvas => {
        // Get the canvas image data as a base64 string.
        const imageData = canvas.toDataURL();

        // Create a new anchor element and set its href attribute to the image data.
        const anchor = document.createElement('a');
        anchor.href = imageData;

        // Set the anchor element's download attribute to the desired filename.
        anchor.download = 'preview.png';

        // Click the anchor element to download the image.
        anchor.click();

        // Restore the display of buttons/icons after image generation.
        $("#downloadImgBtn").css("display", "block");
        $("i.fa.icons.fa-times-circle").css("display", "initial");
        $("#shareImgBtn").css("display", "block");
    });
}

function shareImage() {
    const div = document.querySelector('.previewSayit_Div');
    $("#downloadImgBtn").css("display", "none");
    $("i.fa.icons.fa-times-circle").css("display", "none");
    $("#shareImgBtn").css("display", "none");
	$(".previewSayit_Div").css("min-width", "400px");

    // Create a canvas element with a higher resolution.
    const canvas = document.createElement('canvas');
    const scale = 4; // You can adjust this scale factor for higher resolution.
    canvas.width = div.offsetWidth * scale;
    canvas.height = div.offsetHeight * scale;
    canvas.style.width = div.offsetWidth + 'px';
    canvas.style.height = div.offsetHeight + 'px';
    const context = canvas.getContext('2d');
    context.scale(scale, scale);

    // Create a configuration object for html2canvas.
    const config = {
        scale: scale, // Set the scale factor for higher resolution.
        useCORS: true, // Allow images from different origins (useful for external images).
    };

    // Render the DIV to the canvas with the specified configuration.
    html2canvas(div, config).then(canvas => {
        // Get the canvas image data as a base64 string.
        const imageData = canvas.toDataURL();

        // Create a Blob from the base64 data.
        const blob = dataURItoBlob(imageData);

        // Create a File object from the Blob.
        const file = new File([blob], 'preview.png', { type: 'image/png' });

        // Create a new anchor element and set its href attribute to the image data.
        const anchor = document.createElement('a');
        anchor.href = URL.createObjectURL(file);
        anchor.download = 'preview.png';

        const filesArray = [file];
        if (navigator.canShare && navigator.canShare({ files: filesArray })) {
            navigator.share({
                // text: 'quisk_Sayit',
                files: filesArray,
                // title: 'quisk_Sayit',
                // url: 'some_url'
            });
        } else {
            $("#alert").css('display', 'initial');
            $("#alert_text").text("Does not support on this Browser. Please use Different Browsers");
        }

        // Restore the display of buttons/icons after image generation.
		$(".previewSayit_Div").css("min-width", "350px");
        $("#shareImgBtn").css("display", "block");
        $("#downloadImgBtn").css("display", "block");
        $("i.fa.icons.fa-times-circle").css("display", "initial");
    });
}

function dataURItoBlob(dataURI) {
	const byteString = atob(dataURI.split(',')[1]);
	const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
	const ab = new ArrayBuffer(byteString.length);
	const ia = new Uint8Array(ab);
	for (let i = 0; i < byteString.length; i++) {
		ia[i] = byteString.charCodeAt(i);
	}
	return new Blob([ab], { type: mimeString });
}

function deleteCard(data) {
event.preventDefault();
console.log("delete", data)
request = $.ajax({
	url: "./../../backend/deleteSayit.php",
	type: "post",
	data: `deleteID=${data}`
});
request.done(function (data) {
	console.log(data)
	$("#alert").css('display', 'initial')
	$("#alert_text").text("Deleted Successfully")
	location.reload(); 
})
request.fail(function (data) {
	console.log(data)
})
}

function quiz(data){
	if(data === "add"){
		ques = $('#titlePreviewText').text()
		optionA = $('#ansPreviewText_A').text()
		optionB = $('#ansPreviewText_B').text()
		console.log(ques, optionA, optionB)
		data = [
			{
				"index": 1,
				"question": `${ques}`,
				"options": {
					"optionA": `${optionA}`,
					"optionB": `${optionB}`
				},
				"answer": `optionB`
			}
		
		]
		console.log(data)
		// axios.post('http://127.0.0.1:3000/add', {
		// 	// ques, optionA, optionB
		//   })
		//   .then(function (response) {
		// 	console.log(response);
		//   })
		//   .catch(function (error) {
		// 	console.log(error);
		//   });
	}
}