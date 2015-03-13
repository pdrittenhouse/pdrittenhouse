<?php
/**
 * pdrittenhouse template for displaying Single-Posts
 *
 * @package WordPress
 * @subpackage pdrittenhouse
 * @since pdrittenhouse 1.0
 */

get_header(); ?>


    <div class="container">

        <?php
        if ( have_posts() ) : the_post();

            get_template_part( 'loop', get_post_format() ); ?>



            <!-- post-links -->
                <?php previous_post_link( '%link', __( '&laquo; Previous post', 'pdrittenhouse' ) ) ?>
                <?php next_post_link( '%link', __( 'Next post &raquo;', 'pdrittenhouse' ) ); ?>


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


    </div>

<?php get_footer(); ?>