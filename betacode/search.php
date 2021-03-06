<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package BetaCode
 */

get_header();
?>
<div class="clearfix"></div>
<main id="primary" class="site-main">
	<div class="container">
		<div class="row g-5">
			<div class="col-md-8 pt-3">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'betacode' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
				</header><!-- .page-header -->

				<?php
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();

					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' );
					?>
					<hr>
				<?php

				endwhile;

				the_posts_navigation();

				else :

				get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			
			</div>

			<div class="col-md-4">
				<?php
				get_sidebar();
				?>
			
			</div>
		</div>
	</div>
</main>

<?php
get_footer();
