<?php
/**
 * The Template for displaying Flex Slider.
 *
 * This template can be overridden by copying it to yourtheme/anwp-post-grid/simple-slider.php
 *
 * @var object $data - Object with widget data.
 *
 * @author           Andrei Strekozov <anwp.pro>
 * @package          AnWP_Post_Grid/Templates
 * @since            0.9.0
 *
 * @version          1.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$data = (object) wp_parse_args(
	$data,
	[
		'slider_posts'      => [],
		'layout'            => 'a',
		'wrapper_classes'   => 'swiper-slide w-auto',
		'image_sized'       => true,
		'navigation'        => '',
		'direction'         => 'ltr',
		'spacing_between'   => [ 'size' => 20 ],
		'autoplay'          => 'yes',
		'autoplay_delay'    => 5000,
		'grid_widget_title' => '',
		'header_size'       => 'h3',
		'header_icon'       => '',
		'enable_observer'   => '',
		'free_mode'         => '',
		'loop'              => '',
	]
);

if ( empty( $data->slider_posts ) ) {
	return;
}

$spacing_between = ( ! empty( $data->spacing_between['size'] ) && $data->spacing_between['size'] >= 100 ) ? 100 : absint( $data->spacing_between['size'] );
?>
<div class="anwp-pg-wrap">

	<?php
	// Widget Header
	anwp_post_grid()->load_partial( $data, 'header' );
	?>

	<!-- Slider main container -->
	<div
		class="anwp-pg-flex-slider anwp-pg-swiper-wrapper position-relative swiper swiper-container anwp-pg-no-transform"
		data-pg-autoplay="<?php echo esc_attr( $data->autoplay ); ?>"
		data-pg-autoplay-delay="<?php echo esc_attr( $data->autoplay_delay ); ?>"
		data-pg-space-between="<?php echo esc_attr( $spacing_between ); ?>"
		data-pg-enable-observer="<?php echo esc_attr( $data->enable_observer ); ?>"
		data-pg-free-mode="<?php echo esc_attr( $data->free_mode ); ?>"
		data-pg-loop="<?php echo esc_attr( $data->loop ); ?>"
		dir="<?php echo esc_attr( $data->direction ); ?>"
	>
		<!-- Additional required wrapper -->
		<div class="swiper-wrapper">
			<!-- Slides -->
			<?php
			foreach ( $data->slider_posts as $grid_post ) {
				$data->grid_post = $grid_post;
				anwp_post_grid()->load_partial( $data, 'teaser/teaser', sanitize_key( $data->layout ) );
			}
			?>
		</div>

		<?php if ( count( $data->slider_posts ) ) : ?>
			<?php if ( in_array( $data->navigation, [ 'dots', 'both' ], true ) ) : ?>
				<div class="swiper-pagination"></div>
			<?php endif; ?>
			<?php if ( in_array( $data->navigation, [ 'arrows', 'both' ], true ) ) : ?>
				<div class="elementor-swiper-button elementor-swiper-button-prev">
					<svg class="anwp-pg-icon anwp-pg-icon--feather anwp-pg-icon--s28">
						<use xlink:href="#icon-anwp-pg-chevron-left"></use>
					</svg>
					<span class="elementor-screen-only"><?php esc_html_e( 'Previous', 'anwp-post-grid' ); ?></span>
				</div>
				<div class="elementor-swiper-button elementor-swiper-button-next">
					<svg class="anwp-pg-icon anwp-pg-icon--feather anwp-pg-icon--s28">
						<use xlink:href="#icon-anwp-pg-chevron-right"></use>
					</svg>
					<span class="elementor-screen-only"><?php esc_html_e( 'Next', 'anwp-post-grid' ); ?></span>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
