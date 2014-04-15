<?php
/**
 * Plugin Name: Lumiart's Email Obfuscator
 * Description: Hide e-mail from robots using shortcode: [lumi-email title="Send me and e-mail" class="emailclass1 emailclass2"]me@example.com[/lumi-email]
 * Version: 1.0
 * Author: Jakub Klapka
 * Author URI: http://www.lumiart.cz
 * License: GPL2
 */

define( 'LUMI_EOB_CORE_PATH', plugin_dir_path(__FILE__) . 'core/' );
define( 'LUMI_EOB_CSS_JS_VER', 1 );
define( 'LUMI_EOB_TEXTDOMAIN', 'Lumi Email Obfuscator' );


/**
 * Var containing references to all theme objects
 * @var array $lumi_eob array with all classes used in template, by namespace
 *      $lumi['Glob'|'Admin'|'Frontend'][class_name]
 */
$lumi_eob = array();
global $lumi_eob;


/**
 * Global config
 */
$lumi_eob['Config'] = array(
);


/**
 * Classes autoloading
 * Will load files in core directory absed on their suffix
 *      .glob.php will be loaded everytime
 *      .admin.php will be loaded in admin (is_admin())
 *      .frontend.php will be loaded when not in admin (even logged in)
 */
$core['Glob'] = glob( LUMI_EOB_CORE_PATH . '*.glob.php' );
if( is_admin() ) {
	$core['Admin'] = glob( LUMI_EOB_CORE_PATH . '*.admin.php' );
} else {
	$core['Frontend'] = glob( LUMI_EOB_CORE_PATH . '*.frontend.php' );
}
foreach( $core as $scope => $files ) {
	if( $files !== false ) {
		foreach( $files as $file ) {
			include_once $file;
			$class_name = basename( $file, '.' . strtolower($scope) . '.php' );
			$class_path = '\\Lumi_EOB\\' . $scope . '\\' . $class_name;
			$lumi_eob[$scope][$class_name] = new $class_path;
		}
	}
}
