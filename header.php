<!--HEADER-->
<div class="header">
  <div class="navigation">
    <div class="name">
    	<a class="name-text" href="index">Ian Abshire</a>
    </div>
    <div class="nav-links"><a class="nav-link" href="form">Contact</a><a class="nav-link" href="resume">Resume</a>
    <?
    if(isUserLoggedIn()){
    	echo '<a class="nav-link" href="restricted_page">Account</a>';
    	echo '<a class="nav-link" id="login-link" href="restricted_page?logout=true">Logout</a>';
    }
    else
    	echo '<a class="nav-link" id="login-link" href="#login-box">Login</a>';
    ?>
    <script>$("#login-link").leanModal();</script>
    </div>
  </div>
</div>

<script>
	$(document).ready(function() {
    	$('.letter-text').addClass("load");
    	$('.nav-links').addClass("load");   	
	});
	
	var title = document.getElementsByTagName("title")[0].innerHTML;

	// $(location).attr('href').toLowerCase().indexOf("index") < 0
	if (title.indexOf("-") > 0) { // check if currently on homepage (title does not contain - character)
		var login_color = $('#login-link').css("color");
		$('.name-text').css("color", "#333");
		$('.nav-link').css("color", "#333");
    	$('#login-link').css("color", login_color);
	}

	// handles header class transition on scroll
	$(window).scroll(function() {
	  if ($(this).scrollTop() > 1){
	    $('.header').addClass("sticky");
	    $('.navigation').addClass("sticky");
	    $('.name').addClass("sticky");
	    $('.name-text').addClass("sticky");
	    $('.nav-links').addClass("sticky");
	    $('.nav-link').addClass("sticky");
	  }
	  else{
	  	$('.header').removeClass("sticky");
	    $('.navigation').removeClass("sticky");
	    $('.name').removeClass("sticky");
	    $('.name-text').removeClass("sticky");	    
	    $('.nav-links').removeClass("sticky");
	    $('.nav-link').removeClass("sticky");
	  }
	});
</script>

<div id="login-box" class="login-window login">
	<div class="login-text login">
		<h1 class="login">Login</h1>
		<div class="test-user-text login">Test user: admin | Password: admin</div>
	</div>
    	
    <form class="login" id="login-form" action="doLogin.php" method="post">
    	<div class='field  login'><label for='username'>Username:</label></div>
    	<input class="" type='text' name='username' id='username' size='30' maxlength='30' value='' required/>
    	
    	<div class='field login'><label for='password'>Password:</label></div>
    	<input class="" type='password' name='password' id='password' size='128' maxlength='128' value='' required/>
    	
    	<div class="login" id='submit'>
        	<input class="login" type='submit' value='Login'>	
        </div>
        
        <a class="login" id="register" href="register.php" >Register</a>
        <div id="form-error" class="form-error login"></div>
    </form>
    
    <script>
    	$(document).ready(function() {
    	
    		var usernameAlreadyInvalid = false;
			var passwordAlreadyInvalid = false;
			var formAlreadyInvalid = false;
    	
	        var validator = $( "#login-form" ).validate();
	        //var maxHeight = $('.login-window.login').css('height') + 75;
	        //$('.login-window.login').css('max-height', maxHeight);
	    
			$( "#username" ).keyup(function() {
			
				//$('#form-error').html('');
				
				if ($('#form-error').html() != '' ) {
					$('#form-error').html('');
					$('#login-box').css('height', '-=40');
				}
			
				if (!validator.element( "#username" )) {
					
					if (!usernameAlreadyInvalid) {
				   		$('#login-box').css('height', '+=25');
				   		usernameAlreadyInvalid = true;
			    	}
			    	
					$("#username").attr('class', 'error-validation');
				}
				else {
				
					if (usernameAlreadyInvalid) {
				   		$('#login-box').css('height', '-=25');
				   		usernameAlreadyInvalid = false;
			    	}
			    	
					$("#username").attr('class', '');
				}
			});
			$( "#password" ).keyup(function() {
			
				if ($('#form-error').html() != '' ) {
					$('#form-error').html('');
					$('#login-box').css('height', '-=40');
				}
			
				if (!validator.element( "#password" )) {
				
			    	if (!passwordAlreadyInvalid) {
				   		$('#login-box').css('height', '+=25');
				   		passwordAlreadyInvalid = true;
			    	}
			    	
					$("#password").attr('class', 'error-validation');
				}
				else {
				
			    	if (passwordAlreadyInvalid) {
				   		$('#login-box').css('height', '-=25');
				   		passwordAlreadyInvalid = false;
			    	}

					$("#password").attr('class', '');
				}
				
			});
		});
    </script>
</div>
