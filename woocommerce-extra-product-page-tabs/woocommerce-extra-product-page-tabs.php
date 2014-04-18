<?php
/**
 * Plugin Name: Extra Tabs in WooCommerce Single Product Page
 * Plugin URI: http://www.velaseo.com
 * Description: Allows creation of extra product page tabs. Also allows deciding on the the order of the tabs.
 * Version: 0.1
 * Author: Vagish Vela
 * Author URI: http://www.vagish.com
 * License: GPL2
 */

//****** TAB 1 AREA START HERE ******
//* Add First Extra Tab Filter
add_filter( 'woocommerce_product_tabs', 'woo_extra_product_tab_1' );
function woo_extra_product_tab_1( $tabs ) {
// Adds the new tab
$tabs['climate'] = array(
'title' => __( 'Tab 1', 'woocommerce' ), // Replace Tab 1 with chosen name
'priority' => 25, // Priority effects the order
'callback' => 'woo_extra_product_tab_1_content'
);
return $tabs;
}
function woo_extra_product_tab_1_content() {
 
// The First Extra tab content
$product_tab_1_values = get_post_custom_values('product_tab_1');
	if ( is_array($product_tab_1_values) ) {
  foreach ( $product_tab_1_values as $product_tab_1_key => $product_tab_1_value ) {
	echo '<h2>Tab 1</h2>'; // Replace Tab 1 with chosen name
	echo $product_tab_1_value; 	   
	}
    }
	else  { echo ''; }
}
//****** TAB 2 AREA ENDS HERE ******

//Re-order WooCommerce Tabs

add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {
 
$tabs['reviews']['priority'] = 90; // Change number to change order
$tabs['description']['priority'] = 1; // Change number to change order
$tabs['additional_information']['priority'] = 80; // Change number to change order
 
return $tabs;
}
?>