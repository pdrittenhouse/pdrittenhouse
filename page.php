<?php
/**
 * pdrittenhouse template for displaying Pages
 *
 * @package WordPress
 * @subpackage pdrittenhouse
 * @since pdrittenhouse 1.0
 */

get_header(); ?>


    <main>

        <?php
        if ( have_posts() ) : the_post();

            get_template_part( 'loop' ); ?>

            <?php

            wp_link_pages(
                array(
                    'before'           => '<div class="linked-page-nav"><p>' . sprintf( __( '<em>%s</em> is separated in multiple parts:', 'pdrittenhouse' ), get_the_title() ) . '<br />',
                    'after'            => '</p></div>',
                    'next_or_number'   => 'number',
                    'separator'        => ' ',
                    'pagelink'         => __( '&raquo; Part %', 'pdrittenhouse' ),
                )
            ); ?>

            <?php
            if ( comments_open() || get_comments_number() > 0 ) :
                comments_template( '', true );
            endif;
            ?>

            <?php

        else :

            get_template_part( 'loop', 'empty' );

        endif;
        ?>

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


    </main>

<?php get_footer(); ?>