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

// Libraries
include_once( DBASTRIPE_ABSPATH . 'config/libraries.php' );

// Settings Page
include_once( DBASTRIPE_ABSPATH . 'app/controllers/settings-controller.php' );

// General Pages
include_once( DBASTRIPE_ABSPATH . 'app/controllers/overview-controller.php' );
include_once( DBASTRIPE_ABSPATH . 'app/controllers/customers-controller.php' );
include_once( DBASTRIPE_ABSPATH . 'app/controllers/charges-controller.php' );
include_once( DBASTRIPE_ABSPATH . 'app/controllers/coupons-controller.php' );
include_once( DBASTRIPE_ABSPATH . 'app/controllers/plans-controller.php' );

// Admin Styles
add_action( 'admin_head', 'dbastripe_styles' );
function dbastripe_styles() {
	include_once( DBASTRIPE_ABSPATH . 'app/assets/stylesheets/admin-style.php' );
}
