<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package My_Tix
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
	<nav class="footer-navigation">
		<?php
				wp_nav_menu( array(
					'theme_location' => 'social-menu',
					'menu_id'        => 'social-menu',
				) );
			?>
		</nav><!--  footer nav -->

		<div class="site-info">
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'mtx' ), 'mtx', '<a href="http://littlehou.se">Beau Daignault</a>' );
			?>
			
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
