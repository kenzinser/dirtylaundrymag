<?php
/**
 * Custom Taxonomy configuration.
 */
if ( !function_exists( 'kinetikcom_ctax' ) ) {

	/** 
	 * Registers a custom taxonomy.
	 *
	 * @uses register_taxonmy()
	 * @uses register_taxonmy_for_object_type()
	 *
	 */
	function kinetikcom_ctax() { 

		/** 
		 * Registers a hierarchical taxonomy (eg Categories)
		 *
		 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
		 */
		// $cat_slug = 'ms_category';
		// $cat_singular = 'Category';
		// $cat_plural = 'Categories';

		// register_taxonomy( $cat_slug, 
		// 	array($cpt_slug),
		// 	array(
		// 		'hierarchical' => true,
		// 		'labels' => array(
		// 			'name' => __( $cat_plural ),
		// 			'singular_name' => __( $cat_singular ),
		// 			'search_items' =>  __( 'Search '.$cat_plural ),
		// 			'all_items' => __( 'All '.$cat_plural ),
		// 			'parent_item' => __( 'Parent '.$cat_singular ),
		// 			'parent_item_colon' => __( 'Parent '.$cat_singular.':' ),
		// 			'edit_item' => __( 'Edit '.$cat_singular ),
		// 			'update_item' => __( 'Update '.$cat_singular  ),
		// 			'add_new_item' => __( 'Add New '.$cat_singular ),
		// 			'new_item_name' => __( 'New '.$cat_singular.' Name' )
		// 		),
		// 		'show_ui' => true,
		// 		'query_var' => true,
		// 	)
		// ); 
		
		
		/** 
		 * Registers a non-hierarchical taxonomy (eg Tags)
		 *
		 * @see http://codex.wordpress.org/Function_Reference/register_taxonomy
		 */
		// $tag_slug = 'ms_tag';
		// $tag_singular = 'Tag';
		// $tag_plural = 'Tags';

		// register_taxonomy( 'custom_tag', 
		// 	array($cpt_slug), 
		// 	array('hierarchical' => false,
		// 		'labels' => array(
		// 			'name' => __( $tag_plural ),
		// 			'singular_name' => __( $tag_singular ),
		// 			'search_items' =>  __( 'Search '.$tag_plural ),
		// 			'all_items' => __( 'All '.$tag_plural ), 
		// 			'parent_item' => __( 'Parent '.$tag_singular ),
		// 			'parent_item_colon' => __( 'Parent '.$tag_singular.':' ),
		// 			'edit_item' => __( 'Edit '.$tag_singular ),
		// 			'update_item' => __( 'Update '.$tag_singular  ),
		// 			'add_new_item' => __( 'Add New '.$tag_singular ),
		// 			'new_item_name' => __( 'New '.$tag_singular.' Name' )
		// 		),
		// 		'show_ui' => true,
		// 		'query_var' => true,
		// 	)
		// );

		/** 
		 * Adds traditional Post categories to the custom post type
		 */
		// register_taxonomy_for_object_type( 'category', $cpt_slug );

		/** 
		 * Adds traditional Post tags to the custom post type
		 */
		//register_taxonomy_for_object_type('post_tag', $cpt_slug);

	} 
}
add_action( 'init', 'kinetikcom_ctax' );