<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>New Charge</h2>
	<p>Charge a credit card</p>
	<form action="/wp-admin/admin.php?page=dbastripe_payments&action=new" method="POST" id="payment-form">
	<div class="form-row">
		<label>
			<span>Card Number</span>
			<input type="text" size="20" autocomplete="off" class="card-number"/>
		</label>
	</div>
	
	<div class="form-row">
		<label>
			<span>CVC</span>
			<input type="text" size="4" autocomplete="off" class="card-cvc"/>
		</label>
	</div>
	
	<div class="form-row">
		<label>
			<span>Expiration (MM/YYYY)</span>
			<input type="text" size="2" class="card-expiry-month"/>
		</label>
			<span> / </span>
		<input type="text" size="4" class="card-expiry-year"/>
	</div>
	
	<button type="submit" class="submit-button">Submit Payment</button>
	</form>
	
	<?php echo $_REQUEST["response"]; ?>
</div>