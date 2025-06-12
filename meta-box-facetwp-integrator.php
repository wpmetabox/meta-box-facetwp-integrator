<?php
/**
 * Plugin Name:      MB FacetWP Integration
 * Plugin URI:       https://metabox.io/plugins/mb-facetwp-integrator/
 * Description:      Integrates Meta Box custom fields with FacetWP.
 * Author:           MetaBox.io
 * Version:          1.1.5
 * Author URI:       https://metabox.io
 * Requires Plugins: meta-box
 * License:          GPL-2
 * Text Domain:      meta-box-facetwp-integrator
 * Domain Path:      /languages/
 */

// Prevent loading this file directly.
if ( ! defined( 'ABSPATH' ) ) {
	return;
}

if ( ! function_exists( 'mb_facetwp_load' ) ) {

	if ( file_exists( __DIR__ . '/vendor' ) ) {
		require __DIR__ . '/vendor/autoload.php';
	}

	add_action( 'init', 'mb_facetwp_load', 5 );

	function mb_facetwp_load() {
		if ( ! defined( 'RWMB_VER' ) ) {
			return;
		}

		if ( ! class_exists( 'MB_FacetWP_Integrator' ) ) {
			require __DIR__ . '/class-mb-facetwp-integrator.php';
			new MB_FacetWP_Integrator;

			add_action( 'mb_relationships_init', function () {
				add_filter( 'facetwp_facet_types', function ($types) {
					require_once __DIR__ . '/class-mb-relationships-facetwp.php';

					$types[ MB_Relationships_FacetWP::FACET_TYPE ] = new MB_Relationships_FacetWP();
					return $types;

				} );
			} );
		}

		load_plugin_textdomain( 'meta-box-facetwp-integrator', false, plugin_basename( __DIR__ ) . '/languages/' );
	}
}



