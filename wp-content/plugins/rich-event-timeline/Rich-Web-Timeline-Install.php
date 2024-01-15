<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $wpdb;

$table_name_1 = $wpdb->prefix . "rich_web_timeline_manager";
$table_name_2 = $wpdb->prefix . "rich_web_timeline_options";
$table_name_3 = $wpdb->prefix . "rich_web_timeline_style_options";
$table_name_4 = $wpdb->prefix . "rich_web_timeline_short_options";
$table_name_5 = $wpdb->prefix . "rich_web_timeline_style_options_2";
$table_name_6 = $wpdb->prefix . "rich_web_icons";

$sql_1 = 'CREATE TABLE IF NOT EXISTS ' . $table_name_1 . '(id INTEGER(10) UNSIGNED AUTO_INCREMENT, rw_timeline_name VARCHAR(255) NOT NULL, rw_timeline_style_id VARCHAR(255) NOT NULL, rw_timeline_01 VARCHAR(255) NOT NULL, rw_timeline_02 VARCHAR(255) NOT NULL, rw_timeline_03 VARCHAR(255) NOT NULL, rw_timeline_04 VARCHAR(255) NOT NULL, rw_timeline_05 VARCHAR(255) NOT NULL, rw_timeline_06 VARCHAR(255) NOT NULL, rw_timeline_07 VARCHAR(255) NOT NULL, rw_timeline_08 VARCHAR(255) NOT NULL, rw_timeline_09 VARCHAR(255) NOT NULL, rw_timeline_10 VARCHAR(255) NOT NULL, PRIMARY KEY(id))';

$sql_2 = 'CREATE TABLE IF NOT EXISTS ' . $table_name_2 . '(id INTEGER(10) UNSIGNED AUTO_INCREMENT, rw_general_id VARCHAR(255) NOT NULL, rw_timeline_title VARCHAR(255) NOT NULL, rw_timeline_year VARCHAR(255) NOT NULL, rw_timeline_day VARCHAR(255) NOT NULL, rw_timeline_month VARCHAR(255) NOT NULL, rw_timeline_text LONGTEXT NOT NULL, rw_timeline_01 VARCHAR(255) NOT NULL, rw_timeline_02 VARCHAR(255) NOT NULL, rw_timeline_03 VARCHAR(255) NOT NULL, rw_timeline_04 VARCHAR(255) NOT NULL, rw_timeline_05 VARCHAR(255) NOT NULL, rw_timeline_06 VARCHAR(255) NOT NULL, rw_timeline_07 VARCHAR(255) NOT NULL, rw_timeline_08 VARCHAR(255) NOT NULL, rw_timeline_09 VARCHAR(255) NOT NULL, rw_timeline_10 VARCHAR(255) NOT NULL, PRIMARY KEY(id))';
$sql_3 = 'CREATE TABLE IF NOT EXISTS ' . $table_name_3 . '(id INTEGER(10) UNSIGNED AUTO_INCREMENT, rw_timeline_title VARCHAR(255) NOT NULL, rw_timeline_theme VARCHAR(255) NOT NULL, rw_timeline_title_col VARCHAR(255) NOT NULL, rw_timeline_border_col VARCHAR(255) NOT NULL, rw_timeline_number_col VARCHAR(255) NOT NULL, rw_timeline_line_col VARCHAR(255) NOT NULL, rw_timeline_font_size VARCHAR(255) NOT NULL, rich_web_timeline_fonts VARCHAR(255) NOT NULL, rw_timeline_md_color VARCHAR(255) NOT NULL, rw_timeline_hover_color VARCHAR(255) NOT NULL, rw_timeline_sort VARCHAR(255) NOT NULL, rw_timeline_effect VARCHAR(255) NOT NULL, rw_timeline_round_bg VARCHAR(255) NOT NULL, rw_timeline_round_bg_hover VARCHAR(255) NOT NULL, rw_timeline_round_border_px VARCHAR(255) NOT NULL, rw_timeline_border_px VARCHAR(255) NOT NULL, rw_timeline_box_shadow VARCHAR(255) NOT NULL, rw_timeline_box_shadow_px VARCHAR(255) NOT NULL, rw_timeline_border_type_article VARCHAR(255) NOT NULL, rw_timeline_border_type_line VARCHAR(255) NOT NULL, rw_timeline_icon_type VARCHAR(255) NOT NULL, rw_timeline_icon_color VARCHAR(255) NOT NULL, rw_timeline_icon_size VARCHAR(255) NOT NULL, rw_timeline_year_block_bg VARCHAR(255) NOT NULL, rw_timeline_round_size VARCHAR(255) NOT NULL, rw_timeline_bg_color VARCHAR(255) NOT NULL, rw_timeline_bg_color_hover VARCHAR(255) NOT NULL, rw_timeline_box_shadow_hover VARCHAR(255) NOT NULL, rw_timeline_year_color_hover VARCHAR(255) NOT NULL, rw_timeline_year_block_bg_hover VARCHAR(255) NOT NULL, rw_timeline_year_size VARCHAR(255) NOT NULL, rw_timeline_md_color_hover VARCHAR(255) NOT NULL, rw_timeline_md_border_color VARCHAR(255) NOT NULL, rw_timeline_md_border_color_hover VARCHAR(255) NOT NULL, rw_timeline_round_border_col VARCHAR(255) NOT NULL, rw_timeline_round_border_col_hover VARCHAR(255) NOT NULL, rw_timeline_title_bg_color VARCHAR(255) NOT NULL, rw_timeline_01 VARCHAR(255) NOT NULL, rw_timeline_02 VARCHAR(255) NOT NULL, rw_timeline_03 VARCHAR(255) NOT NULL, rw_timeline_04 VARCHAR(255) NOT NULL, PRIMARY KEY(id))';
$sql_4 = 'CREATE TABLE IF NOT EXISTS ' . $table_name_4 . '(id INTEGER(10) UNSIGNED AUTO_INCREMENT, rw_timeline_ti_id VARCHAR(255) NOT NULL, rw_timeline_01 VARCHAR(255) NOT NULL, rw_timeline_02 VARCHAR(255) NOT NULL, rw_timeline_03 VARCHAR(255) NOT NULL, rw_timeline_04 VARCHAR(255) NOT NULL,
		 rw_timeline_05 VARCHAR(255) NOT NULL, rw_timeline_06 VARCHAR(255) NOT NULL, rw_timeline_07 VARCHAR(255) NOT NULL, rw_timeline_08 VARCHAR(255) NOT NULL, rw_timeline_09 VARCHAR(255) NOT NULL, rw_timeline_10 VARCHAR(255) NOT NULL, rw_timeline_11 VARCHAR(255) NOT NULL, rw_timeline_12 VARCHAR(255) NOT NULL, rw_timeline_13 VARCHAR(255) NOT NULL, rw_timeline_14 VARCHAR(255) NOT NULL, rw_timeline_15 VARCHAR(255) NOT NULL, rw_timeline_16 VARCHAR(255) NOT NULL, rw_timeline_17 VARCHAR(255) NOT NULL, rw_timeline_18 VARCHAR(255) NOT NULL, rw_timeline_19 VARCHAR(255) NOT NULL, rw_timeline_20 VARCHAR(255) NOT NULL, rw_timeline_21 VARCHAR(255) NOT NULL, rw_timeline_22 VARCHAR(255) NOT NULL, rw_timeline_23 VARCHAR(255) NOT NULL, rw_timeline_24 VARCHAR(255) NOT NULL,
	 PRIMARY KEY(id))';
$sql_5 = 'CREATE TABLE IF NOT EXISTS ' . $table_name_5 . '(id INTEGER(10) UNSIGNED AUTO_INCREMENT, style_id VARCHAR(255) NOT NULL, rw_timeline_month_col VARCHAR(255) NOT NULL, rw_timeline_month_col_hov VARCHAR(255) NOT NULL, rw_timeline_icon_col VARCHAR(255) NOT NULL, rw_timeline_icon_size VARCHAR(255) NOT NULL, rw_timeline_icon_style VARCHAR(255) NOT NULL, rw_timeline_md_bg_color VARCHAR(255) NOT NULL, rw_timeline_md_bg_color_hover VARCHAR(255) NOT NULL, rw_timeline_01 VARCHAR(255) NOT NULL, rw_timeline_02 VARCHAR(255) NOT NULL, rw_timeline_03 VARCHAR(255) NOT NULL, rw_timeline_04 VARCHAR(255) NOT NULL, rw_timeline_05 VARCHAR(255) NOT NULL, rw_timeline_06 VARCHAR(255) NOT NULL, rw_timeline_07 VARCHAR(255) NOT NULL, rw_timeline_08 VARCHAR(255) NOT NULL, rw_timeline_09 VARCHAR(255) NOT NULL, rw_timeline_10 VARCHAR(255) NOT NULL, rw_timeline_11 VARCHAR(255) NOT NULL, rw_timeline_12 VARCHAR(255) NOT NULL, rw_timeline_13 VARCHAR(255) NOT NULL, rw_timeline_14 VARCHAR(255) NOT NULL, rw_timeline_15 VARCHAR(255) NOT NULL, rw_timeline_16 VARCHAR(255) NOT NULL, rw_timeline_17 VARCHAR(255) NOT NULL, rw_timeline_18 VARCHAR(255) NOT NULL, rw_timeline_19 VARCHAR(255) NOT NULL, rw_timeline_20 VARCHAR(255) NOT NULL, rw_timeline_21 VARCHAR(255) NOT NULL, rw_timeline_22 VARCHAR(255) NOT NULL, rw_timeline_23 VARCHAR(255) NOT NULL, rw_timeline_24 VARCHAR(255) NOT NULL, rw_timeline_25 VARCHAR(255) NOT NULL, rw_timeline_26 VARCHAR(255) NOT NULL, rw_timeline_27 VARCHAR(255) NOT NULL, rw_timeline_28 VARCHAR(255) NOT NULL, rw_timeline_29 VARCHAR(255) NOT NULL, rw_timeline_30 VARCHAR(255) NOT NULL, rw_timeline_31 VARCHAR(255) NOT NULL, rw_timeline_32 VARCHAR(255) NOT NULL, PRIMARY KEY(id))';
$sql_6 = 'CREATE TABLE IF NOT EXISTS ' . $table_name_6 . ' ( id INTEGER(10) UNSIGNED AUTO_INCREMENT, Icon_Type VARCHAR(255) NOT NULL, Icon_Name VARCHAR(255) NOT NULL, PRIMARY KEY (id))';

require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
dbDelta( $sql_1 );
dbDelta( $sql_2 );
dbDelta( $sql_3 );
dbDelta( $sql_4 );
dbDelta( $sql_5 );
dbDelta( $sql_6 );

$sqla1 = 'ALTER TABLE ' . $table_name_1 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
$sqla2 = 'ALTER TABLE ' . $table_name_2 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
$sqla3 = 'ALTER TABLE ' . $table_name_3 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
$sqla4 = 'ALTER TABLE ' . $table_name_4 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
$sqla5 = 'ALTER TABLE ' . $table_name_5 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';
$sqla6 = 'ALTER TABLE ' . $table_name_6 . ' CONVERT TO CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci';

$wpdb->query( $sqla1 );
$wpdb->query( $sqla2 );
$wpdb->query( $sqla3 );
$wpdb->query( $sqla4 );
$wpdb->query( $sqla5 );
$wpdb->query( $sqla6 );

$Rich_Web_Icon_Names = array(
	'500px',
	'Adjust',
	'Adn',
	'Align Center',
	'Align Justify',
	'Align Left',
	'Align Right',
	'Amazon',
	'Ambulance',
	'American Sign Language Interpreting',
	'Anchor',
	'Android',
	'Angellist',
	'Angle Double Down',
	'Angle Double Left',
	'Angle Double Right',
	'Angle Double Up',
	'Angle Down',
	'Angle Left',
	'Angle Right',
	'Angle Up',
	'Apple',
	'Archive',
	'Area Chart',
	'Arrow Circle Down',
	'Arrow Circle Left',
	'Arrow Circle O Down',
	'Arrow Circle O Left',
	'Arrow Circle O Right',
	'Arrow Circle O Up',
	'Arrow Circle Right',
	'Arrow Circle Up',
	'Arrow Down',
	'Arrow Left',
	'Arrow Right',
	'Arrow Up',
	'Arrows',
	'Arrows Alt',
	'Arrows H',
	'Arrows V',
	'Assistive Listening Systems',
	'Asterisk',
	'At',
	'Audio Description',
	'Backward',
	'Balance Scale',
	'Ban',
	'Bar Chart',
	'Barcode',
	'Bars',
	'Battery Empty',
	'Battery Full',
	'Battery Half',
	'Battery Quarter',
	'Battery Three Quarters',
	'Bed',
	'Beer',
	'Behance',
	'Behance Square',
	'Bell',
	'Bell O',
	'Bell Slash',
	'Bell Slash O',
	'Bicycle',
	'Binoculars',
	'Birthday Cake',
	'Bitbucket',
	'Bitbucket Square',
	'Black Tie',
	'Blind',
	'Bluetooth',
	'Bluetooth B',
	'Bold',
	'Bolt',
	'Bomb',
	'Book',
	'Bookmark',
	'Bookmark O',
	'Braille',
	'Briefcase',
	'Btc',
	'Bug',
	'Building',
	'Building O',
	'Bullhorn',
	'Bullseye',
	'Bus',
	'Buysellads',
	'Calculator',
	'Calendar',
	'Calendar Check O',
	'Calendar Minus O',
	'Calendar O',
	'Calendar Plus O',
	'Calendar Times O',
	'Camera',
	'Camera Retro',
	'Car',
	'Caret Down',
	'Caret Left',
	'Caret Right',
	'Caret Square O Down',
	'Caret Square O Left',
	'Caret Square O Right',
	'Caret Square O Up',
	'Caret Up',
	'Cart Arrow Down',
	'Cart Plus',
	'Cc',
	'Cc Amex',
	'Cc Diners Club',
	'Cc Discover',
	'Cc Jcb',
	'Cc Mastercard',
	'Cc Paypal',
	'Cc Stripe',
	'Cc Visa',
	'Certificate',
	'Chain Broken',
	'Check',
	'Check Circle',
	'Check Circle O',
	'Check Square',
	'Check Square O',
	'Chevron Circle Down',
	'Chevron Circle Left',
	'Chevron Circle Right',
	'Chevron Circle Up',
	'Chevron Down',
	'Chevron Left',
	'Chevron Right',
	'Chevron Up',
	'Child',
	'Chrome',
	'Circle',
	'Circle O',
	'Circle O Notch',
	'Circle Thin',
	'Clipboard',
	'Clock O',
	'Clone',
	'Cloud',
	'Cloud Download',
	'Cloud Upload',
	'Code',
	'Code Fork',
	'Codepen',
	'Codiepie',
	'Coffee',
	'Cog',
	'Cogs',
	'Columns',
	'Comment',
	'Comment O',
	'Commenting',
	'Commenting O',
	'Comments',
	'Comments O',
	'Compass',
	'Compress',
	'Connectdevelop',
	'Contao',
	'Copyright',
	'Creative Commons',
	'Credit Card',
	'Credit Card Alt',
	'Crop',
	'Crosshairs',
	'Css3',
	'Cube',
	'Cubes',
	'Cutlery',
	'Dashcube',
	'Database',
	'Deaf',
	'Delicious',
	'Desktop',
	'Deviantart',
	'Diamond',
	'Digg',
	'Dot Circle O',
	'Download',
	'Dribbble',
	'Dropbox',
	'Drupal',
	'Edge',
	'Eject',
	'Ellipsis H',
	'Ellipsis V',
	'Empire',
	'Envelope',
	'Envelope O',
	'Envelope Square',
	'Envira',
	'Eraser',
	'Eur',
	'Exchange',
	'Exclamation',
	'Exclamation Circle',
	'Exclamation Triangle',
	'Expand',
	'Expeditedssl',
	'External Link',
	'External Link Square',
	'Eye',
	'Eye Slash',
	'Eyedropper',
	'Facebook',
	'Facebook Official',
	'Facebook Square',
	'Fast Backward',
	'Fast Forward',
	'Fax',
	'Female',
	'Fighter Jet',
	'File',
	'File Archive O',
	'File Audio O',
	'File Code O',
	'File Excel O',
	'File Image O',
	'File O',
	'File Pdf O',
	'File Powerpoint O',
	'File Text',
	'File Text O',
	'File Video O',
	'File Word O',
	'Files O',
	'Film',
	'Filter',
	'Fire',
	'Fire Extinguisher',
	'Firefox',
	'First Order',
	'Flag',
	'Flag Checkered',
	'Flag O',
	'Flask',
	'Flickr',
	'Floppy O',
	'Folder',
	'Folder O',
	'Folder Open',
	'Folder Open O',
	'Font',
	'Font Awesome',
	'Fonticons',
	'Fort Awesome',
	'Forumbee',
	'Forward',
	'Foursquare',
	'Frown O',
	'Futbol O',
	'Gamepad',
	'Gavel',
	'Gbp',
	'Genderless',
	'Get Pocket',
	'Gg',
	'Gg Circle',
	'Gift',
	'Git',
	'Git Square',
	'Gitlab',
	'Github',
	'Github Alt',
	'Github Square',
	'Glass',
	'Glide',
	'Glide G',
	'Globe',
	'Google',
	'Google Plus',
	'Google Plus Official',
	'Google Plus Square',
	'Google Wallet',
	'Graduation Cap',
	'Gratipay',
	'H Square',
	'Hacker News',
	'Hand Lizard O',
	'Hand O Down',
	'Hand O Left',
	'Hand O Right',
	'Hand O Up',
	'Hand Paper O',
	'Hand Peace O',
	'Hand Pointer O',
	'Hand Rock O',
	'Hand Scissors O',
	'Hand Spock O',
	'Hashtag',
	'Hdd O',
	'Header',
	'Headphones',
	'Heart',
	'Heart O',
	'Heartbeat',
	'History',
	'Home',
	'Hospital O',
	'Hourglass',
	'Hourglass End',
	'Hourglass Half',
	'Hourglass O',
	'Hourglass Start',
	'Houzz',
	'Html5',
	'I Cursor',
	'Ils',
	'Inbox',
	'Indent',
	'Industry',
	'Info',
	'Info Circle',
	'Inr',
	'Instagram',
	'Internet Explorer',
	'Ioxhost',
	'Italic',
	'Joomla',
	'Jpy',
	'Jsfiddle',
	'Key',
	'Keyboard O',
	'Krw',
	'Language',
	'Laptop',
	'Lastfm',
	'Lastfm Square',
	'Leaf',
	'Leanpub',
	'Lemon O',
	'Level Down',
	'Level Up',
	'Life Ring',
	'Lightbulb O',
	'Line Chart',
	'Link',
	'Linkedin',
	'Linkedin Square',
	'Linux',
	'List',
	'List Alt',
	'List Ol',
	'List Ul',
	'Location Arrow',
	'Lock',
	'Long Arrow Down',
	'Long Arrow Left',
	'Long Arrow Right',
	'Long Arrow Up',
	'Low Vision',
	'Magic',
	'Magnet',
	'Male',
	'Map',
	'Map Marker',
	'Map O',
	'Map Pin',
	'Map Signs',
	'Mars',
	'Mars Double',
	'Mars Stroke',
	'Mars Stroke H',
	'Mars Stroke V',
	'Maxcdn',
	'Meanpath',
	'Medium',
	'Medkit',
	'Meh O',
	'Mercury',
	'Microphone',
	'Microphone Slash',
	'Minus',
	'Minus Circle',
	'Minus Square',
	'Minus Square O',
	'Mixcloud',
	'Mobile',
	'Modx',
	'Money',
	'Moon O',
	'Motorcycle',
	'Mouse Pointer',
	'Music',
	'Neuter',
	'Newspaper O',
	'Object Group',
	'Object Ungroup',
	'Odnoklassniki',
	'Odnoklassniki Square',
	'Opencart',
	'Openid',
	'Opera',
	'Optin Monster',
	'Outdent',
	'Pagelines',
	'Paint Brush',
	'Paper Plane',
	'Paper Plane O',
	'Paperclip',
	'Paragraph',
	'Pause',
	'Pause Circle',
	'Pause Circle O',
	'Paw',
	'Paypal',
	'Pencil',
	'Pencil Square',
	'Pencil Square O',
	'Percent',
	'Phone',
	'Phone Square',
	'Picture O',
	'Pie Chart',
	'Pied Piper',
	'Pied Piper Alt',
	'Pied Piper Pp',
	'Pinterest',
	'Pinterest P',
	'Pinterest Square',
	'Plane',
	'Play',
	'Play Circle',
	'Play Circle O',
	'Plug',
	'Plus',
	'Plus Circle',
	'Plus Square',
	'Plus Square O',
	'Power Off',
	'Print',
	'Product Hunt',
	'Puzzle Piece',
	'Qq',
	'Qrcode',
	'Question',
	'Question Circle',
	'Question Circle O',
	'Quote Left',
	'Quote Right',
	'Random',
	'Rebel',
	'Recycle',
	'Reddit',
	'Reddit Alien',
	'Reddit Square',
	'Refresh',
	'Registered',
	'Renren',
	'Repeat',
	'Reply',
	'Reply All',
	'Retweet',
	'Road',
	'Rocket',
	'Rss',
	'Rss Square',
	'Rub',
	'Safari',
	'Scissors',
	'Scribd',
	'Search',
	'Search Minus',
	'Search Plus',
	'Sellsy',
	'Server',
	'Share',
	'Share Alt',
	'Share Alt Square',
	'Share Square',
	'Share Square O',
	'Shield',
	'Ship',
	'Shirtsinbulk',
	'Shopping Bag',
	'Shopping Basket',
	'Shopping Cart',
	'Sign In',
	'Sign Language',
	'Sign Out',
	'Signal',
	'Simplybuilt',
	'Sitemap',
	'Skyatlas',
	'Skype',
	'Slack',
	'Sliders',
	'Slideshare',
	'Smile O',
	'Snapchat',
	'Snapchat Ghost',
	'Snapchat Square',
	'Sort',
	'Sort Alpha Asc',
	'Sort Alpha Desc',
	'Sort Amount Asc',
	'Sort Amount Desc',
	'Sort Asc',
	'Sort Desc',
	'Sort Numeric Asc',
	'Sort Numeric Desc',
	'Soundcloud',
	'Space Shuttle',
	'Spinner',
	'Spoon',
	'Spotify',
	'Square',
	'Square O',
	'Stack Exchange',
	'Stack Overflow',
	'Star',
	'Star Half',
	'Star Half O',
	'Star O',
	'Steam',
	'Steam Square',
	'Step Backward',
	'Step Forward',
	'Stethoscope',
	'Sticky Note',
	'Sticky Note O',
	'Stop',
	'Stop Circle',
	'Stop Circle O',
	'Street View',
	'Strikethrough',
	'Stumbleupon',
	'Stumbleupon Circle',
	'Subscript',
	'Subway',
	'Suitcase',
	'Sun O',
	'Superscript',
	'Table',
	'Tablet',
	'Tachometer',
	'Tag',
	'Tags',
	'Tasks',
	'Taxi',
	'Television',
	'Tencent Weibo',
	'Terminal',
	'Text Height',
	'Text Width',
	'Th',
	'Th Large',
	'Th List',
	'Themeisle',
	'Thumb Tack',
	'Thumbs Down',
	'Thumbs O Down',
	'Thumbs O Up',
	'Thumbs Up',
	'Ticket',
	'Times',
	'Times Circle',
	'Times Circle O',
	'Tint',
	'Toggle Off',
	'Toggle On',
	'Trademark',
	'Train',
	'Transgender',
	'Transgender Alt',
	'Trash',
	'Trash O',
	'Tree',
	'Trello',
	'Tripadvisor',
	'Trophy',
	'Truck',
	'Try',
	'Tty',
	'Tumblr',
	'Tumblr Square',
	'Twitch',
	'Twitter',
	'Twitter Square',
	'Umbrella',
	'Underline',
	'Undo',
	'Universal Access',
	'University',
	'Unlock',
	'Unlock Alt',
	'Upload',
	'Usb',
	'Usd',
	'User',
	'User Md',
	'User Plus',
	'User Secret',
	'User Times',
	'Users',
	'Venus',
	'Venus Double',
	'Venus Mars',
	'Viacoin',
	'Viadeo',
	'Viadeo Square',
	'Video Camera',
	'Vimeo',
	'Vimeo Square',
	'Vine',
	'Vk',
	'Volume Control Phone',
	'Volume Down',
	'Volume Off',
	'Volume Up',
	'Weibo',
	'Weixin',
	'Whatsapp',
	'Wheelchair',
	'Wheelchair Alt',
	'Wifi',
	'Wikipedia W',
	'Windows',
	'Wordpress',
	'Wpbeginner',
	'Wpforms',
	'Wrench',
	'Xing',
	'Xing Square',
	'Y Combinator',
	'Yahoo',
	'Yelp',
	'Yoast',
	'Youtube',
	'Youtube Play',
	'Youtube Square'
);
$Rich_Web_Icon_Types = array(
	'f26e',
	'f042',
	'f170',
	'f037',
	'f039',
	'f036',
	'f038',
	'f270',
	'f0f9',
	'f2a3',
	'f13d',
	'f17b',
	'f209',
	'f103',
	'f100',
	'f101',
	'f102',
	'f107',
	'f104',
	'f105',
	'f106',
	'f179',
	'f187',
	'f1fe',
	'f0ab',
	'f0a8',
	'f01a',
	'f190',
	'f18e',
	'f01b',
	'f0a9',
	'f0aa',
	'f063',
	'f060',
	'f061',
	'f062',
	'f047',
	'f0b2',
	'f07e',
	'f07d',
	'f2a2',
	'f069',
	'f1fa',
	'f29e',
	'f04a',
	'f24e',
	'f05e',
	'f080',
	'f02a',
	'f0c9',
	'f244',
	'f240',
	'f242',
	'f243',
	'f241',
	'f236',
	'f0fc',
	'f1b4',
	'f1b5',
	'f0f3',
	'f0a2',
	'f1f6',
	'f1f7',
	'f206',
	'f1e5',
	'f1fd',
	'f171',
	'f172',
	'f27e',
	'f29d',
	'f293',
	'f294',
	'f032',
	'f0e7',
	'f1e2',
	'f02d',
	'f02e',
	'f097',
	'f2a1',
	'f0b1',
	'f15a',
	'f188',
	'f1ad',
	'f0f7',
	'f0a1',
	'f140',
	'f207',
	'f20d',
	'f1ec',
	'f073',
	'f274',
	'f272',
	'f133',
	'f271',
	'f273',
	'f030',
	'f083',
	'f1b9',
	'f0d7',
	'f0d9',
	'f0da',
	'f150',
	'f191',
	'f152',
	'f151',
	'f0d8',
	'f218',
	'f217',
	'f20a',
	'f1f3',
	'f24c',
	'f1f2',
	'f24b',
	'f1f1',
	'f1f4',
	'f1f5',
	'f1f0',
	'f0a3',
	'f127',
	'f00c',
	'f058',
	'f05d',
	'f14a',
	'f046',
	'f13a',
	'f137',
	'f138',
	'f139',
	'f078',
	'f053',
	'f054',
	'f077',
	'f1ae',
	'f268',
	'f111',
	'f10c',
	'f1ce',
	'f1db',
	'f0ea',
	'f017',
	'f24d',
	'f0c2',
	'f0ed',
	'f0ee',
	'f121',
	'f126',
	'f1cb',
	'f284',
	'f0f4',
	'f013',
	'f085',
	'f0db',
	'f075',
	'f0e5',
	'f27a',
	'f27b',
	'f086',
	'f0e6',
	'f14e',
	'f066',
	'f20e',
	'f26d',
	'f1f9',
	'f25e',
	'f09d',
	'f283',
	'f125',
	'f05b',
	'f13c',
	'f1b2',
	'f1b3',
	'f0f5',
	'f210',
	'f1c0',
	'f2a4',
	'f1a5',
	'f108',
	'f1bd',
	'f219',
	'f1a6',
	'f192',
	'f019',
	'f17d',
	'f16b',
	'f1a9',
	'f282',
	'f052',
	'f141',
	'f142',
	'f1d1',
	'f0e0',
	'f003',
	'f199',
	'f299',
	'f12d',
	'f153',
	'f0ec',
	'f12a',
	'f06a',
	'f071',
	'f065',
	'f23e',
	'f08e',
	'f14c',
	'f06e',
	'f070',
	'f1fb',
	'f09a',
	'f230',
	'f082',
	'f049',
	'f050',
	'f1ac',
	'f182',
	'f0fb',
	'f15b',
	'f1c6',
	'f1c7',
	'f1c9',
	'f1c3',
	'f1c5',
	'f016',
	'f1c1',
	'f1c4',
	'f15c',
	'f0f6',
	'f1c8',
	'f1c2',
	'f0c5',
	'f008',
	'f0b0',
	'f06d',
	'f134',
	'f269',
	'f2b0',
	'f024',
	'f11e',
	'f11d',
	'f0c3',
	'f16e',
	'f0c7',
	'f07b',
	'f114',
	'f07c',
	'f115',
	'f031',
	'f2b4',
	'f280',
	'f286',
	'f211',
	'f04e',
	'f180',
	'f119',
	'f1e3',
	'f11b',
	'f0e3',
	'f154',
	'f22d',
	'f265',
	'f260',
	'f261',
	'f06b',
	'f1d3',
	'f1d2',
	'f296',
	'f09b',
	'f113',
	'f092',
	'f000',
	'f2a5',
	'f2a6',
	'f0ac',
	'f1a0',
	'f0d5',
	'f2b3',
	'f0d4',
	'f1ee',
	'f19d',
	'f184',
	'f0fd',
	'f1d4',
	'f258',
	'f0a7',
	'f0a5',
	'f0a4',
	'f0a6',
	'f256',
	'f25b',
	'f25a',
	'f255',
	'f257',
	'f259',
	'f292',
	'f0a0',
	'f1dc',
	'f025',
	'f004',
	'f08a',
	'f21e',
	'f1da',
	'f015',
	'f0f8',
	'f254',
	'f253',
	'f252',
	'f250',
	'f251',
	'f27c',
	'f13b',
	'f246',
	'f20b',
	'f01c',
	'f03c',
	'f275',
	'f129',
	'f05a',
	'f156',
	'f16d',
	'f26b',
	'f208',
	'f033',
	'f1aa',
	'f157',
	'f1cc',
	'f084',
	'f11c',
	'f159',
	'f1ab',
	'f109',
	'f202',
	'f203',
	'f06c',
	'f212',
	'f094',
	'f149',
	'f148',
	'f1cd',
	'f0eb',
	'f201',
	'f0c1',
	'f0e1',
	'f08c',
	'f17c',
	'f03a',
	'f022',
	'f0cb',
	'f0ca',
	'f124',
	'f023',
	'f175',
	'f177',
	'f178',
	'f176',
	'f2a8',
	'f0d0',
	'f076',
	'f183',
	'f279',
	'f041',
	'f278',
	'f276',
	'f277',
	'f222',
	'f227',
	'f229',
	'f22b',
	'f22a',
	'f136',
	'f20c',
	'f23a',
	'f0fa',
	'f11a',
	'f223',
	'f130',
	'f131',
	'f068',
	'f056',
	'f146',
	'f147',
	'f289',
	'f10b',
	'f285',
	'f0d6',
	'f186',
	'f21c',
	'f245',
	'f001',
	'f22c',
	'f1ea',
	'f247',
	'f248',
	'f263',
	'f264',
	'f23d',
	'f19b',
	'f26a',
	'f23c',
	'f03b',
	'f18c',
	'f1fc',
	'f1d8',
	'f1d9',
	'f0c6',
	'f1dd',
	'f04c',
	'f28b',
	'f28c',
	'f1b0',
	'f1ed',
	'f040',
	'f14b',
	'f044',
	'f295',
	'f095',
	'f098',
	'f03e',
	'f200',
	'f2ae',
	'f1a8',
	'f1a7',
	'f0d2',
	'f231',
	'f0d3',
	'f072',
	'f04b',
	'f144',
	'f01d',
	'f1e6',
	'f067',
	'f055',
	'f0fe',
	'f196',
	'f011',
	'f02f',
	'f288',
	'f12e',
	'f1d6',
	'f029',
	'f128',
	'f059',
	'f29c',
	'f10d',
	'f10e',
	'f074',
	'f1d0',
	'f1b8',
	'f1a1',
	'f281',
	'f1a2',
	'f021',
	'f25d',
	'f18b',
	'f01e',
	'f112',
	'f122',
	'f079',
	'f018',
	'f135',
	'f09e',
	'f143',
	'f158',
	'f267',
	'f0c4',
	'f28a',
	'f002',
	'f010',
	'f00e',
	'f213',
	'f233',
	'f064',
	'f1e0',
	'f1e1',
	'f14d',
	'f045',
	'f132',
	'f21a',
	'f214',
	'f290',
	'f291',
	'f07a',
	'f090',
	'f2a7',
	'f08b',
	'f012',
	'f215',
	'f0e8',
	'f216',
	'f17e',
	'f198',
	'f1de',
	'f1e7',
	'f118',
	'f2ab',
	'f2ac',
	'f2ad',
	'f0dc',
	'f15d',
	'f15e',
	'f160',
	'f161',
	'f0de',
	'f0dd',
	'f162',
	'f163',
	'f1be',
	'f197',
	'f110',
	'f1b1',
	'f1bc',
	'f0c8',
	'f096',
	'f18d',
	'f16c',
	'f005',
	'f089',
	'f123',
	'f006',
	'f1b6',
	'f1b7',
	'f048',
	'f051',
	'f0f1',
	'f249',
	'f24a',
	'f04d',
	'f28d',
	'f28e',
	'f21d',
	'f0cc',
	'f1a4',
	'f1a3',
	'f12c',
	'f239',
	'f0f2',
	'f185',
	'f12b',
	'f0ce',
	'f10a',
	'f0e4',
	'f02b',
	'f02c',
	'f0ae',
	'f1ba',
	'f26c',
	'f1d5',
	'f120',
	'f034',
	'f035',
	'f00a',
	'f009',
	'f00b',
	'f2b2',
	'f08d',
	'f165',
	'f088',
	'f087',
	'f164',
	'f145',
	'f00d',
	'f057',
	'f05c',
	'f043',
	'f204',
	'f205',
	'f25c',
	'f238',
	'f224',
	'f225',
	'f1f8',
	'f014',
	'f1bb',
	'f181',
	'f262',
	'f091',
	'f0d1',
	'f195',
	'f1e4',
	'f173',
	'f174',
	'f1e8',
	'f099',
	'f081',
	'f0e9',
	'f0cd',
	'f0e2',
	'f29a',
	'f19c',
	'f09c',
	'f13e',
	'f093',
	'f287',
	'f155',
	'f007',
	'f0f0',
	'f234',
	'f21b',
	'f235',
	'f0c0',
	'f221',
	'f226',
	'f228',
	'f237',
	'f2a9',
	'f2aa',
	'f03d',
	'f27d',
	'f194',
	'f1ca',
	'f189',
	'f2a0',
	'f027',
	'f026',
	'f028',
	'f18a',
	'f1d7',
	'f232',
	'f193',
	'f29b',
	'f1eb',
	'f266',
	'f17a',
	'f19a',
	'f297',
	'f298',
	'f0ad',
	'f168',
	'f169',
	'f23b',
	'f19e',
	'f1e9',
	'f2b1',
	'f167',
	'f16a',
	'f166'
);
$Rich_WebIconCount = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name_6 WHERE id>%d", 0 ) );
if ( count( $Rich_WebIconCount ) == 0 ) {
	for ( $i = 0; $i < count( $Rich_Web_Icon_Names ); $i ++ ) {
		$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_6 (id, Icon_Type, Icon_Name) VALUES (%d, %s, %s)", '', $Rich_Web_Icon_Types[ $i ], $Rich_Web_Icon_Names[ $i ] ) );
	}
}
$Rich_WebFStyleCount = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name_3 WHERE id>%d", 0 ) );
if ( count( $Rich_WebFStyleCount ) == 0 ) {
	/*------- Style 1 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 1', '1', '#2890e0', '#51d3d6', '#e8ab3a', '#5c97e0', '20', 'Abadi MT Condensed Light', '#9632d1', '#14b734', 'ASC', 'blind', '#3294d1', '#25e8e1', '1', '1', '#4ff7ae', '25', 'solid', 'solid', 'angle', '#560eba', '30', '#59becc', 'small', '#f1f1f1', '#f2dcdc', '#3beaf9', '#22bad8', '#59becc', '35', '#82a54d', '#3e35ea', '#35eabd', '#8c2d84', '#35eabd', '#3e35ea', '#59becc', '#289171', 'Pagination 1', '#777777' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171', '#ffffff', '#ffffff', '#777777', '#ffffff', '#777777' ) );
	/*------- Style 2 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 2', '1', '#dbdbdb', 'rgba(93,244,184,0.16)', '#000000', '#dbdbdb', '29', 'Gabriola', '#000000', '#dbdbdb', 'ASC', 'fade', '#bcbcbc', '#969696', '0', '0', '#f4f4f4', '25', 'solid', '', 'angle', '#560eba', '30', '#59becc', 'small', '#f4f4f4', '#f4f4f4', '#f4f4f4', '#000000', '#59becc', '26', '#000000', '#f27f37', '#35eabd', '#81d742', '#000000', '#000000', '#59becc', '#289171', 'Pagination 1', '#777777' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171', '#ffffff', '#ffffff', '#777777', '#ffffff', '#777777' ) );
	/*------- Style 3 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 3', '2', '#ffffff', 'rgba(93,244,184,0.16)', '#ffffff', 'rgba(255,255,255,0.02)', '29', 'Gabriola', '#000000', '#ffffff', 'ASC', 'fade', '#bcbcbc', '#969696', '0', '0', '#f4f4f4', '0', 'solid', '', 'angle', '#560eba', '30', '#dd0000', 'small', 'rgba(255,255,255,0)', 'rgba(255,255,255,0)', '#f4f4f4', '#ffffff', '#c90000', '26', '#000000', '#f27f37', '#35eabd', '#81d742', '#dd0000', '#dd0000', '#59becc', '#289171', 'Pagination 1', '#777777' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171', '#ffffff', '#ffffff', '#777777', '#ffffff', '#777777' ) );
	/*------- Style 4 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 4', '2', '#ffffff', '#8a9b09', '#ffffff', 'rgba(255,255,255,0.02)', '29', 'Gabriola', '#000000', '#ffffff', 'ASC', 'slide', '#bcbcbc', '#969696', '0', '1', '#f4f4f4', '25', 'solid', '', 'angle', '#560eba', '30', '#8a9b09', 'small', '#f2f2f2', '#f2f2f2', '#f4f4f4', '#ffffff', '#8a9b09', '20', '#000000', '#f27f37', '#35eabd', '#81d742', '#8a9b09', '#8a9b09', '#59becc', '#289171', 'Pagination 1', '#777777' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171', '#ffffff', '#ffffff', '#777777', '#ffffff', '#777777' ) );
	/*------- Style 5 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 5', '3', '#ffffff', '#6c7a06', '#6c7a06', 'rgba(255,255,255,0.02)', '23', 'David', '#afe000', '#ffffff', 'ASC', 'shake', '#8c8c8c', '#848484', '0', '1', '#8c8c8c', '25', 'solid', '', 'angle', '#6c7a06', '30', '#8a9b09', 'small', 'rgba(242,242,242,0.01)', 'rgba(242,242,242,0.01)', '#8c8c8c', '#6c7a06', '#8a9b09', '20', '#afe000', '#f27f37', '#35eabd', '#81d742', '#6c7a06', '#6c7a06', '#000000', '#000000', 'Pagination 1', '#777777' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171', '#ffffff', '#ffffff', '#777777', '#ffffff', '#777777' ) );
	/*------- Style 6 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 6', '3', '#ffffff', '#ffffff', '#000000', '#ff2861', '20', 'Abadi MT Condensed Light', '#000000', '#ffffff', 'ASC', 'fold', '#ff2861', '#ff2861', '1', '3', '#000000', '5', 'solid', '', 'angle-double', '#ff2861', '30', '#59becc', 'small', '#ff2861', '#ff2861', '#000000', '#000000', '#59becc', '27', '#000000', '#3e35ea', '#35eabd', '#ff2861', '#ff0044', '#ed003f', '#ff2861', '#ff2861', 'Pagination 1', '#777777' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171', '#ffffff', '#ffffff', '#777777', '#ffffff', '#777777' ) );
	/*------- Style 7 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 7', '4', '#ffffff', '#843256', '#e8ab3a', '#dd9933', '20', 'Abadi MT Condensed Light', '#dd9933', '#ffffff', 'ASC', 'bounce', '#ffffff', '#ffffff', '1', '0', '#dd9933', '15', 'solid', '', 'angle', '#560eba', '30', '#ffffff', 'small', '#ffffff', '#ffffff', '#dd9933', '#dd9933', '#ffffff', '18', '#dd9933', '#3e35ea', '#35eabd', '#dd9933', '#dd9933', '#dd9933', '#59becc', '#289171', 'Pagination 1', '#777777' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171', '#ffffff', '#ffffff', '#777777', '#ffffff', '#777777' ) );
	/*------- Style 8 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02, rw_timeline_03, rw_timeline_04) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 8', '4', '#ffffff', '#843256', '#ffffff', '#01913b', '20', 'Abadi MT Condensed Light', '#000000', '#ffffff', 'ASC', 'bounce', '#ffffff', '#ffffff', '1', '0', '#000000', '25', 'solid', '', 'angle', '#560eba', '30', '#01913b', 'small', '#ffffff', '#ffffff', '#000000', '#ffffff', '#01913b', '18', '#000000', '#3e35ea', '#35eabd', '#ffffff', '#01913b', '#01913b', '#59becc', '#289171', 'Pagination 1', '#777777' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover, rw_timeline_02, rw_timeline_03, rw_timeline_04, rw_timeline_05, rw_timeline_06) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171', '#ffffff', '#ffffff', '#777777', '#ffffff', '#777777' ) );
	/*------- Style 9 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 9', '5', '#ffffff', '#843256', '#000000', '#81d742', '20', 'Abadi MT Condensed Light', '#81d742', '#ffffff', 'ASC', 'shake', '#81d742', '#81d742', '1', '0', '#4ff7ae', '0', 'solid', '', 'chevron-circle', '#56912d', '30', '', 'small', '#ffffff', '#ffffff', '#3beaf9', '#000000', '', '18', '#81d742', '', '', '#59d600', '#56912d', '#56912d', '', '' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171' ) );
	/*------- Style 10 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 10', '5', '#ffffff', '#843256', '#000000', '#000000', '20', 'Abadi MT Condensed Light', '#f95b00', '#ffffff', 'ASC', 'fold', '#000000', '#000000', '1', '0', '#000000', '8', 'solid', '', 'caret', '#f95b00', '30', '', 'small', '#f4f4f4', '#f4f4f4', '#000000', '#000000', '', '18', '#f95b00', '', '', '#000000', '#f95b00', '#f95b00', '', '' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171' ) );
	/*------- Style 11 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 11', '6', '#ffffff', '#843256', '#000000', '#000000', '20', 'Abadi MT Condensed Light', '#f95b00', '#ffffff', 'ASC', 'fold', '#000000', '#000000', '1', '0', '#000000', '8', 'solid', '', 'caret', '#f95b00', '30', '', 'small', '#f4f4f4', '#f4f4f4', '#000000', '#000000', '', '18', '#f95b00', '', '', '#000000', '#f95b00', '#f95b00', '', '' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171' ) );
	/*------- Style 12 -------*/
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_title_bg_color, rw_timeline_round_border_col_hover, rw_timeline_01, rw_timeline_02) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 12', '6', '#ffffff', '#843256', '#000000', '#dd0000', '20', 'Abadi MT Condensed Light', '#dd0000', '#ffffff', 'ASC', 'slide', '#ffffff', '#dd0000', '1', '0', '#000000', '0', 'solid', '', 'long-arrow', '#dd0000', '22', '', 'small', '#ffffff', '#ffffff', '#000000', '#000000', '', '18', '#dd0000', '', '', '#dd0000', '#dd0000', '#dd0000', '', '' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171' ) );
}
$Rich_WebFStyleCountP = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name_3 WHERE rw_timeline_theme = %s", '7' ) );
if ( count( $Rich_WebFStyleCountP ) == 0 ) {
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_round_border_col_hover, rw_timeline_title_bg_color, rw_timeline_01, rw_timeline_02) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 13', '7', '#ffffff', '#51d3d6', '#ffffff', '#5c97e0', '20', 'Gabriola', '#59becc', '#ffffff', 'ASC', 'blind', '#3294d1', '#25e8e1', '1', '1', '#4ff7ae', '25', 'solid', '', 'angle', '#ffffff', '22', '#59becc', 'small', '#ffffff', '#f1f1f1', '#3beaf9', '#ffffff', '#14b6cc', '22', '#14b6cc', '#f1f1f1', '#f1f1f1', '#8c2d84', '#578bbf', '#578bbf', '#59becc', '#289171' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#2890e0', '#e8ab3a', '#5c97e0', '25', 'angle', '#3e35ea', '#289171' ) );

	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_3 (rw_timeline_title, rw_timeline_theme, rw_timeline_title_col, rw_timeline_border_col, rw_timeline_number_col, rw_timeline_line_col, rw_timeline_font_size, rich_web_timeline_fonts, rw_timeline_md_color, rw_timeline_hover_color, rw_timeline_sort, rw_timeline_effect, rw_timeline_round_bg, rw_timeline_round_bg_hover, rw_timeline_round_border_px, rw_timeline_border_px, rw_timeline_box_shadow, rw_timeline_box_shadow_px, rw_timeline_border_type_article, rw_timeline_border_type_line, rw_timeline_icon_type, rw_timeline_icon_color, rw_timeline_icon_size, rw_timeline_year_block_bg, rw_timeline_round_size, rw_timeline_bg_color, rw_timeline_bg_color_hover, rw_timeline_box_shadow_hover, rw_timeline_year_color_hover, rw_timeline_year_block_bg_hover, rw_timeline_year_size, rw_timeline_md_color_hover, rw_timeline_md_border_color, rw_timeline_md_border_color_hover, rw_timeline_round_border_col, rw_timeline_round_border_col_hover, rw_timeline_title_bg_color, rw_timeline_01, rw_timeline_02) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)", 'Style 14', '7', '#ffffff', '#dd3333', '#ffffff', '#5c97e0', '20', 'Andalus', '#000000', '#ffffff', 'ASC', 'fade', '#3294d1', '#25e8e1', '1', '0', '#d8d8d8', '25', 'solid', '', 'long-arrow', '#ffffff', '22', '#dd0000', 'small', '#ffffff', '#f1f1f1', '#d8d8d8', '#ffffff', '#ce0000', '17', '#000000', '#ffffff', '#ffffff', '#8c2d84', '#dd0000', '#dd0000', '#59becc', '#289171' ) );
	$max_id = $wpdb->insert_id;
	$wpdb->query( $wpdb->prepare( "INSERT INTO $table_name_5 (style_id, rw_timeline_month_col, rw_timeline_month_col_hov, rw_timeline_icon_col, rw_timeline_icon_size, rw_timeline_icon_style, rw_timeline_md_bg_color, rw_timeline_md_bg_color_hover) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", $max_id, '#681010', '#681010', '#dd0000', '25', 'long-arrow', '#e0e0e0', '#e0e0e0' ) );
}
?>