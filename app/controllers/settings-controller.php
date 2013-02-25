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

class Settings_Controller {
	function __construct() {
		add_action( 'admin_init', array( &$this, 'settings_admin_init' ) );
		add_action( 'admin_menu', array( &$this, 'admin_menu' ) );
	}
	
	function admin_menu() {
		add_options_page( 'Stripe Settings', 'Stripe Settings', 'manage_options', 'dbastripe_settings', array( &$this, 'index' ) );
	}
	
	function index() {
		if ( ! current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}
		
		require_once( DBASTRIPE_ABSPATH . 'app/views/settings/index.html.php' );
	}
	
	function settings_admin_init() {
		register_setting( 'dbastripe-keys-group', 'dbastripe' );
		add_settings_section( 'dbastripe-mode', 'Mode', array( &$this, 'dbastripe_mode_callback' ), 'dbastripe_settings' );
		add_settings_section( 'dbastripe-keys', 'API Keys', array( &$this, 'dbastripe_keys_callback' ), 'dbastripe_settings' );
		add_settings_field( 'is-live', 'Live or Test Mode?', array( &$this, 'is_live_callback' ), 'dbastripe_settings', 'dbastripe-mode' );
		add_settings_field( 'test-secret-key', 'Test Secret Key', array( &$this, 'test_secret_key_callback' ), 'dbastripe_settings', 'dbastripe-keys' );
		add_settings_field( 'live-secret-key', 'Live Secret Key', array( &$this, 'live_secret_key_callback' ), 'dbastripe_settings', 'dbastripe-keys' );
	}
	
	function dbastripe_mode_callback() {
		//
	}
	
	function dbastripe_keys_callback() {
		//
	}
	
	function is_live_callback() {
		$settings = (array) get_option( 'dbastripe' );
		$is_live = esc_attr( $settings['is_live'] );
		echo "<input type='radio' name='dbastripe[is_live]' value='1' ", $is_live ? 'checked' : '', "> Live<br>";
		echo "<input type='radio' name='dbastripe[is_live]' value='0' ", ( ! $is_live) ? 'checked' : '', "> Test";
	}
	
	function test_secret_key_callback() {
		$settings = (array) get_option( 'dbastripe' );
		$test_secret_key = esc_attr( $settings['test_secret_key'] );
		echo "<input type='text' name='dbastripe[test_secret_key]' value='$test_secret_key'>";
	}
	
	function live_secret_key_callback() {
		$settings = (array) get_option( 'dbastripe' );
		$live_secret_key = esc_attr( $settings['live_secret_key'] );
		echo "<input type='text' name='dbastripe[live_secret_key]' value='$live_secret_key'>";
	}
}
new Settings_Controller;