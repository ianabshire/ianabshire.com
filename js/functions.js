
function validateFormOnSubmit(form) {
var errors = "";
var reason = "";

  document.getElementById("form-error").innerHTML = "";
  document.getElementById("message-sent").innerHTML = "";

  reason = validateName(form.name);
  errors += reason;
  if (reason != ""){
  	var div = document.createElement("div");
  	div.className = "error-message";
  	div.innerHTML = reason;
	document.getElementById("form-error").appendChild(div);
  }
  
  reason = validateEmail(form.email);
  errors += reason;
  if (reason != ""){
  	var div = document.createElement("div");
  	div.className = "error-message";
  	div.innerHTML = reason;
	document.getElementById("form-error").appendChild(div);
  }
  
  reason = validateEmpty(form.subject);
  errors += reason;
  if (reason != ""){
  	reason = "Subject " + reason;
  	var div = document.createElement("div");
  	div.className = "error-message";
  	div.innerHTML = reason;
	document.getElementById("form-error").appendChild(div);
  }
  
  reason = validateEmpty(form.message);
  errors += reason;
  if (reason != ""){
  	reason = "Message " + reason;
  	var div = document.createElement("div");
  	div.className = "error-message";
  	div.innerHTML = reason;
	document.getElementById("form-error").appendChild(div);
  }
     
  reason = validateCategory(form.category);
  errors += reason;
  if (reason != ""){
  	var div = document.createElement("div");
  	div.className = "error-message";
  	div.innerHTML = reason;
	document.getElementById("form-error").appendChild(div);
  }
   
  if (errors != "") {
    //alert("Some fields need correction:\n" + reason);
    return false;
  }

  return true;
}

function validateEmpty(fld) {
    var error = "";
 
    if (fld.value.length == 0) {
    	fld.className = "field-error";
        error = "is required.\n"
    } else {
	    fld.className = fld.className.replace( /(?:^|\s)field-error(?!\S)/ , '' )
    }
    return error;  
}

function validateName(fld) {
    var error = "";
    var illegalChars = /\W/; // allow letters, numbers, and underscores
 
    if (fld.value == "") {
    	fld.className = "field-error";
        error = "Name is required.\n";
    } else if (illegalChars.test(fld.value)) {
    	fld.className = "field-error";
        error = "Name contains illegal characters.\n";
    } else {
	    fld.className = fld.className.replace( /(?:^|\s)field-error(?!\S)/ , '' )
    }
    return error;
}


function trim(s)
{
  return s.replace(/^\s+|\s+$/, '');
}

function validateEmail(fld) {
    var error="";
    var tfld = trim(fld.value);                        // value of field with whitespace trimmed off
    var emailFilter = /^[^@]+@[^@.]+\.[^@]*\w\w$/ ;
    var illegalChars= /[\(\)\<\>\,\;\:\\\"\[\]]/ ;
   
    if (fld.value == "") {
    	fld.className = "field-error";
        error = "Email address is required.\n";
    } else if (!emailFilter.test(tfld)) {              //test email for illegal characters
    	fld.className = "field-error";
        error = "Please enter a valid email address.\n";
    } else if (fld.value.match(illegalChars)) {
    	fld.className = "field-error";
        error = "Email address contains illegal characters.\n";
    } else {
	    fld.className = fld.className.replace( /(?:^|\s)field-error(?!\S)/ , '' )
    }
    return error;
}

function validateCategory(fld) {
    var error = "";
 
    if (fld.value == "") {
    	fld.className = "field-error"; 
        error = "Category is required.\n";
    } else {
	    fld.className = fld.className.replace( /(?:^|\s)field-error(?!\S)/ , '' )
    }
    return error;
}
