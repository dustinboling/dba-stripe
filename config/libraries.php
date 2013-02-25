<?php
/**
 * Copyright (c) 2013 Dustin Boling Associates
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author    Dustin Boling <dustin@dustinboling.com>
 * @copyright 2013 Dustin Boling Associates
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

/**
 * Stripe.com Payment Processing
 */
if( ! class_exists( 'Stripe' ) ) {
	include_once( DBASTRIPE_ABSPATH . 'lib/stripe/lib/Stripe.php' );
}

// Retrieve Stripe settings array
$settings = (array) get_option( 'dbastripe' );

if( $settings['test_secret_key'] && $settings['live_secret_key'] ) :

	print_r( count( $settings ) );

	// Get Stripe API keys
	$test_secret_key = esc_attr( $settings['test_secret_key'] );
	$live_secret_key = esc_attr( $settings['live_secret_key'] );
	
	// Run Stripe in Live or Test mode.
	$is_live = esc_attr( $settings['is_live'] );
	
	if( isset( $is_live ) ) {
		Stripe::setApiKey( $live_secret_key );
	} else {
		Stripe::setApiKey( $test_secret_key );
	}
	
	// Display admin notice if settings haven't been configured
	add_action('admin_notices', 'stripe_updated_notice');
	
else :
	
	// Display admin notice if settings haven't been configured
	add_action('admin_notices', 'stripe_error_notice');
	
endif;

function stripe_error_notice() {
    echo '<div class="error"><p>Stripe is almost ready, enter your API keys on the <a href="/wp-admin/options-general.php?page=dbastripe_settings">settings page</a>.</p></div>';
}

function stripe_updated_notice() {
    echo '<div class="updated"><p><a href="/wp-admin/options-general.php?page=dbastripe_settings">Stripe settings</a> need to be configured.</p></div>';
}
