$(function() {
    // Get the form
    var form = $('#login-form');

    // Get the error div
    var formError = $('#form-error');
    var fromHeight = $('#login-box').css('height');
    
    var formAlreadyInvalid = false;
    
    $(window).resize( function () {
	    if ($(window).height() <= 500) {
		    $('#login-box').css('max-height', '85%');
		    $('#login-box').css('min-height', '320px');
	    }
	    else {
		    $('#login-box').css('max-height', '470px');
		    $('#login-box').css('min-height', '400px');
	    }
    });

    // Set up an event listener for the contact form
	$(form).submit(function(event) {
	    // Stop the browser from submitting the form
	    event.preventDefault();
	    
	    var username = $('#username').val();
        var password = $('#password').val();
        
        var validator = $( "#login-form" ).validate();
        
	    if (!validator.valid() || username == "" || password == "") {
	    	
		    return;
	    }
	    
	    
	    
	    // Serialize the form data.
		var formData = $(form).serialize();
		
		// Submit the form using AJAX.
		$.ajax({
		    type: 'POST',
		    url: $(form).attr('action'),
		    data: formData
		})
		.done(function(response) {
		
		    // Set the message text
		    $(formError).text(response);
		
		    // Clear the form
		    $('#username').val('');
		    $('#password').val('');
		    
		    window.location = "restricted_page.php";
		})
		.fail(function(data) {
		
			if ($('#form-error').html() == '' ) { //&& !formAlreadyInvalid) {
				//formAlreadyInvalid = true;
				$('#login-box').css('height', '+=40');
			}
			
		    // Set the error text
		    if (data.responseText !== '') {
		        $(formError).html("<div class='error-message login'>"+data.responseText+"</div>").fadeIn(1000);
		    } else {
		        $(formError).html("<div class='error-message login'>Oops! There was a problem logging in. Please try again.</div>").fadeIn();
		    }
		    
		});
		

	});
});