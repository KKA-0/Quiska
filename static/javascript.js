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
	console.log("signinContainer..")
	$('.signup-fields').css('display', 'initial');
	$('.signup-image').css('display', 'initial');
	$('.signin-fields').css('display', 'none');
	$('.signin-image').css('display', 'none');
}

function home(){
	window.location.href = '../index.php';
}

function preventDefault() {
	console.log('preventDefault')
	$("button").on("submit", function(event) {
		event.preventDefault();
	  });
}

if(window.history.replaceState)
{
	window.history.replaceState(null, null, window.location.href);
}