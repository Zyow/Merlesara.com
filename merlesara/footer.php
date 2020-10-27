<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package merlesara
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="site-info container">
			<div class="row">
				<div class="col-sm">
					Merlesara © <?php echo date("Y"); ?>. Tous droits réservés. 
				</div>
				<div class="col-sm text-right">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Made with ♥ - %2$s', 'merlesara' ), 'merlesara', '<a href="https://www.maxsz.me/">Maxsz</a>' );
				?>				
				</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
