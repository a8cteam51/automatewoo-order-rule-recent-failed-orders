<?php
/*
 * Plugin Name: AutomateWoo Order Rule - Recent Failed Orders
 * Plugin URI:  https://github.com/a8cteam51/automatewoo-order-rule-recent-failed-orders
 * Description: Extends the functionality of AutomateWoo with a custom rule which checks for recent failed orders
 * Version:     1.0.0
 * Author:      WP Special Projects
 * Author URI:  https://wpspecialprojects.wordpress.com/
 * License:     GPL v2 or later
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


add_filter( 'automatewoo/rules/includes', 'to51_automatewoo_failed_order_rules' );

/**
 * @param array $rules
 * @return array
 */
function to51_automatewoo_failed_order_rules( $rules ) {
	$rules['failed_orders_in_last_hour']     = dirname( __FILE__ ) . '/includes/class-failed-orders-previous-hour.php';
	$rules['failed_orders_in_last_12_hours'] = dirname( __FILE__ ) . '/includes/class-failed-orders-previous-twelve.php';
	$rules['failed_orders_in_last_24_hours'] = dirname( __FILE__ ) . '/includes/class-failed-orders-previous-twenty-four.php';
	return $rules;
}
