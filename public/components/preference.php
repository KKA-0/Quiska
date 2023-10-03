<script>
        if (localStorage.preference === "true") {
                $('#preference').prop('checked', true);
                // Apply the styles when the preference is "true"
                $('#navbar').css('background', 'white');
		$('#navbar').css('color', 'black');
		$('#greetuser').css('color', 'black');
		$('nav ul li .fcka').css('color', 'black')
		$('body, .container-dashboard').css('background', 'whitesmoke')
                $('.bg-body').css('background', 'linear-gradient(356deg, rgba(114,87,250,1) 35%, rgba(24,49,83,1) 100%)')
        }else if(localStorage.preference === "false"){
                $('#preference').removeAttr('checked');
                $('#greetuser').css('color', 'white');
		$('#navbar').css('background', '#0c0c0c');
		$('#navbar').css('color', 'white')
		$('nav ul li .fcka').css('color', 'white')
		$('body, .container-dashboard').css('background', '#222222')
        }
</script>