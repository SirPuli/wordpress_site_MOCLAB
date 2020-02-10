<?php

if (!class_exists('EchelonSOHelperCss')) {

    class EchelonSOHelperCss {

        public function __construct() {
            add_action( 'plugins_loaded', array($this, 'plugins_loaded'));
        }

        /**
        *	Plugins Loaded
        */

        public function plugins_loaded() {
            add_filter( 'siteorigin_panels_general_style_groups', array($this, 'general_style_groups') );
            add_filter( 'siteorigin_panels_general_style_fields', array($this, 'general_style_fields') );
            add_filter( 'siteorigin_panels_general_style_attributes', array( $this, 'general_style_attributes' ), 10, 2 );
        }

        /**
        * Add the Style Groups
        */

        public function general_style_groups($groups) {

            $groups['echelonso_helper_css_group'] = array(
                'name'     => __( 'Helpers', 'echelon-so' ),
                'priority' => 9999
            );

            $groups['echelonso_visibility_group'] = array(
                'name'     => __( 'Visibility', 'echelon-so' ),
                'priority' => 9070
            );

            $groups['echelonso_position_group'] = array(
                'name'     => __( 'Position', 'echelon-so' ),
                'priority' => 9060
            );

            $groups['echelonso_background_group'] = array(
                'name'     => __( 'Background', 'echelon-so' ),
                'priority' => 9020
            );

            return $groups;
        }

        /**
        * Add the Style Fields
        */

        public function general_style_fields($fields) {

            global $echelon_so_modifiers, $echelon_so;

            /*
            *
            *  Visibility
            *
            */

            $fields['echelonso_helper_css_show_desktop'] = array(
                'name'        => __( 'Desktop', 'echelon-so' ),
                'description' => __( 'Sizes are taken from Page Builder settings.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_visibility_group',
                'priority'    => 1,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'eso-hide-desktop' => __('Hide', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_show_tablet'] = array(
                'name'        => __( 'Tablet', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_visibility_group',
                'priority'    => 2,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'eso-hide-tablet' => __('Hide', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_show_mobile'] = array(
                'name'        => __( 'Mobile', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_visibility_group',
                'priority'    => 3,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'eso-hide-mobile' => __('Hide', 'echelon-so'),
                )
            );

            /*
            *
            *  Position
            *
            */

            $fields['echelonso_helper_css_position_relative'] = array(
                'name'        => __( 'Relative', 'echelon-so' ),
                'description' => __( 'Set Relative to position this elements children within itself (exlcusive from Absolute & Fixed). Learn more about using Position <a target="_blank" href="https://echelonso.com/features/position/">here</a>.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 10,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-position-relative' => __('Relative', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_position_absolute'] = array(
                'name'        => __( 'Absolute', 'echelon-so' ),
                'description' => __( 'Position this element within a Relative parent (exlcusive from Relative & Fixed).', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 20,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->position()
            );

            $fields['echelonso_helper_css_position_fixed'] = array(
                'name'        => __( 'Fixed', 'echelon-so' ),
                'description' => __( 'Position this element relative to the viewport (exclusive from Relative & Absolute).', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 30,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->position()
            );

            $fields['echelonso_helper_css_position_size'] = array(
                'name'        => __( 'Position Size', 'echelon-so' ),
                'description' => __( 'Move the position inwards away from the edge of the parent (requires Absolute or Fixed).', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 35,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->position_size()
            );

            $fields['echelonso_helper_css_position_flex_v'] = array(
                'name'        => __( 'Flex Vertical', 'echelon-so' ),
                'description' => __( 'Position the inner content vertically.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 40,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->flex_v()
            );

            $fields['echelonso_helper_css_position_flex_h'] = array(
                'name'        => __( 'Flex Horizontal', 'echelon-so' ),
                'description' => __( 'Position the inner content horizontally.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_position_group',
                'priority'    => 45,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->flex_h()
            );

            $fields['echelonso_helper_css_translate_x'] = array(
                'name'        => __( 'Translate X', 'echelon-so' ),
                'description' => __( 'Move the element on the x-axis. E.g -100', 'echelon-so' ),
                'type'        => 'measurement',
                'group'       => 'echelonso_position_group',
                'priority'    => 50,
                'multiple'    => false
            );

            $fields['echelonso_helper_css_translate_y'] = array(
                'name'        => __( 'Translate Y', 'echelon-so' ),
                'description' => __( 'Move the element on the y-axis. E.g -100', 'echelon-so' ),
                'type'        => 'measurement',
                'group'       => 'echelonso_position_group',
                'priority'    => 50,
                'multiple'    => false
            );

            $fields['echelonso_helper_css_scale'] = array(
                'name'        => __( 'Scale (float)', 'echelon-so' ),
                'description' => __( 'Proportionally scale the element. E.g 1.1', 'echelon-so' ),
                'type'        => 'text',
                'group'       => 'echelonso_position_group',
                'priority'    => 60,
            );

            /*
            *
            *  Background
            *
            */

            $fields['echelonso_helper_css_background_image'] = array(
                'name'        => __( 'Image', 'siteorigin-panels' ),
                'description' => __( 'All modifiers except Color require an image to work with. <span style="color: red;">Important:</span> External images are not currently supported. Learn more about Backgrounds <a target="_blank" href="https://echelonso.com/features/background/">here</a>.', 'siteorigin-panels' ),
                'type'        => 'image',
                'group'       => 'echelonso_background_group',
                'priority'    => 10,
            );

            $fields['echelonso_helper_css_background_image_size'] = array(
                'name'        => __( 'Image Size', 'echelon-so' ),
                'description' => __( 'Use this image size instead of full.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 15,
                'default'     => '0',
                'options'     => $echelon_so->image_sizes()
            );

            $fields['echelonso_helper_css_background_color'] = array(
                'name'        => __( 'Color', 'echelon-so' ),
                'description' => __( 'Blending requires a color from here or Design.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 20,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->background()
            );

            $fields['echelonso_helper_css_background_size'] = array(
                'name'        => __( 'Size', 'echelon-so' ),
                'description' => __( 'How to size the background image.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 30,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->background_size()
            );

            $fields['echelonso_helper_css_background_position'] = array(
                'name'        => __( 'Position', 'echelon-so' ),
                'description' => __( 'How to position the background image.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 40,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->background_position()
            );

            $fields['echelonso_helper_css_background_repeat'] = array(
                'name'        => __( 'Repeat', 'echelon-so' ),
                'description' => __( 'Disable repeating (tile) small images.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 50,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->background_repeat()
            );

            $fields['echelonso_helper_css_background_attachment'] = array(
                'name'        => __( 'Attachment', 'echelon-so' ),
                'description' => __( 'How to attach the background image.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 60,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->background_attachment()
            );

            $fields['echelonso_helper_css_background_responsive'] = array(
                'name'        => __( 'Responsive', 'echelon-so' ),
                'description' => __( 'Only display background images on this screen size and up.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 70,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->background_responsive()
            );

            $fields['echelonso_helper_css_background_blend'] = array(
                'name'        => __( 'Blend', 'echelon-so' ),
                'description' => __( 'How to blend the background image with the background color.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_background_group',
                'priority'    => 80,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->background_blend()
            );

            /*
            *
            *  Layout Group
            *
            */


            $fields['echelonso_helper_css_height'] = array(
                'name'        => __( 'Height', 'echelon-so' ),
                'description' => __( 'Force the height of this element.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'layout',
                'priority'    => 90,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->height()
            );

            $fields['echelonso_helper_css_clip'] = array(
                'name'        => __( 'Clip', 'echelon-so' ),
                'description' => __( 'Clip (overflow hidden) the outside of this element.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'layout',
                'priority'    => 91,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-inline-clip' => __('Clip', 'echelon-so'),
                )
            );

            /*
            *
            *  Design Group
            *
            */

            $fields['echelonso_helper_css_border_radius'] = array(
                'name'        => __( 'Border Radius', 'echelon-so' ),
                'description' => __( 'Round the corners of this element.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'design',
                'priority'    => 210,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-border-rounded' => __('Rounded', 'echelon-so'),
                    'uk-border-circle' => __('Circle', 'echelon-so'),
                    'uk-border-pill' => __('Pill', 'echelon-so'),
                )
            );


            $fields['echelonso_helper_css_box_shadow'] = array(
                'name'        => __( 'Box Shadow', 'echelon-so' ),
                'description' => __( 'Apply a box shadow to this element.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'design',
                'priority'    => 220,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-box-shadow-small' => __('Small', 'echelon-so'),
                    'uk-box-shadow-medium' => __('Medium', 'echelon-so'),
                    'uk-box-shadow-large' => __('Large', 'echelon-so'),
                    'uk-box-shadow-xlarge' => __('xLarge', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_box_shadow_hover'] = array(
                'name'        => __( 'Box Shadow Hover', 'echelon-so' ),
                'description' => __( 'Apply a box shadow to this element when hovered.', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'design',
                'priority'    => 230,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-box-shadow-hover-small' => __('Small', 'echelon-so'),
                    'uk-box-shadow-hover-medium' => __('Medium', 'echelon-so'),
                    'uk-box-shadow-hover-large' => __('Large', 'echelon-so'),
                    'uk-box-shadow-hover-xlarge' => __('xLarge', 'echelon-so'),
                )
            );

            /*
            *
            *  Helper Group
            *
            */

            $fields['echelonso_helper_css_hidden'] = array(
                'name'        => __( 'Hidden', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_helper_css_group',
                'priority'    => 100,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-hidden' => __('Hidden', 'echelon-so'),
                    'uk-hidden@s' => __('Above Small', 'echelon-so'),
                    'uk-hidden@m' => __('Above Medium', 'echelon-so'),
                    'uk-hidden@l' => __('Above Large', 'echelon-so'),
                    'uk-hidden@xl' => __('Above xLarge', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_text_align'] = array(
                'name'        => __( 'Text: Align', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_helper_css_group',
                'priority'    => 110,
                'default'     => '0',
                'options'     => $echelon_so_modifiers->text_align()
            );

            $fields['echelonso_helper_css_text_line_height'] = array(
                'name'        => __( 'Text: Line Height', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_helper_css_group',
                'priority'    => 120,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    '1' => __('1', 'echelon-so'),
                    '1.5' => __('1.5', 'echelon-so'),
                    '2' => __('2', 'echelon-so'),
                    '2.5' => __('2.5', 'echelon-so'),
                    '3' => __('3', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_border_color'] = array(
                'name'        => __( 'Border: Color', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_helper_css_group',
                'priority'    => 200,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-global-border' => __('Global', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_darken'] = array(
                'name'        => __( 'Background: Darken', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_helper_css_group',
                'priority'    => 500,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'eso-darken-default' => __('Default', 'echelon-so'),
                    'eso-darken-primary' => __('Primary', 'echelon-so'),
                    'eso-darken-secondary' => __('Secondary', 'echelon-so'),
                    'eso-darken-inherit' => __('Inherit', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_cursor'] = array(
                'name'        => __( 'Cursor: Cursor', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_helper_css_group',
                'priority'    => 600,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'eso-cursor-pointer' => __('Pointer', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_grid_width'] = array(
                'name'        => __( 'Grid: Width', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_helper_css_group',
                'priority'    => 800,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-width-1-1' => __('100%', 'echelon-so'),
                )
            );

            $fields['echelonso_helper_css_grid_gutter'] = array(
                'name'        => __( 'Grid: Gutter', 'echelon-so' ),
                'type'        => 'select',
                'group'       => 'echelonso_helper_css_group',
                'priority'    => 810,
                'default'     => '0',
                'options'     => array(
                    '0' => __('-', 'echelon-so'),
                    'uk-padding-tiny' => __('Tiny', 'echelon-so'),
                    'uk-padding-small' => __('Small', 'echelon-so'),
                    'uk-padding-medium' => __('Medium', 'echelon-so'),
                    'uk-padding-large' => __('Large', 'echelon-so'),
                )
            );

            return $fields;
        }

        /**
        * Add the Attributes
        */

        public function general_style_attributes( $attributes, $style ) {

            /*
            *
            * Generic helpers
            *
            */

            // hidden - 100

            if ( !empty($style['echelonso_helper_css_hidden']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_hidden'];
            }

            if ( !empty($style['echelonso_helper_css_show_desktop']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_show_desktop'];
            }

            if ( !empty($style['echelonso_helper_css_show_tablet']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_show_tablet'];
            }

            if ( !empty($style['echelonso_helper_css_show_mobile']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_show_mobile'];
            }

            // text - 110

            if ( !empty($style['echelonso_helper_css_text_align']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_text_align'];
            }

            if ( !empty($style['echelonso_helper_css_text_line_height']) ) {
                $attributes['style'] .= 'line-height: ' . $style['echelonso_helper_css_text_line_height'] . ';';
            }

            // border radius - 200

            if ( !empty($style['echelonso_helper_css_border_color']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_border_color'];
            }

            if ( !empty($style['echelonso_helper_css_border_radius']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_border_radius'];
            }

            if ( !empty($style['echelonso_helper_css_clip']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_clip'];
            }

            // box shadow - 300

            if ( !empty($style['echelonso_helper_css_box_shadow']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_box_shadow'];
            }

            if ( !empty($style['echelonso_helper_css_box_shadow_hover']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_box_shadow_hover'];
            }

            // darken - 500

            if ( !empty($style['echelonso_helper_css_darken']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_darken'];
            }

            // cursor - 600

            if ( !empty($style['echelonso_helper_css_cursor']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_cursor'];
            }

            // grid - 800

            if ( !empty($style['echelonso_helper_css_grid_width']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_grid_width'];
            }

            if ( !empty($style['echelonso_helper_css_grid_gutter']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_grid_gutter'];
            }

            /*
            *
            * Position
            *
            */

            if ( !empty($style['echelonso_helper_css_position_relative']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_relative'];
            }

            if ( !empty($style['echelonso_helper_css_position_absolute']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_absolute'];
            }

            if ( !empty($style['echelonso_helper_css_position_fixed']) ) {
                $attributes['class'][] = 'uk-position-fixed';
                $attributes['class'][] = $style['echelonso_helper_css_position_fixed'];
            }

            if ( !empty($style['echelonso_helper_css_position_size']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_size'];
            }

            if ( !empty($style['echelonso_helper_css_position_flex_v']) || !empty($style['echelonso_helper_css_position_flex_h']) ) {
                $attributes['class'][] = 'uk-flex';
            }

            if ( !empty($style['echelonso_helper_css_position_flex_v']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_flex_v'];
            }

            if ( !empty($style['echelonso_helper_css_position_flex_h']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_position_flex_h'];
            }

            if ( !empty($style['echelonso_helper_css_translate_x']) || !empty($style['echelonso_helper_css_translate_y']) || !empty($style['echelonso_helper_css_scale']) ) {
                $attributes['style'] .= 'transform: ';
                if ( !empty($style['echelonso_helper_css_translate_x']) ) {
                    $attributes['style'] .= ' translateX('.$style['echelonso_helper_css_translate_x'].')';
                }
                if ( !empty($style['echelonso_helper_css_translate_y']) ) {
                    $attributes['style'] .= ' translateY('.$style['echelonso_helper_css_translate_y'].')';
                }
                if ( !empty($style['echelonso_helper_css_scale']) ) {
                    $attributes['style'] .= ' scale('.$style['echelonso_helper_css_scale'].')';
                }
                $attributes['style'] .= ';';
            }

            /*
            *
            * Background
            *
            */

            if ( !empty($style['echelonso_helper_css_background_color']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_color'];
            }

            if ( !empty($style['echelonso_helper_css_background_image']) ) {
                if ( !empty($style['echelonso_helper_css_background_image_size']) ) {
                    $bg_size = $style['echelonso_helper_css_background_image_size'];
                } else {
                    $bg_size = 'full';
                }
                $bg_url = wp_get_attachment_image_src( intval($style['echelonso_helper_css_background_image']), $bg_size );
                $attributes['style'] .= 'background-image: url("'.$bg_url[0].'");';
            }

            if ( !empty($style['echelonso_helper_css_background_size']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_size'];
            }

            if ( !empty($style['echelonso_helper_css_background_position']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_position'];
            }

            if ( !empty($style['echelonso_helper_css_background_repeat']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_repeat'];
            }

            if ( !empty($style['echelonso_helper_css_background_attachment']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_attachment'];
            }

            if ( !empty($style['echelonso_helper_css_background_responsive']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_responsive'];
            }

            if ( !empty($style['echelonso_helper_css_background_blend']) ) {
                $attributes['class'][] = $style['echelonso_helper_css_background_blend'];
            }

            return $attributes;
        }

    }
    $class = new EchelonSOHelperCss();
}
