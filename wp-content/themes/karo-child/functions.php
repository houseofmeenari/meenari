<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array(  ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

/* Cookie Notice */
if( ! function_exists( 'ftc_cookies_popup' ) ) {
    add_action( 'wp_footer', 'ftc_cookies_popup');

    function ftc_cookies_popup() {
        global $smof_data;
        if( ! $smof_data['cookies_info'] ) return;

        $page_id = $smof_data['cookies_policy_page'];

        ?>
            <div class="ftc-cookies-popup">
                <div class="ftc-cookies-inner">
                    <div class="cookies-info-text">
                        <?php echo do_shortcode( $smof_data['cookies_text'] ); ?>
                    </div>
                    <div class="cookies-buttons">
                        
                        <a href="#" class="btn btn-size-small btn-color-primary cookies-accept-btn"><?php esc_html_e( 'Yes, I Accept ', 'karo' ); ?></a>
                    </div>
                </div>
            </div>
        <?php
    }
}

// END ENQUEUE PARENT ACTION
