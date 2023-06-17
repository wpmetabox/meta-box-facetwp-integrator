<?php
/**
 * Plugin Name: Meta Box - FacetWP Integrator
 * Plugin URI:  https://metabox.io/plugins/mb-facetwp-integrator/
 * Description: Integrates Meta Box custom fields with FacetWP.
 * Author:      MetaBox.io
 * Version:     1.1.3
 * Author URI:  https://metabox.io
 *
 * @package    Meta Box
 * @subpackage MB FacetWP Integrator
 */

if ( ! class_exists( 'MB_FacetWP_Integrator' ) ) {
	require __DIR__ . '/class-mb-facetwp-integrator.php';
	new MB_FacetWP_Integrator;
}

add_action( 'mb_relationships_init', function () {
	add_filter( 'facetwp_facet_types', function( $types ) {
		require_once __DIR__ . '/class-mb-relationships-facetwp.php';

		$types[ MB_Relationships_FacetWP::FACET_TYPE ] = new MB_Relationships_FacetWP();
		return $types;
	} );
} );
