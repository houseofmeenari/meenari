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

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text');
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_custom_cart_button_text');

function woo_custom_cart_button_text() {
    return __('Add to Bag', 'woocommerce');
}

function woo_custom_change_cart_string($translated_text, $text, $domain) {
	$translated_text = str_replace("cart", "bag", $translated_text);
	$translated_text = str_replace("Cart", "Bag", $translated_text);
	$translated_text = str_replace("View Cart", "View Bag", $translated_text);
return $translated_text;
}
add_filter('gettext', 'woo_custom_change_cart_string', 100, 3);
add_filter('ngettext', 'woo_custom_change_cart_string', 100, 3);

// Cart - Basket Text
function wpa_change_my_basket_text( $translated_text, $text, $domain ){
    if( $domain == 'woothemes' && $translated_text == 'Cart:' )
        $translated_text = 'Basket:';
    return $translated_text;
}
add_filter( 'gettext', 'wpa_change_my_basket_text', 10, 3 );

// test this functionality: Is it adding the bag? -- or is the one above adding the bag still? 
add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_icon' );    
function woo_archive_custom_cart_button_icon() {
        return '<i class="fa fa-shopping-bag" aria-hidden="true"></i>';
}

// restration form fields:
    function wooc_extra_register_fields() {?>
        <p class="form-row form-row-wide">
        <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?></label>
        <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e( $_POST['billing_phone'] ); ?>" />
        </p>
        <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
        </p>
        <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
        </p>
        <div class="clear"></div>
        <?php
  }
  add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );