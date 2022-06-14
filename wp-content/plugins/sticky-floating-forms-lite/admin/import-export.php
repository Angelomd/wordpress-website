<div class="cww-admin cww-import-export">
	<?php $this->get_setting_page_titles('import-export');?>
<div class="inner-settings-help-wrapper">
	<div class="inner-settings-wrapp">
	<div class="cww-setting-items">

    <?php 
    $encoded = json_encode($sf_forms_settings);
	$encoded = base64_encode($encoded);
    ?>

        <div class="setting-item cww-flex-flex">
			<div class="setting-label">
				<label for="form_export">
				<?php esc_html_e('Export','sticky-floating-forms-lite'); ?>
				</label>
				<div class="setting-info"><?php esc_html_e('Copy the code to export your settings.','sticky-floating-forms-lite'); ?></div>
			</div>
			<div class="setting-field copy-content-wrapper">
				<textarea class="copy-content" id="form_export" cols="75" rows="10" readonly="readonly"><?php echo $encoded; ?></textarea>
				<a href="javascript:void(0)" class="copy-btn"><?php esc_html_e('Click To Copy','sticky-floating-forms-lite')?></a>
			</div>
		</div>	

        <div class="setting-item cww-flex-flex">
			<div class="setting-label">
				<label for="form_import">
				<?php esc_html_e('Import','sticky-floating-forms-lite'); ?>
				</label>
				<div class="setting-info"><?php esc_html_e('Paste your code here to save settings.','sticky-floating-forms-lite'); ?></div>
			</div>
			<div class="setting-field">
				<textarea  name="sf_forms_settings[settings_importer]" id="form_import" cols="75" rows="10"></textarea>
			</div>
			<button name="cww-settings-import" class="button cww-settings-import"><?php esc_html_e( 'Import Settings', 'sticky-floating-forms-lite' )?></button>
		</div>	
        

    </div>
    </div>

</div>
</div>