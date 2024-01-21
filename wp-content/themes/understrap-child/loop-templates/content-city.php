<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

global $post;

$children = new WP_Query([
  'post_type'      => 'realty',
  'posts_per_page' => 10,
  'meta_query' => [ [
    'key' => 'city',
    'value' => get_the_ID(),
  ] ],
]);

?>

		<div class="hero page-inner overlay" style="background-image: url('<? echo get_the_post_thumbnail_url(); ?>')">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">
              <? the_title(); ?>
            </h1>
          </div>
        </div>
      </div>
    </div>
    <div class="section section-properties">
      <div class="container">
        <div class="row">
          <?
            foreach ($children->posts as $item){
              ?>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                  <div class="property-item mb-30">
                    <a href="<? echo get_permalink( $item->ID); ?>" class="img">
                      <img src="<? echo get_the_post_thumbnail_url($item->ID, 'full'); ?>" alt="Image" class="img-fluid" />
                    </a>
                    <div class="property-content">
                      <div class="price mb-2"><span><? the_field('price', $item->ID); ?> руб.</span></div>
                      <div>
                        <span class="d-block mb-2 text-black-50"
                          ><? the_field('adress', $item->ID); ?></span
                        >
                        <span class="city d-block mb-3"><? echo $item->post_title;?></span>
  
                        <div class="specs d-flex mb-4">
                          <span class="d-flex align-items-center me-3">
                            <small>Площадь</small>
                            <strong><? the_field('square', $item->ID); ?></strong>
                          </span>
                          <span class="d-flex align-items-center me-3">
                            <small>Жилая площадь </small>
                            <strong><? the_field('living_space', $item->ID); ?></strong>
                          </span>
                          <span class="d-flex align-items-center me-3">
                            <small>Этаж</small>
                            <strong><? the_field('floor', $item->ID); ?></strong>
                          </span>
                        </div>
  
                        <a href="<? echo get_permalink( $item->ID); ?>" class="btn btn-primary py-2 px-3" >Подробнее</a>
                      </div>
                    </div>
                  </div>
                  <!-- .item -->
                </div>
              <?
            }
          ?>
        </div>
    
      </div>
    </div>
