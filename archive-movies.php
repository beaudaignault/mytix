<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My_Tix
 */

get_header();
// $args = array(
// 	'posts_per_page' => 1,
// 	'post_type' => 'movies',
// );
// $mtxMovies = new WP_Query( $args );

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<section class="mtx-tiles">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header mtx-archive">
				<?php
					the_archive_title( '<h1 class="page-title mtx-archive">', '</h1>' );
					// the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
 
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content','movies' );

			endwhile;
			
			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
