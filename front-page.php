<?php
/**
 * Template Name: FrontPage Adults
 */
get_header();
//Get ACF
$banner_1_image = get_field('banner_1_image');
$banner_1_icon = get_field('banner_1_icon');
$banner_1_text = get_field('banner_1_text');
$banner_1_link = get_field('banner_1_link');
$banner_1_color = get_field('banner_1_color');
$banner_2_image = get_field('banner_2_image');
$banner_2_icon = get_field('banner_2_icon');
$banner_2_text = get_field('banner_2_text');
$banner_2_link = get_field('banner_2_link');
$banner_2_color = get_field('banner_2_color');
?>
<?php if (have_rows('slide_items', 'option')): ?>
    <section class='baner color-primary'>
        <div class="swiper-entry default-sw">
            <div class="swiper-container" data-options='{"slidesPerView":1}'>
                <div class="swiper-wrapper">
                    <?php while (have_rows('slide_items', 'option')): the_row();
                        $slide_img = get_sub_field('slide_img');
                        $slide_text = get_sub_field('slide_text');
                        $slide_bg_color = get_sub_field('slide_bg_color');
                        $show_in_adults = get_sub_field('show_in_adults');
                        $show_in_kids = get_sub_field('show_in_kids');
                        if ($show_in_adults):
                            ?>
                            <div class="swiper-slide baner__slide"
                                 style="background-color: <?php echo $slide_bg_color ? $slide_bg_color : '#ff4a5c' ?>;">
                                <div class='container-full'>
                                    <div class='baner__content'>
                                        <?php if ($slide_text): ?>
                                            <h1 class='h1 title-sc'>
                                                <?php echo $slide_text; ?>
                                            </h1>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if ($slide_img): ?>
                                    <div class='baner-image'
                                         data-bg='<?php echo $slide_img['url']; ?>'></div><?php endif; ?>
                            </div>
                        <?php endif; endwhile; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
<?php endif; ?>
<?php
$args = array(
    'post_type' => 'game',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
        array (
            'taxonomy' => 'game_category',
            'field' => 'slug',
            'terms' => 'adults',
        )
    ),
);

$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()) : ?>
    <section class='products'>
        <div class='spacer-lg-2'></div>
        <div class='container-full'>
            <div class="swiper-entry default-sw">
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-container"
                     data-options='{"loop": true, "slidesPerView":6, "spaceBetween": 40, "breakpoints": {"1370": {"slidesPerView": 5},"991": {"slidesPerView": 4, "spaceBetween": 20},"767": {"slidesPerView": 3, "spaceBetween": 20},"575": {"slidesPerView": 2, "spaceBetween": 10}}}'
                >
                    <div class="swiper-wrapper">
                        <?php while ($the_query->have_posts()) : $the_query->the_post();
                            $slider_image = get_field('slider_image');
                            $slider_badge = get_field('slider_badge');
                            if ($slider_image && $slider_badge):
                                ?>
                                <div class="swiper-slide products__slide">
                                    <a class="product-circle" href="<?php the_permalink(); ?>"
                                       data-bg='<?php echo $slider_image['url']; ?>'>
                                    <span class='icon-pr'>
                                        <img data-src="<?php echo $slider_badge['url']; ?>"
                                             alt="<?php echo $slider_badge['alt']; ?>">
                                    </span>
                                    </a>
                                </div>
                            <?php endif; endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class='spacer-lg-2 spacer-sm-0'></div>
    </section>
<?php endif; ?>
<?php if ($banner_1_image && $banner_1_text && $banner_1_link && $banner_1_color || $banner_2_image && $banner_2_text && $banner_2_link && $banner_2_color): ?>
<section class='offers'>
    <div class='spacer-lg-4 spacer-sm-2'></div>
    <div class='container-full'>
        <div class='row'>
            <?php if ($banner_1_image && $banner_1_icon && $banner_1_text && $banner_1_link && $banner_1_color): ?>
                <div class='col-xl-5 col-lg-6'>
                    <a href="<?php echo $banner_1_link; ?>" class='offers__item'>
                        <div class='image'
                             style='background-image: url(<?php echo $banner_1_image['url']; ?>); border-color: <?php echo $banner_1_color; ?>'></div>
                        <div class='title h3'>
                            <?php echo $banner_1_text; ?>
                            <span class='icon'>
                                    <img src="<?php echo $banner_1_icon['url']; ?>"
                                         alt="<?php echo $banner_1_icon['alt']; ?>">
                                </span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

            <?php if ($banner_2_image && $banner_2_icon && $banner_2_text && $banner_2_link && $banner_2_color): ?>
                <div class='col-xl-7 col-lg-6'>
                    <a href="<?php echo $banner_2_link; ?>" class='offers__item violet-it'>
                        <div class='image'
                             style='background-image: url(<?php echo $banner_2_image['url']; ?>); border-color: <?php echo $banner_2_color; ?>'></div>
                        <div class='title h3'>
                            <?php echo $banner_2_text; ?>
                            <span class='icon'>
                                    <img src="<?php echo $banner_2_icon['url']; ?>"
                                         alt="<?php echo $banner_2_icon['alt']; ?>">
                                </span>
                        </div>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div class='spacer-lg-10 spacer-md-6'></div>
    <div class='spacer-lg-10 spacer-md-6'></div>
</section>
<?php endif; ?>
<?php get_footer(); ?>
