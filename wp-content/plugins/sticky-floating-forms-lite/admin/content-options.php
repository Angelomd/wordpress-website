<div class="cww-admin cww-contents">
	<?php $this->get_setting_page_titles('contents');?>
<div class="inner-settings-help-wrapper">
	<div class="inner-settings-wrapp">
	<div class="cww-setting-items">

		<?php if ( function_exists( 'wpcf7' ) ) { ?>	
			<div class="setting-item cww-flex-flex">
				<div class="setting-label">
					<label for="cf7_forms">
					<?php esc_html_e('Select Form','sticky-floating-forms-lite'); ?>
					</label>
					<div class="setting-info"><?php esc_html_e('Select contact form which you want to use.','sticky-floating-forms-lite'); ?></div>
				</div>
				<div class="setting-field">
				<select name="sf_forms_settings[cf7_forms]" id="cf7_forms">
					<?php 
					$cf7_form_lists = Sticky_Floating_Forms_Lite::sff_get_contact_form_7_forms();
					$cf7_forms 		= $sf_forms_settings['cf7_forms'];
					foreach ($cf7_form_lists as $id=>$cf7_form_list ){ ?>
                   		<option value="<?php echo esc_attr($id)?>" <?php echo ($cf7_forms == $id) ? 'selected' : '' ?>><?php echo esc_html($cf7_form_list); ?></option>
					<?php }?>
                   
                </select>
				</div>
			</div>
		<?php }else{ ?>
		<div class="setting-item cww-flex-flex">
			<div class="setting-label">
				<label for="form_shortcode">
				<?php esc_html_e('Form Shortcode','sticky-floating-forms-lite'); ?>
				</label>
				<div class="setting-info"><?php esc_html_e('Add shortcode of form you want to display.','sticky-floating-forms-lite'); ?></div>
			</div>
			<div class="setting-field">
				<input type="text" name="sf_forms_settings[form_shortcode]" id="form_shortcode" value="<?php esc_attr_e(stripslashes($sf_forms_settings['form_shortcode']))?>">
			</div>
		</div>
		<?php } ?>

		<div class="setting-item cww-flex-flex">
			<div class="setting-label">
				<label for="button_text">
				<?php esc_html_e('Button Text','sticky-floating-forms-lite'); ?>
				</label>
				<div class="setting-info"><?php esc_html_e('Text to display on toggle button.','sticky-floating-forms-lite'); ?></div>
			</div>
			<div class="setting-field">
				<input type="text" name="sf_forms_settings[button_text]" id="button_text" value="<?php esc_attr_e(stripslashes($sf_forms_settings['button_text']))?>">
			</div>
		</div>
		

		<?php //Icon ?>
		<div class="setting-item cww-flex-flex pro-feature-display">
			<img src="<?php echo esc_url(STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/icon-picker.png')?>">
			<div class="bg-overlay"></div>
			<div class="pro-overlay"><?php esc_html_e('Pro Feature','sticky-floating-forms-lite'); ?></div>
		</div>

		

		
		
		<div class="setting-sep"></div>
		
		<div class="setting-item cww-flex-flex pro-feature-display">
			<img src="<?php echo esc_url(STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/form-header.png')?>">
			<div class="bg-overlay"></div>
			<div class="pro-overlay"><?php esc_html_e('Pro Feature','sticky-floating-forms-lite'); ?></div>
		</div>

		

	
		

		


	</div>


	</div><!-- .inner-settings-wrapp -->

	

</div>


</div>