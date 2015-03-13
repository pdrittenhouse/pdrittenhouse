<?php
/**
 * pdrittenhouse template for displaying Search-Results-Pages
 *
 * @package WordPress
 * @subpackage pdrittenhouse
 * @since pdrittenhouse 1.0
 */

get_header(); ?>


    <div class="container">

        <?php

            if ( have_posts() ) : ?>

                <h1 ><?php printf( __( 'Search Results for: %s', 'pdrittenhouse' ), get_search_query() ); ?></h1>

                <div class="second-search">
                    <p>
                        <?php _e( 'Not what you searched for? Try again with some different keywords.', 'pdrittenhouse' ); ?>
                    </p>

                    <?php get_search_form(); ?>
                </div>

                <?php

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