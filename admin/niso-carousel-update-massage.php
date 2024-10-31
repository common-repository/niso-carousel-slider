<?php

/**
 * Register Niso Carousel post type. 
 * This is administrator only post type. 
 *
 * @link              http://digitalkroy.com/niso-carousel
 * @since             1.0.0
 * @package           Niso Carousel
 *
 * @wordpress-plugin
 */
/**
 * Niso Carousel update messages.
 *
 *
 */
if (!function_exists('niso_slider_carousel_updated_messages')) :
	function niso_slider_carousel_updated_messages($messages)
	{
		global $post;
		$post_ID = $post->ID;
		$post             = get_post();
		$post_type        = get_post_type($post);
		$post_type_object = get_post_type_object($post_type);
		$pcarousel_shortcode = '[ncarousel id="' . $post_ID . '"]';
		$messages['niso-carousel'] = array(
			0  => '', // Unused. Messages start at index 1.
			1  => sprintf('Carousel updated. Shortcode is: <strong>%s</strong>', $pcarousel_shortcode),
			2  => sprintf('Carousel field updated. Shortcode is: %s', $pcarousel_shortcode),
			3  => __('Carousel field deleted.', 'niso'),
			4  => __('Carousel item updated.', 'niso'),
			/* translators: %s: date and time of the revision */
			5  => isset($_GET['revision']) ? sprintf(__('Carousel restored to revision from %s', 'niso'), wp_post_revision_title((int) $_GET['revision'], false)) : false,
			6  => sprintf('Carousel published. Shortcode is: %s', $pcarousel_shortcode),
			7  => sprintf('Carousel saved: <strong>%s</strong>', $pcarousel_shortcode),
			8  => sprintf('Carousel submitted: <strong>%s</strong>', $pcarousel_shortcode),
			9  => sprintf(
				__('Carousel item scheduled for: <strong>%1$s</strong>.', 'niso'),
				// translators: Publish box date format, see http://php.net/date
				date_i18n(__('M j, Y @ G:i', 'niso'), strtotime($post->post_date))
			),
			10 => __('Carousel draft updated.', 'niso')
		);


		return $messages;
	}
	add_filter('post_updated_messages', 'niso_slider_carousel_updated_messages');
endif;
