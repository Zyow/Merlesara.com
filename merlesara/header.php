<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package merlesara
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'merlesara' ); ?></a>

	<header id="masthead" class="site-header">
		
			<div class="container">
				<!-- Logo & Title -->
				<div class="site-branding">
				<?php if( has_custom_logo() ) : ?>
					<?php	
						the_custom_logo(); 
					?>
				<?php elseif ( is_front_page() && is_home() ) : ?>	
					<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
					<p class="site-description"><?php echo get_bloginfo( 'description', 'display' );  ?></p>
				<?php else : ?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<p class="site-description"><?php echo get_bloginfo( 'description', 'display' );  ?></p>
				<?php endif; ?>
					
				
				<!-- Navbar -->
				<nav class="main-navigation">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id'        => 'primary-menu',
									'container' => false,
									'depth' => 2,
									'menu_class' => 'nav nav justify-content-center',
									'walker' => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
									'fallback_cb' => 'Bootstrap_NavWalker::fallback', // For menu fallback
								)
							);
						?>
				</nav>
	</header><!-- #masthead -->
