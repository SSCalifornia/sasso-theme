<?php
$post_id      = $args['post-id'] ?? '';
$single_title = get_the_title( $post_id );
?>

<div class="content-container">
	<h1 class="site-single__title entry-title" itemprop="headline"><?php echo esc_html( $single_title ); ?></h1>
</div>
