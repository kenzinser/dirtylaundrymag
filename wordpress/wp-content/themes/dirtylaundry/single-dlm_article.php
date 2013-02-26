<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Dirty Laundry Magazine
 * @since Dirty Laundry Magazine 1.0
 */

get_header(); ?>

<div id="content" class="site-content" role="main">

	<?php while ( have_posts() ) : the_post(); ?>


	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			$cover_attachment_id = get_field('article_cover');
			$cover_size = 'full'; // (thumbnail, medium, large, full or custom size)
			$cover_image = wp_get_attachment_image_src( $cover_attachment_id, $cover_size );
			// url = $image[0];
			// width = $image[1];
			// height = $image[2];
		?>
		<header class="column entry-header entry-cover" style="background-image: url('<?php echo $cover_image[0]; ?>'); color:<?php the_field('article_headline_color'); ?>;">
			<div>
				<h1 class="entry-title"><?php the_field('article_headline'); ?></h1>
				<p class="entry-deck"><?php the_field('article_deck'); ?></p>
			</div>
		</header><!-- .entry-header -->

		<div class="column entry-lead">
			<?php the_field('article_lead'); ?>
		</div>


		<?php while( has_sub_field('article_content') ) : ?>

			<?php if( get_row_layout() == 'layout_column_text' ) : // Text ?>

				<div class="column entry-text">
					<?php the_sub_field('column_text'); ?>
				</div>

			<?php elseif( get_row_layout() == 'layout_column_image' ) : // Image ?>

				<?php
					$column_attachment_id = get_sub_field('column_image');
					$column_size = 'full'; // (thumbnail, medium, large, full or custom size)
					$column_image = wp_get_attachment_image_src( $column_attachment_id, $column_size );
					// url = $image[0];
					// width = $image[1];
					// height = $image[2];
				?>

				<div class="column entry-image <?php the_sub_field('column_image_size'); ?>">
					<figure>
						<img src="<?php echo $column_image[0]; ?>" />

						<?php if( get_sub_field('column_image_caption') ) : ?>

							<figcaption>
								<?php the_sub_field('column_image_caption'); ?>
							</figcaption>

						<?php endif; ?>

					</figure>
				</div>

			<?php elseif( get_row_layout() == 'layout_column_image_full' ) : // Image ?>

				<?php
					$full_attachment_id = get_sub_field('column_image_full');
					$full_size = 'full'; // (thumbnail, medium, large, full or custom size)
					$full_image = wp_get_attachment_image_src( $full_attachment_id, $full_size );
					// url = $image[0];
					// width = $image[1];
					// height = $image[2];
				?>

				<div class="column entry-image full-image <?php the_sub_field('column_image_full_attachment'); ?> <?php the_sub_field('column_image_full_orientation'); ?>" style="background-image: url('<?php echo $full_image[0]; ?>'); ?>"></div>


			<?php elseif( get_row_layout() == 'layout_column_blockquote' ) : // Blockquote ?>

				<div class="column entry-blockquote">
					<blockquote>
						<?php the_sub_field('column_blockquote'); ?>
						<cite><?php the_sub_field('column_blockquote_cite'); ?></cite>
					</blockquote>
				</div>

			<?php endif; ?>

		<?php endwhile; ?>


		<footer class="column entry-meta">
			<?php
				/* translators: used between list items, there is a space after the comma */
				$category_list = get_the_category_list( __( ', ', 'dirtylaundry' ) );

				/* translators: used between list items, there is a space after the comma */
				$tag_list = get_the_tag_list( '', __( ', ', 'dirtylaundry' ) );

				if ( ! dirtylaundry_categorized_blog() ) {
					// This blog only has 1 category so we just need to worry about tags in the meta text
					if ( '' != $tag_list ) {
						$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dirtylaundry' );
					} else {
						$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dirtylaundry' );
					}

				} else {
					// But this blog has loads of categories so we should probably display them here
					if ( '' != $tag_list ) {
						$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dirtylaundry' );
					} else {
						$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dirtylaundry' );
					}

				} // end check for categories on this blog

				printf(
					$meta_text,
					$category_list,
					$tag_list,
					get_permalink(),
					the_title_attribute( 'echo=0' )
				);
			?>
			<?php dirtylaundry_content_nav( 'nav-below' ); ?>

		</footer><!-- .entry-meta -->

	</article><!-- #post-<?php the_ID(); ?> -->


	<?php endwhile; // end of the loop. ?>

</div><!-- #content .site-content -->

<?php get_footer(); ?>