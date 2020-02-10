<?php
/*
Widget Name: E: Template Tag
Description: Use a template tag inside a looped Echelon layout.
Author: Echelon
Author URI: https://echelonso.com
*/


class EchelonSOEsoTemplateTag extends SiteOrigin_Widget {

	function __construct() {
		parent::__construct(
			'echelonso-eso-template-tag',
			__('E: Template Tag', 'echelon-so'),
			array(
				'description' => __('Use a template tag inside a looped Echelon layout.', 'echelon-so' ),
			),
			array(),
			false,
			plugin_dir_path(__FILE__)
		);
	}

	/*
	* Template Variables
	*/

	function get_template_variables($instance, $args) {

		// content
		$return['template_tag'] = !empty( $instance['template_tag'] ) ? $instance['template_tag'] : '';

		// modifiers
		$return['tag_class'] = array();
		(empty($instance['modifiers']['size'])) ?: $return['tag_class'][] = $instance['modifiers']['size'];
		(empty($instance['modifiers']['weight'])) ?: $return['tag_class'][] = $instance['modifiers']['weight'];
		(empty($instance['modifiers']['transform'])) ?: $return['tag_class'][] = $instance['modifiers']['transform'];
		(empty($instance['modifiers']['alignment'])) ?: $return['tag_class'][] = $instance['modifiers']['alignment'];
		(empty($instance['modifiers']['border_radius'])) ?: $return['tag_class'][] = $instance['modifiers']['border_radius'];
		(empty($instance['modifiers']['inverse'])) ?: $return['tag_class'][] = $instance['modifiers']['inverse'];
		return $return;
	}

	/*
	* Widget Form
	*/

	function get_widget_form() {

		global $echelon_so_modifiers;

		$return['template_tag'] = array(
			'type' => 'select',
			'label' => __( 'Data', 'echelon-so' ),
			'default' => '0',
			'options' => array(
				'0' => __('-', 'echelon-so'),
				'bloginfo' => __('Blog Info', 'echelon-so'),
				'author_avatar' => __('Author Avatar', 'echelon-so'),
				'author_meta' => __('Author Meta', 'echelon-so'),
				'category' => __('Category List', 'echelon-so'),
				'tags' => __('Tags List', 'echelon-so'),
				'terms' => __('Terms List', 'echelon-so'),
				'title' => __('Post Title', 'echelon-so'),
				'content' => __('Post Content', 'echelon-so'),
				'post_date' => __('Post Date', 'echelon-so'),
				'excerpt' => __('Post Excerpt', 'echelon-so'),
				'thumbnail' => __('Post Thumbail', 'echelon-so'),
				'permalink' => __('Post Permalink', 'echelon-so'),
			),
			'state_emitter' => array(
				'callback' => 'select',
				'args' => array( 'template_tag' )
			)
		);

		$return['modifiers'] = array(
			'type' => 'section',
			'label' => __( 'Modifiers' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'size' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Size', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_size()
				),
				'weight' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Weight', 'echelon-so'),
					'description' => __('Google fonts ignore this modifier.', 'echelon-so'),
					'options' => $echelon_so_modifiers->font_weight()
				),
				'transform' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Transform', 'echelon-so'),
					'options' => $echelon_so_modifiers->text_transform()
				),
				'alignment' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Alignment', 'echelon-so'),
					'options' => $echelon_so_modifiers->text_align()
				),
				'border_radius' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Border Radius', 'echelon-so'),
					'options' => $echelon_so_modifiers->border_radius()
				),
				'inverse' => array(
					'type' => 'select',
					'default' => '0',
					'label' => __('Inverse', 'echelon-so'),
					'options' => $echelon_so_modifiers->inverse()
				),
			)
		);

		$return['bloginfo'] = array(
			'type' => 'section',
			'label' => __( 'Blog Info' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'show' => array(
					'type' => 'select',
					'label' => __( 'Show', 'echelon-so' ),
					'description' => __( 'What information to display.' , 'echelon-so' ),
					'default' => 'name',
					'options' => array(
						'name' => __( 'Name', 'echelon-so' ),
						'description' => __( 'Description', 'echelon-so' ),
						'url' => __( 'URL', 'echelon-so' ),
					)
				),
				'create_home_link' => array(
					'type' => 'checkbox',
					'label' => __( 'Create as Home Link', 'echelon-so' ),
					'description' => __( 'Create as a link to the sites home url.' , 'echelon-so' ),
					'default' => false
				)
			),
			'state_handler' => array(
				'template_tag[bloginfo]' => array('show'),
				'_else[template_tag]' => array( 'hide' )
			)
		);

		$return['author_meta'] = array(
			'type' => 'section',
			'label' => __( 'Author Meta' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'link' => array(
					'type' => 'checkbox',
					'label' => __( 'Create Link to Author Archive', 'echelon-so' ),
					'default' => false,
				),
				'meta_field' => array(
					'type' => 'select',
					'label' => __( 'Meta Field', 'echelon-so' ),
					'default' => 'display_name',
					'description' => __( 'Which meta field to display.' , 'echelon-so' ),
					'options' => array(
						'display_name' => __( 'Display Name', 'echelon-so' ),
						'description' => __( 'Description', 'echelon-so' ),
						'first_name' => __( 'First Name', 'echelon-so' ),
						'last_name' => __( 'Last Name', 'echelon-so' ),
						'nickname' => __( 'Nickname', 'echelon-so' ),
						'user_description' => __( 'User Description', 'echelon-so' ),
						'user_email' => __( 'Email', 'echelon-so' ),
						'user_url' => __( 'URL', 'echelon-so' ),
					)
				)
			),
			'state_handler' => array(
				'template_tag[author_meta]' => array('show'),
				'_else[template_tag]' => array( 'hide' )
			)
		);

		$return['category'] = array(
			'type' => 'section',
			'label' => __( 'Categories' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'sep' => array(
					'type' => 'text',
					'label' => __( 'Seperator', 'echelon-so' ),
					'description' => __( 'The seperator character to use for the list.' , 'echelon-so' ),
					'default' => ', ',
				)
			),
			'state_handler' => array(
				'template_tag[category]' => array('show'),
				'_else[template_tag]' => array( 'hide' )
			)
		);

		$return['excerpt'] = array(
			'type' => 'section',
			'label' => __( 'Excerpt' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'words' => array(
					'type' => 'number',
					'label' => __( 'Words to Show', 'echelon-so' ),
					'description' => __( 'How lonfg to make the excerpt in words.' , 'echelon-so' ),
					'default' => 50,
				),
				'more_text' => array(
					'type' => 'text',
					'label' => __( 'Read More Text', 'echelon-so' ),
					'description' => __( 'The text to use for the show more sequence.' , 'echelon-so' ),
					'default' => '...',
				)
			),
			'state_handler' => array(
				'template_tag[excerpt]' => array('show'),
				'_else[template_tag]' => array( 'hide' )
			)
		);

		$return['permalink'] = array(
			'type' => 'section',
			'label' => __( 'Permalink' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'link_text' => array(
					'type' => 'text',
					'label' => __( 'Link Text', 'echelon-so' ),
					'description' => __('The text to use for the permalink.', 'echelon-so' ),
					'default' => 'Link Text',
				)
			),
			'state_handler' => array(
				'template_tag[permalink]' => array('show'),
				'_else[template_tag]' => array( 'hide' )
			)
		);

		$return['tags'] = array(
			'type' => 'section',
			'label' => __( 'Tags' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'sep' => array(
					'type' => 'text',
					'label' => __( 'Seperator', 'echelon-so' ),
					'description' => __( 'Character to separate the list.' , 'echelon-so' ),
					'default' => ', ',
				)
			),
			'state_handler' => array(
				'template_tag[tags]' => array('show'),
				'_else[template_tag]' => array( 'hide' )
			)
		);

		$return['title'] = array(
			'type' => 'section',
			'label' => __( 'Title' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'link' => array(
					'type' => 'checkbox',
					'label' => __( 'Create Self Link', 'echelon-so' ),
					'description' => __( 'The title will link to the posts permalink.', 'echelon-so' ),
					'default' => false,
				),
			),
			'state_handler' => array(
				'template_tag[title]' => array('show'),
				'_else[template_tag]' => array( 'hide' )
			)
		);

		$return['terms'] = array(
			'type' => 'section',
			'label' => __( 'Terms' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'taxonomy' => array(
					'type' => 'select',
					'label' => __( 'Taxonomy', 'echelon-so' ),
					'description' => __( 'The taxonomy to get the terms from.' , 'echelon-so' ),
					'default' => '0',
					'options' => $this->get_custom_taxonomies()
				),
				'sep' => array(
					'type' => 'text',
					'label' => __( 'Seperator', 'echelon-so' ),
					'description' => __( 'Character to seperate list items.' , 'echelon-so' ),
					'default' => ', ',
				)
			),
			'state_handler' => array(
				'template_tag[terms]' => array('show'),
				'_else[template_tag]' => array( 'hide' )
			)
		);

		$return['thumbnail'] = array(
			'type' => 'section',
			'label' => __( 'Thumbnail' , 'echelon-so' ),
			'hide' => true,
			'fields' => array(
				'link' => array(
					'type' => 'checkbox',
					'label' => __( 'Create as Self Link', 'echelon-so' ),
					'default' => false,
					'description' => __( 'Link the image to the post it was taken from.', 'echelon-so' ),
				),
				'image_size' => array(
					'type' => 'image-size',
					'label' => __( 'Image Size', 'echelon-so' ),
					'description' => __( 'Size of the image to display.', 'echelon-so' ),
				)
			),
			'state_handler' => array(
				'template_tag[thumbnail]' => array('show'),
				'_else[template_tag]' => array( 'hide' )
			)
		);

		return $return;

	}

	/*
	*  Get some taxonomies
	*/

	function get_custom_taxonomies() {
		$args = array(
			'public'   => true,
			'_builtin' => false
		);
		$taxonomies = get_taxonomies( $args, 'objects', 'or' );
		foreach ($taxonomies as $k => $v) {
			$r[$v->name] = $v->name . ' - ' . $v->label;
		}
		return $r;
	}

	/*
	* Form Teaser
	*/

	function get_form_teaser() {
		global $echelon_so;
		return $echelon_so->form_teaser();
	}

}

siteorigin_widget_register('echelonso-eso-template-tag', __FILE__, 'EchelonSOEsoTemplateTag');
