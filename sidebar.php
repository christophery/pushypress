<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div id="secondary" class="col-md-3 widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div>
<?php endif; ?>