<?php 

/**
 * Create Settings Menu 
 */
function CustomForm_settings_menu() {

    add_menu_page(
        __( 'CustomForm Settings', 'custom-plugin' ),
        __( 'CustomForm Settings', 'custom-plugin' ),
        'manage_options',
        'CustomForm-settings-page',
        'CustomForm_settings_template_callback',
        '',
        null
    );

    add_submenu_page(
		'CustomForm-settings-page', 'Custom Form Main Page', 'Custom Form Main Page', 'manage_options', 'custom_plugin_page', 'custom_form_menu_callback',
		array('wpdocs_method_name_in_the_class' )
	);

	add_submenu_page(
		'CustomForm-settings-page', 'Show All Data', 'Show All Data', 'manage_options', 'retrieve_data_from_database', 'custom_form_submenu_callback',
		array('wpdocs_method_name_in_the_class' )
	);

}
add_action('admin_menu', 'CustomForm_settings_menu');

/**
 * Settings Template Page
 */
function CustomForm_settings_template_callback() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

        <form action="options.php" method="post">
            <?php 
                // security field
                settings_fields( 'CustomForm-settings-page' );

                // output settings section here
                do_settings_sections('CustomForm-settings-page');

                // save settings button
                submit_button( 'Save Settings' );
            ?>
        </form>
    </div>
    <?php 
}

/**
 * Settings Template
 */
function CustomForm_settings_init() {

    // Setup settings section
    add_settings_section(
        'CustomForm_settings_section',
        'CustomForm Settings Page',
        '',
        'CustomForm-settings-page'
    );

    // Registe input field
    register_setting(
        'CustomForm-settings-page',
        'CustomForm_settings_input_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add text fields
    add_settings_field(
        'CustomForm_settings_input_field',
        __( 'Input Field', 'custom-plugin' ),
        'CustomForm_settings_input_field_callback',
        'CustomForm-settings-page',
        'CustomForm_settings_section'
    );

    // Registe 2nd input field
    register_setting(
        'CustomForm-settings-page',
        'CustomForm_settings_input2_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_textarea_field',
            'default' => ''
        )
    );

     // Add 2nd input fields
     add_settings_field(
        'CustomForm_settings_input2_field',
        __( 'Input 2 Field', 'custom-plugin' ),
        'CustomForm_settings_input2_field_callback',
        'CustomForm-settings-page',
        'CustomForm_settings_section'
    );

    // Registe 3nd input field
    register_setting(
        'CustomForm-settings-page',
        'CustomForm_settings_input3_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_textarea_field',
            'default' => ''
        )
    );

     // Add 3nd input fields
     add_settings_field(
        'CustomForm_settings_input3_field',
        __( 'Input 3 Field', 'custom-plugin' ),
        'CustomForm_settings_input3_field_callback',
        'CustomForm-settings-page',
        'CustomForm_settings_section'
    );

    // Register select option field
    register_setting(
        'CustomForm-settings-page',
        'CustomForm_settings_select_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add select option fields
    add_settings_field(
        'CustomForm_settings_select_field',
        __( 'Select Field', 'custom-plugin' ),
        'CustomForm_settings_select_field_callback',
        'CustomForm-settings-page',
        'CustomForm_settings_section'
    );

    // Register radio field
    register_setting(
        'CustomForm-settings-page',
        'CustomForm_settings_radio_field',
        array(
            'type' => 'string',
            'sanitize_callback' => 'sanitize_text_field',
            'default' => ''
        )
    );

    // Add radio fields
    add_settings_field(
        'CustomForm_settings_radio_field',
        __( 'Radio Field', 'custom-plugin' ),
        'CustomForm_settings_radio_field_callback',
        'CustomForm-settings-page',
        'CustomForm_settings_section'
    );

}
add_action( 'admin_init', 'CustomForm_settings_init' );


/**
 * txt tempalte
 */
function CustomForm_settings_input_field_callback() {
    $CustomForm_input_field = get_option('CustomForm_settings_input_field');
    ?>
    <input type="text" name="CustomForm_settings_input_field" class="regular-text" value="<?php echo isset($CustomForm_input_field) ? esc_attr( $CustomForm_input_field ) : ''; ?>" />
    <?php 
}


/**
 * textarea template
 */
function CustomForm_settings_input2_field_callback() {
    $CustomForm_input_field = get_option('CustomForm_settings_input2_field');
    ?>
    <input type="text" name="CustomForm_settings_input2_field" class="regular-text" value="<?php echo isset($CustomForm_input_field) ? esc_attr( $CustomForm_input_field ) : ''; ?>" />
    <?php 
}

function CustomForm_settings_input3_field_callback() {
    $CustomForm_input_field = get_option('CustomForm_settings_input3_field');
    ?>
    <input type="text" name="CustomForm_settings_input3_field" class="regular-text" value="<?php echo isset($CustomForm_input_field) ? esc_attr( $CustomForm_input_field ) : ''; ?>" />
    <?php 
}

/**
 * select template
 */
function CustomForm_settings_select_field_callback() {
    $CustomForm_select_field = get_option('CustomForm_settings_select_field');
    ?>
    <select name="CustomForm_settings_select_field" class="regular-text">
        <option value="">Select One</option>
        <option value="option1" <?php selected( 'option1', $CustomForm_select_field ); ?> >Option 1</option>
        <option value="option2" <?php selected( 'option2', $CustomForm_select_field ); ?>>Option 2</option>
    </select>
    <?php
}

/**
 * radio field tempalte
 */
function CustomForm_settings_radio_field_callback() {
    $CustomForm_radio_field = get_option( 'CustomForm_settings_radio_field' );
    ?>
    <label for="value1">
        <input type="radio" name="CustomForm_settings_radio_field" value="value1" <?php checked( 'value1', $CustomForm_radio_field ); ?>/> Value 1
    </label>
    <label for="value2">
        <input type="radio" name="CustomForm_settings_radio_field" value="value2" <?php checked( 'value2', $CustomForm_radio_field ); ?>/> Value 2
    </label>
    <?php
}