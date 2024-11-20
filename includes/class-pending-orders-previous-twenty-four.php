<?php

namespace AutomateWoo\Rules;

defined( 'ABSPATH' ) || exit;

/**
 * Class Pending_Orders_In_Previous_Twenty_Four
 */
class Pending_Orders_Previous_Twenty_Four extends Abstract_Number {

	public $data_item      = 'order';
	public $support_floats = false;

	/**
	 * Initializes the rule.
	 */
	public function init() {
		$this->title = __( 'Shop - Pending Orders in Previous 24 Hours', 'automatewoo' );
		$this->group = __( 'Shop', 'automatewoo' );
	}

	/**
	 * Validates the rule against the number of pending orders in the store for the last 24 hours.
	 *
	 * @param $order \WC_Order
	 * @param $compare string
	 * @param $value int The number of pending orders to check against.
	 * @return bool
	 */
	public function validate( $order, $compare, $value ) {
		// Ensure value is an integer representing number of pending orders
		$pending_orders_compare = (int) $value;

		// Prepare query arguments for getting pending orders
		$query_args = array(
			'status'       => 'wc-pending',
			'date_created' => '>' . ( time() - ( 24 * HOUR_IN_SECONDS ) ),
			'return'       => 'ids',
		);

		// Get pending orders
		$pending_orders_actual = wc_get_orders( $query_args );

		// Use the inbuilt validate_number method to compare the count of pending orders
		return $this->validate_number( count( $pending_orders_actual ), $compare, $pending_orders_compare );
	}
}

return new Pending_Orders_Previous_Twenty_Four();
