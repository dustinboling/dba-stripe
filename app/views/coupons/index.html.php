<?php
// This class extends the WP_List_Table class, so we need to make sure that it's there
if( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class Coupons_List_Table extends WP_List_Table {
	
	/**
	* Constructor, we override the parent to pass our own arguments
	* We usually focus on three parameters: singular and plural labels, as well as whether the class supports AJAX.
	*/
	function __construct( $coupons = array() ) {
		parent::__construct( array(
			'singular'=> 'wp_list_text_coupon', //Singular label
			'plural' => 'wp_list_text_coupons', //plural label, also this well be one of the table css class
			'ajax'	=> false //We won't support Ajax for this table
		) );
		
		$this->items = $coupons;
	}
	
	/**
	 * Add extra markup in the toolbars before or after the list
	 * @param string $which, helps you decide if you add the markup after (bottom) or before (top) the list
	 */
	function extra_tablenav( $which ) {
		if ( $which == "top" ){
			//The code that goes before the table is here
		}
		if ( $which == "bottom" ){
			//The code that goes after the table is there
		}
	}
	
	/**
	 * Define the columns that are going to be used in the table
	 * @return array $columns, the array of columns to use with the table
	 */
	function get_columns() {
		$columns = array(
			'coupon_id'					=> __('ID'),
			'coupon_percent_off'		=> __('Percent off'),
			'coupon_amount_off'			=> __('Amount off'),
			'coupon_duration_in_months'	=> __('Months'),
			'coupon_duration'			=> __('Duration'),
			'coupon_redeem_by'			=> __('Expires'),
			'coupon_max_redemptions'	=> __('Max redemptions'),
			'coupon_times_redeemed'		=> __('Redeemed'),
			
			
		);
		return $columns;
	}
	
	/**
	 * Prepare the table
	 */
	 function prepare_items() {
		$columns = $this->get_columns();
		$hidden = array();
		$sortable = array();
		$this->_column_headers = array( $columns, $hidden, $sortable );
	}
	
	function column_coupon_id( $item ) {
		$actions = array(
			'view' => sprintf('<a href="?page=%s&action=%s&coupon_id=%s">View</a>', $_REQUEST["page"], 'show', $item->id )
		);
		return sprintf('%1$s %2$s', sprintf('<a href="?page=%s&action=%s&coupon_id=%s">%s</a>', $_REQUEST["page"], 'show', $item->id, $item->id ), $this->row_actions( $actions ) );
		return sprintf('%1$s %2$s', '<a href="?page=%s&action=show&coupon_id=%s">' . $item->id . '</a>', $this->row_actions( $actions ) );
	}
	
	/**
	 * Default Column
	 */
	function column_default( $item, $column_name ) {
		switch( $column_name ) { 
			case 'coupon_id':
				return $item->id;
			case 'coupon_percent_off':
				return $item->percent_off . '%';
			case 'coupon_amount_off':
				//return '<pre>' . print_r( $item, true ) . '</pre>';
				return '$' . money_format( '%i', $item->amount_off/100 );
			case 'coupon_duration_in_months':
				return $item->duration_in_months;
			case 'coupon_duration':
				return $item->duration;
			case 'coupon_redeem_by':
				return date( 'M d, Y', $item->redeem_by );
			case 'coupon_max_redemptions':
				return $item->max_redemptions;
			case 'coupon_times_redeemed':
				return $item->times_redeemed;
			default:
				return '<pre>' . print_r( $item, true ) . '</pre>'; //Show the whole array for troubleshooting purposes
		}
	}
}
$CouponsListTable = new Coupons_List_Table( $coupons );
$CouponsListTable->prepare_items();
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Stripe Coupons</h2>
	<?php $CouponsListTable->display() ?>
</div>