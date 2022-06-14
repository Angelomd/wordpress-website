<?php
/**
 * PhotoSwipe Lightbox for FooGallery Extension
 *
 * Implements the great "PhotoSwipe"-Lightbox of Dmitry Semenov in FooGallery
 *
 * @package   PhotoSwipe_Lightbox_FooGallery_Extension
 * @author    Martin Bergann
 * @license   GPL-2.0+
 * @link      https://www.coderey.de/wordpress-plugins/photoswipe-lightbox-for-foogallery/
 * @copyright 2020  Martin Bergann
 *
 * @wordpress-plugin
 * Plugin Name: PhotoSwipe-Lightbox for FooGallery
 * Description: Implements the great "PhotoSwipe"-Lightbox of Dmitry Semenov in FooGallery - based on code of "Photoswipe Masonry Gallery" plugin ( https://de.wordpress.org/plugins/photoswipe-masonry/ )
 * Version:     1.0.4
 * Author:      Martin Bergann
 * Author URI:  https://www.coderey.de
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if (!class_exists('PhotoSwipe_Lightbox_FooGallery_Extension')) {

    define('PHOTOSWIPE_LIGHTBOX_FOOGALLERY_EXTENSION_URL', plugin_dir_url(__FILE__));
    define('PHOTOSWIPE_LIGHTBOX_FOOGALLERY_EXTENSION_VERSION', '1.0.4');

    require_once('photoswipe-foogallery-init.php');

    class PhotoSwipe_Lightbox_FooGallery_Extension
    {
        const PHOTOSWIPE_VERSION = '4.1.3';

        /**
         * Wire up everything we need to run the extension
         */
        function __construct()
        {
            add_filter('foogallery_gallery_template_field_lightboxes', [$this, 'add_lightbox']);
            add_action('foogallery_template_lightbox-photoswipe', [$this, 'add_required_files']);
            add_filter('foogallery_attachment_html_link_attributes', [$this, 'add_html_attributes']);

            add_action('wp_enqueue_scripts', [$this, 'photoswipe_init']);
            add_action('save_post', [$this, 'photoswipe_save_post'], 10, 3);
        }

        /**
         * Add our lightbox to the lightbox dropdown on the gallery edit page
         */
        function add_lightbox($lightboxes)
        {
            $lightboxes['photoswipe'] = __('PhotoSwipe', 'foogallery-photoswipe');

            return $lightboxes;
        }

        /**
         * Add any JS or CSS required by the extension
         */
        function add_required_files()
        {
            //enqueue the lightbox script
            wp_enqueue_script(
                'photoswipe',
                PHOTOSWIPE_LIGHTBOX_FOOGALLERY_EXTENSION_URL . 'js/lightbox-photoswipe.js',
                ['jquery'],
                PHOTOSWIPE_LIGHTBOX_FOOGALLERY_EXTENSION_VERSION
            );
            //optional : enqueue the init code to hook up your lightbox
            //wp_enqueue_script( 'photoswipe_init', PHOTOSWIPE_LIGHTBOX_FOOGALLERY_EXTENSION_URL . 'js/lightbox-photoswipe-init.js', array('photoswipe'), PHOTOSWIPE_LIGHTBOX_FOOGALLERY_EXTENSION_VERSION );
            //enqueue the lightbox stylesheets
            foogallery_enqueue_style(
                'photoswipe',
                PHOTOSWIPE_LIGHTBOX_FOOGALLERY_EXTENSION_URL . 'css/lightbox-photoswipe.css',
                [],
                PHOTOSWIPE_LIGHTBOX_FOOGALLERY_EXTENSION_VERSION
            );
        }

        /**
         * Optional. Alter the anchor attributes so that the lightbox extension can work
         */
        function add_html_attributes($attr)
        {
            global $current_foogallery;

            $lightbox = foogallery_gallery_template_setting('lightbox');

            //if the gallery is using our lightbox, then alter the HTML so the lightbox script can find it
            if ('photoswipe' == $lightbox && isset ($attr['data-attachment-id'])) {
                //add custom attributes to the anchor
                $image_attributes = wp_get_attachment_image_src(
                    $attr['data-attachment-id'],
                    'original'
                );

                if ($image_attributes) {
                    $attr['data-size'] = $image_attributes[1] . 'x' . $image_attributes[2];
                }
            }

            return $attr;
        }

        public function photoswipe_init()
        {
            if (!is_admin()) {
                wp_enqueue_script(
                    'photoswipe-lib',
                    plugin_dir_url(__FILE__) . 'photoswipe/photoswipe.min.js',
                    [],
                    self::PHOTOSWIPE_VERSION
                );
                wp_enqueue_script(
                    'photoswipe-ui-default',
                    plugin_dir_url(__FILE__) . 'photoswipe/photoswipe-ui-default.min.js',
                    ['photoswipe-lib'],
                    self::PHOTOSWIPE_VERSION
                );

                wp_enqueue_script(
                    'photoswipe',
                    plugin_dir_url(__FILE__) . 'js/lightbox-photoswipe.js',
                    ['photoswipe-lib', 'photoswipe-ui-default', 'jquery'],
                    self::PHOTOSWIPE_VERSION
                );

                wp_enqueue_style(
                    'photoswipe-lib',
                    plugin_dir_url(__FILE__) . 'photoswipe/photoswipe.css',
                    false,
                    self::PHOTOSWIPE_VERSION
                );
                wp_enqueue_style(
                    'photoswipe-default-skin',
                    plugin_dir_url(__FILE__) . 'photoswipe/default-skin/default-skin.css',
                    false,
                    self::PHOTOSWIPE_VERSION
                );
                add_action('wp_footer', [$this, 'photoswipe_footer']);
            }
        }

        public function photoswipe_footer()
        {
            echo '
            <!-- Root element of PhotoSwipe. Must have class pswp. -->
            <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

                <!-- Background of PhotoSwipe.
                     It\'s a separate element as animating opacity is faster than rgba(). -->
                <div class="pswp__bg"></div>

                <!-- Slides wrapper with overflow:hidden. -->
                <div class="pswp__scroll-wrap">

                    <!-- Container that holds slides.
                        PhotoSwipe keeps only 3 of them in the DOM to save memory.
                        Don\'t modify these 3 pswp__item elements, data is added later on. -->
                    <div class="pswp__container">
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                        <div class="pswp__item"></div>
                    </div>

                    <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
                    <div class="pswp__ui pswp__ui--hidden">

                        <div class="pswp__top-bar">

                            <!--  Controls are self-explanatory. Order can be changed. -->

                            <div class="pswp__counter"></div>

                            <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                            <button class="pswp__button pswp__button--share" title="Share"></button>

                            <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                            <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                            <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                            <!-- element will get class pswp__preloader--active when preloader is running -->
                            <div class="pswp__preloader">
                                <div class="pswp__preloader__icn">
                                  <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                            <div class="pswp__share-tooltip"></div>
                        </div>

                        <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                        </button>

                        <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                        </button>

                        <div class="pswp__caption">
                            <div class="pswp__caption__center"></div>
                        </div>
                    </div>
                </div>
            </div>
            ';
        }

        public function photoswipe_save_post($post_id, $post, $update)
        {
            $post_content = $post->post_content;

            $new_content = preg_replace_callback(
                '/(<a((?!data\-size)[^>])+href=["\'])([^"\']*)(["\']((?!data\-size)[^>])*><img)/i',
                [$this, 'photoswipe_save_post_callback'],
                $post_content
            );

            if (!!$new_content && $new_content !== $post_content) {
                remove_action('save_post', [$this, 'photoswipe_save_post'], 10, 3);

                wp_update_post(['ID' => $post_id, 'post_content' => $new_content]);

                add_action('save_post', [$this, 'photoswipe_save_post'], 10, 3);
            }
        }

        public function photoswipe_save_post_callback($matches)
        {
            $before = $matches[1];
            $image_url = $matches[3];
            $after = $matches[4];

            $id = fjarrett_get_attachment_id_by_url($image_url);

            if ($id) {
                $image_attributes = wp_get_attachment_image_src($id, 'original');
                if ($image_attributes) {
                    $before = str_replace(
                        '<a ',
                        '<a data-size="' . $image_attributes[1] . 'x' . $image_attributes[2] . '" ',
                        $before
                    );
                }
            }

            return $before . $image_url . $after;
        }
    }
}

//https://frankiejarrett.com/2013/05/get-an-attachment-id-by-url-in-wordpress/

if (!function_exists('fjarrett_get_attachment_id_by_url')) {
    /**
     * Return an ID of an attachment by searching the database with the file URL.
     *
     * First checks to see if the $url is pointing to a file that exists in
     * the wp-content directory. If so, then we search the database for a
     * partial match consisting of the remaining path AFTER the wp-content
     * directory. Finally, if a match is found the attachment ID will be
     * returned.
     *
     * @param string $url The URL of the image (ex: http://mysite.com/wp-content/uploads/2013/05/test-image.jpg)
     *
     * @return int|null $attachment Returns an attachment ID, or null if no attachment is found
     */
    function fjarrett_get_attachment_id_by_url($url)
    {
        // Split the $url into two parts with the wp-content directory as the separator
        $parsed_url = explode(parse_url(WP_CONTENT_URL, PHP_URL_PATH), $url);

        // Get the host of the current site and the host of the $url, ignoring www
        $this_host = str_ireplace('www.', '', parse_url(home_url(), PHP_URL_HOST));
        $file_host = str_ireplace('www.', '', parse_url($url, PHP_URL_HOST));

        // Return nothing if there aren't any $url parts or if the current host and $url host do not match
        if (!isset($parsed_url[1]) || empty($parsed_url[1]) || ($this_host != $file_host)) {
            return;
        }

        // Now we're going to quickly search the DB for any attachment GUID with a partial path match
        // Example: /uploads/2013/05/test-image.jpg
        global $wpdb;
        $prefix = is_multisite() ? $wpdb->base_prefix : $wpdb->prefix;

        $attachment =
            $wpdb->get_col($wpdb->prepare("SELECT ID FROM {$prefix}posts WHERE guid RLIKE %s;", $parsed_url[1]));

        // Returns null if no attachment is found
        return $attachment[0];
    }
}
