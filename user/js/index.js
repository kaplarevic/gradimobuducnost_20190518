var data = {
	url_login: "/gradimobuducnost/user/php/login.php",
	url_create_account: "/gradimobuducnost/user/php/newAccount.php"
};

$(document).ready(function(){
	
  console.log('ready(...)');
});

$('.message a').click(function(){
   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
});

function kreirajNalog() {
	var ime = $('#ime').val();
	var prezime = $('#prezime').val();
	var usernameCreate = $('#usernameCreate').val();
	var emailCreate = $('#emailCreate').val();
	var passwordCreate = $('#passwordCreate').val();
	
	var isCorrect = true;
	
	if(ime === '') {
		$('#ime').addClass('requiredInput');
		isCorrect = false;
	} else if ($('#ime').hasClass('requiredInput')) {
		$('#ime').removeClass('requiredInput');
	}
	
	if(prezime === '') {
		$('#prezime').addClass('requiredInput');
		isCorrect = false;
	} else if ($('#prezime').hasClass('requiredInput')) {
		$('#prezime').removeClass('requiredInput');
	}
	
	if(usernameCreate === '') {
		$('#usernameCreate').addClass('requiredInput');
		isCorrect = false;
	} else if ($('#usernameCreate').hasClass('requiredInput')) {
		$('#usernameCreate').removeClass('requiredInput');
	}
	
	if(emailCreate === '') {
		$('#emailCreate').addClass('requiredInput');
		isCorrect = false;
	} else if (!emailCreate.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
	   $('#emailCreate').addClass('requiredInput');
		isCorrect = false;
	} else if ($('#emailCreate').hasClass('requiredInput')) {
		$('#emailCreate').removeClass('requiredInput');
	}
	
	if(passwordCreate === '') {
		$('#passwordCreate').addClass('requiredInput');
		isCorrect = false;
	} else if ($('#passwordCreate').hasClass('requiredInput')) {
		$('#passwordCreate').removeClass('requiredInput');
	}
	
	if(!isCorrect) {
		return;
	} 
	
	 $.post(data.url_create_account,
				{
					ime: ime,
					prezime: prezime,
					usernameCreate: usernameCreate,
					emailCreate: emailCreate,
					passwordCreate: passwordCreate
				},
			function(data, status){
    			$('#err').addClass('err');
		    	$('#err').text(data);
	});
}

function ulogujSe() {
	var username = $('#username').val();
	var pass = $('#password').val();
	var isCorrect = true;
	
	if(username === '') {
		$('#username').addClass('requiredInput');
		isCorrect = false;
	} else if ($('#username').hasClass('requiredInput')) {
		$('#username').removeClass('requiredInput');
	}
	
	if(pass === '') {
		$('#password').addClass('requiredInput');
		isCorrect = false;
	} else if ($('#password').hasClass('requiredInput')) {
		$('#password').removeClass('requiredInput');
	}
	

	if(isCorrect) {
		$.post(data.url_login,
				{
					username: username,
					pass: pass
				},
			function(data, status){
			$('#err').addClass('err');
			$('#err').text(data);
	});
	} 
}


