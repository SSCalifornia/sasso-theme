<?php
$post_id = $args['post-id'] ?? '';
?>

<div class="content-container">
	<article <?php post_class( 'entry-content' ) ?>>
		<?php the_content(); ?>
	</article>
</div>
