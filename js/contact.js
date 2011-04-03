document.write("<script type='text/javascript'  src='http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js'></script>");

tryReady = function(time_elapsed) {
  // Continually polls to see if jQuery is loaded.
  if (typeof $ == "undefined") { // if jQuery isn't loaded yet...
    if (time_elapsed <= 5000) { // and we havn't given up trying...
      setTimeout("tryReady(" + (time_elapsed + 200) + ")", 200); // set a timer to check again in 200 ms.
    } else {
      alert("Timed out while loading jQuery.")
    }
  } else {
    // Any code to run after jQuery loads goes here!
    $( init );
  }
}

tryReady(0);

var RecaptchaOptions = {
  theme : 'clean'
};

var messageDelay = 2000;  // How long to display status messages (in milliseconds)

// Initialize the form

function init() {

  // Hide the form initially.
  // Make submitForm() the form's submit handler.
  // Position the form so it sits in the centre of the browser window.
  $('#contactForm').submit( submitForm ).addClass( 'positioned' );
  $('#contactForm').insertAfter('#takala');

  // When the "Send us an email" link is clicked:
  // 1. Fade the content out
  // 2. Display the form
  // 3. Move focus to the first field
  // 4. Prevent the link being followed

  $('a[href="#contactForm"]').click( function() {
    $('#takala').fadeTo( 'slow', .2 );
    $('#contactForm').fadeIn( 'slow', function() {
      $('#senderName').focus();
    } )

    return false;
  } );

  // When the "Cancel" button is clicked, close the form
  $('#cancel').click( function() {
    $('#contactForm').fadeOut();
    $('#takala').fadeTo( 'slow', 1 );
  } );

  // When the "Escape" key is pressed, close the form
  $('#contactForm').keydown( function( event ) {
    if ( event.which == 27 ) {
      $('#contactForm').fadeOut();
      $('#takala').fadeTo( 'slow', 1 );
    }
  } );

}

// Submit the form via Ajax

function submitForm() {
  var contactForm = $(this);

  // Are all the fields filled in?

  if ( !$('#senderName').val() || !$('#senderEmail').val() || !$('#message').val() || !$('#recaptcha_response_field').val() ) {

    // No; display a warning message and return to the form
    $('#incompleteMessage').insertAfter('#takala');
    $('#incompleteMessage').fadeIn().delay(messageDelay).fadeOut();
    contactForm.fadeOut().delay(messageDelay).fadeIn();

  } else {

    // Yes; submit the form to the PHP script via Ajax

    if (validateCaptcha()) {
      $('#sendingMessage').insertAfter('#takala');
      $('#sendingMessage').fadeIn();
      contactForm.fadeOut();

      $.ajax( {
        url: contactForm.attr( 'action' ) + "?ajax=true",
        type: contactForm.attr( 'method' ),
        data: contactForm.serialize(),
        success: submitFinished
      } );
    }
  }

  // Prevent the default form submission occurring
  return false;
}

// Handle the Ajax response

function submitFinished( response ) {
  response = $.trim( response );
  $('#sendingMessage').fadeOut();

  if ( response == "success" ) {

    // Form submitted successfully:
    // 1. Display the success message
    // 2. Clear the form fields
    // 3. Fade the content back in

    $('#successMessage').insertAfter('#takala');
    $('#successMessage').fadeIn().delay(messageDelay).fadeOut();
    $('#senderName').val( "" );
    $('#senderEmail').val( "" );
    $('#message').val( "" );

    $('#content').delay(messageDelay+500).fadeTo( 'slow', 1 );

  } else {

    // Form submission failed: Display the failure message,
    // then redisplay the form
    $('#failureMessage').insertAfter('#takala');
    $('#failureMessage').fadeIn().delay(messageDelay).fadeOut();
    Recaptcha.reload();
    $('#contactForm').delay(messageDelay+500).fadeIn();
  }
}

function validateCaptcha() {
  challengeField = $("input#recaptcha_challenge_field").val();
  	responseField = $("input#recaptcha_response_field").val();
  	//console.log(challengeField);
  	//console.log(responseField);
  	//return false;
  	var html = $.ajax({
  		type: "POST",
  		url: "/php/ajax.recaptcha.php",
  		data: "recaptcha_challenge_field=" + challengeField + "&recaptcha_response_field=" + responseField,
  		async: false
  		}).responseText;

  	//console.log( html );
  	if(html == "success") {
  		return true;
  	} else {
  		$('#recaptchaError').insertAfter('#takala');
      $('#recaptchaError').fadeIn().delay(messageDelay).fadeOut();
      contactForm.fadeOut().delay(messageDelay).fadeIn();
  		Recaptcha.reload();
  		return false;
  	}
}