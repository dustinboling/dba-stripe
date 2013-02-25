<?php
// This class extends the WP_List_Table class, so we need to make sure that it's there
if( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class Payments_List_Table extends WP_List_Table {
	
	/**
	* Constructor, we override the parent to pass our own arguments
	* We usually focus on three parameters: singular and plural labels, as well as whether the class supports AJAX.
	*/
	function __construct( $charges = array() ) {
		parent::__construct( array(
			'singular'=> 'wp_list_text_payment', //Singular label
			'plural' => 'wp_list_text_payments', //plural label, also this well be one of the table css class
			'ajax'	=> false //We won't support Ajax for this table
		) );
		
		$this->items = $charges;
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
			'payment_created'	=> __('Created'),
			'payment_amount'	=> __('Amount'),
			'payment_status'	=> __('Status'),
			'payment_id'		=> __('Charge ID')
			
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
	
	function column_payment_created( $item ) {
		$actions = array(
			'view' => sprintf('<a href="?page=%s&action=%s&charge_id=%s">View</a>', $_REQUEST["page"], 'show', $item->id )
		);
		return sprintf('%1$s %2$s', date( 'M d, Y', $item->created ), $this->row_actions( $actions ) );
	}
	
	/**
	 * Default Column
	 */
	function column_default( $item, $column_name ) {
		switch( $column_name ) { 
			case 'payment_created':
				return date( 'M d, Y', $item->created );
			case 'payment_amount':
				return '$' . money_format( '%i', $item->amount/100 );
			case 'payment_id':
				return $item->id;
			case 'payment_status':
				return $item->paid ? 'Paid' : 'Unpaid';
			default:
				return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}
}
$PaymentsListTable = new Payments_List_Table( $charges );
$PaymentsListTable->prepare_items();
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Stripe Payments</h2>
	<?php $PaymentsListTable->display() ?>
</div>