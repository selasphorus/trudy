<?php
/**
 * Template part for displaying a post's content
 *
 * @package kadence
 */

namespace Kadence;

?>

<div class="<?php echo esc_attr( apply_filters( 'kadence_entry_content_class', 'entry-content single-content' ) ); ?>">
	<?php
	do_action( 'kadence_single_before_entry_content' );
	
	the_content(
		sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kadence' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		)
	);

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kadence' ),
			'after'  => '</div>',
		)
	);
	do_action( 'kadence_single_after_entry_content' );

	if ( queenbee() ) {
		$settings = array( 'fields' => array( 'builder', 'model', 'opus_num', 'build_year', 'venue_filename', 'num_manuals', 'num_divisions', 'num_ranks', 'num_stops', 'num_pipes', 'num_registers', 'num_other', 'organ_sum_html', 'organ_html', 'specs_html', 'stops_summary', 'action_type' ) );
		acf_form( $settings );	
	}
	
	?>
</div><!-- .entry-content -->
