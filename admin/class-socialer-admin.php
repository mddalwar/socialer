<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://codeblowing.com
 * @since      1.0.0
 *
 * @package    Socialer
 * @subpackage Socialer/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Socialer
 * @subpackage Socialer/admin
 */
class Socialer_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'admin_menu', array( $this, 'socialer_admin_option_page' ) );
		add_action( 'admin_init', array( $this, 'settings_register' ) );
	}

	public function settings_register() {
		add_settings_section( 'socialer_section', 'Section Title', null, 'socialer_settings' );
		add_settings_field( 'socialer_location', __( 'Diplay Location', $this->plugin_name ), array( $this, 'locationHTML' ), 'socialer_settings', 'socialer_section' );
		
		register_setting(
			'socialer', 
			'socialer_location', 
			array(
				'type' 				=> 'string', 
				'sanitize_callback' => 'sanitize_text_field',
				'default' 			=> NULL,
			) 
		);
	}

	public function locationHTML(){
		?>
			<select name="" id="">
				<option value="left">Left</option>
				<option value="right">Right</option>
			</select>
		<?php
	}

	public function socialer_settings_html(){
		?>
			<form action="options.php" method="POST">
				<?php 
					do_settings_sections( 'socialer_settings' );
					submit_button();
				?>
			</form>
		<?php
	}

	public function socialer_admin_option_page(){
		add_options_page( 
			__( 'Socialer', $this->plugin_name ), 
			__( 'Socialer', $this->plugin_name ), 
			'manage_options', 
			'socialer_settings', 
			array( $this, 'socialer_settings_html' )
		);
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Socialer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Socialer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/socialer-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Socialer_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Socialer_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/socialer-admin.js', array( 'jquery' ), $this->version, false );

	}

}
