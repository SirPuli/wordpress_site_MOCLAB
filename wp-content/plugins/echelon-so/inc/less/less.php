<?php

require 'lessc.inc.php';

$less = new lessc;
$options = get_option('echelonso_options');
update_option('eso_css_rand', uniqid());

// breakpoints - done
$less_vars['breakpoint-small'] = (isset($options['breakpoint-small']) ? $options['breakpoint-small'] : '640') . 'px';
$less_vars['breakpoint-medium'] = (isset($options['breakpoint-medium']) ? $options['breakpoint-medium'] : '960') . 'px';
$less_vars['breakpoint-large'] = (isset($options['breakpoint-large']) ? $options['breakpoint-large'] : '1200') . 'px';
$less_vars['breakpoint-xlarge'] = (isset($options['breakpoint-xlarge']) ? $options['breakpoint-xlarge'] : '1600') . 'px';

// container - done
$less_vars['container-max-width'] = (isset($options['container-max-width']) ? $options['container-max-width'] : '1200') . 'px';
$less_vars['container-large-max-width'] = (isset($options['container-large-max-width']) ? $options['container-large-max-width'] : '1600') . 'px';
$less_vars['container-small-max-width'] = (isset($options['container-small-max-width']) ? $options['container-small-max-width'] : '900') . 'px';
$less_vars['container-xsmall-max-width'] = (isset($options['container-xsmall-max-width']) ? $options['container-xsmall-max-width'] : '750') . 'px';
$less_vars['container-padding-horizontal'] = (isset($options['container-padding-horizontal']) ? $options['container-padding-horizontal'] : '15') . 'px';

// margin - done
$less_vars['global-margin'] = (isset($options['global-margin']) ? $options['global-margin'] : '30') . 'px';
$less_vars['global-micro-margin'] = (isset($options['global-micro-margin']) ? $options['global-micro-margin'] : '5') . 'px';
$less_vars['global-tiny-margin'] = (isset($options['global-tiny-margin']) ? $options['global-tiny-margin'] : '10') . 'px';
$less_vars['global-small-margin'] = (isset($options['global-small-margin']) ? $options['global-small-margin'] : '15') . 'px';
$less_vars['global-medium-margin'] = (isset($options['global-medium-margin']) ? $options['global-medium-margin'] : '30') . 'px';
$less_vars['global-large-margin'] = (isset($options['global-large-margin']) ? $options['global-large-margin'] : '70') . 'px';
$less_vars['global-xlarge-margin'] = (isset($options['global-xlarge-margin']) ? $options['global-xlarge-margin'] : '140') . 'px';

// gutter - done
$less_vars['global-gutter'] = (isset($options['global-gutter']) ? $options['global-gutter'] : '30') . 'px';
$less_vars['global-micro-gutter'] = (isset($options['global-micro-gutter']) ? $options['global-micro-gutter'] : '5') . 'px';
$less_vars['global-tiny-gutter'] = (isset($options['global-tiny-gutter']) ? $options['global-tiny-gutter'] : '10') . 'px';
$less_vars['global-small-gutter'] = (isset($options['global-small-gutter']) ? $options['global-small-gutter'] : '15') . 'px';
$less_vars['global-medium-gutter'] = (isset($options['global-medium-gutter']) ? $options['global-medium-gutter'] : '30') . 'px';
$less_vars['global-large-gutter'] = (isset($options['global-large-gutter']) ? $options['global-large-gutter'] : '70') . 'px';
$less_vars['global-xlarge-gutter'] = (isset($options['global-xlarge-gutter']) ? $options['global-xlarge-gutter'] : '140') . 'px';

// height - done
$less_vars['height-small-height'] = (isset($options['height-small-height']) ? $options['height-small-height'] : '150') . 'px';
$less_vars['height-medium-height'] = (isset($options['height-medium-height']) ? $options['height-medium-height'] : '300') . 'px';
$less_vars['height-large-height'] = (isset($options['height-large-height']) ? $options['height-large-height'] : '450') . 'px';

// text - done
$less_vars['global-font-size'] = (isset($options['global-font-size']) ? $options['global-font-size'] : '1') . 'rem';
$less_vars['global-line-height'] = (isset($options['global-line-height']) ? $options['global-line-height'] : '1.5');
$less_vars['global-small-font-size'] = (isset($options['global-small-font-size']) ? $options['global-small-font-size'] : '0.875') . 'rem';
$less_vars['global-medium-font-size'] = (isset($options['global-medium-font-size']) ? $options['global-medium-font-size'] : '1.25') . 'rem';
$less_vars['global-large-font-size'] = (isset($options['global-large-font-size']) ? $options['global-large-font-size'] : '1.5') . 'rem';
$less_vars['global-xlarge-font-size'] = (isset($options['global-xlarge-font-size']) ? $options['global-xlarge-font-size'] : '2') . 'rem';
$less_vars['global-xxlarge-font-size'] = (isset($options['global-xxlarge-font-size']) ? $options['global-xxlarge-font-size'] : '2.625') . 'rem';

// color - done
$less_vars['global-color'] = (isset($options['global-color']) ? $options['global-color'] : '#666666');
$less_vars['global-emphasis-color'] = (isset($options['global-emphasis-color']) ? $options['global-emphasis-color'] : '#333333');
$less_vars['global-muted-color'] = (isset($options['global-muted-color']) ? $options['global-muted-color'] : '#999999');
$less_vars['global-link-color'] = (isset($options['global-link-color']) ? $options['global-link-color'] : '#1e87f0');
$less_vars['global-link-hover-color'] = (isset($options['global-link-hover-color']) ? $options['global-link-hover-color'] : '#0f6ecd');
$less_vars['global-inverse-color'] = (isset($options['global-inverse-color']) ? $options['global-inverse-color'] : '#ffffff');

// backgrounds - done
$less_vars['global-background'] = (isset($options['global-background']) ? $options['global-background'] : '#ffffff');
$less_vars['global-muted-background'] = (isset($options['global-muted-background']) ? $options['global-muted-background'] : '#f8f8f8');
$less_vars['global-primary-background'] = (isset($options['global-primary-background']) ? $options['global-primary-background'] : '#1e87f0');
$less_vars['global-secondary-background'] = (isset($options['global-secondary-background']) ? $options['global-secondary-background'] : '#222222');
$less_vars['global-success-background'] = (isset($options['global-success-background']) ? $options['global-success-background'] : '#32d296');
$less_vars['global-warning-background'] = (isset($options['global-warning-background']) ? $options['global-warning-background'] : '#faa05a');
$less_vars['global-danger-background'] = (isset($options['global-danger-background']) ? $options['global-danger-background'] : '#f0506e');

// border - done
$less_vars['global-border'] = (isset($options['global-border']) ? $options['global-border'] : '#e5e5e5');
$less_vars['global-border-width'] = (isset($options['global-border-width']) ? $options['global-border-width'] : '1') . 'px';

// box shadows - done
$less_vars['global-small-box-shadow'] = (isset($options['global-small-box-shadow']) ? $options['global-small-box-shadow'] : '0 2px 8px rgba(0,0,0,0.08)');
$less_vars['global-medium-box-shadow'] = (isset($options['global-medium-box-shadow']) ? $options['global-medium-box-shadow'] : '0 5px 15px rgba(0,0,0,0.08)');
$less_vars['global-large-box-shadow'] = (isset($options['global-large-box-shadow']) ? $options['global-large-box-shadow'] : '0 14px 25px rgba(0,0,0,0.16)');
$less_vars['global-xlarge-box-shadow'] = (isset($options['global-xlarge-box-shadow']) ? $options['global-xlarge-box-shadow'] : '0 28px 50px rgba(0,0,0,0.16)');

// heading - done
$less_vars['heading-medium-font-size-l'] = (isset($options['heading-medium-font-size-l']) ? $options['heading-medium-font-size-l'] : '4') . 'rem';
$less_vars['heading-large-font-size-l'] = (isset($options['heading-large-font-size-l']) ? $options['heading-large-font-size-l'] : '6') . 'rem';
$less_vars['heading-xlarge-font-size-l'] = (isset($options['heading-xlarge-font-size-l']) ? $options['heading-xlarge-font-size-l'] : '8') . 'rem';
$less_vars['heading-2xlarge-font-size-l'] = (isset($options['heading-2xlarge-font-size-l']) ? $options['heading-2xlarge-font-size-l'] : '11') . 'rem';

// overlay - done
$less_vars['eso-ovr-default'] = (isset($options['eso-ovr-default']) ? $options['eso-ovr-default'] : '#ffffff');
$less_vars['eso-ovr-primary'] = (isset($options['eso-ovr-primary']) ? $options['eso-ovr-primary'] : '#222222');
$less_vars['overlay-padding-horizontal'] = (isset($options['overlay-padding-horizontal']) ? $options['overlay-padding-horizontal'] : '30') . 'px';
$less_vars['overlay-padding-vertical'] = (isset($options['overlay-padding-vertical']) ? $options['overlay-padding-vertical'] : '30') . 'px';

// dotnav - done
$less_vars['dotnav-item-border'] = (isset($options['dotnav-item-border']) ? $options['dotnav-item-border'] : '#a1a1a1');
$less_vars['dotnav-item-active-background'] = (isset($options['dotnav-item-active-background']) ? $options['dotnav-item-active-background'] : '#a1a1a1');
$less_vars['dotnav-item-hover-background'] = (isset($options['dotnav-item-hover-background']) ? $options['dotnav-item-hover-background'] : '#a1a1a1');
$less_vars['dotnav-item-background'] = (isset($options['dotnav-item-background']) ? $options['dotnav-item-background'] : '#e0e0e0');
$less_vars['dotnav-item-onclick-background'] = (isset($options['dotnav-item-onclick-background']) ? $options['dotnav-item-onclick-background'] : '#e0e0e0');

// lightbox - done
$less_vars['lightbox-item-max-width'] = (isset($options['lightbox-item-max-width']) ? $options['lightbox-item-max-width'] : '100') . 'vw';
$less_vars['lightbox-item-max-height'] = (isset($options['lightbox-item-max-height']) ? $options['lightbox-item-max-height'] : '100') . 'vh';

// compile

$less->setVariables($less_vars);

$css = $less->compileFile(dirname(__FILE__) . "/uikit-src/uikit.theme.less");

$output_dir = wp_upload_dir()['basedir'] . "/echelon-so";
$output_file = $output_dir . '/echelon.css';

if ( !file_exists($output_dir) ) {
    mkdir($output_dir, 0755, true);
}

if ( file_exists($output_file) ) {
    unlink($output_file);
}

file_put_contents($output_file, $css);
