<?php

namespace AutomateWoo\Rules;

defined( 'ABSPATH' ) || exit;

/**
 * Class Failed_Orders_In_Previous_Hour
 */
class Failed_Orders_Previous_Hour extends Abstract_Number {

	public $data_item      = 'order';
	public $support_floats = false;

	/**
	 * Initializes the rule.
	 */
	public function init() {
		$this->title = __( 'Shop - Failed Orders in Previous Hour', 'automatewoo' );
		$this->group = __( 'Shop', 'automatewoo' );
	}

	/**
	 * Validates the rule against the number of failed orders in the store for the last hour.
	 *
	 * @param $order \WC_Order
	 * @param $compare string
	 * @param $value int The number of failed orders to check against.
	 * @return bool
	 */
	public function validate( $order, $compare, $value ) {
		// Ensure value is an integer representing number of failed orders
		$failed_orders_compare = (int) $value;

		// Prepare query arguments for getting failed orders
		$query_args = array(
			'status'       => 'wc-failed',
			'date_created' => '>' . ( time() - ( HOUR_IN_SECONDS ) ),
			'return'       => 'ids',
		);

		// Get failed orders
		$failed_orders_actual = wc_get_orders( $query_args );

		// Use the inbuilt validate_number method to compare the count of failed orders
		return $this->validate_number( count( $failed_orders_actual ), $compare, $failed_orders_compare );
	}
}

return new Failed_Orders_Previous_Hour();
