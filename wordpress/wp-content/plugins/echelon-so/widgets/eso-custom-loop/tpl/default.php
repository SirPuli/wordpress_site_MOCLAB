<?php if ( !empty($layout) && !empty($some_posts) ) : ?>

	<?php

	$post_selector_pseudo_query = $some_posts;

	$processed_query = siteorigin_widget_post_selector_process_query( $post_selector_pseudo_query );

	$query_result = new WP_Query( $processed_query );

	?>

	<?php if ($query_result->have_posts())  : ?>

		<?php while($query_result->have_posts()) : ?>

			<?php $query_result->the_post(); ?>

			<div style="background-size: cover; background-position: 50%; background-image: url('');">

				<?php echo siteorigin_panels_render( $layout ); ?>

			</div>

		<?php endwhile; ?>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>

<?php endif; ?>
