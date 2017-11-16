<?php
/**
 * Plugin Name: Meta Box - FacetWP Integrator
 * Plugin URI: https://metabox.io/plugins/mb-facetwp-integrator/
 * Description: Integrates Meta Box custom fields with FacetWP.
 * Author: MetaBox.io
 * Version: 1.0.0
 * Author URI: https://metabox.io
 *
 * @package    Meta Box
 * @subpackage MB FacetWP Integrator
 */

include_once plugin_dir_path( __FILE__ ) . 'class-mb-facetwp-integrator.php';
$integrator = new MB_FacetWP_Integrator();
$integrator->init();
