<?php

function add_gf_caps() {
    $role = get_role( 'editor' );
    $role->add_cap( 'gravityforms_view_entries' );
    $role->add_cap( 'gravityforms_edit_entries' );
    $role->add_cap( 'gravityforms_delete_entries' );
}
add_action( 'admin_init', 'add_gf_caps');

// add_filter( 'gform_phone_formats', 'fr_phone_format' );
function fr_phone_format( $phone_formats ) {
    $phone_formats['fr'] = array(
        'label'       => 'fr',
        'mask'        => '99 99 99 99 99',
        'regex'       => false,
        'instruction' => false,
    );

    return $phone_formats;
}

// add_filter( 'gform_address_display_format', 'address_format' );
function address_format( $format ) {
    return 'zip_before_city';
}

// add_filter( 'gform_init_scripts_footer', '__return_true' );
// add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

// filter the Gravity Forms button type
// add_filter( 'gform_submit_button_1', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='button' id='gform_submit_button_{$form['id']}'>
				<div class='arrow'>
					<div class='top line'></div>
					<div class='bottom line'></div>
				</div>
			</button>";
}

// add_filter( 'gform_validation_message_1', 'change_message', 10, 2 );
function change_message( $message, $form ) {
    return "";
}

// add_filter("gform_ajax_spinner_url", "spinner_url", 10, 2 );
function spinner_url($image_src, $form){
    return  get_stylesheet_directory_uri() . '/assets/img/blank.gif' ; // relative to you theme images folder
}

