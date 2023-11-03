<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
    
    <div id="wrapper-top-bar" class="top-bar bg-secondary text-white">

        <?php if ( 'container' === $container ) : ?>
            <div class="container">
        <?php endif; ?>

            <div class="row">

                <?php if( is_active_sidebar('top-bar') ) {
                    dynamic_sidebar( 'top-bar' ); 
                } else {

                    echo '<div class="col">';

                        if ( is_front_page(  ) ) {
                            echo '<h1 class="font-weight-bold small text-center mb-0">' . get_bloginfo( 'description' ) . '</h1>';
                        } else {
                            echo '<p class="font-weight-bold small text-center mb-0">' . get_bloginfo( 'description' ) . '</p>';
                        }

                    echo '</div>';
                    
                } ?>
                
            </div>

        <?php if ( 'container' === $container ) : ?>
            </div>
        <?php endif; ?>

    </div>

