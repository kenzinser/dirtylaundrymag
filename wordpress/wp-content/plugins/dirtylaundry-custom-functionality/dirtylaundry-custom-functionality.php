<?php
/*
Plugin Name: dirtylaundrymag.com Custom Functionality
Description: This plugin contains theme-independent functionality for dirtylaundrymag.com
Version: 0.1
License: GPL
Author: Ken Zinser
Author URI: http://zinser.me
*/

/**
 * Disable the theme / plugin text editor in Admin
 */
//define('DISALLOW_FILE_EDIT', true);

/**
 * Cleanup the links within the <head>
 */
function dirtylaundry_cleanup_head() {
	remove_action( 'wp_head', 'feed_links', 2 );
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	remove_action( 'wp_head', 'start_post_rel_link' );
	remove_action( 'wp_head', 'wp_generator' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
}
add_action( 'init', 'dirtylaundry_cleanup_head' );

/**
 * Obscure login screen error messages
 */
function dirtylaundry_login_obscure() {
	return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';
}
add_filter( 'login_errors', 'dirtylaundry_login_obscure' );

/**
 * Create custom image sizes
 */
// if ( function_exists( 'add_image_size' ) ) {
// 	add_image_size( 'project-thumbnail', 300, 300, true ); 
// 	add_image_size( 'entry-thumbnail', 300, 200, true ); 
// }


/**
 * Remove p tags from images in the_content()
 */
function dirtylaundry_remove_img_ptags($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'dirtylaundry_remove_img_ptags');

/**
 * Remove width and height attributes from inserted images
 */
// function dirtylaundry_remove_width_attribute( $html ) {
//    $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
//    return $html;
// }
// add_filter( 'post_thumbnail_html', 'dirtylaundry_remove_width_attribute', 10 );
// add_filter( 'image_send_to_editor', 'dirtylaundry_remove_width_attribute', 10 );



/**
 * Setup custom post types and taxonomies
 */
require( 'inc/dirtylaundry_cpt_issue.php' );
require( 'inc/dirtylaundry_cpt_article.php' );

//require( 'inc/dirtylaundry_ctax.php' );

if ( ! function_exists( 'dirtylaundry_custom_query' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since Dirty Laundry 1.0
 */
function dirtylaundry_custom_query( $cpt_slug, $cpt_post_limit ) {
	global $wp_query, $post;

	$args = array(
		'post_type' => $cpt_slug,
		'posts_per_page' => $cpt_post_limit
	);
	$cpt_query = new WP_Query( $args );

	while ( $cpt_query->have_posts() ) : $cpt_query->the_post();

		get_template_part( 'content', $cpt_slug );

	endwhile;
	wp_reset_query();
}
endif; // dirtylaundry_custom_query

/**
 * Strip unwanted <br /> tags from content
 */
// function remove_bad_br_tags( $content ) {
// 	$content = str_ireplace( "<br />", "", $content );
// 	return $content;
// }
// add_filter( 'the_content', 'remove_bad_br_tags' );

/**
 * Dequeue Contact form styles
 */
// function remove_grunion_style() {
// 	wp_deregister_style( 'grunion.css' );
// }
// add_action( 'wp_print_styles', 'remove_grunion_style' );

/**
 * Make Archives.php Include custom post type.
 */
// function dirtylaundry_set_custom_query( $query ) {
// 	if( $query->is_category ) {
// 		$query->set( 'post_type', array( 
// 			'post', 'ms_work'
// 		));
// 	}
// 	return $query;
// }
// add_action( 'pre_get_posts', 'dirtylaundry_set_custom_query' );
?>