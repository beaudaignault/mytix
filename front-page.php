<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My_Tix
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<section class="mtx-tiles">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

            /* Start Loop 1 */
            $args = array(
                'post_type' => 'movies',
                'posts_per_page' => 1
            );
            $fp_movie_query = new WP_Query($args);?>

			<?php while ( $fp_movie_query->have_posts() ) : $fp_movie_query->the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'movies' );

			endwhile;
            wp_reset_postdata();
            /* Start Loop 2 */
            $args = array(
                'post_type' => 'live_events',
                'posts_per_page' => 1
            );
            $fp_live_query = new WP_Query($args);
            while ( $fp_live_query->have_posts() ) : $fp_live_query->the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'live_events' );

            endwhile;
            wp_reset_postdata();
            /* Start Loop 3 */
            $args = array(
                'post_type' => 'attractions',
                'posts_per_page' => 1
            );
            $fp_attractions_query = new WP_Query($args);
            while ( $fp_attractions_query->have_posts() ) : $fp_attractions_query->the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'attractions' );

            endwhile;
            wp_reset_postdata();
            /* Start Loop 4 */
            $args = array(
                'post_type' => 'sundry',
                'posts_per_page' => 1
            );
            $fp_sundry_query = new WP_Query($args,'posts_per_page=1');
            while ( $fp_sundry_query->have_posts() ) : $fp_sundry_query->the_post();

                /*
                 * Include the Post-Format-specific template for the content.
                 * If you want to override this in a child theme, then include a file
                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                 */
                get_template_part( 'template-parts/content', 'sundry' );

            endwhile;
            wp_reset_postdata();
            
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
        </section><!-- .mtx-tiles -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
