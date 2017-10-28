<?php
/*
Template Name: Gallery Template
* Version: 1.2.9
*/
get_header(); ?>
<?php get_template_part('audio-template');  ?>
<div id="container" class="site-content site-main container">
	<div id="content" class="hentry">
		<?php if ( ! post_password_required() ) { ?>
			<div class="gallery_box entry-content">
				<?php $gllr_post = get_post( get_the_ID() ); ?>
				<div class="gllr_page_content">
					<?php if ( is_page() ) {
						echo apply_filters( 'the_content', $gllr_post->post_content );
					} ?>
				</div>
				<?php if ( function_exists( 'gllr_template_content_custom' ) ) {
					$content = gllr_template_content_custom();

					if ( 1 != $content['pages'] ) { ?>
						<div class='gllr_clear'></div>
						<div class="pagination navigation loop-pagination nav-links gllr_pagination">
							<div id="gallery_pagination">
								<?php if ( function_exists( 'gllr_template_pagination' ) )
									gllr_template_pagination( $content ); ?>
								<div class='gllr_clear'></div>
							</div>
						</div><!-- .pagination -->
						<?php if ( function_exists( 'pgntn_display_pagination' ) ) pgntn_display_pagination( 'custom', $content['second_query'] ); ?>
					<?php }
				} ?>
			</div><!-- .gallery_box -->
		<?php } else { ?>
			<div class="gallery_box entry-content">
				<p><?php echo get_the_password_form(); ?></p>
			</div><!-- .gallery_box -->
		<?php } ?>
	</div><!-- .hentry -->
</div><!-- #container -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>