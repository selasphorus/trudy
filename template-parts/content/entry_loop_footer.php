<?php
/**
 * Template part for displaying a post's footer
 *
 * @package kadence
 */

//namespace Kadence;

?>
<footer class="entry-footer">
	<?php
	if ( !is_post_type_archive('newsletter') ) {
		// Link to full post TMP disabled for newsletters until HTML content is enabled
		get_template_part( 'template-parts/content/entry_actions', get_post_type() );
	}
	?>
</footer><!-- .entry-footer -->
