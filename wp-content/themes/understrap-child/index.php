<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
$propeties = get_posts([
	'post_type' => 'realty',
	'post_per_page' => 10,
]);
$cities = get_posts([
	'post_type' => 'city',
	'post_per_page' => -1,
]);
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

    <section class="section mt-4">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-primary heading">
              Новые объекты
            </h2>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
							<?php
								foreach ($propeties as $item) {
									?>
										<div class="property-item">
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
									<?php
								}
							?>
              </div>
              <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                <span class="prev" data-controls="prev" aria-controls="property" tabindex="-1" >Предыдущие</span>
                <span class="next" data-controls="next" aria-controls="property" tabindex="-1" >Следующие</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="features-1">
      <div class="container">
				<div class="row mb-5">
					<h3 class="font-weight-bold text-primary heading">Города</h3>
        </div>
        <div class="row">
					<?
						foreach($cities as $item) {
							?>
								<div class="col-6 col-lg-3 city-item" data-aos="fade-up" data-aos-delay="300">
									<div class="box-feature d-flex flex-column">
										<h3 class="mb-3"><? echo $item->post_title; ?></h3>
										<p>
											<? echo mb_strimwidth($item->post_content, 0, 74, "..."); ?>
										</p>
										<a href="<? echo get_permalink( $item->ID); ?>" class="learn-more mt-auto">Объекты в городе</a>
									</div>
								</div>
							<?
						}
					?>
        </div>
      </div>
    </section>
		<div class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
						<h3>
							Добавить объект
						</h3>
          </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <form action="#" id="add-object-form">
              <div class="row">
                <div class="col-6 mb-3">
                  <input type="text" required id="title-obj" name="title" class="form-control" placeholder="Заголовок"/>
									<div class="text-danger mt-1"></div>
                </div>
                <div class="col-6 mb-3">
									<input type="text" required id="adress-obj" name="adress" class="form-control" placeholder="Адрес"/>
									<div class="text-danger mt-1"></div>
                </div>
                <div class="col-12 d-flex gap-3 mb-3">
									<?
										$cities = get_posts([
											'post_per_page' => -1,
											'post_type' => 'city',
										]);
										foreach($cities as $item) {
								
											?>
												<div class="form-check">
													<input class="form-check-input" type="radio" name="city" data-id="<? echo $item->ID; ?>" id="flexRadio<? echo $item->post_name; ?>">
													<label class="form-check-label" for="flexRadio<? echo $item->post_name; ?>">
														<? echo $item->post_title; ?>
													</label>
												</div>
											<?
										}
									?>
                </div>
								<div class="col-12 mb-3">
									<textarea name="description" required id="descr-obj" id="" cols="30" rows="7" class="form-control" placeholder="Описание объекта"></textarea>
									<div class="text-danger mt-1"></div>
								</div>
                <div class="col-3 mb-3">
                  <input type="number" id="square-obj" name="square" class="form-control" placeholder="Площадь"/>
                </div>
                <div class="col-3 mb-3">
                  <input type="number" id="living-obj" name="living_space" class="form-control" placeholder="Жилая площадь"/>
                </div>
                <div class="col-3 mb-3">
                  <input type="number" id="floor-obj" name="floor" class="form-control" placeholder="Этаж"/>
                </div>
                <div class="col-12 mb-3">
                  <input type="number" id="price-obj" name="price" class="form-control" placeholder="Цена"/>
                </div>
                <div class="col-12 mb-3">
									<input type="file" require="require" id="img-obj" name="img">
								</div>
                <div class="col-12">
                  <input type="submit" id="submit" value="Опубликовать" class="btn btn-primary"/>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

<?php
get_footer();
