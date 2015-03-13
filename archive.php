<?php
/**
 * pdrittenhouse template for displaying Archives
 *
 * @package WordPress
 * @subpackage pdrittenhouse
 * @since pdrittenhouse 1.0
 */

get_header(); ?>


    <div class="container">

        <?php

            if ( have_posts() ) : ?>

                <h1 class="archive-title">
                <?php
                if ( is_category() ):
                    printf( __( 'Category Archives: %s', 'pdrittenhouse' ), single_cat_title( '', false ) );

                elseif ( is_tag() ):
                    printf( __( 'Tag Archives: %s', 'pdrittenhouse' ), single_tag_title( '', false ) );

                elseif ( is_tax() ):
                    $term     = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                    $taxonomy = get_taxonomy( get_query_var( 'taxonomy' ) );
                    printf( __( '%s Archives: %s', 'pdrittenhouse' ), $taxonomy->labels->singular_name, $term->name );

                elseif ( is_day() ) :
                    printf( __( 'Daily Archives: %s', 'pdrittenhouse' ), get_the_date() );

                elseif ( is_month() ) :
                    printf( __( 'Monthly Archives: %s', 'pdrittenhouse' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'pdrittenhouse' ) ) );

                elseif ( is_year() ) :
                    printf( __( 'Yearly Archives: %s', 'pdrittenhouse' ), get_the_date( _x( 'Y', 'yearly archives date format', 'pdrittenhouse' ) ) );

                elseif ( is_author() ) : the_post();
                    printf( __( 'All posts by %s', 'pdrittenhouse' ), get_the_author() );

                else :
                    _e( 'Archives', 'pdrittenhouse' );

                endif;
                ?>
                </h1><?php

                if ( is_category() || is_tag() || is_tax() ):
                    $term_description = term_description();
                    if ( ! empty( $term_description ) ) : ?>

                        <div class="archive-description"><?php
                        echo $term_description; ?>
                        </div><?php

                    endif;
                endif;

                if ( is_author() && get_the_author_meta( 'description' ) ) : ?>

                    <div class="archive-description">
                    <?php the_author_meta( 'description' ); ?>
                    </div><?php

                endif;

                while ( have_posts() ) : the_post();

                    get_template_part( 'loop', get_post_format() );

                endwhile;

            else :

                get_template_part( 'loop', 'empty' );

            endif; ?>

            <div class="pagination">

                <?php get_template_part( 'template-part', 'pagination' ); ?>

            </div>

        <div class="ribbon-wrapper">
            <div class="ribbon-front">
                <!-- ribbon text goes here -->
            </div>
            <div class="ribbon-edge-topleft"></div>
            <div class="ribbon-edge-topright"></div>
            <div class="ribbon-edge-bottomleft"></div>
            <div class="ribbon-edge-bottomright"></div>
            <div class="ribbon-back-left"></div>
            <div class="ribbon-back-right"></div>
        </div>


    </div>

<?php get_footer(); ?>