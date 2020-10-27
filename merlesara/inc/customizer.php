<?php
/**
 * merlesara Theme Customizer
 *
 * @package merlesara
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function merlesara_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'merlesara_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'merlesara_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->remove_control('header_text_color');
	$wp_customize->remove_control('background_color');

	// Background color
	 $wp_customize->add_setting( 'bkg_color', array(
		'default'   => '#31B9EA',
		'transport' => 'refresh',
	  ) );
  
	  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'bkg_color', array(
		'section' => 'colors',
		'label'   => esc_html__( 'Couleur du fond écran', 'theme' ),
	  ) ) );
}
add_action( 'customize_register', 'merlesara_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function merlesara_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function merlesara_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function merlesara_customize_preview_js() {
	wp_enqueue_script( 'merlesara-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'merlesara_customize_preview_js' );

/**
 * Customizer css
 * **/
function merlesara_get_customizer_css() {
    ob_start();

    $bkg_color = get_theme_mod( 'bkg_color', '' );
    if ( ! empty( $bkg_color ) ) {
      ?>
      body {
		background: -moz-linear-gradient(top,  <?php echo $bkg_color; ?>33 0%,#FFFFFF00 100%) !important;
		background: -webkit-linear-gradient(top, <?php echo $bkg_color; ?>33 0%,#FFFFFF00 100%) !important;
		background: linear-gradient(to bottom,  <?php echo $bkg_color; ?>33 0%#FFFFFF00 100%) !important;
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $bkg_color; ?>33', endColorstr='#00ffffff',GradientType=0 );
      }
      <?php
	}

    $css = ob_get_clean();
    return $css;
}