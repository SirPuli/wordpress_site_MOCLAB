<?php

if (!class_exists('EchelonSOModifiers')) {

    class EchelonSOModifiers {

        function __construct() {

        }

        /*
        *  Get general text sizes
        */

        public function text_size() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-text-small' => __('Text Small', 'echelon-so'),
                'uk-text-large' => __('Text Large', 'echelon-so'),
            );
        }

        /*
        *  Get general text align
        */

        public function text_align($description = false) {
            if (!$description) {
                return array(
                    '0' => __('-', 'echelon-so'),
                    'uk-text-left' => __('Left', 'echelon-so'),
                    'uk-text-center' => __('Center', 'echelon-so'),
                    'uk-text-right' => __('Right', 'echelon-so'),
                    'uk-text-justify' => __('Justify', 'echelon-so'),
                );
            } else {
                return __('How to align the elements text.', 'echelon-so');
            }
        }

        public function align() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-text-left' => __('Left', 'echelon-so'),
                'uk-text-center' => __('Center', 'echelon-so'),
                'uk-text-right' => __('Right', 'echelon-so'),
            );
        }

        /*
        *  Get general font sizes
        */

        public function font_size($description = false) {
            if (!$description) {
                return array(
                    '0' => __('-', 'echelon-so'),
                    'uk-text-small' => __('Text Small', 'echelon-so'),
                    'uk-text-large' => __('Text Large', 'echelon-so'),
                    'uk-text-xlarge' => __('Text Extra Large', 'echelon-so'),
                    'uk-heading-small' => __('Heading Small', 'echelon-so'),
                    'uk-heading-medium' => __('Heading Medium', 'echelon-so'),
                    'uk-heading-large' => __('Heading Large', 'echelon-so'),
                    'uk-heading-xlarge' => __('Heading Extra Large', 'echelon-so'),
                    'uk-heading-2xlarge' => __('Heading Extra Extra Large', 'echelon-so'),
                );
            } else {
                return __( 'Choose from the global Text and Heading sizes.', 'echelon-so' );
            }
        }

        /*
        *  Get general font weights
        */

        public function font_weight($description = false) {
            if ( !$description) {
                return array(
                    '0' => __('-', 'echelon-so'),
                    'uk-text-normal' => __('Normal', 'echelon-so'),
                    'uk-text-bold' => __('Bold', 'echelon-so'),
                    'uk-text-light' => __('Lighter', 'echelon-so'),
                );
            } else {
                return __( 'Adjust the font weight from your themes default.', 'echelon-so');
            }
        }

        /*
        *  Get general font transforms
        */

        public function text_transform($description = false) {
            if ( !$description) {
                return array(
                    '0' => __('-', 'echelon-so'),
                    'uk-text-uppercase' => __('Uppercase', 'echelon-so'),
                    'uk-text-capitalize' => __('Capitalize', 'echelon-so'),
                    'uk-text-lowercase' => __('Lowercase', 'echelon-so'),
                );
            } else {
                return __( 'Change the capitalization of the text.', 'echelon-so');
            }
        }

        /*
        *  Get general border radius
        */

        public function border_radius($description = false) {
            if (!$description) {
                return array(
                    '0' => __('-', 'echelon-so'),
                    'uk-border-rounded' => __('Rounded', 'echelon-so'),
                    'uk-border-circle' => __('Circle', 'echelon-so'),
                    'uk-border-pill' => __('Pill', 'echelon-so')
                );
            } else {
                return __( 'How the corners of the element should be rounded.', 'echelon-so');
            }
        }

        /*
        *  Get buttons
        */

        public function button_style() {
            return array(
                'uk-button-default' => __('Transparent', 'echelon-so'),
                'uk-button-primary' => __('Primary', 'echelon-so'),
                'uk-button-secondary' => __('Secondary', 'echelon-so'),
                'uk-button-danger' => __('Danger', 'echelon-so'),
                'uk-button-text' => __('Text', 'echelon-so'),
                'uk-button-link' => __('Link', 'echelon-so')
            );
        }

        /*
        *  button sizes
        */

        public function button_size() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-button-small' => __('Small', 'echelon-so'),
                'uk-button-large' => __('Large', 'echelon-so'),
            );
        }

        /*
        * inverse
        */

        public function inverse($description = false) {
            if (!$description) {
                return array(
                    '0' => __('-', 'echelon-so'),
                    'uk-light' => __('Inverse', 'echelon-so'),
                );
            } else {
                return __( 'Creates light content for dark backgrounds based on your Inverse color settings.', 'echelon-so');
            }
        }

        /*
        * label
        */

        public function label() {
            return array(
                '0' => __('Primary', 'echelon-so'),
                'uk-label-success' => __('Success', 'echelon-so'),
                'uk-label-warning' => __('Warning', 'echelon-so'),
                'uk-label-danger' => __('Danger', 'echelon-so'),
            );
        }

        /*
        * background
        */

        public function background() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-background-default' => __('Default', 'echelon-so'),
                'uk-background-primary' => __('Primary', 'echelon-so'),
                'uk-background-secondary' => __('Secondary', 'echelon-so'),
                'uk-background-muted' => __('Muted', 'echelon-so'),
            );
        }

        /*
        * grid
        */

        public function grid() {
            return array(
                'uk-grid-small' => __('Small', 'echelon-so'),
                'uk-grid-medium' => __('Medium', 'echelon-so'),
                'uk-grid-large' => __('Large', 'echelon-so'),
                'uk-grid-collapse' => __('Collapse', 'echelon-so'),
            );
        }

        /*
        * position
        */

        public function position() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-position-top' => __('Top', 'echelon-so'),
                'uk-position-top-left' => __('Top Left', 'echelon-so'),
                'uk-position-top-center' => __('Top Center', 'echelon-so'),
                'uk-position-top-right' => __('Top Right', 'echelon-so'),
                'uk-position-center' => __('Center', 'echelon-so'),
                'uk-position-center-left' => __('Center Left', 'echelon-so'),
                'uk-position-center-right' => __('Center Right', 'echelon-so'),
                'uk-position-bottom' => __('Bottom', 'echelon-so'),
                'uk-position-bottom-left' => __('Bottom Left', 'echelon-so'),
                'uk-position-bottom-center' => __('Bottom Center', 'echelon-so'),
                'uk-position-bottom-right' => __('Bottom Right', 'echelon-so'),
                'uk-position-left' => __('Left', 'echelon-so'),
                'uk-position-right' => __('Right', 'echelon-so'),
                'uk-position-cover' => __('Cover', 'echelon-so'),
            );
        }

        /*
        * position size
        */

        public function position_size() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-position-small' => __('Small', 'echelon-so'),
                'uk-position-medium' => __('Medium', 'echelon-so'),
                'uk-position-large' => __('Large', 'echelon-so'),
            );
        }

        /*
        * background
        */

        public function background_position() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-background-top-left' => __('Top Left', 'echelon-so'),
                'uk-background-top-center' => __('Top Center', 'echelon-so'),
                'uk-background-top-right' => __('Top Right', 'echelon-so'),
                'uk-background-center-left' => __('Center Left', 'echelon-so'),
                'uk-background-center-center' => __('Center Center', 'echelon-so'),
                'uk-background-center-right' => __('Center Right', 'echelon-so'),
                'uk-background-bottom-left' => __('Bottom Left', 'echelon-so'),
                'uk-background-bottom-center' => __('Bottom Center', 'echelon-so'),
                'uk-background-bottom-right' => __('Bottom Right', 'echelon-so'),
            );
        }

        public function background_size() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-background-cover' => __('Cover', 'echelon-so'),
                'uk-background-contain' => __('Contain', 'echelon-so'),
            );
        }

        public function background_repeat() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-background-norepeat' => __('No Repeat', 'echelon-so'),
            );
        }

        public function background_attachment() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-background-fixed' => __('Fixed', 'echelon-so'),
            );
        }

        public function background_responsive() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-background-image-s' => __('Small', 'echelon-so'),
                'uk-background-image-m' => __('Medium', 'echelon-so'),
                'uk-background-image-l' => __('Large', 'echelon-so'),
                'uk-background-image-xl' => __('Extra Large', 'echelon-so'),
            );
        }

        public function background_blend() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-background-blend-multiply' => __('Multiply', 'echelon-so'),
                'uk-background-blend-screen' => __('Screen', 'echelon-so'),
                'uk-background-blend-overlay' => __('Overlay', 'echelon-so'),
                'uk-background-blend-darken' => __('Darken', 'echelon-so'),
                'uk-background-blend-lighten' => __('Lighten', 'echelon-so'),
                'uk-background-blend-color-dodge' => __('Dodge', 'echelon-so'),
                'uk-background-blend-color-burn' => __('Burn', 'echelon-so'),
                'uk-background-blend-hard-light' => __('Hard Light', 'echelon-so'),
                'uk-background-blend-soft-light' => __('Soft Light', 'echelon-so'),
                'uk-background-blend-difference' => __('Difference', 'echelon-so'),
                'uk-background-blend-exclusion' => __('Exclusion', 'echelon-so'),
                'uk-background-blend-hue' => __('Hue', 'echelon-so'),
                'uk-background-blend-saturation' => __('Saturation', 'echelon-so'),
                'uk-background-blend-color' => __('Color', 'echelon-so'),
                'uk-background-blend-luminosity' => __('Luminosity', 'echelon-so'),
            );
        }

        /*
        * padding
        */

        public function padding() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-padding-tiny' => __('Tiny', 'echelon-so'),
                'uk-padding-small' => __('Small', 'echelon-so'),
                'uk-padding-medium' => __('Medium', 'echelon-so'),
                'uk-padding-large' => __('Large', 'echelon-so'),
            );
        }

        /*
        * overlay
        */

        public function overlay() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-overlay' => __('Transparent', 'echelon-so'),
                'uk-overlay-default' => __('Default', 'echelon-so'),
                'uk-overlay-primary' => __('Primary', 'echelon-so'),
                'uk-overlay-icon' => __('Icon', 'echelon-so'),
            );
        }

        /*
        * transition
        */

        public function transition() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-transition-fade' => __('Fade', 'echelon-so'),
                'uk-transition-scale-up' => __('Scale Up', 'echelon-so'),
                'uk-transition-scale-down' => __('Scale Down', 'echelon-so'),
                'uk-transition-slide-top' => __('Slide Top', 'echelon-so'),
                'uk-transition-slide-bottom' => __('Slide Bottom', 'echelon-so'),
                'uk-transition-slide-left' => __('Slide Left', 'echelon-so'),
                'uk-transition-slide-right' => __('Slide Right', 'echelon-so'),
                'uk-transition-slide-top-small' => __('Slide Top Small', 'echelon-so'),
                'uk-transition-slide-bottom-small' => __('Slide Bottom Small', 'echelon-so'),
                'uk-transition-slide-left-small' => __('Slide Left Small', 'echelon-so'),
                'uk-transition-slide-right-small' => __('Slide Right Small', 'echelon-so'),
                'uk-transition-slide-top-medium' => __('Slide Top Medium', 'echelon-so'),
                'uk-transition-slide-bottom-medium' => __('Slide Bottom Medium', 'echelon-so'),
                'uk-transition-slide-left-medium' => __('Slide Left Medium', 'echelon-so'),
                'uk-transition-slide-right-medium' => __('Slide Right Medium', 'echelon-so'),
            );
        }

        /*
        * transition toggle
        */

        public function transition_toggle() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-transition-toggle' => __('Toggle', 'echelon-so'),
            );
        }

        /*
        * animation
        */

        public function animation() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-animation-fade' => __('Fade', 'echelon-so'),
                'uk-animation-shake' => __('Shake', 'echelon-so'),
                'uk-animation-kenburns' => __('Kenburns', 'echelon-so'),
                'uk-animation-scale-up' => __('Scale Up', 'echelon-so'),
                'uk-animation-scale-down' => __('Scale Down', 'echelon-so'),
                'uk-animation-slide-top' => __('Slide Top', 'echelon-so'),
                'uk-animation-slide-bottom' => __('Slide Bottom', 'echelon-so'),
                'uk-animation-slide-left' => __('Slide Left', 'echelon-so'),
                'uk-animation-slide-right' => __('Slide Right', 'echelon-so'),
                'uk-animation-slide-top-small' => __('Slide Top Small', 'echelon-so'),
                'uk-animation-slide-bottom-small' => __('Slide Bottom Small', 'echelon-so'),
                'uk-animation-slide-left-small' => __('Slide Left Small', 'echelon-so'),
                'uk-animation-slide-right-small' => __('Slide Right Small', 'echelon-so'),
                'uk-animation-slide-top-medium' => __('Slide Top Medium', 'echelon-so'),
                'uk-animation-slide-bottom-medium' => __('Slide Bottom Medium', 'echelon-so'),
                'uk-animation-slide-left-medium' => __('Slide Left Medium', 'echelon-so'),
                'uk-animation-slide-right-medium' => __('Slide Right Medium', 'echelon-so'),
            );
        }

        /*
        * width
        */

        public function width($description = false) {
            if (!$description) {
                return array(
                    '0' => __('-', 'echelon-so'),
                    'uk-width-small' => __('Small', 'echelon-so'),
                    'uk-width-medium' => __('Medium', 'echelon-so'),
                    'uk-width-large' => __('Large', 'echelon-so'),
                    'uk-width-xlarge' => __('xLarge', 'echelon-so'),
                    'uk-width-xxlarge' => __('xxLarge', 'echelon-so'),
                    'uk-width-1-1' => __('100%', 'echelon-so'),
                    'uk-width-1-2' => __('50%', 'echelon-so'),
                    'uk-width-1-4' => __('25%', 'echelon-so'),
                    'uk-width-auto' => __('Auto', 'echelon-so'),
                    'uk-width-expand' => __('Expand', 'echelon-so'),
                );
            } else {
                return __('Apply a fixed or percentage based width to the element.', 'echelon-so');
            }
        }

        public function child_width() {
            return array(
                'uk-child-width-1-1' => __('1-1', 'echelon-so'),
                'uk-child-width-1-2' => __('1-2', 'echelon-so'),
                'uk-child-width-1-3' => __('1-3', 'echelon-so'),
                'uk-child-width-1-4' => __('1-4', 'echelon-so'),
                'uk-child-width-1-5' => __('1-5', 'echelon-so'),
                'uk-child-width-1-6' => __('1-6', 'echelon-so'),
                'uk-child-width-auto' => __('Auto', 'echelon-so'),
                'uk-child-width-expand' => __('Expand', 'echelon-so'),
            );
        }

        public function child_width_s() {
            return array(
                'uk-child-width-1-1' => __('1-1', 'echelon-so'),
                'uk-child-width-1-2@s' => __('1-2', 'echelon-so'),
                'uk-child-width-1-3@s' => __('1-3', 'echelon-so'),
                'uk-child-width-1-4@s' => __('1-4', 'echelon-so'),
                'uk-child-width-1-5@s' => __('1-5', 'echelon-so'),
                'uk-child-width-1-6@s' => __('1-6', 'echelon-so'),
                'uk-child-width-auto@s' => __('Auto', 'echelon-so'),
                'uk-child-width-expand@s' => __('Expand', 'echelon-so'),
            );
        }

        public function child_width_m() {
            return array(
                'uk-child-width-1-1' => __('1-1', 'echelon-so'),
                'uk-child-width-1-2@m' => __('1-2', 'echelon-so'),
                'uk-child-width-1-3@m' => __('1-3', 'echelon-so'),
                'uk-child-width-1-4@m' => __('1-4', 'echelon-so'),
                'uk-child-width-1-5@m' => __('1-5', 'echelon-so'),
                'uk-child-width-1-6@m' => __('1-6', 'echelon-so'),
                'uk-child-width-auto@m' => __('Auto', 'echelon-so'),
                'uk-child-width-expand@m' => __('Expand', 'echelon-so'),
            );
        }

        public function child_width_l() {
            return array(
                'uk-child-width-1-1' => __('1-1', 'echelon-so'),
                'uk-child-width-1-2@l' => __('1-2', 'echelon-so'),
                'uk-child-width-1-3@l' => __('1-3', 'echelon-so'),
                'uk-child-width-1-4@l' => __('1-4', 'echelon-so'),
                'uk-child-width-1-5@l' => __('1-5', 'echelon-so'),
                'uk-child-width-1-6@l' => __('1-6', 'echelon-so'),
                'uk-child-width-auto@l' => __('Auto', 'echelon-so'),
                'uk-child-width-expand@l' => __('Expand', 'echelon-so'),
            );
        }

        public function child_width_xl() {
            return array(
                'uk-child-width-1-1' => __('1-1', 'echelon-so'),
                'uk-child-width-1-2@xl' => __('1-2', 'echelon-so'),
                'uk-child-width-1-3@xl' => __('1-3', 'echelon-so'),
                'uk-child-width-1-4@xl' => __('1-4', 'echelon-so'),
                'uk-child-width-1-5@xl' => __('1-5', 'echelon-so'),
                'uk-child-width-1-6@xl' => __('1-6', 'echelon-so'),
                'uk-child-width-auto@xl' => __('Auto', 'echelon-so'),
                'uk-child-width-expand@xl' => __('Expand', 'echelon-so'),
            );
        }

        /*
        * height
        */

        public function height() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-height-small' => __('Small', 'echelon-so'),
                'uk-height-medium' => __('Medium', 'echelon-so'),
                'uk-height-large' => __('Large', 'echelon-so'),
            );
        }

        /*
        * flex horizontal
        */

        public function flex_h() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-flex-left' => __('Left', 'echelon-so'),
                'uk-flex-center' => __('Center', 'echelon-so'),
                'uk-flex-right' => __('Right', 'echelon-so'),
                'uk-flex-between' => __('Between', 'echelon-so'),
                'uk-flex-around' => __('Around', 'echelon-so'),
            );
        }

        /*
        * flex vertical
        */

        public function flex_v() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-flex-stretch' => __('Stretch', 'echelon-so'),
                'uk-flex-top' => __('Top', 'echelon-so'),
                'uk-flex-middle' => __('Middle', 'echelon-so'),
                'uk-flex-bottom' => __('Bottom', 'echelon-so'),
            );
        }

        /*
        * margin
        */

        public function margin() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-margin' => __('All', 'echelon-so'),
                'uk-margin-top' => __('Top', 'echelon-so'),
                'uk-margin-bottom' => __('Bottom', 'echelon-so'),
                'uk-margin-left' => __('Left', 'echelon-so'),
                'uk-margin-right' => __('Right', 'echelon-so'),
            );
        }

        public function margin_small() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-margin-small' => __('Small All', 'echelon-so'),
                'uk-margin-small-top' => __('Small Top', 'echelon-so'),
                'uk-margin-small-bottom' => __('Small Bottom', 'echelon-so'),
                'uk-margin-small-left' => __('Small Left', 'echelon-so'),
                'uk-margin-small-right' => __('Small Right', 'echelon-so'),
            );
        }

        public function margin_medium() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-margin-medium' => __('Medium All', 'echelon-so'),
                'uk-margin-medium-top' => __('Medium Top', 'echelon-so'),
                'uk-margin-medium-bottom' => __('Medium Bottom', 'echelon-so'),
                'uk-margin-medium-left' => __('Medium Left', 'echelon-so'),
                'uk-margin-medium-right' => __('Medium Right', 'echelon-so'),
            );
        }

        public function margin_large() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-margin-large' => __('Large All', 'echelon-so'),
                'uk-margin-large-top' => __('Large Top', 'echelon-so'),
                'uk-margin-large-bottom' => __('Large Bottom', 'echelon-so'),
                'uk-margin-large-left' => __('Large Left', 'echelon-so'),
                'uk-margin-large-right' => __('Large Right', 'echelon-so'),
            );
        }

        public function margin_xlarge() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-margin-xlarge' => __('xLarge All', 'echelon-so'),
                'uk-margin-xlarge-top' => __('xLarge Top', 'echelon-so'),
                'uk-margin-xlarge-bottom' => __('xLarge Bottom', 'echelon-so'),
                'uk-margin-xlarge-left' => __('xLarge Left', 'echelon-so'),
                'uk-margin-xlarge-right' => __('xLarge Right', 'echelon-so'),
            );
        }

        public function margin_top() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-margin-small-top' => __('Small', 'echelon-so'),
                'uk-margin-medium-top' => __('Medium', 'echelon-so'),
                'uk-margin-large-top' => __('Large', 'echelon-so'),
                'uk-margin-xlarge-top' => __('xLarge', 'echelon-so'),
            );
        }

        public function margin_right() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-margin-small-right' => __('Small', 'echelon-so'),
                'uk-margin-medium-right' => __('Medium', 'echelon-so'),
                'uk-margin-large-right' => __('Large', 'echelon-so'),
                'uk-margin-xlarge-right' => __('xLarge', 'echelon-so'),
            );
        }

        public function margin_bottom() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-margin-small-bottom' => __('Small', 'echelon-so'),
                'uk-margin-medium-bottom' => __('Medium', 'echelon-so'),
                'uk-margin-large-bottom' => __('Large', 'echelon-so'),
                'uk-margin-xlarge-bottom' => __('xLarge', 'echelon-so'),
            );
        }

        public function margin_left() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-margin-small-left' => __('Small', 'echelon-so'),
                'uk-margin-medium-left' => __('Medium', 'echelon-so'),
                'uk-margin-large-left' => __('Large', 'echelon-so'),
                'uk-margin-xlarge-left' => __('xLarge', 'echelon-so'),
            );
        }

        /*
        * float
        */

        public function float() {
            return array(
                '0' => __('-', 'echelon-so'),
                'uk-float-left' => __('Left', 'echelon-so'),
            );
        }

        /*
        * descriptions
        */

        // public function description($modifier = false) {
        //     if (!$modifier) {
        //         return '';
        //     }
        //
        // }

    }

    global $echelon_so_modifiers;
    $echelon_so_modifiers = new EchelonSOModifiers();

}
