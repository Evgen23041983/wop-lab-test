<?php 

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override twentytwelve_setup() in a child theme, add your own twentytwelve_setup to your child theme's
 * functions.php file.
 *
 */

function wltstthm_setup() {

	add_theme_support( 'custom-logo' );
	add_theme_support( 'post-formats', array( 'cars' ) );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );

		$defaults = array(
			'height'      => 45,
			'width'       => 37,
		 	'flex-height' => true,
		 	'flex-width'  => true,
		 	'header-text' => array( 'site-title', 'site-description' ),
 );

	add_theme_support( 'custom-logo', $defaults );
	load_theme_textdomain( 'wl-test-theme', get_template_directory() . '/languages' );
}

function  wltstthm_enqueue_style( $hook ) {
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' ); /* подключаем bootstrap в начало*/

    wp_enqueue_style( 'foodrecipe-style', get_template_directory_uri() . '/css/style.css' ); /* подключаю мои стили*/
    
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), '4.0', true ); /* подключаем JS и JQuery в конец*/
    
    wp_enqueue_script( 'foodrecipe-script', get_stylesheet_directory_uri() . '/js/script.js',  array(), '4.0', true ); /* подключаю свой скрипт в конец*/
}

function wltstthm_add_admin_iris_scripts( $hook ){
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'th-script', get_stylesheet_directory_uri() .'/js/script-picker.js', array('wp-color-picker'), false, 1 );

    wp_enqueue_media();
    wp_enqueue_script('add-one-media.js', get_stylesheet_directory_uri() . '/js/add-one-media.js', array('jquery'));
}



function  wltstthm_register_cars_post_type() {
    register_taxonomy( 'model', 'cars',
        array(
            'hierarchical' 		=> true,
            'labels'			=> array(
                'name' 						=> __( 'Model car', 'wl-test-theme' ),
                'singular_name' 			=> __( 'Model car', 'wl-test-theme' ),
                'add_new' 					=> __( 'Add model car', 'wl-test-theme' ),
                'add_new_item'				=> __( 'Add New model car', 'wl-test-theme' ),
                'edit' 						=> __( 'Edit model car', 'wl-test-theme' ),
                'edit_item' 				=> __( 'Edit model car', 'wl-test-theme' ),
                'new_item' 					=> __( 'New model car', 'wl-test-theme' ),
                'view' 						=> __( 'View model car', 'wl-test-theme' ),
                'view_item' 				=> __( 'View model car', 'wl-test-theme' ),
                'search_items'	 			=> __( 'Find model car', 'wl-test-theme' ),
                'not_found' 				=> __( 'No model car', 'wl-test-theme' ),
                'not_found_in_trash' 		=> __( 'No model car in Trash', 'wl-test-theme' ),
                'parent' 					=> __( 'Parent model car', 'wl-test-theme' ),
                'items_list_navigation' 	=> __( 'Model car list navigation', 'wl-test-theme' ),
                'items_list'				=> __( 'Model car list', 'wl-test-theme' )
            ),
            'rewrite' 			=> true,
            'show_ui'			=> true,
            'query_var'			=> true,
            'sort'				=> true,
            'map_meta_cap'		=> true,
            'show_admin_column' => true,
        )
    );

    register_taxonomy( 'country', 'cars',
        array(
            'hierarchical' 		=> true,
            'labels'			=> array(
                'name' 						=> __( 'Country car', 'wl-test-theme' ),
                'singular_name' 			=> __( 'Country car', 'wl-test-theme' ),
                'add_new' 					=> __( 'Add country', 'wl-test-theme'),
                'add_new_item'				=> __( 'Add New country', 'wl-test-theme' ),
                'edit' 						=> __( 'Edit country', 'wl-test-theme' ),
                'edit_item' 				=> __( 'Edit country', 'wl-test-theme' ),
                'new_item' 					=> __( 'New country', 'wl-test-theme' ),
                'view' 						=> __( 'View country', 'wl-test-theme' ),
                'view_item' 				=> __( 'View country', 'wl-test-theme' ),
                'search_items'	 			=> __( 'Find country', 'wl-test-theme' ),
                'not_found' 				=> __( 'No country', 'wl-test-theme' ),
                'not_found_in_trash' 		=> __( 'No country in Trash', 'wl-test-theme' ),
                'parent' 					=> __( 'Parent country', 'wl-test-theme' ),
                'items_list_navigation' 	=> __( 'country car list navigation', 'wl-test-theme' ),
                'items_list'				=> __( 'country list', 'wl-test-theme' )
            ),
            'rewrite' 			=> true,
            'show_ui'			=> true,
            'query_var'			=> true,
            'sort'				=> true,
            'map_meta_cap'		=> true,
            'show_admin_column' => true,
        )
    );

    $args = array(
        'label'				=> __( 'Cars', 'quotes-and-tips' ),
        'singular_label'	=> __( 'Cars', 'quotes-and-tips' ),
        'public'			=> true,
        'show_ui'			=> true,
        'capability_type'	=> 'post',
        'hierarchical'		=> false,
        'rewrite'			=> true,
        'supports'			=> array( 'title' ),
        'menu_icon'			=> 'dashicons-products',
        'taxonomies'        => array( 'model', 'country' ),
        'labels'			=> array(
            'name'          => __( 'Cars', 'wl-test-theme' ),
            'all_items'     => __( 'Cars', 'wl-test-theme' ),
            'singular_name' => __( 'Car', 'wl-test-theme' ),
            'add_new_item'  => __( 'Add New Car', 'wl-test-theme' ),
            'edit_item'     => __( 'Edit Car', 'wl-test-theme' ),
            'new_item'      => __( 'New Car', 'wl-test-theme' ),
            'view_item'     => __( 'View Car', 'wl-test-theme' ),
            'search_items'  => __( 'Search Cars', 'wl-test-theme' ),
            'not_found'     => __( 'No cars found', 'wl-test-theme' ),
            'menu_name'     => __( 'Cars', 'wl-test-theme' )
        )
    );
    register_post_type( 'cars' , $args );

}

function wltstthm_custom_metabox() {
    global $post;
    $color_car = get_post_meta( $post->ID, 'color_car' );
    $fuel_car = get_post_meta( $post->ID, 'fuel_car' );
    $power_car = get_post_meta( $post->ID, 'power_car' );
    $price_car = get_post_meta( $post->ID, 'price_car' );

    $switcher_fuel_name = array(
        'disel' => __( 'Disel', 'wl-test-theme' ),
        'petrol' => __( 'Petrol', 'wl-test-theme' ),
        'gas' => __( 'Gas', 'wl-test-theme' ),
         );
    $switcher_fuel = ( isset( $fuel_car ) && array_key_exists( $fuel_car[0], $switcher_fuel_name ) ) ? $fuel_car[0] : 'none';

    $add_file_id = get_post_meta( $post->ID, 'add_file_id', true );

    $upload_link = esc_url(get_upload_iframe_src( 'null', $post->ID ) );
    wp_nonce_field( plugin_basename( __FILE__ ), 'qtsndtps_nonce_name' ); ?>


    <table class="form-table">
        <tr>
            <th scope="row"><?php _e( 'Image', 'wl-test-theme' ); ?></th>
            <td>
                <div class="custom_field_itm">
                    <div class="js-add-wrap">
                        <?php
                        if ( $add_file_id ) {
                            $file_info = get_post( $add_file_id );
                            $file_icon = wp_get_attachment_image( $add_file_id, 'thumbnail', true) ;
                            ?>

                            <div class="add_file js-add_file_itm">
                                <input type="hidden" name="add_file_id" value="<?php $add_file_id ?>" />
                                <div class="add_file_icon"><?php echo $file_icon ?></div>
                                <p class="add_file_name"><?php $file_info->post_title ?></p>
                                <a href="#" class="button button-primary button-large js-add-file-remove">Открепить файл</a>
                            </div>
                        <?php } ?>

                        </div><br/>
                    <a href="<?php $upload_link ?>" class="button button-primary button-large js-add-file">Добавить файл</a>
                </div>
            </td>
        <tr>
        <tr>
            <th scope="row"><?php _e( 'Color', 'wl-test-theme' ); ?></th>
            <td>
                    <input type="text" id="color_car" value="<?php if ( ! empty( $color_car ) ) echo $color_car[0]; ?>" name="color_car"/>
                    <div class="bws_info"><?php _e( 'Select car color.', 'wl-test-theme' ); ?></div>
            </td>
        <tr>
        <tr>
            <th scope="row"><?php _e( 'Fuel', 'wl-test-theme' ); ?></th>
            <td>
                <select name="fuel_car">
                    <?php foreach ( $switcher_fuel_name as $key => $value  ) { ?>
                        <option <?php selected( $switcher_fuel, $key ) ?> value="<?php echo $key; ?>"><?php echo $value; ?></option>                        <?php } ?>
                </select>
                <div class="bws_info"><?php _e( 'Select car fuel.', 'wl-test-theme' ); ?></div>
            </td>
        </tr>
        <tr>
            <th scope="row"><?php _e( 'Сar power', 'wl-test-theme' ); ?></th>
            <td>
                <input id="power_car" type="text" name="power_car" value="<?php if ( ! empty( $power_car) ) echo $power_car[0]; ?>">
                <div class="bws_info"><?php _e( 'Enter the power of the car', 'wl-test-theme' ); ?></div>
            </td>
        </tr>
        <tr>
            <th scope="row"><?php _e( 'Сar price', 'wl-test-theme' ); ?></th>
            <td>
                <input id="price_car" type="text" name="price_car" value="<?php if ( ! empty( $price_car) ) echo$price_car[0]; ?>">
                <div class="bws_info"><?php _e( 'Enter the price of the car', 'wl-test-theme' ); ?></div>
            </td>
        </tr>
        <tr>

            <td>
                <?php do_action( 'renty_show_demo_button' ); ?>
            </td>
        </tr>
    </table>
<?php }


if ( ! function_exists( 'wltstthm_add_custom_metabox' ) ) {
    function wltstthm_add_custom_metabox() {
        add_meta_box( 'custom-metabox', __( 'Car characteristics', 'wl-test-theme' ), 'wltstthm_custom_metabox', 'cars', 'normal', 'high' );
    }
}


function wltstthm_save_custom_field ( $post_id ) {

    if ( ( ( isset( $_POST['color_car'] ) ) || isset( $_POST['fuel_car'] ) || isset( $_POST['power_car'] ) || isset( $_POST['price_car'] ) )  ) {
        update_post_meta( $post_id, 'color_car', stripslashes( esc_html( $_POST['color_car'] ) ) );
        update_post_meta( $post_id, 'fuel_car', stripslashes( esc_html( $_POST['fuel_car'] ) ) );
        update_post_meta( $post_id, 'power_car', stripslashes( esc_html( $_POST['power_car'] ) ) );
        update_post_meta( $post_id, 'price_car', stripslashes( esc_html( $_POST['price_car'] ) ) );
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('page' == $_POST['post_type'] && ! current_user_can('edit_page', $post_id)) {
        return $post_id;
    } elseif ( ! current_user_can('edit_post', $post_id)) {
        return $post_id;
    }
    $add_file_id = (int)$_POST['add_file_id'];
    update_post_meta($post_id, 'add_file_id', $add_file_id);

    return $post_id;
}


/**
 * Theme customizer: add phone.
 *
 * @param WP_Customize_Manager $wp_customize WP_Customize_Manager instance.
 */


function wltstthm_customize_register_action( $wp_customize )
{
    $wp_customize->add_section(
        'phone',
        array(
            'title' => 'Phone',
            'description' => 'Phone',
            'priority' => 11,
        )
    );
    $wp_customize->add_setting(
        'title_tagline_phone',
        array(
            'default' => '+38 (098) 777-77-77'
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
        'title_tagline_phone',
            array(
                'label' => __( 'Phone', 'wl-test-theme' ),
                'section' => 'phone',
                'settings'   => 'title_tagline_phone',
                'type' => 'text',
            )
        )
    );
}


function wltstthm_custom_post_listing_shortcode() {
    ob_start();
    $query = new WP_Query( array(
        'post_type' => 'cars',
        'color' => 'blue',
        'posts_per_page' => 10,
        'order' => 'DESC',
        'orderby' => 'title',
    ) );
    if ( $query->have_posts() ) { ?>
        <ul class="clothes-listing">
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php endwhile;
            wp_reset_postdata(); ?>
        </ul>
        <?php $myvariable = ob_get_clean();
        return $myvariable;
    }
}

add_action( 'admin_enqueue_scripts', 'wltstthm_add_admin_iris_scripts' );
add_shortcode( 'list-posts-basic', 'wltstthm_custom_post_listing_shortcode' );
add_action( 'customize_register', 'wltstthm_customize_register_action' );
add_action('add_meta_boxes', 'wltstthm_add_custom_metabox');
add_action( 'init', 'wltstthm_register_cars_post_type' );
add_action( 'after_setup_theme', 'wltstthm_setup' );
add_action( 'wp_enqueue_scripts', 'wltstthm_enqueue_style' );
add_action( 'save_post', 'wltstthm_save_custom_field' );






