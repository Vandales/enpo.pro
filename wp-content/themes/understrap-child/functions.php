<?php
add_action( 'wp_enqueue_scripts', 'understrap_child_enqueue_scripts', 20 );
function understrap_child_enqueue_scripts() {
	wp_enqueue_style( 'understrap-child-style', get_stylesheet_uri() );

	wp_enqueue_style( 'icomoon' , get_stylesheet_directory_uri() . '/fonts/icomoon/style.css');
	wp_enqueue_style( 'flaticon' , get_stylesheet_directory_uri() . '/fonts/flaticon/font/flaticon.css');
	wp_enqueue_style( 'aos-style' , get_stylesheet_directory_uri() . '/css/aos.css');
	wp_enqueue_style( 'tiny-slider' , get_stylesheet_directory_uri() . '/css/tiny-slider.css');
	wp_enqueue_style( 'cild-style', get_stylesheet_directory_uri() . '/css/style.css');
	
	wp_enqueue_script( 'bootstrap-bundle', get_stylesheet_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), null, ['in_footer' => true, 'strategy'  => 'defer']);
	wp_enqueue_script( 'aos', get_stylesheet_directory_uri() . '/js/aos.js', array('jquery'), null, ['in_footer' => true, 'strategy'  => 'defer']);
	wp_enqueue_script( 'tiny-slider', get_stylesheet_directory_uri() . '/js/tiny-slider.js', array('jquery'), null, ['in_footer' => true, 'strategy'  => 'defer']);
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery', 'aos', 'tiny-slider'), null, ['in_footer' => true]);
}
add_action( 'admin_enqueue_scripts', 'admin_enqueue_scripts', 20 );
function admin_enqueue_scripts() {
	
	wp_enqueue_script( 'admin-custom', get_stylesheet_directory_uri() . '/js/admin-custom.js', array(), null, ['in_footer' => true]);

}
// Register taxonomies

add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	register_taxonomy( 'realty_type', [ 'realty' ], [
		'label'                 => '', 
		'labels'                => [
			'name'              => 'Типы недвижимости',
			'singular_name'     => 'Тип',
			'search_items'      => 'Искать тип',
			'all_items'         => 'Все типы',
			'view_item '        => 'Просмотреть тип',
			'parent_item'       => 'Родительский тип',
			'parent_item_colon' => 'Родительский тип:',
			'edit_item'         => 'Редактированть тип',
			'update_item'       => 'Обновить тип',
			'add_new_item'      => 'Добавить новый тип',
			'new_item_name'     => 'Новый тип',
			'menu_name'         => 'Типы недвижимости',
			'back_to_items'     => '← Назад к типам',
		],
		'description'           => 'Типы недвижимости',
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
		'meta_box_cb'           => 'post_categories_meta_box', 
		'show_admin_column'     => false, 
		'show_in_rest'          => false,
	] );
}

// Register post types

add_action( 'init', 'register_post_types' );

function register_post_types(){

	register_post_type( 'realty', [
		'label'  => null,
		'labels' => [
			'name'               => 'Объекты',
			'singular_name'      => 'Объект',
			'add_new'            => 'Добавить объект',
			'add_new_item'       => 'Добавление объекта',
			'edit_item'          => 'Редактирование объекта', 
			'new_item'           => 'Новый объект',
			'view_item'          => 'Смотреть объект',
			'search_items'       => 'Искать объект',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name'          => 'Недвижимость',
		],
		'description'            => 'Объекты недвижимости',
		'public'                 => true,
		'show_in_rest'        => true,
		'menu_icon'           => 'dashicons-admin-home',
		'supports'            => [ 'title', 'editor','thumbnail', 'custom-fields', 'page-attributes'],
		'taxonomies'          => ['realty_type'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
	register_post_type( 'city', [
		'label'  => null,
		'labels' => [
			'name'               => 'Города',
			'singular_name'      => 'Город',
			'add_new'            => 'Добавить город',
			'add_new_item'       => 'Добавление города',
			'edit_item'          => 'Редактирование города', 
			'new_item'           => 'Новый город',
			'view_item'          => 'Смотреть город',
			'search_items'       => 'Искать город',
			'not_found'          => 'Не найдено',
			'not_found_in_trash' => 'Не найдено в корзине',
			'menu_name'          => 'Города',
		],
		'description'            => 'Список городов',
		'public'                 => true,
		'show_in_rest'        => true,
		'menu_icon'           => 'dashicons-location',
		'supports'            => [ 'title', 'editor','thumbnail', 'page-attributes'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

}

// Rest Api register routes

add_action( 'rest_api_init', function () {

	register_rest_route( 'pnb', '/post', array(
		'methods'             => 'POST',
		'callback'            => 'pnb_add_realty',
		'permission_callback' => '',
		'args' => array(
			'title' => array(
				'default'           => null,
				'required'          => false,
			),
			'description' => array(
				'default'           => null,
				'required'          => false,
			),
			'adress' => array(
				'default'           => null,
				'required'          => false,
			),
			'square' => array(
				'default'           => 'false',
				'required'          => false,
			),
			'living_space' => array(
				'default'           => 'false',
				'required'          => false,
			),
			'floor' => array(
				'default'           => null,
				'required'          => false,
			),
			'city' => array(
				'default'           => null,
				'required'          => false,
			),
			'img' => array(
				'default'           => null,
				'required'          => false,
			),
		),
	) );

});

function pnb_add_realty(WP_REST_Request $request) {

	require_once ABSPATH . 'wp-admin/includes/image.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';
	require_once ABSPATH . 'wp-admin/includes/media.php';

	$post_id = wp_insert_post( [
		'post_title'    => sanitize_text_field($request['title'] ),
		'post_content'  => sanitize_text_field($request['description'] ),
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_type' => 'realty',
	] );
	if ( is_wp_error( $post_id ) ) {
		echo $post_id->get_error_message();
		return;
	} else {
		update_post_meta( $post_id, 'city', $request['city'], $prev_value );
		update_post_meta( $post_id, 'square', $request['square'], $prev_value );
		update_post_meta( $post_id, 'living_space', $request['living_space'], $prev_value );
		update_post_meta( $post_id, 'floor', $request['floor'], $prev_value );
		update_post_meta( $post_id, 'adress', $request['adress'], $prev_value );
		update_post_meta( $post_id, 'price', $request['price'], $prev_value );
	}

	$attachment_id = media_handle_upload( 'img', $post_id );
	
	if ( is_wp_error( $attachment_id ) ) {
		echo $attachment_id->get_error_message();
		return;
	} else {
		set_post_thumbnail( $post_id, $attachment_id );
	}
	return 'good work!';
}

// Add city postmeta

add_action( 'save_post', 'add_post_city', 10, 3);

function add_post_city($post_id, $post) {

	$cookie = $_COOKIE["cityId"];

	if (isset($cookie) || $post->post_type == 'realty') { 
		$update_meta = update_post_meta($post_id, 'city', $cookie);
		if(is_wp_error( $update_meta )) {
			print_r($update_meta->get_error_message());
		}
	} else {
		return;
	} 

	setcookie("cityId", "", time() - 3600);

}
