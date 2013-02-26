<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Dirty Laundry Magazine
 * @since Dirty Laundry Magazine 1.0
 */
?>

	</div><!-- #main .site-main -->


	<footer id="colophon" class="site-footer" role="contentinfo">
		<span>Scroll right &rarr;</span>
		<div class="site-info">
			<?php do_action( 'dirtylaundry_credits' ); ?>

		</div><!-- .site-info -->
	</footer><!-- #colophon .site-footer -->
</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>