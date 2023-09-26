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
		get_template_part( 'template-parts/content/entry_actions', get_post_type() );
	}
	?>
</footer><!-- .entry-footer -->
