<?php

/*
*	Global Parameter and functions
*
* 	@version	1.0
* 	@author		Greatives Team
* 	@URI		http://greatives.eu
*/

$blade_grve_social_list = array(
	'twitter' => 'Twitter',
	'facebook' => 'Facebook',
	'instagram' => 'Instagram',
	'linkedin' => 'LinkedIn',
	'tumblr' => 'Tumblr',
	'pinterest' => 'Pinterest',
	'github' => 'Github',
	'dribbble' => 'Dribbble',
	'reddit' => 'reddit',
	'flickr' => 'Flickr',
	'skype' => 'Skype',
	'youtube' => 'YouTube',
	'vimeo' => 'Vimeo',
	'soundcloud' => 'SoundCloud',
	'wechat' => 'WeChat',
	'weibo' => 'Weibo',
	'renren' => 'Renren',
	'qq' => 'QQ',
	'xing' => 'XING',
	'rss' => 'RSS',
	'vk' => 'VK',
	'behance' => 'Behance',
	'foursquare' => 'Foursquare',
	'steam' => 'Steam',
	'twitch' => 'Twitch',
	'houzz' => 'Houzz',
	'yelp' => 'Yelp',
	'snapchat' => 'Snapchat',
	'medium' => 'Medium',
	'tripadvisor' => 'TripAdvisor',
	'spotify' => 'Spotify',
	'whatsapp' => 'WhatsApp',
);

$blade_grve_post_color_selection = array(
	'primary-1' => esc_html__( 'Primary 1', 'blade' ),
	'primary-2' => esc_html__( 'Primary 2', 'blade' ),
	'primary-3' => esc_html__( 'Primary 3', 'blade' ),
	'primary-4' => esc_html__( 'Primary 4', 'blade' ),
	'primary-5' => esc_html__( 'Primary 5', 'blade' ),
	'green' => esc_html__( 'Green', 'blade' ),
	'orange' => esc_html__( 'Orange', 'blade' ),
	'red' => esc_html__( 'Red', 'blade' ),
	'blue' => esc_html__( 'Blue', 'blade' ),
	'aqua' => esc_html__( 'Aqua', 'blade' ),
	'purple' => esc_html__( 'Purple', 'blade' ),
	'black' => esc_html__( 'Black', 'blade' ),
	'grey' => esc_html__( 'Grey', 'blade' ),
);

$blade_grve_button_color_selection = array(
	'primary-1' => esc_html__( 'Primary 1', 'blade' ),
	'primary-2' => esc_html__( 'Primary 2', 'blade' ),
	'primary-3' => esc_html__( 'Primary 3', 'blade' ),
	'primary-4' => esc_html__( 'Primary 4', 'blade' ),
	'primary-5' => esc_html__( 'Primary 5', 'blade' ),
	'green' => esc_html__( 'Green', 'blade' ),
	'orange' => esc_html__( 'Orange', 'blade' ),
	'red' => esc_html__( 'Red', 'blade' ),
	'blue' => esc_html__( 'Blue', 'blade' ),
	'aqua' => esc_html__( 'Aqua', 'blade' ),
	'purple' => esc_html__( 'Purple', 'blade' ),
	'black' => esc_html__( 'Black', 'blade' ),
	'grey' => esc_html__( 'Grey', 'blade' ),
	'white' => esc_html__( 'White', 'blade' ),
);

$blade_grve_button_size_selection = array(
	'extrasmall' => esc_html__( 'Extra Small', 'blade' ),
	'small' => esc_html__( 'Small', 'blade' ),
	'medium' => esc_html__( 'Medium', 'blade' ),
	'large' => esc_html__( 'Large', 'blade' ),
	'extralarge' => esc_html__( 'Extra Large', 'blade' ),
);

$blade_grve_button_shape_selection = array(
	'square' => esc_html__( 'Square', 'blade' ),
	'round' => esc_html__( 'Round', 'blade' ),
	'extra-round' => esc_html__( 'Extra Round', 'blade' ),
);

$blade_grve_button_type_selection = array(
	'simple' => esc_html__( 'Simple', 'blade' ),
	'outline' => esc_html__( 'Outline', 'blade' ),
);

/**
 * Get CSS Color
 */
function blade_grve_get_css_color( $prefix, $color ) {
	$rgb_color = preg_match( '/rgba/', $color ) ? preg_replace( array( '/\s+/', '/^rgba\((\d+)\,(\d+)\,(\d+)\,([\d\.]+)\)$/' ), array( '', 'rgb($1,$2,$3)' ), $color ) : $color;
	$string = $prefix . ':' . $rgb_color . ';';
	if ( $rgb_color !== $color ) $string .= $prefix . ':' . $color . ';';
	return $string;
}

/**
 * Get allowed HTML for microdata
 */

function blade_grve_get_microdata_allowed_html() {
	$grve_microdata_allowed_html = array(
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

	return $grve_microdata_allowed_html;
}

$blade_grve_awsome_fonts_list = array( "500px", "address-book", "address-book-o", "address-card", "address-card-o", "adjust", "adn", "align-center", "align-justify", "align-left", "align-right", "amazon", "ambulance", "american-sign-language-interpreting", "anchor", "android", "angellist", "angle-double-down", "angle-double-left", "angle-double-right", "angle-double-up", "angle-down", "angle-left", "angle-right", "angle-up", "apple", "archive", "area-chart", "arrow-circle-down", "arrow-circle-left", "arrow-circle-o-down", "arrow-circle-o-left", "arrow-circle-o-right", "arrow-circle-o-up", "arrow-circle-right", "arrow-circle-up", "arrow-down", "arrow-left", "arrow-right", "arrow-up", "arrows", "arrows-alt", "arrows-h", "arrows-v", "asl-interpreting", "assistive-listening-systems", "asterisk", "at", "audio-description", "automobile", "backward", "balance-scale", "ban", "bandcamp", "bank", "bar-chart", "bar-chart-o", "barcode", "bars", "bath", "bathtub", "battery", "battery-0", "battery-1", "battery-2", "battery-3", "battery-4", "battery-empty", "battery-full", "battery-half", "battery-quarter", "battery-three-quarters", "bed", "beer", "behance", "behance-square", "bell", "bell-o", "bell-slash", "bell-slash-o", "bicycle", "binoculars", "birthday-cake", "bitbucket", "bitbucket-square", "bitcoin", "black-tie", "blind", "bluetooth", "bluetooth-b", "bold", "bolt", "bomb", "book", "bookmark", "bookmark-o", "braille", "briefcase", "btc", "bug", "building", "building-o", "bullhorn", "bullseye", "bus", "buysellads", "cab", "calculator", "calendar", "calendar-check-o", "calendar-minus-o", "calendar-o", "calendar-plus-o", "calendar-times-o", "camera", "camera-retro", "car", "caret-down", "caret-left", "caret-right", "caret-square-o-down", "caret-square-o-left", "caret-square-o-right", "caret-square-o-up", "caret-up", "cart-arrow-down", "cart-plus", "cc", "cc-amex", "cc-diners-club", "cc-discover", "cc-jcb", "cc-mastercard", "cc-paypal", "cc-stripe", "cc-visa", "certificate", "chain", "chain-broken", "check", "check-circle", "check-circle-o", "check-square", "check-square-o", "chevron-circle-down", "chevron-circle-left", "chevron-circle-right", "chevron-circle-up", "chevron-down", "chevron-left", "chevron-right", "chevron-up", "child", "chrome", "circle", "circle-o", "circle-o-notch", "circle-thin", "clipboard", "clock-o", "clone", "close", "cloud", "cloud-download", "cloud-upload", "cny", "code", "code-fork", "codepen", "codiepie", "coffee", "cog", "cogs", "columns", "comment", "comment-o", "commenting", "commenting-o", "comments", "comments-o", "compass", "compress", "connectdevelop", "contao", "copy", "copyright", "creative-commons", "credit-card", "credit-card-alt", "crop", "crosshairs", "css3", "cube", "cubes", "cut", "cutlery", "dashboard", "dashcube", "database", "deaf", "deafness", "dedent", "delicious", "desktop", "deviantart", "diamond", "digg", "dollar", "dot-circle-o", "download", "dribbble", "drivers-license", "drivers-license-o", "dropbox", "drupal", "edge", "edit", "eercast", "eject", "ellipsis-h", "ellipsis-v", "empire", "envelope", "envelope-o", "envelope-open", "envelope-open-o", "envelope-square", "envira", "eraser", "etsy", "eur", "euro", "exchange", "exclamation", "exclamation-circle", "exclamation-triangle", "expand", "expeditedssl", "external-link", "external-link-square", "eye", "eye-slash", "eyedropper", "fa", "facebook", "facebook-f", "facebook-official", "facebook-square", "fast-backward", "fast-forward", "fax", "feed", "female", "fighter-jet", "file", "file-archive-o", "file-audio-o", "file-code-o", "file-excel-o", "file-image-o", "file-movie-o", "file-o", "file-pdf-o", "file-photo-o", "file-picture-o", "file-powerpoint-o", "file-sound-o", "file-text", "file-text-o", "file-video-o", "file-word-o", "file-zip-o", "files-o", "film", "filter", "fire", "fire-extinguisher", "firefox", "first-order", "flag", "flag-checkered", "flag-o", "flash", "flask", "flickr", "floppy-o", "folder", "folder-o", "folder-open", "folder-open-o", "font", "font-awesome", "fonticons", "fort-awesome", "forumbee", "forward", "foursquare", "free-code-camp", "frown-o", "futbol-o", "gamepad", "gavel", "gbp", "ge", "gear", "gears", "genderless", "get-pocket", "gg", "gg-circle", "gift", "git", "git-square", "github", "github-alt", "github-square", "gitlab", "gittip", "glass", "glide", "glide-g", "globe", "google", "google-plus", "google-plus-circle", "google-plus-official", "google-plus-square", "google-wallet", "graduation-cap", "gratipay", "grav", "group", "h-square", "hacker-news", "hand-grab-o", "hand-lizard-o", "hand-o-down", "hand-o-left", "hand-o-right", "hand-o-up", "hand-paper-o", "hand-peace-o", "hand-pointer-o", "hand-rock-o", "hand-scissors-o", "hand-spock-o", "hand-stop-o", "handshake-o", "hard-of-hearing", "hashtag", "hdd-o", "header", "headphones", "heart", "heart-o", "heartbeat", "history", "home", "hospital-o", "hotel", "hourglass", "hourglass-1", "hourglass-2", "hourglass-3", "hourglass-end", "hourglass-half", "hourglass-o", "hourglass-start", "houzz", "html5", "i-cursor", "id-badge", "id-card", "id-card-o", "ils", "image", "imdb", "inbox", "indent", "industry", "info", "info-circle", "inr", "instagram", "institution", "internet-explorer", "intersex", "ioxhost", "italic", "joomla", "jpy", "jsfiddle", "key", "keyboard-o", "krw", "language", "laptop", "lastfm", "lastfm-square", "leaf", "leanpub", "legal", "lemon-o", "level-down", "level-up", "life-bouy", "life-buoy", "life-ring", "life-saver", "lightbulb-o", "line-chart", "link", "linkedin", "linkedin-square", "linode", "linux", "list", "list-alt", "list-ol", "list-ul", "location-arrow", "lock", "long-arrow-down", "long-arrow-left", "long-arrow-right", "long-arrow-up", "low-vision", "magic", "magnet", "mail-forward", "mail-reply", "mail-reply-all", "male", "map", "map-marker", "map-o", "map-pin", "map-signs", "mars", "mars-double", "mars-stroke", "mars-stroke-h", "mars-stroke-v", "maxcdn", "meanpath", "medium", "medkit", "meetup", "meh-o", "mercury", "microchip", "microphone", "microphone-slash", "minus", "minus-circle", "minus-square", "minus-square-o", "mixcloud", "mobile", "mobile-phone", "modx", "money", "moon-o", "mortar-board", "motorcycle", "mouse-pointer", "music", "navicon", "neuter", "newspaper-o", "object-group", "object-ungroup", "odnoklassniki", "odnoklassniki-square", "opencart", "openid", "opera", "optin-monster", "outdent", "pagelines", "paint-brush", "paper-plane", "paper-plane-o", "paperclip", "paragraph", "paste", "pause", "pause-circle", "pause-circle-o", "paw", "paypal", "pencil", "pencil-square", "pencil-square-o", "percent", "phone", "phone-square", "photo", "picture-o", "pie-chart", "pied-piper", "pied-piper-alt", "pied-piper-pp", "pinterest", "pinterest-p", "pinterest-square", "plane", "play", "play-circle", "play-circle-o", "plug", "plus", "plus-circle", "plus-square", "plus-square-o", "podcast", "power-off", "print", "product-hunt", "puzzle-piece", "qq", "qrcode", "question", "question-circle", "question-circle-o", "quora", "quote-left", "quote-right", "ra", "random", "ravelry", "rebel", "recycle", "reddit", "reddit-alien", "reddit-square", "refresh", "registered", "remove", "renren", "reorder", "repeat", "reply", "reply-all", "resistance", "retweet", "rmb", "road", "rocket", "rotate-left", "rotate-right", "rouble", "rss", "rss-square", "rub", "ruble", "rupee", "s15", "safari", "save", "scissors", "scribd", "search", "search-minus", "search-plus", "sellsy", "send", "send-o", "server", "share", "share-alt", "share-alt-square", "share-square", "share-square-o", "shekel", "sheqel", "shield", "ship", "shirtsinbulk", "shopping-bag", "shopping-basket", "shopping-cart", "shower", "sign-in", "sign-language", "sign-out", "signal", "signing", "simplybuilt", "sitemap", "skyatlas", "skype", "slack", "sliders", "slideshare", "smile-o", "snapchat", "snapchat-ghost", "snapchat-square", "snowflake-o", "soccer-ball-o", "sort", "sort-alpha-asc", "sort-alpha-desc", "sort-amount-asc", "sort-amount-desc", "sort-asc", "sort-desc", "sort-down", "sort-numeric-asc", "sort-numeric-desc", "sort-up", "soundcloud", "space-shuttle", "spinner", "spoon", "spotify", "square", "square-o", "stack-exchange", "stack-overflow", "star", "star-half", "star-half-empty", "star-half-full", "star-half-o", "star-o", "steam", "steam-square", "step-backward", "step-forward", "stethoscope", "sticky-note", "sticky-note-o", "stop", "stop-circle", "stop-circle-o", "street-view", "strikethrough", "stumbleupon", "stumbleupon-circle", "subscript", "subway", "suitcase", "sun-o", "superpowers", "superscript", "support", "table", "tablet", "tachometer", "tag", "tags", "tasks", "taxi", "telegram", "television", "tencent-weibo", "terminal", "text-height", "text-width", "th", "th-large", "th-list", "themeisle", "thermometer", "thermometer-0", "thermometer-1", "thermometer-2", "thermometer-3", "thermometer-4", "thermometer-empty", "thermometer-full", "thermometer-half", "thermometer-quarter", "thermometer-three-quarters", "thumb-tack", "thumbs-down", "thumbs-o-down", "thumbs-o-up", "thumbs-up", "ticket", "times", "times-circle", "times-circle-o", "times-rectangle", "times-rectangle-o", "tint", "toggle-down", "toggle-left", "toggle-off", "toggle-on", "toggle-right", "toggle-up", "trademark", "train", "transgender", "transgender-alt", "trash", "trash-o", "tree", "trello", "tripadvisor", "trophy", "truck", "try", "tty", "tumblr", "tumblr-square", "turkish-lira", "tv", "twitch", "twitter", "twitter-square", "umbrella", "underline", "undo", "universal-access", "university", "unlink", "unlock", "unlock-alt", "unsorted", "upload", "usb", "usd", "user", "user-circle", "user-circle-o", "user-md", "user-o", "user-plus", "user-secret", "user-times", "users", "vcard", "vcard-o", "venus", "venus-double", "venus-mars", "viacoin", "viadeo", "viadeo-square", "video-camera", "vimeo", "vimeo-square", "vine", "vk", "volume-control-phone", "volume-down", "volume-off", "volume-up", "warning", "wechat", "weibo", "weixin", "whatsapp", "wheelchair", "wheelchair-alt", "wifi", "wikipedia-w", "window-close", "window-close-o", "window-maximize", "window-minimize", "window-restore", "windows", "won", "wordpress", "wpbeginner", "wpexplorer", "wpforms", "wrench", "xing", "xing-square", "y-combinator", "y-combinator-square", "yahoo", "yc", "yc-square", "yelp", "yen", "yoast", "youtube", "youtube-play", "youtube-square" );


/**
 * Extract video ID from youtube url
 */
function blade_grve_extract_youtube_id( $url ) {
	$youtube_id = "";
	parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
	if ( ! isset( $vars['v'] ) ) {
		$youtube_id = '';
	}
	$youtube_id = $vars['v'];

	return apply_filters( 'blade_grve_privacy_bg_youtube_id', $youtube_id );
}

/**
 * Allow additional tags in post content
 */
if ( ! function_exists( 'blade_grve_wp_kses_allowed_html' ) ) {
	function blade_grve_wp_kses_allowed_html( $allowedposttags, $context ) {
		if ( is_array( $context ) ){
			return $allowedposttags;
		}
		if ( 'post' === $context ) {
			$allowedposttags['iframe'] = array(
				'src' => true,
				'srcdoc' => true,
				'name' => true,
				'sandbox' => true,
				'seamless' => true,
				'width' => true,
				'height' => true,
				'align' => true,
				'frameborder' => true,
				'scrolling' => true,
				'marginwidth' => true,
				'marginheight' => true,
				'allow' => true,
				'id' => true,
				'class' => true,
				'style' => true,
			);
		}
		return $allowedposttags;
	}
}
add_filter( 'wp_kses_allowed_html', 'blade_grve_wp_kses_allowed_html', 10, 2 );

/**
 * Custom Content Filters
 */
add_filter( 'blade_grve_the_content', 'wptexturize'                       );
add_filter( 'blade_grve_the_content', 'convert_smilies',               20 );
add_filter( 'blade_grve_the_content', 'shortcode_unautop'                 );
add_filter( 'blade_grve_the_content', 'prepend_attachment'                );
add_filter( 'blade_grve_the_content', 'wp_filter_content_tags'            );
add_filter( 'blade_grve_the_content', 'do_shortcode',                  11 );

//Omit closing PHP tag to avoid accidental whitespace output errors.
