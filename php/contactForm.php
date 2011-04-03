<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/php/recaptchalib.php';
  $publickey = "6LcFtcISAAAAAO_K4LUS51ESMyF3ggacwFRcqDOn ";
?>
<script type="text/javascript" src="/js/contact.js"></script>
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
    <li><?php echo recaptcha_get_html($publickey); ?></li>
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