
<?php
/*
* Template Name: Page Principale l'Edition
*/

get_header(); ?>

<div class="container">
<?php                     
    $args = array(
        'post_type'         => 'post',
        'post_status'       => 'publish',
        'category_name'     => 'en cours+edition',
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
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>
                <div class="entry-content flipbook">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        endwhile;
    
    else:
    ?>
    <p class="nocontentwarning">L'Edition du moment sera bientôt disponible!</p>
    <?php
    endif;
?>
</div><!-- #container -->

<?php get_footer(); ?>