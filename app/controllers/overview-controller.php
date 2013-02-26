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
require_once( DBASTRIPE_ABSPATH . 'app/models/customer.php' );
require_once( DBASTRIPE_ABSPATH . 'app/models/transfer.php' );

class Overview_Controller {
	function __construct() {
		add_action('admin_menu', array( &$this, 'admin_menu'));
	}
	
	function admin_menu() {
		add_menu_page( 'Stripe Overview', 'Stripe', 'manage_options', 'dbastripe_overview', array( &$this, 'index' ) );
	}
	
	function index() {
		if ( ! current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		try{
			$charges = Charge::all( 10 );
			$customers = Customer::all( 10 );
			$transfers = Transfer::all( 10 );
			require_once( DBASTRIPE_ABSPATH . 'app/views/overview/index.html.php' );
		} catch( Exception $e ) {
			wp_die( $e );
		}
		
	}
}
new Overview_Controller;