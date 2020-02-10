<?php

if (!class_exists('EchelonSOTeasers')) {

    class EchelonSOTeasers {

        function __construct() {

        }

        public function teaser($widget = false) {

            if ( defined('ECHELONSO_PRIME') ) {
                 return '';
            }

            if ( $widget == 'generic' ) {
                return 'Upgrade to <a href="https://echelonso.com/prime/" target="_blank">Echelon Prime</a> for closer UIkit integration, email support and upgraded widgets and features.';
            }

            if ( $widget == 'eso-before-after' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds custom labels and vertical orientation to the <a target="_blank" href="https://echelonso.com/widgets/before-after/">Before & After Widget</a>.';
            }

            if ( $widget == 'eso-button' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Label Template and Label Modifiers to the <a target="_blank" href="https://echelonso.com/widgets/button/">Button Widget</a>.';
            }

            if ( $widget == 'eso-card' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds Image Templates (Top, Bottom, Minimal), Image Modifiers, Two Image and Single Image Transitions to the <a target="_blank" href="https://echelonso.com/widgets/card/">Card Widget</a>.';
            }

            if ( $widget == 'eso-counter' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds Grouping (Hundreds, Thousands) with Custom Separators and Decimal Counting to the <a target="_blank" href="https://echelonso.com/widgets/counter/">Counter Widget</a>.';
            }

            if ( $widget == 'eso-divider' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Icon Template to the <a target="_blank" href="https://echelonso.com/widgets/divider/">Divider Widget</a>.';
            }

            if ( $widget == 'eso-heading' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Bullet, Divider and Line Templates to the <a target="_blank" href="https://echelonso.com/widgets/heading/">Heading Widget</a>.';
            }

            if ( $widget == 'eso-lightbox-gallery' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds Fade and Scale Animations to the <a target="_blank" href="https://echelonso.com/widgets/lightbox-gallery/">Lightbox Gallery Widget</a>.';
            }

            if ( $widget == 'eso-lightbox-component-image' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Overlay Template and Overlay Transition Modifers to the <a target="_blank" href="https://echelonso.com/widgets/lightbox-gallery/">Lightbox Component - Image Widget</a>.';
            }

            if ( $widget == 'eso-modal' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds Video Headers to the <a target="_blank" href="https://echelonso.com/widgets/modal/">Modal Widget</a>.';
            }

            if ( $widget == 'eso-off-canvas' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds Push and Reveal Modes to the <a target="_blank" href="https://echelonso.com/widgets/off-canvas/">Off Canvas Widget</a>.';
            }

            if ( $widget == 'eso-overlay' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Transition Template and Transition Modifiers to the <a target="_blank" href="https://echelonso.com/widgets/overlay/">Overlay Widget</a>.';
            }

            if ( $widget == 'eso-slider' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Center Template plus Fade and Scale Lightbox Animations to the <a target="_blank" href="https://echelonso.com/widgets/slider/">Slider Widget</a>.';
            }

            if ( $widget == 'eso-tabs' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Icon Template to the <a target="_blank" href="https://echelonso.com/widgets/tabs/">Tabs Widget</a>.';
            }

            if ( $widget == 'eso-text-rotator' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Flip, Flip Up, Flip Cube, Flip Cube Up and Spin animations to the <a target="_blank" href="https://echelonso.com/widgets/text-rotator/">Text Rotator Widget</a>.';
            }

            if ( $widget == 'eso-twitter-feed' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Slider Vertical Template to the <a target="_blank" href="https://echelonso.com/widgets/twitter-feed/">Twitter Feed Widget</a>.';
            }

            if ( $widget == 'eso-typewriter' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> unlocks unlimited Typewriter Steps (from 3) for the <a target="_blank" href="https://echelonso.com/widgets/typewriter/">Typewriter Widget</a>.';
            }

            if ( $widget == 'eso-video' ) {
                return 'Echelon <a href="https://echelonso.com/prime/" target="_blank">Prime Upgrade</a> adds the Cover Template (image and icon preview covers) plus Scale Up cover Transition to the <a target="_blank" href="https://echelonso.com/widgets/video/">Video Widget</a>.';
            }

            if ( $widget == 'des-animated-gradient-direction' ) {
                return ' Prime adds Diagonal & Radial directions.';
            }

            if ( $widget == 'des-cell-flex-h' ) {
                return ' Prime adds Responsive Flex plus Between and Around alignments.';
            }

            return '';

        }

    }

    global $echelon_so_teasers;
    $echelon_so_teasers = new EchelonSOTeasers();

}
