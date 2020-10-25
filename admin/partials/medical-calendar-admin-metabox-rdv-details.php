<?php

/**
 * Provide the view for a metabox
 *
 * @link 		http://slushman.com
 * @since 		1.0.0
 *
 * @package 	Medical_Calendar
 * @subpackage 	Medical_Calendar/admin/partials
 */

wp_nonce_field( $this->plugin_name, 'rdv_details' );

$atts 					= array();
$atts['class'] 			= '';
$atts['description'] 	= '';
$atts['id'] 			= 'rdv-details-datetime';
$atts['label'] 			= 'Date et Heure';
$atts['name'] 			= 'rdv-details-datetime';
$atts['placeholder'] 	= '';
$atts['type'] 			= 'datetime-local';
$atts['value'] 			= '';
$atts['max']            = '';
$atts['min']            = '';
$atts['step']           = '60';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . $this->plugin_name . '-admin-field-datetime.php' );

?></p><?php



/*$atts 					= array();
$atts['description'] 	= '';
$atts['id'] 			= 'rdv-responsibilities';
$atts['label'] 			= 'Responsibilities';
$atts['settings']['textarea_name'] = 'rdv-responsibilities';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><p><?php

//include( plugin_dir_path( __FILE__ ) . $this->plugin_name . '-admin-field-textarea.php' );
include( plugin_dir_path( __FILE__ ) . $this->plugin_name . '-admin-field-editor.php' );

?></p><?php



$atts 					= array();
$atts['description'] 	= '';
$atts['id'] 			= 'rdv-additional-info';
$atts['label'] 			= 'Additional Info';
$atts['settings']['textarea_name'] = 'rdv-additional-info';
$atts['value'] 			= '';

if ( ! empty( $this->meta[$atts['id']][0] ) ) {

	$atts['value'] = $this->meta[$atts['id']][0];

}

apply_filters( $this->plugin_name . '-field-' . $atts['id'], $atts );

?><p><?php

include( plugin_dir_path( __FILE__ ) . $this->plugin_name . '-admin-field-editor.php' );

?></p>*/