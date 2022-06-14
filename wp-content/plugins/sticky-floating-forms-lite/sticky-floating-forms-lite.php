<?php
/**
 * Plugin Name: Sticky Floating Forms Lite
 * Plugin URI: https://codeworkweb.com//wordpress-plugins/sticky-floating-forms-lite/
 * Description: Sticky Floating Forms WordPress plugin allows you to add CTA buttons on your website and when the user clicks on that buttons it will display contact forms. This is useful to catch the attention of your site visitor and never miss any messages or contacts from your website. This plugin is an addon for the contact form 7 plugin but also works with all major popular form plugins.
 * Version: 1.0.3
 * Author: Code Work Web
 * Author URI:  https://codeworkweb.com/
 * Text Domain: sticky-floating-forms-lite
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /languages
 *
 */


if ( !defined( 'WPINC' ) ) {
    die();
}

define( 'STICKY_FLOATING_FORMS_LITE_DATA', 'Sticky Floating Forms Lite' ); ;
define( 'STICKY_FLOATING_FORMS_LITE_VER', '1.0.3' );

define( 'STICKY_FLOATING_FORMS_LITE_FILE', __FILE__ );
define( 'STICKY_FLOATING_FORMS_LITE_BASENAME', plugin_basename( STICKY_FLOATING_FORMS_LITE_FILE ) );
define( 'STICKY_FLOATING_FORMS_LITE_PATH', plugin_dir_path( STICKY_FLOATING_FORMS_LITE_FILE ) );
define( 'STICKY_FLOATING_FORMS_LITE_URL', plugins_url( '/', STICKY_FLOATING_FORMS_LITE_FILE ) );
	


require_once STICKY_FLOATING_FORMS_LITE_PATH .'sticky-floating-forms-class.php';
require_once STICKY_FLOATING_FORMS_LITE_PATH .'admin/settings-main.php';
require_once STICKY_FLOATING_FORMS_LITE_PATH .'frontend/frontend.php';
require_once STICKY_FLOATING_FORMS_LITE_PATH .'frontend/dynamic-styles.php';