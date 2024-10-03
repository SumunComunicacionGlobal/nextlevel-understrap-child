<?php 

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

add_action( 'wp_head', 'smn_area_formativa_structured_data' );
function smn_area_formativa_structured_data() {

    $taxonomy = 'area-formativa';
    if ( is_tax( $taxonomy ) ) {

        $term = get_queried_object();
        $term_url = get_term_link( $term );
        $term_name = $term->name;
        $term_description = strip_tags( $term->description );
        $term_description = str_replace( array("\r", "\n"), '', $term_description );
        ?>

        <!-- Marcado estructurado para la lista de cursos -->
        <script type="application/ld+json">
            {
            "@context": "https://schema.org",
            "@type": "ItemList",
            "url": "<?php echo $term_url; ?>",
            "name": "<?php echo $term_name; ?>",
            "description": "<?php echo $term_description; ?>"
            
            <?php 
                $args = array(
                    'post_type' => 'formacion',
                    'posts_per_page' => -1,
                    'ignore_row' => true, // Custom query var
                    'tax_query' => array(
                        array(
                            'taxonomy' => $taxonomy,
                            'field' => 'slug',
                            'terms' => $term->slug
                        )
                    )
                );
                
                $query = new WP_Query( $args );
                if ( $query->have_posts() ) {
                    $i = 1;

                    echo ',';
                    echo '"itemListElement": [';

                    while ( $query->have_posts() ) { $query->the_post();

                        $post_url = get_the_permalink();
                        $post_title = get_the_title();
                        $post_location = strip_tags( get_the_term_list( get_the_ID(), 'ciudad', '"', '", "', '"' ) );
                        $post_description = strip_tags( get_the_excerpt() );
                        $post_provider_name = get_bloginfo('name');
                        $post_provider_url = get_home_url();;
                        
                        echo '{
                            "@type": "ListItem",
                            "position": ' . $i . ',
                            "item": {
                                "@type": "Course",
                                "url":"' . $post_url . '",
                                "location":[' . $post_location . '],
                                "name": "' . $post_title . '",
                                "description": "' . $post_description . '",
                                "provider": {
                                    "@type": "Organization",
                                    "name": "' . $post_provider_name . '",
                                    "sameAs": "' . $post_provider_url . '"
                                }
                            }
                        }';

                        if ( $i < $query->post_count ) {
                            echo ',';
                        }
                        $i++;
                    }
                    echo ']';
                }
                wp_reset_postdata();
                ?>

            }
        </script>

    <?php } elseif( is_singular( 'formacion' ) ) { 

        $author_id = get_the_author_meta('ID');
        $author_bio = get_the_author_meta('description', $author_id);
        
        ?>

        <!-- Marcado estructurado para la página de un curso -->
        <script type="application/ld+json">
        {
        "@context": "http://schema.org",
        "@type": "BlogPosting",
        "headline": "<?php the_title(); ?>",
        "image": "<?php the_post_thumbnail_url(); ?>",
        "description": "<?php echo strip_tags( get_the_excerpt() ); ?>",
            "audience": {
            "@type": "Audience",
            "audienceType": "<?php _e('Profesionales de seguridad y emergencias, bomberos, paramédicos, empresas que formen a su plantilla y personal de respuesta rápida', 'smn' ); ?>"

        },
        "author": {
            "@type": "Person",
            "name": "<?php the_author(); ?>",
        },
        "publisher": {
            "@type": "Organization",
            "name": "<?php bloginfo('name'); ?>",
            "logo": {
            "@type": "ImageObject",
            "url": "https://nextlevelformacion.com/wp-content/uploads/logo-next-level-mail.jpg"
            }
        },
        
        "isPartOf": {
            "@type": "WebPage",
            "name": "<?php bloginfo('name'); ?>",
            "url": "<?php echo get_home_url(); ?>",
            "reviewedBy": {
            "@type": "Person",
            "name": "<?php the_author(); ?>"
            },
            "description": "<?php echo $author_bio; ?>"
            },
            "publisher": {
            "@type": "Organization",
            "name": "<?php echo get_home_url(); ?>",   
        },

        "datePublished": "<?php echo get_the_date( 'c' ); ?>",
        "dateModified": "<?php echo get_the_modified_date( 'c' ); ?>",
        
        }
        </script>

    <?php }

}