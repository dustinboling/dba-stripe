<?php
// This class extends the WP_List_Table class, so we need to make sure that it's there
if( ! class_exists( 'WP_List_Table' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class Plans_List_Table extends WP_List_Table {
	
	/**
	* Constructor, we override the parent to pass our own arguments
	* We usually focus on three parameters: singular and plural labels, as well as whether the class supports AJAX.
	*/
	function __construct( $plans = array() ) {
		parent::__construct( array(
			'singular'=> 'wp_list_text_plan', //Singular label
			'plural' => 'wp_list_text_plans', //plural label, also this well be one of the table css class
			'ajax'	=> false //We won't support Ajax for this table
		) );
		
		$this->items = $plans;
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
			'plan_name'		=> __('Plan Name'),
			'plan_id'		=> __('ID'),
			'plan_interval'	=> __('Interval'),
			'plan_interval_count' => __('Interval Count'),
			'plan_trial'	=> __('Trial Days'),
			'plan_amount'	=> __('Amount'),
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
	
	function column_plan_name( $item ) {
		$actions = array(
			'view' => sprintf('<a href="?page=%s&action=%s&plan_id=%s">View</a>', $_REQUEST["page"], 'show', $item->id )
		);
		return sprintf('%1$s %2$s', $item->name, $this->row_actions( $actions ) );
	}
	
	/**
	 * Default Column
	 */
	function column_default( $item, $column_name ) {
		switch( $column_name ) { 
			case 'plan_name':
				// Currently running through $this->column_plan_name()
				//return $item->name;
			case 'plan_id':
				return $item->id;
			case 'plan_interval':
				return $item->interval;
			case 'plan_interval_count':
				return $item->interval_count;
			case 'plan_trial':
				return $item->trial_period_days;
			case 'plan_amount':
				return '$' . money_format( '%i', $item->amount/100 );
			default:
				return '<pre>' . print_r( $item, true ) . '</pre>'; //Show the whole array for troubleshooting purposes
		}
	}
}
$PlansListTable = new Plans_List_Table( $plans );
$PlansListTable->prepare_items();
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"></div>
	<h2>Stripe Plans</h2>
	<?php $PlansListTable->display() ?>
</div>