<?php

/*
 *	Helper Global functions
 *
 * 	@version	1.0
 * 	@author		Greatives Team
 * 	@URI		http://greatives.eu
 */

/**
 * Get allowed HTML for microdata
 */

 function blade_ext_print_select_options( $selector_array, $current_value = "" ) {

	foreach ( $selector_array as $value=>$display_value ) {
	?>
		<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current_value, $value ); ?>><?php echo esc_html( $display_value ); ?></option>
	<?php
	}

}

function blade_ext_get_microdata_allowed_html() {
	$allowed_html = array(
		'span' => array(
			'title' => true,
			'class' => true,
			'id' => true,
			'dir' => true,
			'align' => true,
			'lang' => true,
			'xml:lang' => true,
			'aria-hidden' => true,
			'data-icon' => true,
			'itemref' => true,
			'itemid' => true,
			'itemprop' => true,
			'itemscope' => true,
			'itemtype' => true,
			'xmlns:v' => true,
			'typeof' => true,
			'property' => true
		),
		'br' => array(),
	);

	return $allowed_html;
}

/**
 * Get allowed HTML for widget titles
 */
function blade_ext_get_widget_allowed_html() {
	$allowed_html = array(
		'div' => array(
			'class' => true,
			'id' => true,
		),
		'h1' => array(
			'class' => true,
		),
		'h2' => array(
			'class' => true,
		),
		'h3' => array(
			'class' => true,
		),
		'h4' => array(
			'class' => true,
		),
		'h5' => array(
			'class' => true,
		),
		'h6' => array(
			'class' => true,
		),
		'br' => array(),
	);

	return $allowed_html;
}

$blade_ext_social_list_extended = array (
	array(
		'title' => 'Twitter',
		'url' => 'twitter_url',
		'id' => 'twitter',
		'class' => 'fa fa-twitter',
	),
	array(
		'title' => 'Facebook',
		'url' => 'facebook_url',
		'id' => 'facebook',
		'class' => 'fa fa-facebook',
	),
	array(
		'title' => 'Instagram',
		'url' => 'instagram_url',
		'id' => 'instagram',
		'class' => 'fa fa-instagram',
	),
	array(
		'title' => 'LinkedIn',
		'url' => 'linkedin_url',
		'id' => 'linkedin',
		'class' => 'fa fa-linkedin',
	),
	array(
		'title' => 'Tumblr',
		'url' => 'tumblr_url',
		'id' => 'tumblr',
		'class' => 'fa fa-tumblr',
	),
	array(
		'title' => 'Pinterest',
		'url' => 'pinterest_url',
		'id' => 'pinterest',
		'class' => 'fa fa-pinterest',
	),
	array(
		'title' => 'GitHub',
		'url' => 'github_url',
		'id' => 'github',
		'class' => 'fa fa-github',
	),
	array(
		'title' => 'Dribbble',
		'url' => 'dribbble_url',
		'id' => 'dribbble',
		'class' => 'fa fa-dribbble',
	),
	array(
		'title' => 'reddit',
		'url' => 'reddit_url',
		'id' => 'reddit',
		'class' => 'fa fa-reddit',
	),
	array(
		'title' => 'Flickr',
		'url' => 'flickr_url',
		'id' => 'flickr',
		'class' => 'fa fa-flickr',
	),
	array(
		'title' => 'Skype',
		'url' => 'skype_url',
		'id' => 'skype',
		'class' => 'fa fa-skype',
	),
	array(
		'title' => 'YouTube',
		'url' => 'youtube_url',
		'id' => 'youtube',
		'class' => 'fa fa-youtube',
	),
	array(
		'title' => 'Vimeo',
		'url' => 'vimeo_url',
		'id' => 'vimeo',
		'class' => 'fa fa-vimeo',
	),
	array(
		'title' => 'SoundCloud',
		'url' => 'soundcloud_url',
		'id' => 'soundcloud',
		'class' => 'fa fa-soundcloud',
	),
	array(
		'title' => 'WeChat',
		'url' => 'wechat_url',
		'id' => 'wechat',
		'class' => 'fa fa-wechat',
	),
	array(
		'title' => 'Weibo',
		'url' => 'weibo_url',
		'id' => 'weibo',
		'class' => 'fa fa-weibo',
	),
	array(
		'title' => 'Renren',
		'url' => 'renren_url',
		'id' => 'renren',
		'class' => 'fa fa-renren',
	),
	array(
		'title' => 'QQ',
		'url' => 'qq_url',
		'id' => 'qq',
		'class' => 'fa fa-qq',
	),
	array(
		'title' => 'XING',
		'url' => 'xing_url',
		'id' => 'xing',
		'class' => 'fa fa-xing',
	),
	array(
		'title' => 'RSS',
		'url' => 'rss_url',
		'id' => 'rss',
		'class' => 'fa fa-rss',
	),
	array(
		'title' => 'VK',
		'url' => 'vk_url',
		'id' => 'vk',
		'class' => 'fa fa-vk',
	),
	array(
		'title' => 'Behance',
		'url' => 'behance_url',
		'id' => 'behance',
		'class' => 'fa fa-behance',
	),
	array(
		'title' => 'Foursquare',
		'url' => 'foursquare_url',
		'id' => 'foursquare',
		'class' => 'fa fa-foursquare',
	),
	array(
		'title' => 'Steam',
		'url' => 'steam_url',
		'id' => 'steam',
		'class' => 'fa fa-steam',
	),
	array(
		'title' => 'Twitch',
		'url' => 'twitch_url',
		'id' => 'twitch',
		'class' => 'fa fa-twitch',
	),
	array(
		'title' => 'Houzz',
		'url' => 'houzz_url',
		'id' => 'houzz',
		'class' => 'fa fa-houzz',
	),
	array(
		'title' => 'Yelp',
		'url' => 'yelp_url',
		'id' => 'yelp',
		'class' => 'fa fa-yelp',
	),
	array(
		'title' => 'Snapchat',
		'url' => 'snapchat_url',
		'id' => 'snapchat',
		'class' => 'fa fa-snapchat',
	),
	array(
		'title' => 'Medium',
		'url' => 'medium_url',
		'id' => 'medium',
		'class' => 'fa fa-medium',
	),
	array(
		'title' => 'TripAdvisor',
		'url' => 'tripadvisor_url',
		'id' => 'tripadvisor',
		'class' => 'fa fa-tripadvisor',
	),
	array(
		'title' => 'Spotify',
		'url' => 'spotify_url',
		'id' => 'spotify',
		'class' => 'fa fa-spotify',
	),
	array(
		'title' => 'WhatsApp',
		'url' => 'whatsapp_url',
		'id' => 'whatsapp',
		'class' => 'fa fa-whatsapp',
	),
);

//Omit closing PHP tag to avoid accidental whitespace output errors.
