<?php
$post_id    = $args['post-id'] ?? '';
$page_title = get_the_title( $post_id );
?>

<div class="content-container">
	<h1 class="site-page__title entry-title" itemprop="headline"><?php echo esc_html( $page_title ); ?></h1>
</div>
