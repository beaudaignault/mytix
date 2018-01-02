<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My_Tix
 */
$mtxVenueUrl = get_field('venue_url');
$mtxVenue = get_field('venue_plain_text');
$mtxDate = get_field('date_on_ticket');
$mtxNotes = get_field('notes');
$mtxAltImages = get_field('alternate_image');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!-- check if the post or page has a Featured Image assigned to it. -->
<?php if ( has_post_thumbnail() && is_singular() ) { ?>
   <figure class="featured-single">
		<?php the_post_thumbnail();?>
	</figure>
<?php } else { ?>
	<figure class="featured-cropped bg-movie">
		<?php the_post_thumbnail();?>
	</figure>
<?php } ?>

<header class="entry-header">
<?php if (!is_singular() ) :?>
<div class="card-meta bg-movie">
	   <div class="mtx-category-slat">
		   <div class="mtx-cat">
				   <b class="fas fa-utensils"></b>
				   <?php if(is_singular()): mtx_the_category_list();
						   endif; ?>
		   </div>
	   </div><!-- .mtx-category-slat -->
<?php endif; ?>
	   <div class="mtx-title">
	   <?php
		   if ( is_singular() ) :
			   the_title( '<h1 class="entry-title">', '</h1>' );
		   else :
			   the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		   endif;?>
	   </div><!-- /.mtx-title  -->
   </div><!-- /.card-meta -->

   <?php if ( 'post' === get_post_type() || 'sundry' === get_post_type() ) : ?>
   <div class="entry-meta">
   <ul class="ticket-meta-primary">
   <?php 
	   if( is_singular() ): ?>
	   <?php if(!$mtxVenueUrl) {?>
		   <li><?php echo $mtxVenue; ?></li>
	   <?php } else { ?>
		   <li><a href="<?php echo $mtxVenueUrl; ?>" rel="external" target="_self"><?php echo $mtxVenue; ?></a></li>
	   <?php } ?>
		   <li><?php echo $mtxDate; ?></li>

		   <li><?php echo $mtxNotes; ?></li>
	   </ul>
	   <?php if( !empty($mtxAltImages) ):
			   // vars
			   $url = $mtxAltImages['url'];
			   $title = $mtxAltImages['title'];
			   $alt = $mtxAltImages['alt'];
			   $caption = $mtxAltImages['caption'];
			   // thumbnail
			   $size = 'thumbnail';
			   $thumb = $mtxAltImages['sizes'][ $size ];
			   $width =$mtxAltImages['sizes'][ $size . '-width' ];
			   $height = $mtxAltImages['sizes'][ $size . '-height' ];?>
		   <aside id="accordion">
			   <h3>Additional image/ephemera</h3>
			   <div>
				   <img src="<?php echo $thumb; ?>" alt="<?php echo $alt;?> related image"/>
				   <?php if( $caption );?>
					   <b><small><?php echo $caption; ?></small></b>
				   <?php endif; ?>
			   </div> 
		   </aside>	
		   <?php  
		   endif;
	   endif; ?>     
	
<?php  //mtx_posted_on(); ?>
   </div><!-- .entry-meta -->
   <?php if (is_singular() ) :?>
	   <div class="mtx-category-slat">
		   <div class="mtx-icon"
			   <img src="assets/images/svg-icons/movies.svg" alt="movie icon"/>
		   </div>
		   <div class="mtx-cat">
				   <?php mtx_the_category_list(); ?>
		   </div>
	   </div><!-- .mtx-category-slat -->
<?php endif; ?>
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
