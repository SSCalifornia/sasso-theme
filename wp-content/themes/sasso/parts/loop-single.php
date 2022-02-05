<?php
/**
 * Template part for Posts
 */

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="single-posts">

			<div class="single-posts__content">
				<?php the_content(); ?>
			</div> <!-- /single-posts__content -->

		</div> <!-- /single-posts -->
	</article> <!-- /article -->

<?php endwhile; ?>

<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="headline">Nothing to see here.</h2>
	</article

<?php endif; ?>
