<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BetaCode
 */

?>

	<footer class="footer mt-auto py-3 bg-light">
	<div class="container">
	<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'betacode' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'betacode' ), 'WordPress' );
				?>
			</a>
		</div><!-- .site-info -->
	</div>
	</footer>
	
	<!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
