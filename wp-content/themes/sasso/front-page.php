<?php get_header(); ?>
<div class="site-wrapper">
	<section id="primary" class="content-area front-page">
		<main id="main" class="site-main">
			<div class="content-wrap">
				<div class="content-grid">
					<div class="content-grid__item">
						<header class="entry-header">
							<h1 class="entry-header__page-title">
								<?php the_title(); ?></h1>
						</header> <!-- /entry-header -->
						<div class="entry-content">
							<?php get_template_part( 'parts/loop', 'page' ); ?>
						</div> <!-- /entry-content -->
					</div>
				</div>
			</div> <!-- /content-wrap -->
		</main> <!-- /main -->
	</section> <!-- /primary -->
</div> <!-- /site-wrapper-->
<?php get_footer(); ?>
