<?php get_header(); ?>

<div>

	<?php

	global $echelonso_template;
	if (function_exists('siteorigin_panels_render')) {
		echo siteorigin_panels_render( absint($echelonso_template) );
	}

	?>

</div>

<?php get_footer(); ?>
