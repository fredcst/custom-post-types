<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

	<h1>Actualités</h1>
	<p>Ne ratez plus aucune actualité de l'Industrie Magnifique</p>

		<?php astra_primary_content_top(); ?>

		<ul id="tan-archive-news">
			<?php 
				if (have_posts() ) : 
					while (have_posts() ) : the_post(); ?>
						<li class="tan-news">
						<a href="<?php the_permalink(); ?>">
						<?php $image = get_field( 'image' ); ?>
                        <?php if ( $image ) : ?>
                            <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                        <?php endif; ?>
						<h2><?php the_field( 'titre' ); ?></h2>
						</a>
						<div class="tan-news-date-categorie">
							<span class="tan-news-date"><?php the_field( 'date' ); ?></span>
							<span class="tan-news-categorie"><?php the_field( 'categorie' ); ?></span>
						</div>
						<p><?php the_field( 'extrait' ); ?></p>
						</li>
					<?php endwhile;
				else :
					_e( 'Pas de nouvelles actualités', 'textdomain' );
				endif;
				
			?>
		</ul>
		
		<?php astra_pagination(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
