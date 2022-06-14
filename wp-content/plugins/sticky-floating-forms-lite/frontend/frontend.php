<?php
if( ! class_exists('Sticky_Floating_Forms_Lite_Display') ):
	
	class Sticky_Floating_Forms_Lite_Display{

		public function __construct(){

			add_action( 'wp_footer',array($this,'frontend_display') );	
			
		}


		

		public function frontend_display(){
			

			$settings 			= Sticky_Floating_Forms_Lite_Settings::get_settings();
			
			$position 			= $settings['position'];
			$open_type 			= $settings['open_type'];
			$toggle_layout 		= 'layout-one';
		
			
			$body_class = $open_type;

			wp_print_styles( array( 'sticky-floating-forms-lite-frontend','dashicons' ) );
			?>
			
			<div id="cww-sff-disp-wrap-outer" class="cww-ssf-outer-wrapp btn-position-<?php echo esc_attr($position)?> <?php echo esc_attr($body_class)?>">
				<div class="cww-sff-inner">
					<div class="toggle-wrapp <?php echo esc_attr($toggle_layout)?>">
						<a class="cww-ssf-toggle" href="javascript:void(0)">
							<?php esc_html_e($settings['button_text']); ?>
						</a>	
					</div>
				
					<div class="cww-sff-wrapp">
						<i class="dashicons dashicons-no-alt"></i>
						
					<?php self::form_content_type(); ?>
					<?php esc_html_e('This form is powered by:','sticky-floating-forms-lite');?>
					<a href="https://wordpress.org/plugins/sticky-floating-forms-lite/" target="_blank"><?php echo STICKY_FLOATING_FORMS_LITE_DATA; ?></a>
					</div>
				</div>
			</div>
			<div class="cww-sf-form-overlay"></div>
			<?php 

		}

		public function form_content_type(){
			$settings 			= Sticky_Floating_Forms_Lite_Settings::get_settings();
			$form_shortcode 	= $settings['form_shortcode'];
			$cf7_forms 			= $settings['cf7_forms'];
		
			if ( function_exists( 'wpcf7' ) && $cf7_forms ) {
				echo do_shortcode( '[contact-form-7  id="'.absint($cf7_forms).'"]' );

			}elseif( $form_shortcode ){
				echo do_shortcode(esc_html(stripslashes($form_shortcode)));
			}else{
				esc_html_e('No Form Selected','sticky-floating-forms-lite');
				
				if( current_user_can('administrator') ){ ?>
					<a href="<?php echo admin_url('admin.php?page=sticky-floating-forms-lite')?>"><?php esc_html_e('Select Form To Display','sticky-floating-forms-lite'); ?></a>
				<?php }
			}
		}

	}

endif;


if ( !is_admin() ) {
    new Sticky_Floating_Forms_Lite_Display;
}
