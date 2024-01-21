<?php

/*
 * Plugin Name: Bunch of post types
 * Description: Плагин для связки типов записи 
 */


add_action('add_meta_boxes', function () {
	add_meta_box( 'object_city', 'Город объекта', 'object_city_metabox', 'realty', 'normal', 'high');
}, 1);


function object_city_metabox( $post ){

	$cities = get_posts(array( 'post_type'=>'city', 'posts_per_page'=>-1, 'orderby'=>'post_title', 'order'=>'ASC' ));

	if( $cities ) {
		
		echo '
		<div style="max-height:200px; overflow-y:auto;">
			<ul id="city-list">
		';

		foreach( $cities as $city ){
			$city_id = get_post_meta( $post->ID, 'city', true);
			echo '
			<li><label>
				<input type="radio" class="city" name="city" value="'. $city->ID .'" '. checked($city->ID, $city_id, 0) .'> '. esc_html($city->post_title) .'
			</label></li>
			';
		}

		echo '
			</ul>
		</div>';
	}
	else
		echo 'Пока не создано ни одного города...';
}


