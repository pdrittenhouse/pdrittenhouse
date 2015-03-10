<?php
/**
 * pdrittenhouse Index template
 *
 * @package WordPress
 * @subpackage pdrittenhouse
 * @since pdrittenhouse 1.0
 */

get_header(); ?>

	<section class="page-content primary" role="main">
		<?php
			if ( have_posts() ):

				while ( have_posts() ) : the_post();

					get_template_part( 'loop', get_post_format() );

					wp_link_pages(
						array(
							'before'           => '<div class="linked-page-nav"><p>' . sprintf( __( '<em>%s</em> is separated in multiple parts:', 'pdrittenhouse' ), get_the_title() ) . '<br />',
							'after'            => '</p></div>',
							'next_or_number'   => 'number',
							'separator'        => ' ',
							'pagelink'         => __( '&raquo; Part %', 'pdrittenhouse' ),
						)
					);

				endwhile;

			else :

				get_template_part( 'loop', 'empty' );

			endif;
		?>
		<div class="pagination">

			<?php get_template_part( 'template-part', 'pagination' ); ?>

		</div>
	</section>

<?php get_footer(); ?>