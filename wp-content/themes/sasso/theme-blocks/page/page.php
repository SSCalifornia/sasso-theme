<?php
$post_id = get_the_ID();
?>
<div class="site-page">
	<header class="site-page__header post-header">
		<?php
		get_template_part(
			'template-parts/page/page-headline',
			'',
			array(
				'post-id' => $post_id,
			)
		);
		?>
	</header>
	<div class="site-page__content post-content">
		<?php
		get_template_part(
			'template-parts/page/page-content',
			'',
			array(
				'post-id' => $post_id,
			)
		);
		?>
	</div>
</div>
