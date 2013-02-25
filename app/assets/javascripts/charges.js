// this identifies your website in the createToken call below
Stripe.setPublishableKey('pk_aa6ffFs2QXidARbbOaugISsHEAbLW');
// ...
jQuery(function() {
	jQuery('#payment-form').submit(function(event) {
		// Disable the submit button to prevent repeated clicks
		jQuery('.submit-button').prop('disabled', true);
		
		Stripe.createToken({
			number: jQuery('.card-number').val(),
			cvc: jQuery('.card-cvc').val(),
			exp_month: jQuery('.card-expiry-month').val(),
			exp_year: jQuery('.card-expiry-year').val()
		}, stripeResponseHandler);
		
		// Prevent the form from submitting with the default action
		return false;
	});
});

function stripeResponseHandler(status, response) {
	if (response.error) {
		// Show the errors on the form
		jQuery('.payment-errors').text(response.error.message);
		jQuery('.submit-button').prop('disabled', false);
	} else {
		var jQueryform = jQuery('#payment-form');
		// token contains id, last4, and card type
		var token = response.id;
		// Insert the token into the form so it gets submitted to the server
		jQueryform.append(jQuery('<input type="hidden" name="stripeToken" />').val(token));
		// and submit
		jQueryform.get(0).submit();
	}
}