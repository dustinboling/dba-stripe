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

require_once( DBASTRIPE_ABSPATH . 'app/models/charge.php' );

class Charges_Controller {
	function __construct() {
		add_action('admin_menu', array( &$this, 'admin_menu'));
		add_action('admin_enqueue_scripts', array( &$this, 'scripts' ) ); 
	}
	
	function admin_menu() {
		add_submenu_page( 'dbastripe_overview', 'Stripe Payments', 'Payments', 'manage_options', 'dbastripe_payments', array( &$this, 'route' ) );
	}
	
	function route() {
		if ( ! current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		switch( $_REQUEST["action"] ) {
			case 'show':
				$this->show( $_GET["charge_id"] );
				break;
			case 'new':
				$this->new_charge();
				break;
			case 'create':
				$this->create();
				break;
			default:
				$this->index();
		}

	}
	
	// GET /wp-admin/admin.php?page=dbastripe_payments
	function index() {
		try {
			$charges = Charge::all();
			require_once( DBASTRIPE_ABSPATH . 'app/views/charges/index.html.php' );
		} catch(Exception $e) {
			wp_die( $e->getMessage() );
		}
	}
	
	// GET /wp-admin/admin.php?page=dbastripe_payments&action=show&charge_id=ch_0P8aizlxWOnvMb
	function show( $id = '' ) {
		try {
			$charge = Charge::retrieve( $id );
			require_once( DBASTRIPE_ABSPATH . 'app/views/charges/show.html.php' );
		} catch(Exception $e) {
			wp_die( $e->getMessage() );
		}
	}
	
	// GET /wp-admin/admin.php?page=dbastripe_payments&action=new
	function new_charge() {
		require_once( DBASTRIPE_ABSPATH . 'app/views/charges/new.html.php' );
	}
	
	// POST /wp-admin/admin.php?page=dbastripe_payments
	function create( $args = array() ) {
		
	}
	
	function scripts() {
		wp_enqueue_script( 'stripe', 'https://js.stripe.com/v1/', array(), '1' );
		wp_enqueue_script( 'stripe-charges', DBASTRIPE_URL . 'app/assets/javascripts/charges.js', array( 'stripe' ), '1', true );
	}
}
new Charges_Controller;