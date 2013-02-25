<?php 

?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Stripe Settings</h2>
	<p>Go to <a href="https://manage.stripe.com/account/apikeys" target="_blank">https://manage.stripe.com/account/apikeys</a> and copy your Secret API keys into the fields below.</p>
	
	<form method="POST" action="options.php">
	    <?php settings_fields( 'dbastripe-keys-group' ); ?>
	    <?php do_settings_sections( 'dbastripe_settings' ); ?>
	    <?php submit_button(); ?>
	</form>
</div>