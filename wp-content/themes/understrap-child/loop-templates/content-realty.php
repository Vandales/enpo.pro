<?php
/**
 * Single post partial template
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
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

    <div class="section">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-7">
            <div class="img-property-slide-wrap">
              <div class="img-property-slide">
                <img src="<? echo get_the_post_thumbnail_url(); ?>" alt="Image" class="img-fluid" />
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h2 class="heading text-primary"><? the_title(); ?></h2>
            <p class="meta"><? the_field('adress'); ?></p>
            <p class="text-black-50">
							<? the_content(); ?>
            </p>
						<div class="specs d-flex mb-4">
							<span class="d-flex align-items-center me-3">
								<small class="me-1">Площадь</small>
								<strong><? the_field('square'); ?></strong>
							</span>
							<span class="d-flex align-items-center me-3">
								<small class="me-1">Жилая площадь </small>
								<strong><? the_field('living_space'); ?></strong>
							</span>
							<span class="d-flex align-items-center me-3">
								<small class="me-1">Этаж</small>
								<strong><? the_field('floor'); ?></strong>
							</span>
						</div>
          </div>
        </div>
      </div>
    </div>
