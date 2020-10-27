
<?php
/*
* Template Name: Page Principale Capsule
*/

get_header(); ?>

<div class="container">
<?php                     
    $args = array(
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'category_name'     => 'en cours+capsule',
        'orderby'           => 'date',
        'order'             => 'DESC',
        'posts_per_page'    => 1
    );
    $arr_posts = new WP_Query( $args );
    
    if ( $arr_posts->have_posts() ) :
    
        while ( $arr_posts->have_posts() ) :
            $arr_posts->the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php
                if ( has_post_thumbnail() ) :
                    the_post_thumbnail();
                endif;
                ?>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;

    else:
     ?>
        <p class="nocontentwarning">La Capsule du moment sera bientôt disponible!</p>
     <?php
     endif;
?>
</div><!-- #container -->

<?php get_footer(); ?>