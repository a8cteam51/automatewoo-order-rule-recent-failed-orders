<?php

namespace AutomateWoo\Rules;

defined( 'ABSPATH' ) || exit;

class Failed_Orders_Previous_Hour extends Abstract_Number {

	public $data_item      = 'shop';
	public $support_floats = false;

	public function init() {
		$this->title = __( 'Shop - Failed Orders in Previous Hour', 'automatewoo' );
		$this->group = __( 'Shop', 'automatewoo' );
	}

	/**
	 * Validates the rule against the number of failed orders in the store for the last hour.
	 *
	 * @param $data_item mixed The data item from the trigger (not used in this rule)
	 * @param $compare string
	 * @param $value int The number of failed orders to check against.
	 *
	 * @return bool
	 */
	public function validate( $data_item, $compare, $value ) {
		// Rest of the validation code remains the same
		$failed_orders_compare = (int) $value;

		$query_args = array(
			'status'       => 'wc-failed',
			'date_created' => '>' . ( time() - ( HOUR_IN_SECONDS ) ),
			'return'       => 'ids',
		);

		$failed_orders_actual = wc_get_orders( $query_args );

		return $this->validate_number( count( $failed_orders_actual ), $compare, $failed_orders_compare );
	}
}

return new Failed_Orders_Previous_Hour();
