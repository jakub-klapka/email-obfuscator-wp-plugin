<?php


namespace Lumi_EOB\Frontend;


class Shortcode {

	public function __construct()
	{

		add_shortcode( 'lumi-email', array( $this, 'register_shortcode' ) );

	}

	public function register_shortcode($atts, $email = null)
	{
		extract( shortcode_atts( array(
			'title' => '',
			'class' => ''
		), $atts ) );

		//Check for valid email
		if( empty( $email ) || !is_email( $email ) ) {
			return false;
		}

		//enqueue script
		/**
		 * Filter: lumi-email-obfuscator/jquery_library
		 * Script depends on jquery, if you have jquery included in other script handle, you can change it here
		 */
		wp_enqueue_script( 'lumi-eob', plugins_url( 'js/lumi_eob.js', dirname(__FILE__) ), array( apply_filters( 'lumi-email-obfuscator/jquery_library', 'jquery' ) ), LUMI_EOB_CSS_JS_VER, true );

		//construct link
		/** @var string $class */
		$classes = explode( ' ', $class );
		$classes[] = 'lumi_email_decode';
		$class_names = implode( ' ', $classes );
		$title = ( empty( $title ) ) ? $email : $title;
		$href = 'mailto:' . $email;

		$output = sprintf( '<a href="%s" class="%s">%s</a>',
			str_rot13( $href ), $class_names, str_rot13($title) );

		return $output;

	}

} 