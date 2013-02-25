<?php
$is_https = false;
if ( ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443 ) {

    $is_https = true;
}
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Stripe Overview</h2>
	<?php echo $is_https ? '' : '<div id="setting-error-settings_updated" class="error settings-error"><p><strong>Your connection is not secure, be sure to use https when using Stripe.</strong></p></div>'; ?>
</div>
