<?php get_header(); ?>

<div>

	<?php

	if (have_posts()) {

		while(have_posts()) {

			the_post();

			global $echelonso_template;

			if (function_exists('siteorigin_panels_render')) {
				echo siteorigin_panels_render( absint($echelonso_template) );
			}

		}

	}

	?>

</div>

<?php get_footer(); ?>
