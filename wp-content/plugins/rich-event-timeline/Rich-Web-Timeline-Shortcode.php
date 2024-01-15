<?php
function rich_web_timeline_shortcode( $atts, $content = null ) {
	$atts = shortcode_atts( array(
		'id' => '1',
	), $atts );

	return rich_web_timeline_shortcode_func( $atts['id'] );
}
add_shortcode( 'Rich_Web_Timeline', 'rich_web_timeline_shortcode' );
function rich_web_timeline_shortcode_func( $short_id ) {
	ob_start();
	$args                     = shortcode_atts( array(
		'id'   => '',
		'name' => 'Widget Area'
	), $short_id, 'Rich_Web_Timeline' );
	$Rich_Web_Timeline_Widget = new Rich_Web_Timeline_Widget;
	$instance                 = array( 'Rich_Web_Timeline' => $short_id );
	$Rich_Web_Timeline_Widget->widget( $args, $instance );
	$cont[] = ob_get_contents();
	ob_end_clean();
	return $cont[0];
}