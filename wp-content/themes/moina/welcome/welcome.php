<?php
if (!class_exists('MOINA_WELCOME')) :

    class MOINA_WELCOME {

        public $theme_name = ''; // For storing Theme Name
        public $theme_version = ''; // For Storing Theme Current Version Information

        /**
         * Constructor for the Welcome Screen
         */

        public function __construct() {

            /** Useful Variables */
            $theme = wp_get_theme();
            $this->theme_name = $theme->Name;
            $this->theme_version = $theme->Version;

            /* Enqueue Styles & Scripts for Welcome Page */
            add_action('admin_enqueue_scripts', array($this, 'welcome_styles_and_scripts'));

            /* Hide Notice */
            add_filter('wp_loaded', array($this, 'hide_admin_notice'), 10);

            /* Create a Welcome Page */
            add_action('wp_loaded', array($this, 'admin_notice'), 20);

            add_action('after_switch_theme', array($this, 'erase_hide_notice'));

        }

        /** Trigger Welcome Message Notification */
        public function admin_notice() {
            $hide_notice = get_option('moina_hide_notice2');
            if (!$hide_notice) {
                add_action('admin_notices', array($this, 'admin_notice_content'));
            }
        }

        /** Welcome Message Notification */
        public function admin_notice_content() {
            $screen = get_current_screen();

            if ('appearance_page_moina-welcome' === $screen->id || (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) || 'theme-install' === $screen->id) {
                return;
            }

            ?>
            <div class="updated notice moina-welcome-notice">
                <div class="moina-welcome-notice-wrap">
                    <h2><?php esc_html_e('Congratulations!', 'moina'); ?></h2>
                    <p><?php printf(esc_html__('%1$s is now installed and ready to use. You can create your dream website by using moina theme.Now you are using free version of Moina Theme. If you want a Blog based Modern, Creative, Personal, Portfolio, Secure, Beautiful, Resume / CV, SEO friendly, Full functional Premium WordPress Blog Theme for your site. Build Your Dream Website With Pro Version of Moina Theme.', 'moina'), $this->theme_name); ?></p>

                    <div class="moina-welcome-info">
                        <div class="moina-welcome-import">
                            <p><a class="button button-primary" target="_blank" href="<?php echo esc_url( __( 'http://wpashathemes.com/moina/', 'moina' ) ); ?>"><?php esc_html_e( 'View Demo', 'moina' ); ?></a></p>
                        </div>
                        <div class="moina-welcome-getting-started">
                            <p><a href="<?php echo esc_url( __( 'https://ashathemes.com/index.php/cart/?add-to-cart=115', 'moina' ) ); ?>" class="button button-primary"><?php esc_html_e('Buy Pro', 'moina'); ?></a></p>
                        </div>
                    </div>

                    <a href="<?php echo wp_nonce_url(add_query_arg('moina_hide_notice2', 1), 'moina_hide_notice2_nonce', 'moina_notice_panel'); ?>" class="notice-close"><?php esc_html_e('Dismiss', 'moina'); ?></a>
                </div>

            </div>
            <?php
        }

        /** Hide Admin Notice */
        public function hide_admin_notice() {
            if (isset($_GET['moina_hide_notice2']) && isset($_GET['moina_notice_panel']) && current_user_can('manage_options')) {
                if (!wp_verify_nonce(wp_unslash($_GET['moina_notice_panel']), 'moina_hide_notice2_nonce')) {
                    wp_die(esc_html__('Action Failed. Something is Wrong.', 'moina'));
                }

                update_option('moina_hide_notice2', true);
            }
        }
        /** Enqueue Necessary Styles and Scripts for the Welcome Page */
        public function welcome_styles_and_scripts($hook) {
            if ('theme-install.php' !== $hook) {
                wp_enqueue_style('moina-welcome', get_template_directory_uri() . '/welcome/css/welcome.css', array(), $this->theme_version);
            }
        }

        public function erase_hide_notice() {
            delete_option('moina_hide_notice2');
        }
    }

    new MOINA_WELCOME();
    
endif;