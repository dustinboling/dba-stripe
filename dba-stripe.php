<?php
/***
Plugin Name: Stripe by DBA
Plugin URI: http://dustinboling.com/plugins/wordpress/dba-stripe/
Description: Stripe.com plugin for WordPress Networks
Author: Dustin Boling Associates
Author URI: http://www.dustinboling.com/
Version: 0.1.0.0
License: http://www.opensource.org/licenses/mit-license.html  MIT License
***/

if( ! defined( "DS" ) )
	define( "DS", DIRECTORY_SEPARATOR );

if( ! defined( 'DBASTRIPE_ABSPATH' ) )
	define( 'DBASTRIPE_ABSPATH', plugin_dir_path( __FILE__ ) );

if( ! defined( 'DBASTRIPE_URL' ) )
	define( 'DBASTRIPE_URL', plugins_url() . '/' . basename( dirname( __FILE__ ) ) . '/' );

// Boot the app
include_once( DBASTRIPE_ABSPATH . 'config/boot.php' );