<?php
/**
* Plugin main class
*
*
*/


if ( !class_exists( 'Sticky_Floating_Forms_Lite' ) ):

    class Sticky_Floating_Forms_Lite {

        /**
         * A reference to an instance of this class.
         *
         * @since  1.0.0
         * @access private
         * @var    object
         */
        private static $instance = null;


         /**
         * Returns the instance.
         *
         * @since  1.0.0
         * @access public
         * @return object
         */
        public static function get_instance() {
            // If the single instance hasn't been set, set it now.
            if ( null == self::$instance ) {
                self::$instance = new self;
            }
            return self::$instance;
        }

        /**
         * Sets up needed actions/filters for the plugin to initialize.
         *
         * @since 1.0.0
         * @access public
         * @return void
         */
        public function __construct() {

            // Load translation files
            add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

            add_action('wp_enqueue_scripts',array ($this, 'load_frontend_scripts') );
            add_action('admin_enqueue_scripts', array($this,'load_admin_scripts') );
            add_filter( 'plugin_action_links_' . STICKY_FLOATING_FORMS_LITE_BASENAME, array($this,'plugin_pro_link_action') );
            
        }


        /**
         * Loads the translation files.
         *
         * @since 1.0.0
         * @access public
         * @return void
         */
        public function load_plugin_textdomain() {

            load_plugin_textdomain( 'sticky-floating-forms-lite', false, basename( dirname( __FILE__ ) ) . '/languages' );
        }





        /**
        * Enqueue scripts for frontend
        */
        function load_frontend_scripts() {

            $settings       = Sticky_Floating_Forms_Lite_Settings::get_settings();
            
            $open_type      = $settings['open_type'];

            $view_assets = STICKY_FLOATING_FORMS_LITE_URL.'assets/';
            $adm_assets = STICKY_FLOATING_FORMS_LITE_URL.'admin/assets/';
           

            wp_register_style( 'sticky-floating-forms-lite-frontend', $view_assets . 'css/frontend.css', array(), STICKY_FLOATING_FORMS_LITE_VER );
            wp_register_script( 'sticky-floating-forms-lite-frontend', $view_assets . 'js/frontend.js', array( 'jquery' ), STICKY_FLOATING_FORMS_LITE_VER, true );

            $localize_options =  array(
                'ajaxurl'       => admin_url( 'admin-ajax.php'),
                'open_type'     => esc_html($open_type)
                );

            wp_localize_script( 'sticky-floating-forms-lite-frontend', 'sff_data', $localize_options  );
            wp_enqueue_script( 'sticky-floating-forms-lite-frontend' );

        }

        


       

        /**
        * enque scripts for backend
        *
        */
        function load_admin_scripts() {

          $adm_assets = STICKY_FLOATING_FORMS_LITE_URL.'/admin/assets/';

          if( isset( $_GET['page'] ) && $_GET['page'] == 'sticky-floating-forms-lite' ) {

  
            wp_enqueue_style( 'sticky-floating-forms-lite-admin', $adm_assets . 'css/admin.css', array(), STICKY_FLOATING_FORMS_LITE_VER );
            wp_enqueue_style( 'spectrum', $adm_assets . 'spectrum/spectrum.min.css', array(), STICKY_FLOATING_FORMS_LITE_VER );

            if ( function_exists( 'wp_enqueue_media' ) ) {
                wp_enqueue_media();
            } 

            wp_enqueue_script( 'spectrum', $adm_assets . 'spectrum/spectrum.min.js', array(), STICKY_FLOATING_FORMS_LITE_VER, true );
            wp_register_script( 'sticky-floating-forms-lite-admin', $adm_assets . 'js/admin.js', array( 'jquery','wp-color-picker','jquery-ui-slider','jquery-ui-sortable' ), STICKY_FLOATING_FORMS_LITE_VER, true );

            $localize_options =  array(
                'ajaxurl'       => admin_url( 'admin-ajax.php')
                );

            wp_localize_script( 'sticky-floating-forms-lite-admin', 'sticky_floating_forms', $localize_options  );
            wp_enqueue_script( 'sticky-floating-forms-lite-admin' );



          }

        }

       
       

        public static function sff_get_contact_form_7_forms() {
            if ( function_exists( 'wpcf7' ) ) {
                $options = array();
    
                $args = array(
                    'post_type' => 'wpcf7_contact_form',
                    'posts_per_page' => -1
                );
    
                $contact_forms = get_posts( $args );
    
                if ( !empty( $contact_forms ) && !is_wp_error( $contact_forms ) ) {
    
                    $i = 0;
    
                    foreach ( $contact_forms as $post ) {
                        if ( $i == 0 ) {
                            $options[ 0 ] = esc_html__( '--Select a Contact form--', 'sticky-floating-forms-lite' );
                        }
                        $options[ $post->ID ] = $post->post_title;
                        $i++;
                    }
                }
            } else {
                $options = array();
            }
    
            return $options;
        }

        public function plugin_pro_link_action( $links ) {
         
            $links[] = '<a href="https://codeworkweb.com/wordpress-plugins/sticky-floating-forms/" target="_blank" style="color:#05c305; font-weight:bold;">'.esc_html__('Upgrade To Pro','sticky-floating-forms-lite').'</a>';
            return $links;
        }





    }
endif;

if ( !function_exists( 'sticky_floating_forms_lite_init' ) ) {

    /**
     * Returns instanse of the plugin class.
     *
     * @since  1.0.0
     * @return object
     */
    function sticky_floating_forms_lite_init() {
        return Sticky_Floating_Forms_Lite::get_instance();
    }

}

sticky_floating_forms_lite_init();