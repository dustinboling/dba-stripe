<?php
// This class extends the WP_List_Table class, so we need to make sure that it's there
if( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class Customers_List_Table extends WP_List_Table {
	
	/**
	* Constructor, we override the parent to pass our own arguments
	* We usually focus on three parameters: singular and plural labels, as well as whether the class supports AJAX.
	*/
	function __construct( $customers ) {
		parent::__construct( array(
			'singular'=> 'wp_list_text_customer', //Singular label
			'plural' => 'wp_list_text_customers', //plural label, also this well be one of the table css class
			'ajax'	=> false //We won't support Ajax for this table
		) );
		
		$this->items = $customers;
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
			'customer_description'	=> __('Description'),
			'customer_email'		=> __('Email'),
			'customer_id'			=> __('ID'),
			'customer_created'		=> __('Created')
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
	
	
	function column_customer_description( $item ) {
		$actions = array(
			'view' => sprintf('<a href="?page=%s&action=%s&customer_id=%s">View</a>', $_REQUEST["page"], 'show', $item->id )
		);
		return sprintf('%1$s %2$s', $item->description, $this->row_actions( $actions ) );
	}
	
	
	/**
	 * Default Column
	 */
	function column_default( $item, $column_name ) {
		switch( $column_name ) { 
			case 'customer_email':
				return $item->email;
			case 'customer_id':
				return $item->id;
			case 'customer_created':
				return date( 'M d, Y', $item->created );
			default:
				return print_r( $item, true ); //Show the whole array for troubleshooting purposes
		}
	}
}
$CustomersListTable = new Customers_List_Table( $customers );
$CustomersListTable->prepare_items();
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Stripe Customers</h2>
	<?php $CustomersListTable->display() ?>
</div>