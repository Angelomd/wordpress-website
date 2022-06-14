<div class="cww-admin cww-display">
	<?php $this->get_setting_page_titles('display');?>
<div class="inner-settings-help-wrapper">
	<div class="inner-settings-wrapp">
	<div class="cww-setting-items">

		<div class="setting-item cww-flex-flex">
			<div class="setting-label">
				<label for="position">
				<?php esc_html_e('Position','sticky-floating-forms-lite'); ?>
				</label>
				<div class="setting-info"><?php esc_html_e('Choose button position on screen.','sticky-floating-forms-lite'); ?></div>
			</div>
			<div class="setting-field">
				<?php 
				$url 		= STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/';
				$position 	= $sf_forms_settings['position'];
				?>
				<label class="radio-img">
				    <input type="radio" name="sf_forms_settings[position]" value="bottom-right" <?php echo $position == 'bottom-right' ? 'checked' : '' ?>/>
				    <div class="image" style="background-image: url(<?php echo esc_url($url.'b1.png')?>)"></div>
			  	</label>

			  	<label class="radio-img">
				    <input type="radio" name="sf_forms_settings[position]" value="bottom-left" <?php echo $position == 'bottom-left' ? 'checked' : '' ?>/>
				    <div class="image" style="background-image: url(<?php echo esc_url($url.'b2.png')?>)"></div>
			  	</label>

			  	<label class="radio-img">
				    <input type="radio" name="sf_forms_settings[position]" value="left" <?php echo $position == 'left' ? 'checked' : '' ?>/>
				    <div class="image" style="background-image: url(<?php echo esc_url($url.'l1.png')?>)"></div>
			  	</label>

			  	<label class="radio-img">
				    <input type="radio" name="sf_forms_settings[position]" value="right" <?php echo $position == 'right' ? 'checked' : '' ?>/>
				    <div class="image" style="background-image: url(<?php echo esc_url($url.'r1.png')?>)"></div>
			  	</label>

			</div>
		</div>

		<div class="setting-item cww-flex-flex pro-feature-display">
			<img src="<?php echo esc_url(STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/button-layout.png')?>">
			<div class="bg-overlay"></div>
			<div class="pro-overlay"><?php esc_html_e('Pro Feature','sticky-floating-forms-lite'); ?></div>
		</div>

		<div class="setting-item cww-flex-flex">
			<div class="setting-label">
				<label for="toggle_button_bg">
				<?php esc_html_e('Button Background','sticky-floating-forms-lite'); ?>
				</label>
				<div class="setting-info"><?php esc_html_e('Background color for toggle button.','sticky-floating-forms-lite'); ?></div>
			</div>
			<div class="setting-field">
				<div class="rgba-color-input"  value="<?php echo absint($sf_forms_settings['toggle_button_bg']) ?>"></div>
				<input class="color-input-spectrum" type="text" name="sf_forms_settings[toggle_button_bg]" id="toggle_button_bg" value="<?php esc_attr_e($sf_forms_settings['toggle_button_bg'])?>">
			</div>
		</div>


		<div class="setting-item cww-flex-flex">
			<div class="setting-label">
				<label for="toggle_button_bg_hover">
				<?php esc_html_e('Button:Hover','sticky-floating-forms-lite'); ?>
				</label>
				<div class="setting-info"><?php esc_html_e('Button hover background color.','sticky-floating-forms-lite'); ?></div>
			</div>
			<div class="setting-field">
				<div class="color-input"  value="<?php echo absint($sf_forms_settings['toggle_button_bg_hover']) ?>"></div>
				<input class="color-input-selector" type="text" name="sf_forms_settings[toggle_button_bg_hover]" id="toggle_button_bg_hover" value="<?php esc_attr_e($sf_forms_settings['toggle_button_bg_hover'])?>">
			</div>
		</div>

		<div class="setting-item cww-flex-flex">
			<div class="setting-label">
				<label for="toggle_button_color">
				<?php esc_html_e('Button Text Color','sticky-floating-forms-lite'); ?>
				</label>
				<div class="setting-info"><?php esc_html_e('Toggle button text color.','sticky-floating-forms-lite'); ?></div>
			</div>
			<div class="setting-field">
				<div class="color-input"  value="<?php echo absint($sf_forms_settings['toggle_button_color']) ?>"></div>
				<input class="color-input-selector" type="text" name="sf_forms_settings[toggle_button_color]" id="toggle_button_color" value="<?php esc_attr_e($sf_forms_settings['toggle_button_color'])?>">
			</div>
		</div>

		<div class="setting-item cww-flex-flex pro-feature-display">
			<img src="<?php echo esc_url(STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/icon-typo.png')?>">
			<div class="bg-overlay"></div>
			<div class="pro-overlay"><?php esc_html_e('Pro Feature','sticky-floating-forms-lite'); ?></div>
		</div>


		<div class="setting-sep"></div>
		

		<div class="setting-item cww-flex-flex">
			<div class="setting-label">
				<label for="open_type">
				<?php esc_html_e('Open Type','sticky-floating-forms-lite'); ?>
				</label>
				<div class="setting-info"><?php esc_html_e('Choose how you want to display the form.','sticky-floating-forms-lite'); ?></div>
			</div>
			<div class="setting-field">
				<?php
				$open_type = $sf_forms_settings['open_type'];
				?>
				<select name="sf_forms_settings[open_type]" id="open_type">
					<option value="modal" <?php echo $open_type == 'modal' ? 'selected' : '' ?>> <?php esc_html_e('Popup - Modal','sticky-floating-forms-lite'); ?></option>
					<option value="attached" <?php echo $open_type == 'attached' ? 'selected' : '' ?>> <?php esc_html_e('Attached To Button','sticky-floating-forms-lite'); ?></option>
				</select>
			</div>
		</div>


		<div class="setting-item cww-flex-flex pro-feature-display">
			<img src="<?php echo esc_url(STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/auto-open.png')?>">
			<div class="bg-overlay"></div>
			<div class="pro-overlay"><?php esc_html_e('Pro Feature','sticky-floating-forms-lite'); ?></div>
		</div>

		<div class="setting-sep"></div>
		<h2 class="setting-group-title">
			<?php esc_html_e('Form Container','sticky-floating-forms-lite');?>
			<span>
				<i class="dashicons dashicons-arrow-right-alt2"></i>
				<i class="dashicons dashicons-arrow-down-alt2"></i>
			</span>
		</h2>

		<div class="setting-toggle-container-wrapp">

			<div class="setting-item cww-flex-flex pro-feature-display">
				<img src="<?php echo esc_url(STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/form-container.png')?>">
				<div class="bg-overlay"></div>
				<div class="pro-overlay"><?php esc_html_e('Pro Feature','sticky-floating-forms-lite'); ?></div>
			</div>

		</div>

		<div class="setting-sep"></div>
		<h2 class="setting-group-title">
			<?php esc_html_e('Form Input Fields','sticky-floating-forms-lite');?>
			<span>
				<i class="dashicons dashicons-arrow-right-alt2"></i>
				<i class="dashicons dashicons-arrow-down-alt2"></i>
			</span>
		</h2>

		<div class="setting-toggle-container-wrapp">
			
			<div class="setting-item cww-flex-flex pro-feature-display">
				<img src="<?php echo esc_url(STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/input-fields.png')?>">
				<div class="bg-overlay"></div>
				<div class="pro-overlay"><?php esc_html_e('Pro Feature','sticky-floating-forms-lite'); ?></div>
			</div>
		</div>

		

		<div class="setting-sep"></div>
		<h2 class="setting-group-title">
			<?php esc_html_e('Submit Button','sticky-floating-forms-lite');?>
			<span>
				<i class="dashicons dashicons-arrow-right-alt2"></i>
				<i class="dashicons dashicons-arrow-down-alt2"></i>
			</span>
		</h2>
		<div class="setting-toggle-container-wrapp">

			<div class="setting-item cww-flex-flex pro-feature-display">
				<img src="<?php echo esc_url(STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/submit-btn.png')?>">
				<div class="bg-overlay"></div>
				<div class="pro-overlay"><?php esc_html_e('Pro Feature','sticky-floating-forms-lite'); ?></div>
			</div>	
		
		</div>

		<div class="setting-sep"></div>
		<h2 class="setting-group-title">
			<?php esc_html_e('Form Header Title','sticky-floating-forms-lite');?>
			<span>
				<i class="dashicons dashicons-arrow-right-alt2"></i>
				<i class="dashicons dashicons-arrow-down-alt2"></i>
			</span>
		</h2>

		<div class="setting-toggle-container-wrapp">

			
			<div class="setting-item cww-flex-flex pro-feature-display">
				<img src="<?php echo esc_url(STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/img/header-title.png')?>">
				<div class="bg-overlay"></div>
				<div class="pro-overlay"><?php esc_html_e('Pro Feature','sticky-floating-forms-lite'); ?></div>
			</div>	
			
		</div>

		

		


	</div>


	</div><!-- .inner-settings-wrapp -->

	

</div>


</div>