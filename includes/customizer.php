<?php
/**
 * Responsive  Theme Customizer
 *
 * @package responsive
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function responsive_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


/*--------------------------------------------------------------
	// Theme Elements
--------------------------------------------------------------*/

	$wp_customize->add_section( 'theme_elements', array(
		'title'                 => __( 'Theme Elements', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[breadcrumb]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_breadcrumb', array(
		'label'                 => __( 'Disable breadcrumb list?', 'responsive' ),
		'section'               => 'theme_elements',
		'settings'              => 'responsive_theme_options[breadcrumb]',
		'type'                  => 'checkbox'
	) );
	$wp_customize->add_setting( 'responsive_theme_options[cta_button]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_cta_button', array(
		'label'                 => __( 'Disable Call to Action Button?', 'responsive' ),
		'section'               => 'theme_elements',
		'settings'              => 'responsive_theme_options[cta_button]',
		'type'                  => 'checkbox'
	) );
	$wp_customize->add_setting( 'responsive_theme_options[minified_css]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_minified_css', array(
		'label'                 => __( 'Enable minified css?', 'responsive' ),
		'section'               => 'theme_elements',
		'settings'              => 'responsive_theme_options[minified_css]',
		'type'                  => 'checkbox'
	) );
	$wp_customize->add_setting( 'responsive_theme_options[blog_post_title_toggle]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_blog_post_title_toggle', array(
		'label'                 => __( 'Enable Blog Title', 'responsive' ),
		'section'               => 'theme_elements',
		'settings'              => 'responsive_theme_options[blog_post_title_toggle]',
		'type'                  => 'checkbox'
	) );

	$wp_customize->add_setting( 'responsive_theme_options[blog_post_title_text]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_blog_post_title_text', array(
		'label'                 => __( 'Title Text', 'responsive' ),
		'section'               => 'theme_elements',
		'settings'              => 'responsive_theme_options[blog_post_title_text]',
		'type'                  => 'text'
	) );


/*--------------------------------------------------------------
	// Home Page
--------------------------------------------------------------*/

	$wp_customize->add_section( 'home_page', array(
		'title'                 => __( 'Home Page', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[front_page]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_front_page', array(
		'label'                 => __( 'Enable Custom Front Page', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[front_page]',
		'type'                  => 'checkbox',
		'description'           => __( 'Overrides the WordPress front page option', 'responsive' )
	) );
	$wp_customize->add_setting( 'responsive_theme_options[home_headline]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'Hello, World!', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'res_home_headline', array(
		'label'                 => __( 'Headline', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[home_headline]',
		'type'                  => 'text'
	) );
	$wp_customize->add_setting( 'responsive_theme_options[home_subheadline]', array( 'sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage','default' => __( 'Your H2 subheadline here', 'responsive' ), 'type' => 'option' ));
	$wp_customize->add_control( 'res_home_subheadline', array(
		'label'                 => __( 'Subheadline', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[home_subheadline]',
		'type'                  => 'text'
	) );
	$wp_customize->add_setting( 'responsive_theme_options[home_content_area]',array( 'default' => __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive' ), 'transport' => 'postMessage', 'type' => 'option') );
	$wp_customize->add_control( 'res_home_content_area', array(
		'label'                 => __( 'Content Area', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[home_content_area]',
		'type'                  => 'textarea'
	) );	
	$wp_customize->add_setting( 'responsive_theme_options[cta_url]', array( 'sanitize_callback' => 'esc_url_raw','default' => '#nogo','transport' => 'postMessage', 'type' => 'option' ) );
	$wp_customize->add_control( 'res_cta_url', array(
		'label'                 => __( 'Call to Action (URL)', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[cta_url]',
		'type'                  => 'text'
	) );

	$wp_customize->add_setting( 'responsive_theme_options[cta_text]', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => 'Call to Action','transport' => 'postMessage', 'type' => 'option') );
	$wp_customize->add_control( 'res_cta_text', array(
		'label'                 => __( 'Call to Action (Text)', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[cta_text]',
		'type'                  => 'text'
	) );

	$wp_customize->add_setting( 'responsive_theme_options[featured_content]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_featured_content', array(
		'label'                 => __( 'Featured Content', 'responsive' ),
		'section'               => 'home_page',
		'settings'              => 'responsive_theme_options[featured_content]',
		'type'                  => 'textarea',
		'description'           => __( 'Paste your shortcode, video or image source', 'responsive' )
	) );


/*--------------------------------------------------------------
	// Default Layouts
--------------------------------------------------------------*/

	$wp_customize->add_section( 'default_layouts', array(
		'title'                 => __( 'Default Layouts', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[static_page_layout_default]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_static_page_layout_default', array(
		'label'                 => __( 'Default Static Page Layout', 'responsive' ),
		'section'               => 'default_layouts',
		'settings'              => 'responsive_theme_options[static_page_layout_default]',
		'type'                  => 'select',
		'choices'              => Responsive_Options::valid_layouts()
	) );
	$wp_customize->add_setting( 'responsive_theme_options[single_post_layout_default]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_single_post_layout_default', array(
		'label'                 => __( 'Default Single Blog Post Layout', 'responsive' ),
		'section'               => 'default_layouts',
		'settings'              => 'responsive_theme_options[single_post_layout_default]',
		'type'                  => 'select',
		'choices'               => Responsive_Options::valid_layouts()
	) );
	$wp_customize->add_setting( 'responsive_theme_options[blog_posts_index_layout_default]', array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_hblog_posts_index_layout_default', array(
		'label'                 => __( 'Default Blog Posts Index Layout', 'responsive' ),
		'section'               => 'default_layouts',
		'settings'              => 'responsive_theme_options[blog_posts_index_layout_default]',
		'type'                  => 'select',
		'choices'               => Responsive_Options::valid_layouts()
	) );

/*--------------------------------------------------------------
	// SOCIAL MEDIA SECTION
--------------------------------------------------------------*/

	$wp_customize->add_section( 'responsive_social_media', array(
		'title'             => __( 'Social Icons', 'responsive' ),
		'priority'          => 40,
		'description'       => __( 'Enter the URL to your account for each service for the icon to appear in the header.', 'mobilefirst' ),
	) );

	// Add Twitter Setting

	$wp_customize->add_setting( 'responsive_theme_options[twitter_uid]', array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_twitter', array(
		'label'             => __( 'Twitter', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[twitter_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add Facebook Setting

	$wp_customize->add_setting( 'responsive_theme_options[facebook_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_facebook', array(
		'label'             => __( 'Facebook', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[facebook_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add LinkedIn Setting

	$wp_customize->add_setting( 'responsive_theme_options[linkedin_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_linkedin', array(
		'label'             => __( 'LinkedIn', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[linkedin_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add Youtube Setting

	$wp_customize->add_setting( 'responsive_theme_options[youtube_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_youtube', array(
		'label'             => __( 'Tumblr', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[youtube_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add Google+ Setting

	$wp_customize->add_setting( 'responsive_theme_options[googleplus_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_googleplus', array(
		'label'             => __( 'Google+', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[googleplus_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add RSS Setting

	$wp_customize->add_setting( 'responsive_theme_options[rss_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_rss', array(
		'label'             => __( 'RSS Feed', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[rss_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add Instagram Setting

	$wp_customize->add_setting( 'responsive_theme_options[instagram_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_instagram', array(
		'label'             => __( 'Instagram', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[instagram_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add Pinterest Setting

	$wp_customize->add_setting( 'responsive_theme_options[pinterest_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_pinterest', array(
		'label'             => __( 'Pinterest', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[pinterest_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add StumbleUpon Setting

	$wp_customize->add_setting( 'responsive_theme_options[stumbleupon_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_stumble', array(
		'label'             => __( 'StumbleUpon', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[stumbleupon_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );	

	// Add Vimeo Setting

	$wp_customize->add_setting( 'responsive_theme_options[vimeo_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_vimeo', array(
		'label'             => __( 'Vimeo', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[vimeo_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add SoundCloud Setting

	$wp_customize->add_setting( 'responsive_theme_options[yelp_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_yelp', array(
		'label'             => __( 'Yelp', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[yelp_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

	// Add Foursquare Setting

	$wp_customize->add_setting( 'responsive_theme_options[foursquare_uid]' , array( 'sanitize_callback' => 'esc_url_raw', 'type' => 'option' ));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'res_foursquare', array(
		'label'             => __( 'Foursquare', 'responsive' ),
		'section'           => 'responsive_social_media',
		'settings'          => 'responsive_theme_options[foursquare_uid]',
		'sanitize_callback' => 'esc_url_raw'
	) ) );

/*--------------------------------------------------------------
	// CSS Styles
--------------------------------------------------------------*/

	$wp_customize->add_section( 'css_styles', array(
		'title'                 => __( 'CSS Styles', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[responsive_inline_css]' ,array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_responsive_inline_css', array(
		'label'                 => __( 'Custom CSS Styles', 'responsive' ),
		'section'               => 'css_styles',
		'settings'              => 'responsive_theme_options[responsive_inline_css]',
		'type'                  => 'textarea'
	) );
	
/*--------------------------------------------------------------
	// Scripts
--------------------------------------------------------------*/

	$wp_customize->add_section( 'scripts', array(
		'title'                 => __( 'Scripts', 'responsive' ),
		'priority'              => 30
	) );
	$wp_customize->add_setting( 'responsive_theme_options[responsive_inline_js_head]',array( 'type' => 'option' ) );
	$wp_customize->add_control( 'res_responsive_inline_js_head', array(
		'label'                 => __( 'Embeds to header.php', 'responsive' ),
		'section'               => 'scripts',
		'settings'              => 'responsive_theme_options[responsive_inline_js_head]',
		'type'                  => 'textarea'
	) );

	$wp_customize->add_setting( 'responsive_theme_options[responsive_inline_js_footer]',array( 'type' => 'option' ));
	$wp_customize->add_control( 'res_responsive_inline_js_footer', array(
		'label'                 => __( 'Embeds to footer.php', 'responsive' ),
		'section'               => 'scripts',
		'settings'              => 'responsive_theme_options[responsive_inline_js_footer]',
		'type'                  => 'textarea'
	) );


}
add_action( 'customize_register', 'responsive_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function responsive_customize_preview_js() {
	wp_enqueue_script( 'responsive_customizer', get_template_directory_uri() . '/core/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'responsive_customize_preview_js' );
