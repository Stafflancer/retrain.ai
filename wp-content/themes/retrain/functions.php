<?php
/**
 * retrain functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package retrain
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.3' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function retrain_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on retrain, use a find and replace
		* to change 'retrain' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'retrain', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'retrain' ),
		) );

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'retrain_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
}

add_action( 'after_setup_theme', 'retrain_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function retrain_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'retrain_content_width', 640 );
}

add_action( 'after_setup_theme', 'retrain_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function retrain_widgets_init() {
	register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'retrain' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'retrain' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) );
}

add_action( 'widgets_init', 'retrain_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function retrain_scripts() {
	wp_enqueue_style( 'retrain-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'retrain-style', 'rtl', 'replace' );

	wp_enqueue_style( 'bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css', [], _S_VERSION );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/static/css/main.min.css', [], _S_VERSION );
	wp_enqueue_style( 'responsive-style', get_template_directory_uri() . '/static/css/responsive.css', [], _S_VERSION );
	

	wp_enqueue_script( 'retrain-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', array(), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'retrain_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require( 'includes/template-acf.php' );
require( 'shortcode-modules.php' );

function template_breadcrumbs() {
	$separator         = ' ';
	$breadcrumbs_id    = 'tsh_breadcrumbs';
	$breadcrumbs_class = 'tsh_breadcrumbs';
	$home_title        = esc_html__( 'Home', 'outlast' );

	// Add here you custom post taxonomies
	$tsh_custom_taxonomy = 'product_cat';

	global $post, $wp_query;

	ob_start();

	// Hide from front page
	if ( ! is_front_page() ) {

		echo '<ul id="' . $breadcrumbs_id . '" class="' . $breadcrumbs_class . '">';

		// Home
		//echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
		// echo '<li class="separator separator-home"> ' . $separator . ' </li>';

		if ( is_archive() && ! is_tax() && ! is_category() && ! is_tag() ) {

			echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title( '', false ) . '</strong></li>';

		} else {
			if ( is_archive() && is_tax() && ! is_category() && ! is_tag() ) {

				// For Custom post type
				$post_type = get_post_type();

				// Custom post type name and link
				if ( $post_type != 'post' ) {

					$post_type_object  = get_post_type_object( $post_type );
					$post_type_archive = get_post_type_archive_link( $post_type );

					echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
					echo '<li class="separator"> ' . $separator . ' </li>';

				}

				$custom_tax_name = get_queried_object()->name;
				echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';

			} else {
				if ( is_single() ) {

					$post_type = get_post_type();

					if ( $post_type != 'post' && $post_type != 'team_member' ) {

						$post_type_object  = get_post_type_object( $post_type );
						$post_type_archive = get_post_type_archive_link( $post_type );

						echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
						echo '<li class="separator"> ' . $separator . ' </li>';

					}
					if ( $post_type == 'team_member' ) {
						$aboutpageurl  = get_permalink( 22 );
						$team_page_url = get_permalink( 1100 );
						echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $aboutpageurl . '" title="About">About</a></li>';
						echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $team_page_url . '" title="Meet the Team">Meet the Team</a></li>';
					}
					// Get post category
					$category = get_the_category();

					if ( ! empty( $category ) ) {

						// Last category post is in
						$last_category = $category[ count( $category ) - 1 ];

						// Parent any categories and create array
						$get_cat_parents = rtrim( get_category_parents( $last_category->term_id, true, ',' ), ',' );
						$cat_parents     = explode( ',', $get_cat_parents );

						// Loop through parent categories and store in variable $cat_display
						$cat_display = '';
						foreach ( $cat_parents as $parents ) {
							$cat_display .= '<li class="item-cat">' . $parents . '</li>';
							$cat_display .= '<li class="separator"> ' . $separator . ' </li>';
						}

					}

					$taxonomy_exists = taxonomy_exists( $tsh_custom_taxonomy );
					if ( empty( $last_category ) && ! empty( $tsh_custom_taxonomy ) && $taxonomy_exists ) {

						$taxonomy_terms = get_the_terms( $post->ID, $tsh_custom_taxonomy );
						$cat_id         = $taxonomy_terms[0]->term_id;
						$cat_nicename   = $taxonomy_terms[0]->slug;
						$cat_link       = get_term_link( $taxonomy_terms[0]->term_id, $tsh_custom_taxonomy );
						$cat_name       = $taxonomy_terms[0]->name;

					}

					// If the post is in a category
					if ( ! empty( $last_category ) ) {
						echo $cat_display;
						echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

						// Post is in a custom taxonomy
					} else {
						if ( ! empty( $cat_id ) ) {

							echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
							echo '<li class="separator"> ' . $separator . ' </li>';
							echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';

						} else {
							if ( $post_type != 'team_member' ) {
								echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
							} else {
								echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="Leadership">Leadership</strong></li>';
							}

						}
					}

				} else {
					if ( is_category() ) {

						// Category page
						echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title( '', false ) . '</strong></li>';

					} else {
						if ( is_page() ) {

							// Standard page
							if ( $post->post_parent ) {

								// Get parents
								$anc = get_post_ancestors( $post->ID );

								// Get parents order
								$anc = array_reverse( $anc );

								// Parent pages
								if ( ! isset( $parents ) ) {
									$parents = null;
								}
								foreach ( $anc as $ancestor ) {
									$parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink( $ancestor ) . '" title="' . get_the_title( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a></li>';
									$parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
								}

								// Render parent pages
								echo $parents;

								// Active page
								echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

							} else {

								// Just display active page if not parents pages
								echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';

							}

						} else {
							if ( is_tag() ) { // Tag page

								// Tag information
								$term_id       = get_query_var( 'tag_id' );
								$taxonomy      = 'post_tag';
								$args          = 'include=' . $term_id;
								$terms         = get_terms( $taxonomy, $args );
								$get_term_id   = $terms[0]->term_id;
								$get_term_slug = $terms[0]->slug;
								$get_term_name = $terms[0]->name;

								// Return tag name
								echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';

							} elseif ( is_day() ) { // Day archive page

								// Year link
								echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</a></li>';
								echo '<li class="separator separator-' . get_the_time( 'Y' ) . '"> ' . $separator . ' </li>';

								// Month link
								echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><a class="bread-month bread-month-' . get_the_time( 'm' ) . '" href="' . get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' Archives</a></li>';
								echo '<li class="separator separator-' . get_the_time( 'm' ) . '"> ' . $separator . ' </li>';

								// Day display
								echo '<li class="item-current item-' . get_the_time( 'j' ) . '"><strong class="bread-current bread-' . get_the_time( 'j' ) . '"> ' . get_the_time( 'jS' ) . ' ' . get_the_time( 'M' ) . ' Archives</strong></li>';

							} else {
								if ( is_month() ) { // Month Archive

									// Year link
									echo '<li class="item-year item-year-' . get_the_time( 'Y' ) . '"><a class="bread-year bread-year-' . get_the_time( 'Y' ) . '" href="' . get_year_link( get_the_time( 'Y' ) ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</a></li>';
									echo '<li class="separator separator-' . get_the_time( 'Y' ) . '"> ' . $separator . ' </li>';

									// Month display
									echo '<li class="item-month item-month-' . get_the_time( 'm' ) . '"><strong class="bread-month bread-month-' . get_the_time( 'm' ) . '" title="' . get_the_time( 'M' ) . '">' . get_the_time( 'M' ) . ' Archives</strong></li>';

								} else {
									if ( is_year() ) { // Display year archive

										echo '<li class="item-current item-current-' . get_the_time( 'Y' ) . '"><strong class="bread-current bread-current-' . get_the_time( 'Y' ) . '" title="' . get_the_time( 'Y' ) . '">' . get_the_time( 'Y' ) . ' Archives</strong></li>';

									} else {
										if ( is_author() ) { // Author archive

											// Get the author information
											global $author;
											$userdata = get_userdata( $author );

											// Display author name
											echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

										} else {
											if ( get_query_var( 'paged' ) ) {

												// Paginated archives
												echo '<li class="item-current item-current-' . get_query_var( 'paged' ) . '"><strong class="bread-current bread-current-' . get_query_var( 'paged' ) . '" title="Page ' . get_query_var( 'paged' ) . '">' . __( 'Page' ) . ' ' . get_query_var( 'paged' ) . '</strong></li>';

											} else {
												if ( is_search() ) {

													// Search results page
													echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

												} elseif ( is_404() ) {

													// 404 page
													echo '<li>' . 'Error 404' . '</li>';
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}

		echo '</ul>';

		$output_string = ob_get_contents();
		ob_end_clean();

		return $output_string;
	}
}

add_filter( 'gform_file_upload_markup', 'change_upload_markup', 10, 4 );

function change_upload_markup( $file_upload_markup, $file_info, $form_id, $field_id ) {
	return '<strong>' . esc_html( $file_info['uploaded_filename'] ) . "</strong > <img class='gform_delete' src='" . GFCommon::get_base_url() . "/images/delete.png' 
  onclick='gformDeleteUploadedFile({$form_id}, {$field_id }, this);' />";
}


function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );
