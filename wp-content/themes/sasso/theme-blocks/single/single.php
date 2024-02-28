<?php
$post_id = get_the_ID();
?>
<div class="site-single">
	<header class="site-single__header post-header">
		<?php
		get_template_part(
			'template-parts/single/single-headline',
			'',
			array(
				'post-id' => $post_id,
			)
		);
		?>
	</header>
	<div class="site-single__content post-content">
		<?php
		get_template_part(
			'template-parts/single/single-content',
			'',
			array(
				'post-id' => $post_id,
			)
		);
		?>
	</div>
</div>
