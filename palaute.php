<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/php/functions.php");
  locale($_GET['lang']);
  require_once($_SERVER['DOCUMENT_ROOT'].'/php/recaptchalib.php');
  $publickey = "6LcFtcISAAAAAO_K4LUS51ESMyF3ggacwFRcqDOn ";

?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fi" lang="fi">
  <head>
    <title>Roydon - Palautelomake</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Roydon Ky" />
    <meta name="description" content="Näyttelyitä kiertävä kenneltarvikeliike." />
    <meta name="keywords" content=" roydon, kennel tarvikkeet, koira tarvikkeet" />
    <link rel="stylesheet" type="text/css" href="css/roydon.css" media="all" />
    <link rel="icon" type="image/ico" href="images/favicon.ico" />
    <link rel="shortcut icon" type="image/ico" href="images/favicon.ico" />
    <script type="text/javascript" src="/js/roydon.js"></script>
    <!--[if IE 6]>
      <link rel="stylesheet" type="text/css" href="css/roydon_ie6.css" />
    <![endif]-->
    <!--[if IE 7]>
      <link rel="stylesheet" type="text/css" href="css/roydon_ie7.css" />
    <![endif]-->
    <!--[if lte IE 6]>
      <link rel="stylesheet" type="text/css" href="css/roydon_ie5.css" />
    <![endif]-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script type="text/javascript">
      var messageDelay = 2000;  // How long to display status messages (in milliseconds)
      var RecaptchaOptions = {
        theme : 'white',
        tabindex : 2
      };

      // Init the form once the document is ready
      $( init );


      // Initialize the form

      function init() {

        // Hide the form initially.
        // Make submitForm() the form's submit handler.
        // Position the form so it sits in the centre of the browser window.
        $('#contactForm').hide().submit( submitForm ).addClass( 'positioned' );

        // When the "Send us an email" link is clicked:
        // 1. Fade the content out
        // 2. Display the form
        // 3. Move focus to the first field
        // 4. Prevent the link being followed

        $('a[href="#contactForm"]').click( function() {
          $('#content').fadeTo( 'slow', .2 );
          $('#contactForm').fadeIn( 'slow', function() {
            $('#senderName').focus();
          } )

          return false;
        } );

        // When the "Cancel" button is clicked, close the form
        $('#cancel').click( function() {
          $('#contactForm').fadeOut();
          $('#content').fadeTo( 'slow', 1 );
        } );

        // When the "Escape" key is pressed, close the form
        $('#contactForm').keydown( function( event ) {
          if ( event.which == 27 ) {
            $('#contactForm').fadeOut();
            $('#content').fadeTo( 'slow', 1 );
          }
        } );

      }
    </script>
  </head>
  <body onload="curpage()">
    <div id="takala">
      <?php oldBrowse(); ?>
      <div id="otsake" class="shadow">
        <?php langLink($_GET['lang']); ?>
        <div id="otsikko">
          <h1>roydon</h1>
          <p><?php echo _('header.subtitle'); ?></p>
        </div>
        <?php printMenu();?>
      </div>
      <div id="sivusisalto" class="shadow">
        <section id="content">
          <a href="#contactForm"><?php echo _('contact.form.title'); ?></a>
              <form  id="contactForm" class="rounded" method="post" action="php/mail.php">
                <h2><?php echo _('contact.form.title'); ?>...</h2>

                  <ul>

                    <li>
                      <label for="senderName"><?php echo _('contact.form.name'); ?></label>
                      <input type="text" name="senderName" id="senderName" placeholder="<?php echo _('contact.form.type.name'); ?>" required="required" maxlength="40" />
                    </li>

                    <li>
                      <label for="senderEmail"><?php echo _('contact.form.email'); ?></label>
                      <input type="email" name="senderEmail" id="senderEmail" placeholder="<?php echo _('contact.form.type.email'); ?>" required="required" maxlength="50" />
                    </li>

                    <li>
                      <label for="message" style="padding-top: .5em;"><?php echo _('contact.form.msg'); ?></label>
                      <textarea name="message" id="message" placeholder="<?php echo _('contact.form.type.msg'); ?>" required="required" cols="80" rows="10" maxlength="10000"></textarea>
                    </li>
                    <li>
                      <?php echo recaptcha_get_html($publickey); ?>
                    </li>
                  </ul>

                  <div id="formButtons">
                    <input type="submit" id="sendMessage" name="sendMessage" value="<?php echo _('contact.form.send'); ?>" />
                    <input type="button" id="cancel" name="cancel" value="<?php echo _('contact.form.cancel'); ?>" />
                  </div>
              </form>
            <div id="sendingMessage" class="statusMessage"><p><?php echo _('contact.form.sending'); ?>...</p></div>
            <div id="successMessage" class="statusMessage"><p><?php echo _('contact.form.thanks'); ?>.</p></div>
            <div id="failureMessage" class="statusMessage"><p><?php echo _('contact.form.error'); ?>.</p></div>
            <div id="incompleteMessage" class="statusMessage"><p><?php echo _('contact.form.incomplete'); ?>.</p></div>
        </section>
      </div>
      <?php printFoot();?>
    </div>
  </body>
</html>