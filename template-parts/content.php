<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My_Tix
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- check if the post or page has a Featured Image assigned to it. -->
<?php if ( has_post_thumbnail() && is_singular() ) { ?>
   <figure class="featured-single">
		<?php the_post_thumbnail();?>
	</figure>
<?php } else { ?>
	<figure class="featured-cropped">
		<?php the_post_thumbnail();?>
	</figure>
<?php } ?>
	<header class="entry-header">
		<?php mtx_the_category_list(); ?>
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() || 'movies' === get_post_type() || 'live_events' === get_post_type() || 'attractions' === get_post_type() || 'sundry' === get_post_type()) : ?>
		<div class="entry-meta">
	
		<?php	//endif;
		//endif; ?>     
	
 <?php  //mtx_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'mtx' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mtx' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php mtx_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
