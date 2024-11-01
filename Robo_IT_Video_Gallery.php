<?php
/*
	Plugin Name: Robo IT Video Gallery
	Plugin URI: http://robo-it.esy.es/video-gallery-awesome-responsive-youtube-vimeo-gallery/
	Description: This Video Gallery helps you to create and show your videos in your web-page how you designed it.
	Version: 1.1.0
	Author: Robo-IT
	Author URI: http://robo-it.esy.es/
	License: GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
*/

add_action('widgets_init', function() {
 	register_widget('Robo_IT_Video_Gallery');
});
require_once('Robo_IT_Video_Gallery_Widget.php');
require_once('Robo_IT_Video_Gallery_Ajax.php');
require_once('Robo_IT_Video_Gallery_Shortcode.php');

add_action('wp_enqueue_scripts','Robo_IT_Video_Gallery_Style');

function Robo_IT_Video_Gallery_Style()
{
	wp_register_style('Robo_IT_Video_Gallery', plugins_url( 'Style/Robo_IT_Video_Gallery_Widget.css',__FILE__ ));
	wp_register_style('fontawesome-css', plugins_url('/Style/roboiticons.css', __FILE__)); 
    wp_enqueue_style('fontawesome-css');
   
	wp_enqueue_style('Robo_IT_Video_Gallery');

	wp_register_script('Robo_IT_Video_Gallery',plugins_url('Scripts/Robo_IT_Video_Gallery_Widget.js',__FILE__),array('jquery','jquery-ui-core'));
	wp_enqueue_script('cwp-main', plugins_url('/Scripts/jssor.slider.mini.js', __FILE__), array('jquery', 'jquery-ui-core'));
	wp_localize_script('Robo_IT_Video_Gallery', 'object', array('ajaxurl' => admin_url('admin-ajax.php')));
	wp_enqueue_script('Robo_IT_Video_Gallery');
}

add_action("admin_menu", 'Robo_IT_Video_Gallery_Admin_Menu' );

	function Robo_IT_Video_Gallery_Admin_Menu() 
	{
		add_menu_page('Robo_IT_Video_Gallery_Admin_Menu','Video Gallery','manage_options','Robo_IT_Video_Gallery_Admin_Menu','Manage_Robo_IT_Video_Gallery_Admin_Menu',plugins_url('/Images/video-gallery-admin.png',__FILE__));

 		add_submenu_page( 'Robo_IT_Video_Gallery_Admin_Menu', 'Robo_IT_Video_Gallery_Admin_Menu_page_1', 'Gallery Manager', 'manage_options', 'Robo_IT_Video_Gallery_Admin_Menu', 'Manage_Robo_IT_Video_Gallery_Admin_Menu');
		add_submenu_page( 'Robo_IT_Video_Gallery_Admin_Menu', 'Robo_IT_Video_Gallery_Admin_Menu_page_3', 'General Options', 'manage_options', 'Robo_IT_Video_Gallery_Admin_Menu_General_Options', 'Manage_Robo_IT_Video_Gallery_Admin_Menu_submenu_3');
	}
	function Manage_Robo_IT_Video_Gallery_Admin_Menu()
	{
		require_once('Robo_IT_Video_Gallery_Admin_Menu.php');
		require_once('Scripts/Robo_IT_Video_Gallery_Submenu1.js.php');
		require_once('Style/Robo_IT_Video_Gallery_Submenu1.css.php');
	}
	function Manage_Robo_IT_Video_Gallery_Admin_Menu_submenu_3()
	{
		require_once('Robo_IT_Video_Gallery_Admin_Menu_General_Options.php');
		require_once('Scripts/Robo_IT_Video_Gallery_Submenu3.js.php');
		require_once('Style/Robo_IT_Video_Gallery_Submenu3.css.php');
	}

	add_action('admin_init', function() {

		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');

		wp_register_script('Robo_IT_Video_Gallery', plugins_url('Scripts/Robo_IT_Video_Gallery_Admin.js',__FILE__),array('jquery','jquery-ui-core'));
		wp_localize_script('Robo_IT_Video_Gallery', 'object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script('Robo_IT_Video_Gallery');

		wp_register_style('Robo_IT_Video_Gallery', plugins_url('Style/Robo_IT_Video_Gallery_Admin_Style.css', __FILE__ ));
		wp_enqueue_style('Robo_IT_Video_Gallery');
		wp_register_style( 'fontawesome-css', plugins_url('/Style/roboiticons.css', __FILE__)); 
   		wp_enqueue_style( 'fontawesome-css' );	 
	});

	register_activation_hook(__FILE__,'Robo_IT_Video_Gallery_wp_activate');

	function Robo_IT_Video_Gallery_wp_activate()
	{
		require_once('Robo_IT_Video_Gallery_Install.php');
	}
?>