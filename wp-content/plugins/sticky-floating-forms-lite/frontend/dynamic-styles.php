<?php
if( ! class_exists('Sticky_Floating_Forms_Lite_Styles')):
	class Sticky_Floating_Forms_Lite_Styles{


		public function __construct(){
			add_action( 'wp_enqueue_scripts', array($this, 'dynamic_stylings') );
		}

		public function strip_whitespace($css){
		    $replace = array(
		    "#/\*.*?\*/#s" => "",  
		    "#\s\s+#"      => " ", 
		    );
		    $search = array_keys($replace);
		    $css = preg_replace($search, $replace, $css);
		    
		    $replace = array(
		    ": "  => ":",
		    "; "  => ";",
		    " {"  => "{",
		    " }"  => "}",
		    ", "  => ",",
		    "{ "  => "{",
		    ";}"  => "}", // Strip optional semicolons.
		    ",\n" => ",", // Don't wrap multiple selectors.
		    "\n}" => "}", // Don't wrap closing braces.
		    //"} "  => "}\n", // Put each rule on it's own line.
		    );
		    $search = array_keys($replace);
		    $css = str_replace($search, $replace, $css);
		    
		    return trim($css);
		}


		public function dynamic_stylings(){
			ob_start();

			$settings 						= Sticky_Floating_Forms_Lite_Settings::get_settings();
			$defaults 						= Sticky_Floating_Forms_Lite_Settings::default_values();
			
			
			$toggle_button_bg 				= $settings['toggle_button_bg'];
			$toggle_button_color 			= $settings['toggle_button_color'];
			$toggle_button_bg_hover 		= $settings['toggle_button_bg_hover'];
			

			?>

				<?php //toggle button color ?>
				.cww-ssf-outer-wrapp .cww-ssf-toggle, .cww-ssf-outer-wrapp .cww-ssf-toggle:visited{
					background-color: <?php echo esc_html($toggle_button_bg); ?>;
					border-color: <?php echo esc_html($toggle_button_bg); ?>;
					color: <?php echo esc_html($toggle_button_color); ?>;
				}

				.cww-ssf-outer-wrapp .cww-ssf-toggle:hover{
					background-color: <?php echo esc_html($toggle_button_bg_hover); ?>;
					border-color: <?php echo esc_html($toggle_button_bg_hover); ?>;
				}
		

			<?php 

			$dynamic_css = ob_get_clean();
			$dynamic_css = self::strip_whitespace( $dynamic_css );

			wp_add_inline_style( 'sticky-floating-forms-lite-frontend', $dynamic_css );
		}




	}

	new Sticky_Floating_Forms_Lite_Styles();
endif;