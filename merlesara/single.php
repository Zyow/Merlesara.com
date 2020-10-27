<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package merlesara
 */

get_header();
?>

	<main id="primary" class="site-main container">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			
			?><div class="nav-pagination row">
				<div class="col"><?php 
				if( get_adjacent_post(false, '', true) ) { 
					previous_post_link('%link', '&larr; Article précédent');
				}; 
				?></div>
				<div class="col text-right"><?php 
				if( get_adjacent_post(false, '', false) ) { 
					next_post_link('%link', 'Article suivant &rarr;');
				}; 
				?></div>
			</div><?php 

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
// get_sidebar();
get_footer();
