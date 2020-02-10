<?php

/*
* Regen the CSS after customizer save
*/

add_action('customize_save_after', 'eso_customize_save_after', 99);

function eso_customize_save_after() {
    require 'less/less.php';
}


/*
* Regen the CSS after customizer save
*/

add_action( 'customize_register', 'echelonso_customize_register' );

function echelonso_customize_register( $wp_customize ) {

    global $echelon_so;
    $palette_colors = $echelon_so->get_palette_colors();

    /*
    * PANEL: Main
    */

    $wp_customize->add_panel( 'echelonso_panel_main', array(
        'title' => __( 'Echelon', 'echelon-so' ),
        'description' => __( 'Settings and options related to Echelon for SiteOrigin.', 'echelon-so'),
        'capability'    => 'edit_theme_options',
        'priority' => 5000,
    ) );

    /*
    * SECTION: Features
    */

    // $wp_customize->add_section( 'echelonso_section_features', array(
    //     'title' => __( 'Enable / Disable Features','echelon-so' ),
    //     'description' => __( 'Turn Echelon panels features on or off.', 'echelon-so' ),
    //     'panel' => 'echelonso_panel_main',
    //     'priority' => 5100,
    // ) );
    //
    // $wp_customize->add_setting( 'echelonso_options[animate]', array(
    //     'type' => 'option',
    //     'capability' => 'manage_options',
    //     'default' => '1',
    //     'sanitize_callback' => 'echelonso_sanitize_select',
    // ) );
    //
    // $wp_customize->add_control( 'echelonso_options[animate]', array(
    //     'type' => 'select',
    //     'priority' => 10,
    //     'section' => 'echelonso_section_features',
    //     'label' => __( 'Animate' ),
    //     'choices' => array(
    //         '1' => __( 'On' ),
    //         '0' => __( 'Off' )
    //     )
    // ) );
    //
    // $wp_customize->add_setting( 'echelonso_options[animated_gradients]', array(
    //     'type' => 'option',
    //     'capability' => 'manage_options',
    //     'default' => '1',
    //     'sanitize_callback' => 'echelonso_sanitize_select',
    // ) );
    //
    // $wp_customize->add_control( 'echelonso_options[animated_gradients]', array(
    //     'type' => 'select',
    //     'priority' => 20,
    //     'section' => 'echelonso_section_features',
    //     'label' => __( 'Animated Gradients' ),
    //     'choices' => array(
    //         '1' => __( 'On' ),
    //         '0' => __( 'Off' )
    //     )
    // ) );
    //
    // $wp_customize->add_setting( 'echelonso_options[attribute]', array(
    //     'type' => 'option',
    //     'capability' => 'manage_options',
    //     'default' => '1',
    //     'sanitize_callback' => 'echelonso_sanitize_select',
    // ) );
    //
    // $wp_customize->add_control( 'echelonso_options[attribute]', array(
    //     'type' => 'select',
    //     'priority' => 30,
    //     'section' => 'echelonso_section_features',
    //     'label' => __( 'Attribute' ),
    //     'choices' => array(
    //         '1' => __( 'On' ),
    //         '0' => __( 'Off' )
    //     )
    // ) );
    //
    // $wp_customize->add_setting( 'echelonso_options[background_rgba]', array(
    //     'type' => 'option',
    //     'capability' => 'manage_options',
    //     'default' => '1',
    //     'sanitize_callback' => 'echelonso_sanitize_select',
    // ) );
    //
    // $wp_customize->add_control( 'echelonso_options[background_rgba]', array(
    //     'type' => 'select',
    //     'priority' => 40,
    //     'section' => 'echelonso_section_features',
    //     'label' => __( 'Background RGBA' ),
    //     'choices' => array(
    //         '1' => __( 'On' ),
    //         '0' => __( 'Off' )
    //     )
    // ) );
    //
    // $wp_customize->add_setting( 'echelonso_options[cell_flex]', array(
    //     'type' => 'option',
    //     'capability' => 'manage_options',
    //     'default' => '1',
    //     'sanitize_callback' => 'echelonso_sanitize_select',
    // ) );
    //
    // $wp_customize->add_control( 'echelonso_options[cell_flex]', array(
    //     'type' => 'select',
    //     'priority' => 50,
    //     'section' => 'echelonso_section_features',
    //     'label' => __( 'Cell Flex' ),
    //     'choices' => array(
    //         '1' => __( 'On' ),
    //         '0' => __( 'Off' )
    //     )
    // ) );
    //
    // $wp_customize->add_setting( 'echelonso_options[custom_Palette]', array(
    //     'type' => 'option',
    //     'capability' => 'manage_options',
    //     'default' => '1',
    //     'sanitize_callback' => 'echelonso_sanitize_select',
    // ) );
    //
    // $wp_customize->add_control( 'echelonso_options[custom_Palette]', array(
    //     'type' => 'select',
    //     'priority' => 60,
    //     'section' => 'echelonso_section_features',
    //     'label' => __( 'Custom Palette' ),
    //     'choices' => array(
    //         '1' => __( 'On' ),
    //         '0' => __( 'Off' )
    //     )
    // ) );
    //
    // $wp_customize->add_setting( 'echelonso_options[helper_css]', array(
    //     'type' => 'option',
    //     'capability' => 'manage_options',
    //     'default' => '1',
    //     'sanitize_callback' => 'echelonso_sanitize_select',
    // ) );
    //
    // $wp_customize->add_control( 'echelonso_options[helper_css]', array(
    //     'type' => 'select',
    //     'priority' => 70,
    //     'section' => 'echelonso_section_features',
    //     'label' => __( 'Helper CSS' ),
    //     'choices' => array(
    //         '1' => __( 'On' ),
    //         '0' => __( 'Off' )
    //     )
    // ) );
    //
    // $wp_customize->add_setting( 'echelonso_options[linked_widgets]', array(
    //     'type' => 'option',
    //     'capability' => 'manage_options',
    //     'default' => '1',
    //     'sanitize_callback' => 'echelonso_sanitize_select',
    // ) );
    //
    // $wp_customize->add_control( 'echelonso_options[linked_widgets]', array(
    //     'type' => 'select',
    //     'priority' => 80,
    //     'section' => 'echelonso_section_features',
    //     'label' => __( 'Linked Widgets' ),
    //     'choices' => array(
    //         '1' => __( 'On' ),
    //         '0' => __( 'Off' )
    //     )
    // ) );
    //
    // $wp_customize->add_setting( 'echelonso_options[sticky]', array(
    //     'type' => 'option',
    //     'capability' => 'manage_options',
    //     'default' => '1',
    //     'sanitize_callback' => 'echelonso_sanitize_select',
    // ) );
    //
    // $wp_customize->add_control( 'echelonso_options[sticky]', array(
    //     'type' => 'select',
    //     'priority' => 90,
    //     'section' => 'echelonso_section_features',
    //     'label' => __( 'Sticky' ),
    //     'choices' => array(
    //         '1' => __( 'On' ),
    //         '0' => __( 'Off' )
    //     )
    // ) );

    /*
    * SECTION: Custom palette
    */

    $wp_customize->add_section( 'echelonso_section_custom_palette', array(
        'title' => __( 'Custom Palette Colors','echelon-so' ),
        'description' => __( 'Set custom colors for use in color picker.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5200,
    ) );

    /*
    * CONTROL: Custom palette
    */

    //  color 1
    $wp_customize->add_setting( 'echelonso_options[custom_palette_1]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => $palette_colors['color_1'],
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_1]', array(
            'label' => __( 'Color 1', 'echelon-so' ),
            'section' => 'echelonso_section_custom_palette',
            'priority' => 10
        ) )
    );

    //  color 2
    $wp_customize->add_setting( 'echelonso_options[custom_palette_2]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => $palette_colors['color_2'],
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_2]', array(
            'label' => __( 'Color 2', 'echelon-so' ),
            'section' => 'echelonso_section_custom_palette',
            'priority' => 20
        ) )
    );

    //  color 3
    $wp_customize->add_setting( 'echelonso_options[custom_palette_3]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => $palette_colors['color_3'],
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_3]', array(
            'label' => __( 'Color 3','echelon-so' ),
            'section' => 'echelonso_section_custom_palette',
            'priority' => 30
        ) )
    );

    //  color 4
    $wp_customize->add_setting( 'echelonso_options[custom_palette_4]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => $palette_colors['color_4'],
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_4]', array(
            'label' => __( 'Color 4', 'echelon-so' ),
            'section' => 'echelonso_section_custom_palette',
            'priority' => 40
        ) )
    );

    //  color 5
    $wp_customize->add_setting( 'echelonso_options[custom_palette_5]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => $palette_colors['color_5'],
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[custom_palette_5]', array(
            'label' => __( 'Color 5', 'echelon-so' ),
            'section' => 'echelonso_section_custom_palette',
            'priority' => 50
        ) )
    );

    /*
    * SECTION: Breakpoints
    */

    $wp_customize->add_section( 'echelonso_section_less_breakpoints', array(
        'title' => __( 'Breakpoints','echelon-so' ),
        'description' => __( 'Set the grid breakpoints for screen sizes based on mobile first.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5200,
    ) );

    $wp_customize->add_setting( 'echelonso_options[breakpoint-small]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '640',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[breakpoint-small]', array(
        'type' => 'number',
        'priority' => 10,
        'section' => 'echelonso_section_less_breakpoints',
        'label' => __( 'Small (px)' ),
        'description' => __( 'Default: 640', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[breakpoint-medium]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '960',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[breakpoint-medium]', array(
        'type' => 'number',
        'priority' => 20,
        'section' => 'echelonso_section_less_breakpoints',
        'label' => __( 'Medium (px)' ),
        'description' => __( 'Default: 960', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[breakpoint-large]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '1200',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[breakpoint-large]', array(
        'type' => 'number',
        'priority' => 30,
        'section' => 'echelonso_section_less_breakpoints',
        'label' => __( 'Large (px)' ),
        'description' => __( 'Default: 1200', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[breakpoint-xlarge]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '1600',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[breakpoint-xlarge]', array(
        'type' => 'number',
        'priority' => 40,
        'section' => 'echelonso_section_less_breakpoints',
        'label' => __( 'xLarge (px)' ),
        'description' => __( 'Default: 1600', 'echelon-so' ),
    ) );

    /*
    * SECTION: text
    */

    $wp_customize->add_section( 'echelonso_section_less_text', array(
        'title' => __( 'Text','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or overide Text settings.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5200,
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-font-size]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '1',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-font-size]', array(
        'type' => 'number',
        'priority' => 10,
        'section' => 'echelonso_section_less_text',
        'label' => __( 'Default (rem)' ),
        'description' => __( 'Default: 1', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-line-height]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '1.5',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-line-height]', array(
        'type' => 'number',
        'priority' => 20,
        'section' => 'echelonso_section_less_text',
        'label' => __( 'Line Height' ),
        'description' => __( 'Default: 1.5', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-small-font-size]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '0.875',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-small-font-size]', array(
        'type' => 'number',
        'priority' => 30,
        'section' => 'echelonso_section_less_text',
        'label' => __( 'Small (rem)' ),
        'description' => __( 'Default: 0.875', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-medium-font-size]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '1.25',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-medium-font-size]', array(
        'type' => 'number',
        'priority' => 40,
        'section' => 'echelonso_section_less_text',
        'label' => __( 'Medium (rem)' ),
        'description' => __( 'Default: 1.25', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-large-font-size]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '1.5',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-large-font-size]', array(
        'type' => 'number',
        'priority' => 50,
        'section' => 'echelonso_section_less_text',
        'label' => __( 'Large (rem)' ),
        'description' => __( 'Default: 1.5', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-xlarge-font-size]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '2',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-xlarge-font-size]', array(
        'type' => 'number',
        'priority' => 60,
        'section' => 'echelonso_section_less_text',
        'label' => __( 'Extra Large (rem)' ),
        'description' => __( 'Default: 2', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-xxlarge-font-size]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '2.625',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-xxlarge-font-size]', array(
        'type' => 'number',
        'priority' => 70,
        'section' => 'echelonso_section_less_text',
        'label' => __( 'Extra Extra Large (rem)' ),
        'description' => __( 'Default: 2.625', 'echelon-so' ),
    ) );

    /*
    * SECTION: Color
    */

    $wp_customize->add_section( 'echelonso_section_less_color', array(
        'title' => __( 'Color','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global color.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5300,
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-color]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#666666',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-color]', array(
            'label' => __( 'Color', 'echelon-so' ),
            'description' => __( 'Default: #666666', 'echelon-so' ),
            'section' => 'echelonso_section_less_color',
            'priority' => 10
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-emphasis-color]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#333333',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-emphasis-color]', array(
            'label' => __( 'Emphasis', 'echelon-so' ),
            'description' => __( 'Default: #333333', 'echelon-so' ),
            'section' => 'echelonso_section_less_color',
            'priority' => 20
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-muted-color]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#999999',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-muted-color]', array(
            'label' => __( 'Muted', 'echelon-so' ),
            'description' => __( 'Default: #999999', 'echelon-so' ),
            'section' => 'echelonso_section_less_color',
            'priority' => 30
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-link-color]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#1e87f0',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-link-color]', array(
            'label' => __( 'Link', 'echelon-so' ),
            'description' => __( 'Default: #1e87f0', 'echelon-so' ),
            'section' => 'echelonso_section_less_color',
            'priority' => 50
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-link-hover-color]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#0f6ecd',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-link-hover-color]', array(
            'label' => __( 'Link Hover', 'echelon-so' ),
            'description' => __( 'Default: #0f6ecd', 'echelon-so' ),
            'section' => 'echelonso_section_less_color',
            'priority' => 60
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-inverse-color]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#ffffff',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-inverse-color]', array(
            'label' => __( 'Inverse', 'echelon-so' ),
            'description' => __( 'Default: #ffffff', 'echelon-so' ),
            'section' => 'echelonso_section_less_color',
            'priority' => 70
        ) )
    );

    /*
    * SECTION: Backgrounds
    */

    $wp_customize->add_section( 'echelonso_section_less_background', array(
        'title' => __( 'Background','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global backgrounds.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5400,
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#ffffff',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-background]', array(
            'label' => __( 'Default', 'echelon-so' ),
            'description' => __( 'Default: #ffffff', 'echelon-so' ),
            'section' => 'echelonso_section_less_background',
            'priority' => 10
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-muted-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#f8f8f8',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-muted-background]', array(
            'label' => __( 'Muted', 'echelon-so' ),
            'description' => __( 'Default: #f8f8f8', 'echelon-so' ),
            'section' => 'echelonso_section_less_background',
            'priority' => 20
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-primary-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#1e87f0',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-primary-background]', array(
            'label' => __( 'Primary', 'echelon-so' ),
            'description' => __( 'Default: #1e87f0', 'echelon-so' ),
            'section' => 'echelonso_section_less_background',
            'priority' => 30
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-secondary-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#222222',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-secondary-background]', array(
            'label' => __( 'Secondary', 'echelon-so' ),
            'description' => __( 'Default: #222222', 'echelon-so' ),
            'section' => 'echelonso_section_less_background',
            'priority' => 40
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-success-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#32d296',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-success-background]', array(
            'label' => __( 'Success', 'echelon-so' ),
            'description' => __( 'Default: #32d296', 'echelon-so' ),
            'section' => 'echelonso_section_less_background',
            'priority' => 50
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-warning-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#faa05a',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-warning-background]', array(
            'label' => __( 'Warning', 'echelon-so' ),
            'description' => __( 'Default: #faa05a', 'echelon-so' ),
            'section' => 'echelonso_section_less_background',
            'priority' => 60
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[global-danger-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#f0506e',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-danger-background]', array(
            'label' => __( 'Danger', 'echelon-so' ),
            'description' => __( 'Default: #f0506e', 'echelon-so' ),
            'section' => 'echelonso_section_less_background',
            'priority' => 70
        ) )
    );

    /*
    * SECTION: Border
    */

    $wp_customize->add_section( 'echelonso_section_less_border', array(
        'title' => __( 'Border','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global borders.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5400,
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-border-width]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '1',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-border-width]', array(
        'type' => 'number',
        'priority' => 10,
        'section' => 'echelonso_section_less_border',
        'label' => __( 'Width (px)' ),
        'description' => __( 'Default: 1', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-border]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#e5e5e5',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[global-border]', array(
            'label' => __( 'Color', 'echelon-so' ),
            'description' => __( 'Default: #e5e5e5', 'echelon-so' ),
            'section' => 'echelonso_section_less_border',
            'priority' => 20
        ) )
    );

    /*
    * SECTION: Box-Shadows
    */

    $wp_customize->add_section( 'echelonso_section_less_box_shadow', array(
        'title' => __( 'Box Shadow','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global shadows.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5500,
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-small-box-shadow]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '0 2px 8px rgba(0,0,0,0.08)',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-small-box-shadow]', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'echelonso_section_less_box_shadow',
        'label' => __( 'Small' ),
        'description' => __( 'Default: 0 2px 8px rgba(0,0,0,0.08)', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-medium-box-shadow]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '0 5px 15px rgba(0,0,0,0.08)',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-medium-box-shadow]', array(
        'type' => 'text',
        'priority' => 20,
        'section' => 'echelonso_section_less_box_shadow',
        'label' => __( 'Medium' ),
        'description' => __( 'Default: 0 5px 15px rgba(0,0,0,0.08)', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-large-box-shadow]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '0 14px 25px rgba(0,0,0,0.16)',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-large-box-shadow]', array(
        'type' => 'text',
        'priority' => 30,
        'section' => 'echelonso_section_less_box_shadow',
        'label' => __( 'Large' ),
        'description' => __( 'Default: 0 14px 25px rgba(0,0,0,0.16)', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-xlarge-box-shadow]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '0 28px 50px rgba(0,0,0,0.16)',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-xlarge-box-shadow]', array(
        'type' => 'text',
        'priority' => 30,
        'section' => 'echelonso_section_less_box_shadow',
        'label' => __( 'xLarge' ),
        'description' => __( 'Default: 0 28px 50px rgba(0,0,0,0.16)', 'echelon-so' ),
    ) );

    /*
    * SECTION: Heading
    */

    $wp_customize->add_section( 'echelonso_section_less_heading', array(
        'title' => __( 'Heading','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global heading.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5700,
    ) );

    $wp_customize->add_setting( 'echelonso_options[heading-medium-font-size-l]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '4',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[heading-medium-font-size-l]', array(
        'type' => 'text',
        'priority' => 10,
        'section' => 'echelonso_section_less_heading',
        'label' => __( 'Medium (rem)' ),
        'description' => __( 'Default: 4', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[heading-large-font-size-l]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '6',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[heading-large-font-size-l]', array(
        'type' => 'text',
        'priority' => 20,
        'section' => 'echelonso_section_less_heading',
        'label' => __( 'Large (rem)' ),
        'description' => __( 'Default: 6', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[heading-xlarge-font-size-l]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '8',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[heading-xlarge-font-size-l]', array(
        'type' => 'text',
        'priority' => 30,
        'section' => 'echelonso_section_less_heading',
        'label' => __( 'Extra Large (rem)' ),
        'description' => __( 'Default: 8', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[heading-2xlarge-font-size-l]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '11',
        'sanitize_callback' => 'sanitize_float',
    ) );

    $wp_customize->add_control( 'echelonso_options[heading-2xlarge-font-size-l]', array(
        'type' => 'text',
        'priority' => 40,
        'section' => 'echelonso_section_less_heading',
        'label' => __( 'Extra Extra Large (rem)' ),
        'description' => __( 'Default: 11', 'echelon-so' ),
    ) );

    /*
    * SECTION: Overlay
    */

    $wp_customize->add_section( 'echelonso_section_less_overlay', array(
        'title' => __( 'Overlay','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global overlay.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5800,
    ) );

    $wp_customize->add_setting( 'echelonso_options[eso-ovr-default]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#ffffff',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[eso-ovr-default]', array(
            'label' => __( 'Default', 'echelon-so' ),
            'description' => __( 'Default: #ffffff', 'echelon-so' ),
            'section' => 'echelonso_section_less_overlay',
            'priority' => 10
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[eso-ovr-primary]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#222222',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[eso-ovr-primary]', array(
            'label' => __( 'Primary', 'echelon-so' ),
            'description' => __( 'Default: #222222', 'echelon-so' ),
            'section' => 'echelonso_section_less_overlay',
            'priority' => 20
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[overlay-padding-horizontal]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '30',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[overlay-padding-horizontal]', array(
        'type' => 'text',
        'priority' => 30,
        'section' => 'echelonso_section_less_overlay',
        'label' => __( 'Horizontal Padding (px)' ),
        'description' => __( 'Default: 30', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[overlay-padding-vertical]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '30',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[overlay-padding-vertical]', array(
        'type' => 'text',
        'priority' => 40,
        'section' => 'echelonso_section_less_overlay',
        'label' => __( 'Vertical Padding (px)' ),
        'description' => __( 'Default: 30', 'echelon-so' ),
    ) );

    /*
    * SECTION: Dotnav
    */

    $wp_customize->add_section( 'echelonso_section_less_dotnav', array(
        'title' => __( 'Dot Nav','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global dotnav.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 5900,
    ) );

    $wp_customize->add_setting( 'echelonso_options[dotnav-item-border]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#a1a1a1',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[dotnav-item-border]', array(
            'label' => __( 'Item Border', 'echelon-so' ),
            'description' => __( 'Default: #a1a1a1', 'echelon-so' ),
            'section' => 'echelonso_section_less_dotnav',
            'priority' => 10
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[dotnav-item-active-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#a1a1a1',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[dotnav-item-active-background]', array(
            'label' => __( 'Active Background', 'echelon-so' ),
            'description' => __( 'Default: #a1a1a1', 'echelon-so' ),
            'section' => 'echelonso_section_less_dotnav',
            'priority' => 20
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[dotnav-item-hover-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#a1a1a1',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[dotnav-item-hover-background]', array(
            'label' => __( 'Hover Background', 'echelon-so' ),
            'description' => __( 'Default: #a1a1a1', 'echelon-so' ),
            'section' => 'echelonso_section_less_dotnav',
            'priority' => 30
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[dotnav-item-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#e0e0e0',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[dotnav-item-background]', array(
            'label' => __( 'Item Background', 'echelon-so' ),
            'description' => __( 'Default: #e0e0e0', 'echelon-so' ),
            'section' => 'echelonso_section_less_dotnav',
            'priority' => 40
        ) )
    );

    $wp_customize->add_setting( 'echelonso_options[dotnav-item-onclick-background]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_hex_color',
        'default' => '#e0e0e0',
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'echelonso_options[dotnav-item-onclick-background]', array(
            'label' => __( 'Onclick Background', 'echelon-so' ),
            'description' => __( 'Default: #e0e0e0', 'echelon-so' ),
            'section' => 'echelonso_section_less_dotnav',
            'priority' => 50
        ) )
    );

    /*
    * SECTION: Container
    */

    $wp_customize->add_section( 'echelonso_section_less_container', array(
        'title' => __( 'Container','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global container.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 6000,
    ) );

    $wp_customize->add_setting( 'echelonso_options[container-max-width]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '1200',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[container-max-width]', array(
        'type' => 'number',
        'priority' => 10,
        'section' => 'echelonso_section_less_container',
        'label' => __( 'Container (px)' ),
        'description' => __( 'Default: 1200', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[container-large-max-width]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '1600',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[container-large-max-width]', array(
        'type' => 'number',
        'priority' => 20,
        'section' => 'echelonso_section_less_container',
        'label' => __( 'Large (px)' ),
        'description' => __( 'Default: 1600', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[container-small-max-width]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '900',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[container-small-max-width]', array(
        'type' => 'number',
        'priority' => 30,
        'section' => 'echelonso_section_less_container',
        'label' => __( 'Small (px)' ),
        'description' => __( 'Default: 900', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[container-xsmall-max-width]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '750',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[container-xsmall-max-width]', array(
        'type' => 'number',
        'priority' => 40,
        'section' => 'echelonso_section_less_container',
        'label' => __( 'xSmall (px)' ),
        'description' => __( 'Default: 750', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[container-padding-horizontal]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '15',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[container-padding-horizontal]', array(
        'type' => 'number',
        'priority' => 50,
        'section' => 'echelonso_section_less_container',
        'label' => __( 'Padding (px)' ),
        'description' => __( 'Default: 15', 'echelon-so' ),
    ) );

    /*
    * SECTION: Margin
    */

    $wp_customize->add_section( 'echelonso_section_less_margin', array(
        'title' => __( 'Margin','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global margin.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 6100,
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-margin]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '30',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-margin]', array(
        'type' => 'number',
        'priority' => 10,
        'section' => 'echelonso_section_less_margin',
        'label' => __( 'Margin (px)' ),
        'description' => __( 'Default: 30', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-micro-margin]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '5',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-micro-margin]', array(
        'type' => 'number',
        'priority' => 20,
        'section' => 'echelonso_section_less_margin',
        'label' => __( 'Micro (px)' ),
        'description' => __( 'Default: 5', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-tiny-margin]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '10',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-tiny-margin]', array(
        'type' => 'number',
        'priority' => 30,
        'section' => 'echelonso_section_less_margin',
        'label' => __( 'Tiny (px)' ),
        'description' => __( 'Default: 10', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-small-margin]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '15',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-small-margin]', array(
        'type' => 'number',
        'priority' => 40,
        'section' => 'echelonso_section_less_margin',
        'label' => __( 'Small (px)' ),
        'description' => __( 'Default: 15', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-medium-margin]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '30',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-medium-margin]', array(
        'type' => 'number',
        'priority' => 50,
        'section' => 'echelonso_section_less_margin',
        'label' => __( 'Medium (px)' ),
        'description' => __( 'Default: 30', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-large-margin]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '70',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-large-margin]', array(
        'type' => 'number',
        'priority' => 60,
        'section' => 'echelonso_section_less_margin',
        'label' => __( 'Large (px)' ),
        'description' => __( 'Default: 70', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-xlarge-margin]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '140',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-xlarge-margin]', array(
        'type' => 'number',
        'priority' => 70,
        'section' => 'echelonso_section_less_margin',
        'label' => __( 'xLarge (px)' ),
        'description' => __( 'Default: 140', 'echelon-so' ),
    ) );

    /*
    * SECTION: Gutter
    */

    $wp_customize->add_section( 'echelonso_section_less_gutter', array(
        'title' => __( 'Gutter & Padding','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global gutter.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 6200,
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-gutter]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '30',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-gutter]', array(
        'type' => 'number',
        'priority' => 10,
        'section' => 'echelonso_section_less_gutter',
        'label' => __( 'Gutter (px)' ),
        'description' => __( 'Default: 30', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-micro-gutter]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '5',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-micro-gutter]', array(
        'type' => 'number',
        'priority' => 20,
        'section' => 'echelonso_section_less_gutter',
        'label' => __( 'Micro (px)' ),
        'description' => __( 'Default: 5', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-tiny-gutter]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '10',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-tiny-gutter]', array(
        'type' => 'number',
        'priority' => 30,
        'section' => 'echelonso_section_less_gutter',
        'label' => __( 'Tiny (px)' ),
        'description' => __( 'Default: 10', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-small-gutter]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '15',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-small-gutter]', array(
        'type' => 'number',
        'priority' => 40,
        'section' => 'echelonso_section_less_gutter',
        'label' => __( 'Small (px)' ),
        'description' => __( 'Default: 15', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-medium-gutter]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '30',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-medium-gutter]', array(
        'type' => 'number',
        'priority' => 50,
        'section' => 'echelonso_section_less_gutter',
        'label' => __( 'Medium (px)' ),
        'description' => __( 'Default: 30', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-large-gutter]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '70',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-large-gutter]', array(
        'type' => 'number',
        'priority' => 60,
        'section' => 'echelonso_section_less_gutter',
        'label' => __( 'Large (px)' ),
        'description' => __( 'Default: 70', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[global-xlarge-gutter]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '140',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[global-xlarge-gutter]', array(
        'type' => 'number',
        'priority' => 70,
        'section' => 'echelonso_section_less_gutter',
        'label' => __( 'xLarge (px)' ),
        'description' => __( 'Default: 140', 'echelon-so' ),
    ) );


    /*
    * SECTION: Height
    */

    $wp_customize->add_section( 'echelonso_section_less_height', array(
        'title' => __( 'Height','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global height.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 6300,
    ) );

    $wp_customize->add_setting( 'echelonso_options[height-small-height]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '150',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[height-small-height]', array(
        'type' => 'number',
        'priority' => 10,
        'section' => 'echelonso_section_less_height',
        'label' => __( 'Small (px)' ),
        'description' => __( 'Default: 150', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[height-medium-height]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '300',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[height-medium-height]', array(
        'type' => 'number',
        'priority' => 20,
        'section' => 'echelonso_section_less_height',
        'label' => __( 'Medium (px)' ),
        'description' => __( 'Default: 300', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[height-large-height]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '450',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[height-large-height]', array(
        'type' => 'number',
        'priority' => 20,
        'section' => 'echelonso_section_less_height',
        'label' => __( 'Large (px)' ),
        'description' => __( 'Default: 450', 'echelon-so' ),
    ) );

    /*
    * SECTION: Lightbox
    */

    $wp_customize->add_section( 'echelonso_section_less_lightbox', array(
        'title' => __( 'Lightbox','echelon-so' ),
        'description' => __( 'Be advised theme options may interfere with or override global lightbox.', 'echelon-so' ),
        'panel' => 'echelonso_panel_main',
        'priority' => 6400,
    ) );

    $wp_customize->add_setting( 'echelonso_options[lightbox-item-max-width]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '100',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[lightbox-item-max-width]', array(
        'type' => 'number',
        'priority' => 10,
        'section' => 'echelonso_section_less_lightbox',
        'label' => __( 'Max Width (vw)' ),
        'description' => __( 'Default: 100', 'echelon-so' ),
    ) );

    $wp_customize->add_setting( 'echelonso_options[lightbox-item-max-height]', array(
        'type' => 'option',
        'capability' => 'manage_options',
        'default' => '100',
        'sanitize_callback' => 'absint',
    ) );

    $wp_customize->add_control( 'echelonso_options[lightbox-item-max-height]', array(
        'type' => 'number',
        'min' => 1,
        'max' => 100,
        'priority' => 20,
        'section' => 'echelonso_section_less_lightbox',
        'label' => __( 'Max Height (vh)' ),
        'description' => __( 'Default: 100', 'echelon-so' ),
    ) );


} // end

// sanitization function
function echelonso_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}
