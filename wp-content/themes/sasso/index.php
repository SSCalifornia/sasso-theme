<?php get_header(); ?>
<div class="site-wrapper">
	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="content-wrap">
				<div class="content-grid">
					<div class="content-grid__item">
						<header class="entry-header">
							<h1 class="entry-header__page-title">
								<?php
								$post_page_title = get_the_title( get_option( 'page_for_posts', true ) );
								echo esc_html( $post_page_title );
								?>
							</h1>
						</header> <!-- /entry-header -->
						<div class="entry-content">
							<?php get_template_part( 'parts/loop', 'posts' ); ?>
							<?php echo paginate_links(); ?>
						</div> <!-- /entry-content -->
					</div>
				</div>
			</div> <!-- /content-wrap -->
		</main> <!-- /main -->
	</section> <!-- /primary -->
</div> <!-- /site-wrapper-->
<?php get_footer(); ?>