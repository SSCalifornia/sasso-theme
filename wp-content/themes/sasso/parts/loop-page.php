<?php
/**
 * Template part for Pages
 */

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="page-posts">

			<div class="page-posts__content">
				<?php the_content(); ?>
			</div> <!-- /page-posts__content -->

		</div> <!-- /page-posts -->
	</article> <!-- /article -->

<?php endwhile; ?>

<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="headline">Nothing to see here.</h2>
	</article

<?php endif; ?>
