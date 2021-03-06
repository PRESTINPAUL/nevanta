<?php

/**
 * Twenty Sixteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
/**
 * Twenty Sixteen only works in WordPress 4.4 or later.
 */
 
if (version_compare($GLOBALS['wp_version'], '4.4-alpha', '<')) {
    require get_template_directory() . '/inc/back-compat.php';
}

if (!function_exists('twentysixteen_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     *
     * Create your own twentysixteen_setup() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     */
    function twentysixteen_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Twenty Sixteen, use a find and replace
         * to change 'twentysixteen' to the name of your theme in all the template files
         */
        load_theme_textdomain('twentysixteen', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1200, 0, true);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'twentysixteen'),
            'social' => __('Social Links Menu', 'twentysixteen'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'status',
            'audio',
            'chat',
        ));

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, icons, and column width.
         */
        add_editor_style(array('css/editor-style.css', twentysixteen_fonts_url()));
    }

endif; // twentysixteen_setup
add_action('after_setup_theme', 'twentysixteen_setup');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_content_width() {
    $GLOBALS['content_width'] = apply_filters('twentysixteen_content_width', 840);
}

add_action('after_setup_theme', 'twentysixteen_content_width', 0);

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_widgets_init() {
    register_sidebar(array(
        'name' => __('Sidebar', 'twentysixteen'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Content Bottom 1', 'twentysixteen'),
        'id' => 'sidebar-2',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => __('Content Bottom 2', 'twentysixteen'),
        'id' => 'sidebar-3',
        'description' => __('Appears at the bottom of the content on posts and pages.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
	
	register_sidebar(array(
        'name' => __('Blog Sidebar', 'twentysixteen'),
        'id' => 'blog-sidebar',
        'description' => __('Add widgets here to appear in your blog sidebar.', 'twentysixteen'),
        'before_widget' => '<section id="%1$s" class="blog-sidebar widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'twentysixteen_widgets_init');

if (!function_exists('twentysixteen_fonts_url')) :

    /**
     * Register Google fonts for Twenty Sixteen.
     *
     * Create your own twentysixteen_fonts_url() function to override in a child theme.
     *
     * @since Twenty Sixteen 1.0
     *
     * @return string Google fonts URL for the theme.
     */
    function twentysixteen_fonts_url() {
        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Merriweather font: on or off', 'twentysixteen')) {
            $fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
        }

        /* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Montserrat font: on or off', 'twentysixteen')) {
            $fonts[] = 'Montserrat:400,700';
        }

        /* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Inconsolata font: on or off', 'twentysixteen')) {
            $fonts[] = 'Inconsolata:400';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
                    ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
    echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'twentysixteen_javascript_detection', 0);

/**
 * Enqueues scripts and styles.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_scripts() {
    // Add custom fonts, used in the main stylesheet.
    wp_enqueue_style('twentysixteen-fonts', twentysixteen_fonts_url(), array(), null);

    // Add Genericons, used in the main stylesheet.
    wp_enqueue_style('genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1');

    // Theme stylesheet.
    wp_enqueue_style('twentysixteen-style', get_stylesheet_uri());

    // Load the Internet Explorer specific stylesheet.
    wp_enqueue_style('twentysixteen-ie', get_template_directory_uri() . '/css/ie.css', array('twentysixteen-style'), '20150825');
    wp_style_add_data('twentysixteen-ie', 'conditional', 'lt IE 10');

    // Load the Internet Explorer 8 specific stylesheet.
    wp_enqueue_style('twentysixteen-ie8', get_template_directory_uri() . '/css/ie8.css', array('twentysixteen-style'), '20150825');
    wp_style_add_data('twentysixteen-ie8', 'conditional', 'lt IE 9');

    // Load the Internet Explorer 7 specific stylesheet.
    wp_enqueue_style('twentysixteen-ie7', get_template_directory_uri() . '/css/ie7.css', array('twentysixteen-style'), '20150825');
    wp_style_add_data('twentysixteen-ie7', 'conditional', 'lt IE 8');

    // Load the html5 shiv.
    wp_enqueue_script('twentysixteen-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3');
    wp_script_add_data('twentysixteen-html5', 'conditional', 'lt IE 9');

    wp_enqueue_script('twentysixteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20150825', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('twentysixteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array('jquery'), '20150825');
    }

    wp_enqueue_script('twentysixteen-script', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20150825', true);
	
	// VIDEO PLAYER JS
	if(!is_front_page() && !is_home())
	{
	 wp_enqueue_script('twentysixteen-media-player', get_template_directory_uri() . '/js/media-player.js', array('jquery'), '20150825', true);
	}
	 
    wp_localize_script('twentysixteen-script', 'screenReaderText', array(
        'expand' => __('expand child menu', 'twentysixteen'),
        'collapse' => __('collapse child menu', 'twentysixteen'),
    ));
}

add_action('wp_enqueue_scripts', 'twentysixteen_scripts');

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function twentysixteen_body_classes($classes) {
    // Adds a class of custom-background-image to sites with a custom background image.
    if (get_background_image()) {
        $classes[] = 'custom-background-image';
    }

    // Adds a class of group-blog to sites with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of no-sidebar to sites without active sidebar.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    return $classes;
}

add_filter('body_class', 'twentysixteen_body_classes');

/**
 * Converts a HEX value to RGB.
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function twentysixteen_hex2rgb($color) {
    $color = trim($color, '#');

    if (strlen($color) === 3) {
        $r = hexdec(substr($color, 0, 1) . substr($color, 0, 1));
        $g = hexdec(substr($color, 1, 1) . substr($color, 1, 1));
        $b = hexdec(substr($color, 2, 1) . substr($color, 2, 1));
    } else if (strlen($color) === 6) {
        $r = hexdec(substr($color, 0, 2));
        $g = hexdec(substr($color, 2, 2));
        $b = hexdec(substr($color, 4, 2));
    } else {
        return array();
    }

    return array('red' => $r, 'green' => $g, 'blue' => $b);
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/custom.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Twenty Sixteen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentysixteen_content_image_sizes_attr($sizes, $size) {
    $width = $size[0];

    840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

    if ('page' === get_post_type()) {
        840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    } else {
        840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
        600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
    }

    return $sizes;
}

add_filter('wp_calculate_image_sizes', 'twentysixteen_content_image_sizes_attr', 10, 2);

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Twenty Sixteen 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentysixteen_post_thumbnail_sizes_attr($attr, $attachment, $size) {
    if ('post-thumbnail' === $size) {
        is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
        !is_active_sidebar('sidebar-1') && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
    }
    return $attr;
}

add_filter('wp_get_attachment_image_attributes', 'twentysixteen_post_thumbnail_sizes_attr', 10, 3);

$mysqliConnect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("DB Connection failed" . mysql_error());

function get_connection(){
    if(!empty($GLOBALS['mysqliConnect']))
        return $GLOBALS['mysqliConnect'];
    else 
        return mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("DB Connection failed" . mysql_error());
}

mysqli_select_db(get_connection(),DB_NAME);

function getXbyY($query, $fetchType) {
    $con = get_connection();
    $queryResponse = mysqli_query($con, $query)or die($query . mysqli_error($con));
    $dbReturnArray = array();
    $i = 0;
    $fetchCommand = "mysqli_fetch_$fetchType";

    while (@$queryResponseRow = $fetchCommand($queryResponse)) {
        $dbReturnArray[$i] = $queryResponseRow;
        $i++;
    }

    return $dbReturnArray;
}

function setXbyY($query) {
    $con = get_connection();
    $queryResponse = mysqli_query($con, $query)or die($query . " " . mysqli_error($con));
    if (is_resource($queryResponse)) {
        return mysqli_fetch_array($queryResponse);
    } else {
        return $queryResponse;
    }
}

function getNumRows($query) {
    $con = get_connection();
    $queryResponse = mysqli_query($con, $query)or die($query . " " . mysqli_error($con));
    if ($queryResponse)
        return mysqli_num_rows($queryResponse);
}

// Display the search icon in the menu
function wpex_search_in_menu() {
    return true;
}

function navigationmenu($menuname) {
    $items = wp_get_nav_menu_items($menuname);
    $totalitems = count($items);
    //echo "<pre>";print_R($items);
    $sstring = "";
    for ($i = 0; $i < $totalitems; $i++) {

        if ($items[$i]->menu_item_parent == 0) {
            $flag = 1;
            if ($i == 0) {
                $sstring.="<li style='' class='dropdown'><a href='" . $items[$i]->url . "' class='dropdown-toggle'  role='button' aria-haspopup='true' aria-expanded='false'>Fashion</a>";
            } else {
                if ($items[$i + 1]->menu_item_parent == 0) {
                    $sstring.="<li style=''><a href='" . $items[$i]->url . "'>" . $items[$i]->title . "</a></li>";
                } else {
                    $sstring.="<li style='' class='dropdown' ><a href='" . $items[$i]->url . "' class='dropdown-toggle'>" . $items[$i]->title . "</a>";
                }
            }
        } else {
            if ($flag == 1) {
                $sstring.="<ul class='dropdown-menu'>";
            }
            $sstring.="<li><a href='" . $items[$i]->url . "'>" . $items[$i]->title . "</a></li>";
            if ($items[$i]->menu_item_parent != $items[$i + 1]->menu_item_parent) {
                $sstring.="</ul></li>";
            }
            $flag = 0;
        }
    }
    echo $sstring;
}

function navigationmenuinner($menuname) {
    $items = wp_get_nav_menu_items($menuname);
    $totalitems = count($items);
    //echo "<pre>";print_R($items);
    $sstring = "";
    for ($i = 0; $i < $totalitems; $i++) {

        if ($items[$i]->menu_item_parent == 0) {
            $sstring.="<li style='width:160px;' ><a href='" . $items[$i]->url . "'>" . $items[$i]->title . "</a></li>";
        }
    }
    echo $sstring;
}

function getsubmenu($menuname){
    $items = wp_get_nav_menu_items($menuname);
    $totalitems = count($items);
   // echo "<pre>";print_r($items);
    $sstring = "";
    for ($i = 0; $i < $totalitems; $i++) {

        if ($items[$i]->menu_item_parent == 0) {
            $flag = 1;
            if ($i == 0) {
				//$items[$i]->menu_item_parent
                $sstring.="<li class='dropdown '><a href='" . $items[$i]->url . "' class='dropdown-toggle' role='button' aria-haspopup='true' aria-expanded='false'>Fashion</a>";
            } else {
                if ($items[$i + 1]->menu_item_parent == 0) {
					 $pt = get_the_title();
            if($items[$i]->title == $pt){$active = 'active';}else{$active ='';}
                    $sstring.="<li class='".$active."'><a href='" . $items[$i]->url . "'>" . $items[$i]->title . "</a></li>";
                } else {
                    $sstring.="<li class='dropdown' ><a href='" . $items[$i]->url . "' class='dropdown-toggle'>" . $items[$i]->title . "</a>";
                }
            }
        } else {
            if ($flag == 1) {
                $sstring.="<ul class='dropdown-menu'>";
            }
            $pt = get_the_title();
            if($items[$i]->title == $pt){
                $liclass = "white";
            }else{
                $liclass = "grey";
            }
            $sstring.="<li ><a href='" . $items[$i]->url . "' ><span class='".$liclass."'>" . $items[$i]->title . "</span></a></li>";
            if ($items[$i]->menu_item_parent != $items[$i + 1]->menu_item_parent) {
                $sstring.="</ul></li>";
            }
            $flag = 0;
        }
    }
    echo $sstring;
}

function navigationmenufooter($menuname) {
    $items = wp_get_nav_menu_items($menuname);
    $totalitems = count($items);
    //echo "<pre>";print_R($items);
    $sstring = "";
    for ($i = 0; $i < $totalitems; $i++) {

        if ($items[$i]->menu_item_parent == 0) {
            $sstring.="<li><a href='" . $items[$i]->url . "'>" . $items[$i]->title . "</a></li>";
        }
    }
	$sstring.="<li><a href='" . esc_url( get_permalink(52) ) . "'>Contact Us</a></li>";
    echo $sstring;
}

function userimage($userID, $dim) {
    if ($userID == "") {
        $userID = 0;
    }

    $sqlUSER = "SELECT * FROM wp_usermeta WHERE meta_key = 'cupp_upload_meta' and user_id = $userID";
    $resUSER = getXbyY($sqlUSER, "array");
    $rowUSER = count($resUSER);
//echo $rowUSER."ravi";
//die;
    if ($rowUSER > 0) {
        $imageNAME = $resUSER[0]['meta_value'];
        $iNAME = explode(".", $imageNAME);
        $rowNAME = count($iNAME);
        $eNAME = $iNAME[$rowNAME - 1];
        $newEXT = "-" . $dim . "x" . $dim;
        $newNAME = str_replace(".$eNAME", "$newEXT.$eNAME", $imageNAME);
        return $newNAME;
        //$largeVERSION = 
        //return $resUSER[0]['meta_value'];
    } else {
        return NULL;
    }
}

$user_agent = $_SERVER['HTTP_USER_AGENT'];

function getOS() {

    global $user_agent;

    $os_platform = "Unknown OS Platform";

    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );

    foreach ($os_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }

    return $os_platform;
}

function getBrowser() {

    global $user_agent;

    $browser = "Unknown Browser";

    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );

    foreach ($browser_array as $regex => $value) {

        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    return $browser;
}

function checkos(){
    $user_os        =   getOS();
    return $user_os;
}

function getVIDEO($postID = "0") {
    $tagLINE = get_post_custom($postID);
    echo $tagLINE['video_file'][0];
}
function getVIEWS($postID = "0") {
    $tagLINE = get_post_custom($postID);
    //echo "<pre>";print_R($tagLINE);
    echo $tagLINE['post_views_count'][0];
}
function getAUTHORrole($authorID = "0"){
    $authorINFO = get_the_author_meta( "roles", $authorID );
    echo ucwords(str_replace("_", " ", $authorINFO[0]));
    
}
function getAUTHORdesc($authorID = "0"){
    $authorINFO = get_the_author_meta( "description", $authorID );
    print_R($authorINFO);
    //echo $authorINFO[0];    
}
function getAUTHORurl($authorID = "0"){
    $authorINFO = get_the_author_meta( "user_nicename", $authorID );
    print_R($authorINFO);
    //echo $authorINFO[0];    
}
// Our custom post type function
/*add_action( 'init', 'create_financialblog' );
function create_financialblog() {

	register_post_type( 'fashion-designers',
	// CPT Options
		array(
			'labels' => array(
				'name' => __( 'Fashion Designers' ),
				'singular_name' => __( 'Fashion Designers' ),
				'all_items'       => __( 'All Posts' )
			),
			 'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields'),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'fashion_designers'),
		)
	);
}
// Hooking up our function to theme setup
$args = array(
  'hierarchical'      => true,
  'labels' => array(
    'name' => __( 'Categories' ),
    'singular_name' => __( 'Categories' )
   ),
 
  'show_ui'           => true,
  'show_admin_column' => true,
  'query_var'         => true,
  'rewrite'           => array( 'slug' => 'fashion_designers_categories' ),
   
 );

 register_taxonomy( 'fashion_designers_categories', array( 'fashion-designers' ), $args );
 */


// Display Popular Posts by Views
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
	//echo 'Count: '.$count;exit;
    if($count==''){
        $count = 150;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, $count);
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 


function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');


// Filter to fix the Post Author Dropdown
add_filter('wp_dropdown_users', 'theme_post_author_override');
function theme_post_author_override($output)
{
	global $post;
  // return if this isn't the theme author override dropdown
  if (!preg_match('/post_author_override/', $output)) return $output;

  // return if we've already replaced the list (end recursion)
  if (preg_match ('/post_author_override_replaced/', $output)) return $output;

  // replacement call to wp_dropdown_users
 $output = wp_dropdown_users(array(
   'echo' => 0,
  'name' => 'post_author_override_replaced',
  'selected' => empty($post->ID) ? $user_ID : $post->post_author,
  'include_selected' => true
 ));

 // put the original name back
 $output = preg_replace('/post_author_override_replaced/', 'post_author_override', $output);

  return $output;
}


add_action( 'init', 'create_season_taxonomies', 0 );
function create_season_taxonomies() {
$labels = array(
		'name'              => _x( 'Season', 'taxonomy general name' ),
		'singular_name'     => _x( 'Season', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Season' ),
		'all_items'         => __( 'All Season' ),
		'parent_item'       => __( 'Parent Season' ),
		'parent_item_colon' => __( 'Parent Season:' ),
		'edit_item'         => __( 'Edit Season' ),
		'update_item'       => __( 'Update Season' ),
		'add_new_item'      => __( 'Add New Season' ),
		'new_item_name'     => __( 'New Season Name' ),
		'menu_name'         => __( 'Season' ),
	);
$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'               => array( 'slug' => 'season' ),
	);

	register_taxonomy( 'season', array( 'post' ), $args );
	
	
$label_designers = array(
		'name'              => _x( 'Designers', 'taxonomy general name' ),
		'singular_name'     => _x( 'Designer', 'taxonomy singular name' ),
		'search_items'      => __( 'Designer Season' ),
		'all_items'         => __( 'All Designers' ),
		'parent_item'       => __( 'Parent Designer' ),
		'parent_item_colon' => __( 'Parent Designer:' ),
		'edit_item'         => __( 'Edit Designer' ),
		'update_item'       => __( 'Update Designer' ),
		'add_new_item'      => __( 'Add New Designer' ),
		'new_item_name'     => __( 'New Designer Name' ),
		'menu_name'         => __( 'Designer' ),
	);
$args = array(
		'hierarchical'      => true,
		'labels'            => $label_designers,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'               => array( 'slug' => 'designer' ),
	);

	register_taxonomy( 'designer', array( 'post' ), $args );	
}
function wpdocs_scripts_method() {
    wp_enqueue_script( 'selectric-script', get_stylesheet_directory_uri() . '/js/jquery.selectric.1.11.min.js', array( 'jquery' ) );
    wp_enqueue_script( 'selectric-sortable', get_stylesheet_directory_uri() . '/js/changes/main.min.js', array('selectric-script') );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_scripts_method' );


/*function my_post_limit($limit) { 
	global $paged, $myOffset;
	if (empty($paged)) {
			$paged = 1;
	}
	$postperpage = 30;
	$pgstrt = ((intval($paged) -1) * $postperpage) + $myOffset . ', ';
	$limit = 'LIMIT '.$pgstrt.$postperpage;
	return $limit;
}*/ //end function my_post_limit

add_action('init', 'myStartSession', 1);
function myStartSession() {
    if(!session_id()) {
        session_start();
    }
}

add_filter('wpseo_replacements', 'searchuser_wpseo_replacements');
function searchuser_wpseo_replacements($vars){
	if(isset($_GET['a']))
	{
    $vars['%%searchuser%%'] = $_GET['a'];
    return $vars;}
	else
	{
		return $vars;
	}
	
}

add_action('init','WPSE_1595_image_post');
function WPSE_1595_image_post() {
	
	
	
	//echo "<pre>"; print_r($month);
	//$wp_upload_dir =  wp_upload_dir();
	//echo '<pre>'; print_r($wp_upload_dir);
	//echo $wp_upload_dir['basedir'].'/'.$path;
    // The actual folder
    //$wp_upload_images = $wp_upload_dir['basedir'].'/'.$path;
	//echo 'anirudh'; $wp_upload_images; 
//echo '<pre>'; print_r($_POST['month']);
//echo '<pre>'; print_r($_POST['path']);
//echo '<pre>'; print_r($_POST['year']);
$uri = $_SERVER['REQUEST_URI'];
if($uri == '/image-upload-script/'){
	
	if ( isset( $_POST['month'] ) && '' != $_POST['month'] ) {
	$month = $_POST["month"];
	$newyear = $_POST["newyear"];
	$floderpath = $_POST["floderpath"];
	
    // We need to use the default uploads dir
    $wp_upload_dir =  wp_upload_dir();
    // The actual folder
    $wp_upload_images = $wp_upload_dir['basedir'].'/'.$floderpath;
	
	
	 //print_r($wp_upload_images);
	 
	
    require_once(ABSPATH . 'wp-admin/includes/image.php');

	$args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'year'     => $newyear,
			'monthnum' => $month,
			'post_type'        => 'post',
			'post_status'      => 'draft',
			'suppress_filters' => true 
		);
		//echo print_r($args);
		$myposts = get_posts( $args );
		

if (file_exists($wp_upload_images )) {
   // echo "The file $filename exists";
	
   // foreach (new DirectoryIterator($wp_upload_images) as $fileInfo) {

   //     if($fileInfo->isDot()) continue;

   //     $image_base = $fileInfo->getFilename();
   //     $image_name_ori = trim(pathinfo($fileInfo, PATHINFO_FILENAME));
		
		//$image_name = strtolower($image_name);
	//	$image_name = str_replace(" ", "_", $image_name_ori);
		//echo $image_name.'<br/>';
	//	$wp_filetype = wp_check_filetype($image_base, null );
		
		foreach ( $myposts as $post ) : setup_postdata( $post ); 
		//print_r($post);
			 $post_title = trim($post->post_title);
			//$post_title = str_replace(" ", "_", $post_title);
			$post_title = str_replace("!", "", $post_title);
			$post_title = str_replace("?", "", $post_title); 
			$post_id = $post->ID;
			$new_image = $post_title;
			$new_image_w_path = $wp_upload_images."/".$new_image;
			$new_image_w_extension = "";
			$new_image_sjpg = $new_image_w_path.".jpg";
			$new_image_ljpg = $new_image_w_path.".JPG";
			$new_image_spng = $new_image_w_path.".png";
			$new_image_lpng = $new_image_w_path.".PNG";
			$image_found = 0;
			//echo $new_image_sjpg;
			if (file_exists($new_image_sjpg)) {
				$new_image_w_path = $new_image_sjpg;
				$new_image_w_extension = $new_image.".jpg";
				$image_found = 1;
			}
			else if (file_exists($new_image_spng)) {
				$new_image_w_path = $new_image_spng;
				$new_image_w_extension = $new_image.".png";
				$image_found = 1;
			}
			else if (file_exists($new_image_ljpg)) {
				$new_image_w_path = $new_image_ljpg;
				$new_image_w_extension = $new_image.".JPG";	
				$image_found = 1;				
			}
			else if (file_exists($new_image_lpng)) {
				$new_image_w_path = $new_image_lpng;
				$new_image_w_extension = $new_image.".PNG";	
				$image_found = 1;
			}
			if($image_found == 0)
			{continue;}
			$image_name = str_replace(" ", "_", $new_image);
			//echo $new_image_w_path;
			//echo $wp_upload_images . '/' . $image_base.'<br/>';
			//echo 'Image_name:'.$image_name.'<br/>';
			//echo $post_title.'<br/>';
			//if ($image_name == $post_title) {
					$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
					$path_parts = pathinfo($feat_image);
					$title = get_post(get_post_thumbnail_id())->post_title; //The Title
					$caption = get_post(get_post_thumbnail_id())->post_excerpt; //The Caption
				//	echo $path_parts['filename'].'<br/>';
					//echo $image_name_ori.'<br/>';
					if($path_parts['filename'] != $new_image){
					 //Customize this attachment data as you wish
					 //echo $image_name.'<br/>';
					 $wp_filetype = wp_check_filetype($new_image_w_path, null );
					 
					$attachment = array(
						 'guid' => $new_image_w_path, 
						 'post_mime_type' => $wp_filetype['type'],
						 'post_title' => $image_name,
						 'post_content' => '',
						 'post_status' => 'inherit'
					);
					//require for wp_generate_attachment_metadata which generates image related meta-data also creates thumbs
					//require_once ABSPATH . 'wp-admin/includes/image.php';
					$imagefile = $new_image_w_path;
					$attach_id = wp_insert_attachment( $attachment, $imagefile, $post_id );
					$attach_data = wp_generate_attachment_metadata( $attach_id, $imagefile );
			
					wp_update_attachment_metadata( $attach_id, $attach_data );
					delete_post_meta( $post_id, '_thumbnail_id' );
					add_post_meta( $post_id , '_thumbnail_id' , $attach_id, true );
					//set_post_thumbnail( $post_id, $attach_id );
					}
				
			//}
			
		endforeach;
		wp_reset_postdata();
				
    //}   // eof foreach
}
	else {
    echo "<h3 style='color: #fff; text-align: center;'>The folder $floderpath does not exist</h3>";
}
		}
}
}

/* blog page function */
// create custom post type blogs
function blog_create_post_type() {
		$labels = array(
			'name' => 'Blog',
			'singular_name' => 'Blog',
			'add_new' => 'Add blog',
			'all_items' => 'All blogs',
			'add_new_item' => 'Add blog',
			'edit_item' => 'Edit blog',
			'new_item' => 'New blog',
			'view_item' => 'View blog',
			'search_items' => 'Search blogs',
			'not_found' => 'No blogs found',
			'not_found_in_trash' => 'No blogs found in trash',
			'parent_item_colon' => 'Parent blog'
			//'menu_name' => default to 'name'
		);
		$args = array(
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array(
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'author',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'page-attributes', // (menu order, hierarchical must be true to show Parent option)
				'post-formats',
			),
			//'taxonomies' => array( 'blog_category', 'blog_post_tag' ), // add default post categories and tags
			'menu_position' => 5,
			'exclude_from_search' => false,
			'register_meta_box_cb' => 'blog_add_post_type_metabox'
		);
		register_post_type( 'blog', $args );
		//flush_rewrite_rules();
		
		register_taxonomy( 'blog_category', // register custom taxonomy - category
			'blog',
			array(
				'hierarchical' => true,
				'labels' => array(
					'name' => 'Blog category',
					'singular_name' => 'Blog category',
				)
			)
		);
		register_taxonomy( 'blog_tag', // register custom taxonomy - tag
			'blog',
			array(
				'hierarchical' => false,
				'labels' => array(
					'name' => 'Blog tag',
					'singular_name' => 'Blog tag',
				)
			)
		);
	}
	add_action( 'init', 'blog_create_post_type' );
	
/**
 * Adds a meta box for featured and editors pick check boxes to the post editing screen
 */
function blog_featured_meta() {
    add_meta_box( 'featured_post', __( 'Featured Post', 'blog-textdomain' ), 'featured_post_callback', 'blog', 'normal', 'high' );
    add_meta_box( 'editors_pick_post', __( "Editor's Pick", 'blog-textdomain' ), 'editors_pick_callback', 'blog', 'normal', 'high' );
	
	add_meta_box( 'trending_stories_post', __( "Trending Story", 'blog-textdomain' ), 'trending_stories_callback', 'blog', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'blog_featured_meta' );

/**
 * Outputs the content of the meta box for featured check box
 */

function featured_post_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'wp_nonce' );
    $wp_stored_meta = get_post_meta( $post->ID );
    ?>

 <p>
    <span class="prfx-row-title"><?php _e( 'Check if this is a featured post: ', 'blog-textdomain' )?></span>
    <div class="prfx-row-content">
        <label for="featured_post">
            <input type="checkbox" name="featured_post" id="featured_post" value="yes" <?php if ( isset ( $wp_stored_meta['featured_post'] ) ) checked( $wp_stored_meta['featured_post'][0], 'yes' ); ?> />
            <?php _e( 'Featured Post', 'blog-textdomain' )?>
        </label>

    </div>
</p>   

    <?php
}

/**
 * Outputs the content of the meta box for trending stories check box
 */

function trending_stories_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'wp_nonce' );
    $wp_stored_meta = get_post_meta( $post->ID );
    ?>

 <p>
    <span class="prfx-row-title"><?php _e( 'Check if this is a trending story: ', 'blog-textdomain' )?></span>
    <div class="prfx-row-content">
        <label for="trending_stories_post">
            <input type="checkbox" name="trending_stories_post" id="trending_stories_post" value="yes" <?php if ( isset ( $wp_stored_meta['trending_stories_post'] ) ) checked( $wp_stored_meta['trending_stories_post'][0], 'yes' ); ?> />
            <?php _e( "Trending Story", 'blog-textdomain' )?>
        </label>

    </div>
</p>   

    <?php
}

/**
 * Outputs the content of the meta box for editors pick check box
 */

function editors_pick_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'wp_nonce' );
    $wp_stored_meta = get_post_meta( $post->ID );
    ?>

 <p>
    <span class="prfx-row-title"><?php _e( 'Check if this is a editors pick: ', 'blog-textdomain' )?></span>
    <div class="prfx-row-content">
        <label for="editors_pic_post">
            <input type="checkbox" name="editors_pic_post" id="editors_pic_post" value="yes" <?php if ( isset ( $wp_stored_meta['editors_pic_post'] ) ) checked( $wp_stored_meta['editors_pic_post'][0], 'yes' ); ?> />
            <?php _e( "Editor's Pick", 'blog-textdomain' )?>
        </label>

    </div>
</p>   

    <?php
}

/**
 * Saves the custom meta input
 */
function featured_meta_save( $post_id ) {

    // Checks save status - overcome autosave, etc.
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'wp_nonce' ] ) && wp_verify_nonce( $_POST[ 'wp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

	// Checks for input and saves - save checked as yes and unchecked at no
	if( isset( $_POST[ 'featured_post' ] ) ) {
		update_post_meta( $post_id, 'featured_post', 'yes' );
	} else {
		update_post_meta( $post_id, 'featured_post', 'no' );
	}
	
	// Checks for input and saves - save checked as yes and unchecked at no
	if( isset( $_POST[ 'editors_pic_post' ] ) ) {
		update_post_meta( $post_id, 'editors_pic_post', 'yes' );
	} else {
		update_post_meta( $post_id, 'editors_pic_post', 'no' );
	}
	
	if( isset( $_POST[ 'trending_stories_post' ] ) ) {
		update_post_meta( $post_id, 'trending_stories_post', 'yes' );
	} else {
		update_post_meta( $post_id, 'trending_stories_post', 'no' );
	}
	
}
add_action( 'save_post', 'featured_meta_save' );
/**
 * End of Adds a meta box for featured and editors pick check boxes to the post editing screen
 */

// Creating the widget Blog Categories
class blog_categories extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'blog_categories', 

		// Widget name will appear in UI
		__('Blog Categories', 'blog_categories_domain'), 

		// Widget description
		array( 'description' => __( 'Display Blog Categories.', 'blog_categories_domain' ), ) 
		);
	}
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];

	 
	$taxonomy = 'blog_category';
	$tax_terms = get_terms($taxonomy);
	?>
	<div class="blog-sidebar-categories">
	<?php
	foreach ($tax_terms as $tax_term) {
		echo '
			<h4><a href="'.esc_attr(get_term_link($tax_term, $taxonomy)).'" title="'. sprintf( __( "View all posts in %s" ), $tax_term->name ).'">' . $tax_term->name.'</a></h4>
		';
	
	}?>
	</div>
	<?php
	// This is where you run the code and display the output
	//echo __( ''. $ikon_cat .'' , 'ikon_coruses_categories_domain' );
	echo $args['after_widget'];
	}
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Categories:', 'blog_categories_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 
	}
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}
// Class blog_categories ends here

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'blog_categories' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

// Creating the widget Trending Stories
class trending_stories extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'trending_stories', 

		// Widget name will appear in UI
		__('Trending Stories', 'trending_stories_domain'), 

		// Widget description
		array( 'description' => __( 'Display Trending Stories', 'trending_stories_domain' ), ) 
		);
	}
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		$orig_post_trending = $post;
		global $post;
		$type = 'blog';
		$args_trending=array(
			'post_type' => $type,
			'post_status' => 'publish',
			'posts_per_page'=>3, // Number of related posts to display.
			/*'meta_key' => 'wpb_post_views_count',
			'orderby' => 'meta_value_num',*/
			'meta_query' => array(
				array(
					'key'     => 'trending_stories_post',
					'value'   => 'yes',
					'compare' => '=',
				)
			),
			'order' => 'DESC',
			'orderby'=> 'modified',
			'caller_get_posts'=>1,
		);

		$my_query_trending = new WP_Query( $args_trending );
		//echo '<pre>'.print_r($my_query_trending, true).'</pre>';
		if($my_query_trending->have_posts()):
		?>
		<div class="trending-stories">
			<?php while( $my_query_trending->have_posts() ): $my_query_trending->the_post(); 
				$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
				$imagename = basename($image_data[0]);
				$thumb_width = 90;
				$thumb_height = 85;
			
				if(!file_exists(get_bloginfo('url').'/wp-content/uploads/crop-trending-stories/'.$imagename)){
			
					if(exif_imagetype($image_data[0]) == IMAGETYPE_JPEG)
					$image = imagecreatefromjpeg($image_data[0]);
					else if(exif_imagetype($image_data[0]) == IMAGETYPE_PNG)
					$image = imagecreatefrompng($image_data[0]);
					
					$filename = 'wp-content/uploads/crop-trending-stories/'.$imagename;
					
					$width = imagesx($image);
					$height = imagesy($image);

					$original_aspect = $width / $height;
					$thumb_aspect = $thumb_width / $thumb_height;

					if ( $original_aspect >= $thumb_aspect )
					{
					   // If image is wider than thumbnail (in aspect ratio sense)
					   $new_height = $thumb_height;
					   $new_width = $width / ($height / $thumb_height);
					}
					else
					{
					   // If the thumbnail is wider than the image
					   $new_width = $thumb_width;
					   $new_height = $height / ($width / $thumb_width);
					}

					$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

					// Resize and crop
					imagecopyresampled($thumb,
									   $image,
									   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
									   0, // Center the image vertically
									   0, 0,
									   $new_width, $new_height,
									   $width, $height);
					imagejpeg($thumb, $filename, 100);
					$imagesrc = get_bloginfo('url').'/'.$filename;
					$s3->putObjectFile($fileTempName, "nevanta", $filename, S3::ACL_PUBLIC_READ);
				}
				else{
					$imagesrc = get_bloginfo('url').'/wp-content/uploads/crop-trending-stories/'.$imagename;
				}
			?>
				<div class="col-md-6 trending-stories-thumbnail-div">
					<a href="<?php the_permalink(); ?>"><img class="img-res" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" /></a>
				</div>
				<div class="col-md-6 trending-stories-title-div">
					<a href="<?php the_permalink(); ?>" class="trending-stories-title"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></a>
				</div>
			<?php endwhile;	?>
		</div>
		<?php
		endif;
		$post = $orig_post_trending;
		wp_reset_query();
		// This is where you run the code and display the output
		echo $args['after_widget'];
	}
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Trending Stories', 'trending_stories_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 
	}
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}
// Class trending_stories ends here

// Register and load the widget
function wpb_load_widget_trending() {
	register_widget( 'trending_stories' );
}
add_action( 'widgets_init', 'wpb_load_widget_trending' );

// Creating the widget Editor's Pick
class editors_pick extends WP_Widget {

	function __construct() {
		parent::__construct(
		// Base ID of your widget
		'editors_pick', 

		// Widget name will appear in UI
		__("Editor's Pick", 'editors_pick_domain'), 

		// Widget description
		array( 'description' => __( "Display Editor's Pick", 'editors_pick_domain' ), ) 
		);
	}
	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		$orig_post_editors_pick = $post;
		global $post;
		$type = 'blog';
		$args_editors_pick=array(
			'post_type' => $type,
			'post_status' => 'publish',
			'posts_per_page'=> 4, // Number of related posts to display.
			'meta_query' => array(
				array(
					'key'     => 'editors_pic_post',
					'value'   => 'yes',
					'compare' => '=',
				)
			),
			'order' => 'DESC',
			'caller_get_posts'=>1,
		);

		$my_query_editors_pick = new WP_Query( $args_editors_pick );
		//echo '<pre>'.print_r($my_query_trending, true).'</pre>';
		if($my_query_editors_pick->have_posts()):
		?>
		<div class="editors-pick">
			<?php while( $my_query_editors_pick->have_posts() ): $my_query_editors_pick->the_post(); 
				$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
				$imagename = basename($image_data[0]);
				$thumb_width = 90;
				$thumb_height = 85;
			
				if(!file_exists(get_bloginfo('url').'/wp-content/uploads/crop-editors-pick/'.$imagename)){
			
					if(exif_imagetype($image_data[0]) == IMAGETYPE_JPEG)
					$image = imagecreatefromjpeg($image_data[0]);
					else if(exif_imagetype($image_data[0]) == IMAGETYPE_PNG)
					$image = imagecreatefrompng($image_data[0]);
					
					$filename = 'wp-content/uploads/crop-editors-pick/'.$imagename;
					
					$width = imagesx($image);
					$height = imagesy($image);

					$original_aspect = $width / $height;
					$thumb_aspect = $thumb_width / $thumb_height;

					if ( $original_aspect >= $thumb_aspect )
					{
					   // If image is wider than thumbnail (in aspect ratio sense)
					   $new_height = $thumb_height;
					   $new_width = $width / ($height / $thumb_height);
					}
					else
					{
					   // If the thumbnail is wider than the image
					   $new_width = $thumb_width;
					   $new_height = $height / ($width / $thumb_width);
					}

					$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

					// Resize and crop
					imagecopyresampled($thumb,
									   $image,
									   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
									   0, // Center the image vertically
									   0, 0,
									   $new_width, $new_height,
									   $width, $height);
					imagejpeg($thumb, $filename, 100);
					$imagesrc = get_bloginfo('url').'/'.$filename;
					$s3->putObjectFile($fileTempName, "nevanta", $filename, S3::ACL_PUBLIC_READ);
				}
				else{
					$imagesrc = get_bloginfo('url').'/wp-content/uploads/crop-editors-pick/'.$imagename;
				}
			?>
				<div class="col-md-6 editors-pick-thumbnail-div">
					<a href="<?php the_permalink(); ?>"><img class="img-res" src="<?php echo $imagesrc; ?>" width="<?php echo $thumb_width; ?>" height="<?php echo $thumb_height; ?>" /></a>
				</div>
				<div class="col-md-6 editors-pick-title-div">
					<a href="<?php the_permalink(); ?>" class="editors-pick-title"><?php echo wp_trim_words(get_the_title(), 8, '...'); ?></a>
				</div>
			<?php endwhile;	?>
		</div>
		<?php
		endif;
		$post = $orig_post_editors_pick;
		wp_reset_query();
		// This is where you run the code and display the output
		echo $args['after_widget'];
	}
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( "Editor's Pick", 'editors_pick_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
	<?php 
	}
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}
}
// Class editors_pick ends here

// Register and load the widget
function wpb_load_widget_editors_pick() {
	register_widget( 'editors_pick' );
}
add_action( 'widgets_init', 'wpb_load_widget_editors_pick' );
/* end of blog page function */

/*Remove featured images srcset tag */
add_filter( 'max_srcset_image_width', create_function( '', 'return 1;' ) );

/*create custom size images**/
/*
if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'new-size', 350, 250, array( 'left', 'top' ) ); //(cropped)
}
add_filter('image_size_names_choose', 'my_image_sizes');
function my_image_sizes($sizes) {
$addsizes = array(
"new-size" => __( "New Size")
);
$newsizes = array_merge($sizes, $addsizes);
return $newsizes;
}


function register_fields()
{
    register_setting('media', 'my_first_field', 'esc_attr');
    add_settings_field('my_first_field', '<label for="my_first_field">'.__('Custom Size First' , 'my_first_field' ).'</label>' , 'print_first_field', 'media');		
	
    register_setting('media', 'my_second_field', 'esc_attr');
    add_settings_field('my_second_field', '<label for="my_second_field">'.__('Custom Size Second' , 'my_second_field' ).'</label>' , 'print_second_field', 'media');
	
	register_setting('media', 'my_third_field', 'esc_attr');
    add_settings_field('my_third_field', '<label for="my_third_field">'.__('Custom Size Third' , 'my_third_field' ).'</label>' , 'print_third_field', 'media');
	
}

function print_first_field()
{
    $value = get_option( 'my_first_field', '' );
    echo '<input type="text" id="my_first_field" name="my_first_field" value="' . $value . '" />';
}

function print_second_field()
{
    $value = get_option( 'my_second_field', '' );
    echo '<input type="text" id="my_second_field" name="my_second_field" value="' . $value . '" />';
}

function print_third_field()
{
    $value = get_option( 'my_third_field', '' );
    echo '<input type="text" id="my_third_field" name="my_third_field" value="' . $value . '" />';
}

add_filter('admin_init', 'register_fields');
*/