<?php
// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) exit( 'Direct script access denied.' );

/**
 * WordPress - Moved Css To Footer
 * By Fouad Badawy
 */

if ( ! class_exists( 'WOOHOO_CSS_TO_FOOTER' ) )
{
	class WOOHOO_CSS_TO_FOOTER
	{

		public $stored_styles = '';

		/**
		 * __construct
		 *
		 * Class constructor where we will call our filter and action hooks.
		 */
		function __construct()
		{

			if ( ! WOOHOO_BWPMINIFY_IS_ACTIVE || ! woohoo_get_option( 'bdaia_css_to_footer' ) ) return;

			$bwp_options = get_option( 'bwp_minify_general' );
			if( empty( $bwp_options[ 'enable_min_css'] ) || $bwp_options[ 'enable_min_css'] != 'yes' ) return;

			// ----
			add_action( 'bwp_minify_before_header_styles',  array( $this, '_before_header_styles' ));
			add_action( 'bwp_minify_printed_header_styles', array( $this, '_after_header_styles'  ));

			add_action( 'wp_footer', array( $this, '_print_styles' ), 6 );
			add_action( 'wp_head',   array( $this, '_hide_body' ));
		}


		/**
		 * _before_header_styles
		 *
		 * Buffering the styles
		 */
		function _hide_body()
		{
			echo '<style id="hide-the-body" type="text/css">body{visibility: hidden;}</style>';
		}


		/**
		 * _before_header_styles
		 *
		 * Buffering the styles
		 */
		function _before_header_styles()
		{
			ob_start();
		}


		/**
		 * _after_header_styles
		 *
		 * Get the styles
		 */
		function _after_header_styles()
		{
			$this->stored_styles = ob_get_clean();
		}


		/**
		 * _print_styles
		 *
		 * Print the styles
		 */
		function _print_styles()
		{
			echo ( $this->stored_styles );
		}

	}

	# Instantiate the class ----------
	new WOOHOO_CSS_TO_FOOTER();

}