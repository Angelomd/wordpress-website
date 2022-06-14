<?php
if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly


if( ! class_exists('Sticky_Floating_Forms_Lite_Settings')):

	class Sticky_Floating_Forms_Lite_Settings{

		public function __construct(){

			add_action( 'admin_menu', array( $this, 'register_menu' ) );

		}

		

		/**
		 * Create an admin menu.
		 * @param
		 * @return void
		 * @since 1.0.0
		 */
		public function register_menu() {

			add_menu_page(
				esc_html__('Sticky Floating Forms','sticky-floating-forms-lite'),
				esc_html__('Sticky Floating Forms','sticky-floating-forms-lite'),
				'manage_options',
				'sticky-floating-forms-lite',
				array( $this, 'admin_settings_page' ), //callback function
				'dashicons-feedback',
				30
			);

		}

		/**
		 * Callback function for plugin menu 
		 * 
		 * 
		 * 
		 */ 
		public function admin_settings_page(){
			echo '<div class="cww-sff-wrapper">';
				self::settings_tabs();
			echo '<div class="cww-settings-wrapper cww-flex-flex">';
				
				self::setting_page_form();
			echo '</div>';
			echo '</div>';

		}

		/**
		 * Dynamically generate setting tab contents
		 * 
		 * 
		 */ 
		public function setting_menu_texts(){

			$settings = array(

				'contents' => array(
					'name' => esc_html__('Content','sticky-floating-forms-lite'),
					'icon' => 'dashicons-editor-alignleft',
					'info' => esc_html__('Manage contents for forms','sticky-floating-forms-lite'),
				),

				'display' => array(
					'name' => esc_html__('Design','sticky-floating-forms-lite'),
					'icon' => 'dashicons-admin-appearance',
					'info' => esc_html__('Design your forms & buttons here.','sticky-floating-forms-lite'),
				),

				'rules' => array(
					'name' => esc_html__('Display Rules','sticky-floating-forms-lite'),
					'icon' => 'dashicons-editor-code',
					'info' => esc_html__('Manage display rules for the pluginin.','sticky-floating-forms-lite'),
				),
				
				'import-export' => array(
					'name' => esc_html__('Import & Export','sticky-floating-forms-lite'),
					'icon' => 'dashicons-database-import',
					'info' => esc_html__('Import & export your settings.','sticky-floating-forms-lite'),
				),

				

				

			);

			return $settings;
		}

		/**
		 * Titles to display on plugin setting pages
		 * 
		 */ 
		public function get_setting_page_titles( $setting_id = 'contents' ){
			$settings = self::setting_menu_texts();
			
			echo '<div class="setting-title">';
				echo '<span class="dashicons '.esc_attr($settings[$setting_id]['icon']).'"></span>';
			echo '<div class="text-wrapp">';
				echo '<h3>'.esc_html($settings[$setting_id]['name']).'</h3>';
				echo '<span class="menu-info">'.esc_html($settings[$setting_id]['info']).'</span>';
			echo '</div>';
			echo '</div>';
		}

		/**
		 * Plugin settings tabs
		 * 
		 * 
		 */ 
		public function settings_tabs(){ ?>

			<div class="menu-wrapp">

				<div class="plugin-info">
					<h2 class="pl-name"><?php echo STICKY_FLOATING_FORMS_LITE_DATA; ?></h2>
					<div class="pl-ver"><?php echo esc_html__('Version: ','sticky-floating-forms-lite') .STICKY_FLOATING_FORMS_LITE_VER?></div>
				</div>

				<ul>
					<?php 
					$settings = $this->setting_menu_texts();
					
					foreach($settings as $key => $val ){
						
						echo '<li data-id="cww-'.esc_attr($key).'">';
							echo '<div class="menu-item"><span class="dashicons '.esc_attr($val['icon']).'"></span>'.esc_html($val['name']).'</div>';
						echo '</li>';

					}?>
				
					
				</ul>
			</div>

		<?php  }



		/**
		 * Plugin settings form
		 * 
		 */ 
		public function setting_page_form(){ ?>

			<div class="cww-setting-form-wrapper">
			<form method="post">
				
				<?php
                
                if (isset($_POST['updated']) && $_POST['updated'] === 'true' && isset($_POST['submit']) ) {
                    $this->save_settings();
                }elseif( isset($_POST['reset_value'])){
					$this->reset_form_data();
				}elseif( isset($_POST['cww-settings-import']) ){
					$this->import_export();
				}

                $sf_forms_settings = self::get_settings();
				
                
                 ?>

                <input type="hidden" name="updated" value="true" />
                <?php wp_nonce_field('sticky_floating_forms_lite_nonce_update', 'sticky_floating_forms_lite_nonce'); ?>

                <div class="setting-display-wrapper">
                <?php 
                //include required plugin setting files
				$files = array(
					'content-options',
					'display',
					'import-export',
					'rules',
					
					
				);
				foreach( $files as $file ){

					$path = STICKY_FLOATING_FORMS_LITE_PATH.'admin/' . $file . '.php';
		            if( file_exists( $path ) ) {
		                require_once $path;
		            }
				}

                 ?>
                 </div>
              <p class="submit buttons-submit-wrapper">
                <button type="submit" name="submit" class="button button-primary button-hero"><i class="dashicons dashicons-cloud-saved"></i><?php esc_html_e('Save Settings', 'sticky-floating-forms-lite'); ?></button>
				<a href="https://codeworkweb.com/wordpress-plugins/sticky-floating-forms/" class="button button-hero btn-pro" target="_blank"><?php esc_html_e('Get Pro Version','sticky-floating-forms-lite'); ?></a>
				<button type="submit" name="reset_value" class="button button-primary button-hero button-reset" onclick="return confirm('This will delete all saved setings and set default values. Are you sure ?')"><i class="dashicons dashicons-update"></i><?php esc_html_e('Reset To Defaults', 'sticky-floating-forms-lite'); ?></button>
              </p>    
			</form>
			</div>
			<?php 
			
		}

		/**
		 * Color sanitization
		 *
		 */
		public static function sanitize_color( $color ) {
			if ( empty( $color ) || is_array( $color ) ) {
				return '';
			}

			// If string does not start with 'rgba', then treat as hex.
			// sanitize the hex color and finally convert hex to rgba
			if ( false === strpos( $color, 'rgba' ) ) {
				return sanitize_hex_color( $color );
			}

			// By now we know the string is formatted as an rgba color so we need to further sanitize it.
			$color = str_replace( ' ', '', $color );
			sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );

			return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
		}

		/**
		 * Setting default values
		 * 
		 * 
		 */ 
		public static function default_values(){
			$defaults = [
				'form_shortcode' 				=> '',
				'button_text' 					=> esc_html__('Contact Us','sticky-floating-forms-lite'),
				'position' 						=> 'bottom-right',
                'open_type' 					=> 'modal',
				'cf7_forms' 					=> 0,
				'toggle_button_bg' 				=> '#df3e7b',
				'toggle_button_color' 			=> '#fff',
				'toggle_button_bg_hover' 		=> '#c32863',
				

			];

			return $defaults;
		}

		public static function get_settings() {
            
            $defaults 			= self::default_values();
            $sf_forms_settings 	= get_option('sf_forms_settings');
            $sf_forms_settings 	= wp_parse_args($sf_forms_settings, $defaults);

            return $sf_forms_settings;
        }

		/**
		 * Sanitize array or string
		 *  
		 * */	
		public function sanitize_form_setting_array($input){

			if( is_string($input) ){
				$input = sanitize_text_field($input);
			}elseif( is_array($input) ){
				foreach ( $input as $key => $value ) {
					if ( is_array($value) ) {
						$value = self::sanitize_form_setting_array($value);
					}
					else {
						$value = sanitize_text_field($value);
					}
				}
			}
			return $input;
		}

        /**
         * Save plugin settings
         * 
         */ 
        public function save_settings(){
        	if (!isset($_POST['sticky_floating_forms_lite_nonce']) || !wp_verify_nonce($_POST['sticky_floating_forms_lite_nonce'], 'sticky_floating_forms_lite_nonce_update')) {
                ?>
                <div class="sff-error-notice sff-notice">
                    <p><?php esc_html_e('Sorry, your nonce was not correct. Please try again.', 'sticky-floating-forms-lite'); ?></p>
                    <i class="dashicons dashicons-no-alt"></i>
                </div> <?php
                exit;

            } else {
            	$sf_forms_settings = isset($_POST['sf_forms_settings']) ? self::sanitize_form_setting_array(wp_unslash($_POST['sf_forms_settings'])) : '';
				
            	
                $defaults = self::default_values();
                
				if ( function_exists( 'wpcf7' ) ) {
					$sf_forms_settings['cf7_forms'] 				= sanitize_text_field($sf_forms_settings['cf7_forms']);
				}else{
					$sf_forms_settings['form_shortcode'] 			= sanitize_text_field($sf_forms_settings['form_shortcode']);
				}

                $sf_forms_settings['button_text'] 					= sanitize_text_field($sf_forms_settings['button_text']);
                $sf_forms_settings['open_type'] 					= sanitize_text_field($sf_forms_settings['open_type']);
				$sf_forms_settings['position'] 						= sanitize_text_field($sf_forms_settings['position']);
				$sf_forms_settings['toggle_button_bg'] 				= self::sanitize_color($sf_forms_settings['toggle_button_bg']);
				$sf_forms_settings['toggle_button_color'] 			= sanitize_hex_color($sf_forms_settings['toggle_button_color']);
				$sf_forms_settings['toggle_button_bg_hover'] 		= sanitize_hex_color($sf_forms_settings['toggle_button_bg_hover']);
				

                update_option('sf_forms_settings', $sf_forms_settings); //update db
                ?>
                <div class="sff-success-notice sff-notice">
                    <p><?php esc_html_e('Settings saved!', 'sticky-floating-forms-lite'); ?></p>
                    <i class="dashicons dashicons-no-alt"></i>
                </div>
                <?php

            }
        }

		public function reset_form_data(){
			if (isset($_POST['sticky_floating_forms_lite_nonce']) || wp_verify_nonce($_POST['sticky_floating_forms_lite_nonce'], 'sticky_floating_forms_lite_nonce_update')) {
				delete_option('sf_forms_settings');
				?>
				<div class="sff-success-notice sff-notice">
                    <p><?php esc_html_e('Settings Restored To Default Values!', 'sticky-floating-forms-lite'); ?></p>
                    <i class="dashicons dashicons-no-alt"></i>
                </div>
				<?php 
			}
		}

		public function import_export(){
			
			if (isset($_POST['sticky_floating_forms_lite_nonce']) || wp_verify_nonce($_POST['sticky_floating_forms_lite_nonce'], 'sticky_floating_forms_lite_nonce_update')) {



				$sf_forms_settings = isset($_POST['sf_forms_settings']) ? self::sanitize_form_setting_array(wp_unslash($_POST['sf_forms_settings'])) : '';
				
				$settings_importer = $sf_forms_settings['settings_importer'];
				$settings_importer = base64_decode($settings_importer);
				$sf_forms_settings = json_decode(stripcslashes($settings_importer), true);
		

				if( json_last_error() != JSON_ERROR_NONE ){
					?>
					<div class="sff-error-notice sff-notice">
						<p><?php esc_html_e('Oops something went wrong!', 'sticky-floating-forms-lite'); ?></p>
						<i class="dashicons dashicons-no-alt"></i>
					</div>
					<?php 
					return;
				}
				
            	
                if ( function_exists( 'wpcf7' ) ) {
					$sf_forms_settings['cf7_forms'] 				= sanitize_text_field($sf_forms_settings['cf7_forms']);
				}else{
					$sf_forms_settings['form_shortcode'] 			= sanitize_text_field($sf_forms_settings['form_shortcode']);
				}

                $sf_forms_settings['button_text'] 					= sanitize_text_field($sf_forms_settings['button_text']);
                $sf_forms_settings['open_type'] 					= sanitize_text_field($sf_forms_settings['open_type']);
				$sf_forms_settings['position'] 						= sanitize_text_field($sf_forms_settings['position']);
                
				$sf_forms_settings['toggle_button_bg'] 				= self::sanitize_color($sf_forms_settings['toggle_button_bg']);
				$sf_forms_settings['toggle_button_color'] 			= sanitize_hex_color($sf_forms_settings['toggle_button_color']);
				$sf_forms_settings['toggle_button_bg_hover'] 		= sanitize_hex_color($sf_forms_settings['toggle_button_bg_hover']);
				


				update_option('sf_forms_settings', $sf_forms_settings); //update db
                ?>
                <div class="sff-success-notice sff-notice">
                    <p><?php esc_html_e('Settings Imported!', 'sticky-floating-forms-lite'); ?></p>
                    <i class="dashicons dashicons-no-alt"></i>
                </div>
                <?php


			}
		}


	}

	new Sticky_Floating_Forms_Lite_Settings();

endif;