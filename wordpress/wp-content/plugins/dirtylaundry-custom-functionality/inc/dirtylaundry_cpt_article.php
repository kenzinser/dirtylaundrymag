<?php
/**
 * Custom Post Type configuration.
 */
if ( !function_exists( 'dirtylaundry_cpt_article' ) ) {

	/** 
	 * Registers a custom post type.
	 *
	 * @uses register_post_type()
	 *
	 */
	function dirtylaundry_cpt_article() { 

		/** 
		 * Sets labels for the Post Type
		 */
		$cpt_slug = 'dlm_article';
		$singular = 'Article';
		$plural = 'Articles';

		/**
		 * Sets supported features
		 */
		$supported_features = array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			//'trackbacks',
			'custom-fields',
			//'comments',
			'revisions',
			'sticky'
		);

		/** 
		 * Registers the post type
		 * @link http://codex.wordpress.org/Function_Reference/register_post_type
		 */
		register_post_type( $cpt_slug,
			array(
				'labels' => array(
					'name' => __($plural, 'post type general name'),
					'singular_name' => __($singular, 'post type singular name'),
					'add_new' => __('Add New', 'custom post type item'),
					'all_items' => __( 'All '. $plural, 'work' ),
					'add_new_item' => __('Add New '. $singular),
					'edit' => __( 'Edit' ), 
					'edit_item' => __('Edit '. $singular),
					'new_item' => __('New '. $singular),
					'view_item' => __('View '. $singular),
					'search_items' => __('Search '. $plural),
					'not_found' =>  __('Nothing found in the Database.'),
					'not_found_in_trash' => __('Nothing found in Trash'),
					'parent_item_colon' => ''
				),
				'description' => __($plural .' custom post type.'),
				'public' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 7, 
				//'menu_icon' => 'icon.png',
				'rewrite' => array(
					'slug' => 'work',
					'with_front' => false
					),
				'capability_type' => 'post',
				'hierarchical' => false,
				'has_archive' => true,
				'supports' => $supported_features
			)
		); 

	} 
}
add_action( 'init', 'dirtylaundry_cpt_article' );