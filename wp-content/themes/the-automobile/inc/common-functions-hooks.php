<?php
if ( ! function_exists( 'the_automobile_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since The Automobile 1.0.0
 */
function the_automobile_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;


if ( ! function_exists( 'the_automobile_body_class' ) ) :

	/**
	 * body class.
	 *
	 * @since 1.0.0
	 */
	function the_automobile_body_class($the_automobile_body_class) {
		global $post;
		$global_layout = the_automobile_get_option( 'global_layout' );
		$input = '';
		$home_content_status =	the_automobile_get_option( 'home_page_content_status' );
		if( 1 != $home_content_status ){
			$input = 'home-content-not-enabled';
		}
		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'the-automobile-meta-select-layout', true );
			if ( empty( $post_options ) ) {
				$global_layout = esc_attr( the_automobile_get_option('global_layout') );
			} else{
				$global_layout = esc_attr($post_options);
			}
		}
		if ($global_layout == 'left-sidebar') {
			$the_automobile_body_class[]= 'left-sidebar ' . esc_attr( $input );
		}
		elseif ($global_layout == 'no-sidebar') {
			$the_automobile_body_class[]= 'no-sidebar ' . esc_attr( $input );
		}
		else{
			$the_automobile_body_class[]= 'right-sidebar ' . esc_attr( $input );

		}
		return $the_automobile_body_class;
	}
endif;

add_action( 'body_class', 'the_automobile_body_class' );
/**
* Returns word count of the sentences.
*
* @since The Automobile 1.0.0
*/
if ( ! function_exists( 'the_automobile_words_count' ) ) :
	function the_automobile_words_count( $length = 25, $the_automobile_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $the_automobile_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '' );
		return $trimmed_content;
	}
endif;


if ( ! function_exists( 'the_automobile_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function the_automobile_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {

			require_once get_template_directory() . '/assets/libraries/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );

	}

endif;


if ( ! function_exists( 'the_automobile_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function the_automobile_custom_posts_navigation() {

		$pagination_type = the_automobile_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'the_automobile_action_posts_navigation', 'the_automobile_custom_posts_navigation' );


if( ! function_exists( 'the_automobile_excerpt_length' ) && ! is_admin() ) :

    /**
     * Excerpt length
     *
     * @since  The Automobile 1.0.0
     *
     * @param null
     * @return int
     */
    function the_automobile_excerpt_length( $length ){
        global $the_automobile_customizer_all_values;
        $excerpt_length = $the_automobile_customizer_all_values['excerpt_length_global'];
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

add_filter( 'excerpt_length', 'the_automobile_excerpt_length', 999 );
endif;


if ( ! function_exists( 'the_automobile_excerpt_more' ) && ! is_admin() )  :

	/**
	 * Implement read more in excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param string $more The string shown within the more link.
	 * @return string The excerpt.
	 */
	function the_automobile_excerpt_more( $more ) {

		$flag_apply_excerpt_read_more = apply_filters( 'the_automobile_filter_excerpt_read_more', true );
		if ( true !== $flag_apply_excerpt_read_more ) {
			return $more;
		}

		$output = $more;
		$read_more_text = esc_html__('Read More','the-automobile');
		if ( ! empty( $read_more_text ) ) {
			$output = ' <a href="'. esc_url( get_permalink() ) . '" class="read-more">' . esc_html( $read_more_text ) . '</a>';
			$output = apply_filters( 'the_automobile_filter_read_more_link' , $output );
		}
		return $output;

	}

add_filter('excerpt_more', 'the_automobile_excerpt_more');
endif;

if ( ! function_exists( 'the_automobile_wishlist' )){
/**
 * Wishlist Header Count Ajax Function
**/
    if ( ! function_exists( 'the_automobile_wishlist' ) ) {
        function the_automobile_wishlist() {
            if ( function_exists( 'YITH_WCWL' ) ) { 
                $wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
                    <div class="top-wishlist">
                    <a href="<?php echo esc_url( $wishlist_url ); ?>" data-toggle="tooltip">
                        <div class="count">                            
                            <i class="fa fa-heart"></i>
                            <span class="hidden-xs"><?php esc_html_e('Wishlist', 'the-automobile'); ?></span>
                            <span class="badge bigcounter"><?php echo yith_wcwl_count_products() ; ?></span>
                        </div>
                    </a>
                    </div>
            <?php
            }
        }
     }
    add_action( 'wp_ajax_yith_wcwl_update_single_product_list', 'the_automobile_wishlist' );
    add_action( 'wp_ajax_nopriv_yith_wcwl_update_single_product_list', 'the_automobile_wishlist' );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'the_automobile_loop_columns');
if ( ! function_exists('the_automobile_loop_columns')) {
	/**
	 * Shop Page no. of column
	 *
	 * @since The Automobile 0.1
	 *
	 */
	function the_automobile_loop_columns() {
		return 3; // 3 products per row
	}
}

add_filter( 'woocommerce_output_related_products_args', 'the_automobile_related_products_limit' );
if ( ! function_exists('the_automobile_related_products_limit') ) {
	/**
	 * No. of related products
	 *
	 * @since the_automobile 0.1
	 *
	 */
	function the_automobile_related_products_limit( $args ) { 
		global $product;
	
		$args['posts_per_page'] = 3;
		return $args;
	}
}


if( ! function_exists( 'the_automobile_recommended_plugins' ) ) :

  /**
   * Recommended plugins
   *
   */
  function the_automobile_recommended_plugins(){
      $the_automobile_plugins = array(
        array(
            'name'     => __( 'One Click Demo Import', 'the-automobile' ),
            'slug'     => 'one-click-demo-import',
            'required' => false,
        ),
      );
      $the_automobile_plugins_config = array(
          'dismissable' => true,
      );
      
      tgmpa( $the_automobile_plugins, $the_automobile_plugins_config );
  }
endif;
add_action( 'tgmpa_register', 'the_automobile_recommended_plugins' );

function the_automobile_check_other_plugin() {
  // check for plugin using plugin name
  if ( is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) {
    //plugin is activated
    function ocdi_after_import_setup() {
        // Assign menus to their locations.
        $main_menu = get_term_by( 'name', 'Main Menu', 'nav_menu' );
        $footer_menu = get_term_by( 'name', 'secondary menu', 'nav_menu' );
        $social_menu = get_term_by( 'name', 'Social', 'nav_menu' );

        set_theme_mod( 'nav_menu_locations', array(
                'primary' => $main_menu->term_id,
                'top' => $footer_menu->term_id,
                'social' => $social_menu->term_id,
            )
        );

        // Assign front page and posts page (blog page).
        $front_page_id = get_page_by_title( 'Sample page' );
        $blog_page_id  = get_page_by_title( 'Service' );

        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front_page_id->ID );
        update_option( 'page_for_posts', $blog_page_id->ID );

    }
    add_action( 'pt-ocdi/after_import', 'ocdi_after_import_setup' );
  } 
}
add_action( 'admin_init', 'the_automobile_check_other_plugin' );
