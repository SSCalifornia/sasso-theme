<?php
/**
 * Template part for displaying posts
 *
 * Used for index, archive, search.
 */

if ( have_posts() ) :
	while ( have_posts() ) :
		the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="loop-posts<?php echo ( has_post_thumbnail() ) ? ' loop-posts--has-thumb' : ' loop-posts--missing-thumb'; ?>">
			<?php if ( has_post_thumbnail() ) : // Check if thumbnail exists ?>
				<div class="loop-posts__thumb">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail( 'square' ); ?>
					</a>
				</div> <!-- /loop-posts__thumb -->
			<?php endif; ?>

			<div class="loop-posts__content">
				<h2 class="loop-posts__headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="loop-posts__metabox">
					Posted by <?php the_author_posts_link(); ?> on <?php the_time( 'n.j.y' ); ?> in <?php echo get_the_category_list( ', ' ); ?>
				</div> <!-- /loop-posts__metabox -->

				<div class="loop-posts__excerpt">
					<?php the_excerpt(); ?>
				</div> <!-- /loop-posts__excerpt -->
			</div> <!-- /loop-posts__content -->

		</div> <!-- /loop-posts -->
	</article> <!-- /article -->

<?php endwhile; ?>

<?php else : ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h2 class="headline">Nothing to see here.</h2>
	</article>

<?php endif; ?>
