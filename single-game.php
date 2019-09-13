<?php
/**
 * Template for single product
 */
$terms = get_the_terms( $post->ID, 'game_category' );
$terms_slugs = array();
foreach( $terms as $term ) {
    $terms_slugs[] = $term->slug; // save the slugs in an array
}
if ( $terms_slugs[0] === 'kids' ) {
	get_header('kids');
}else{
	get_header();
}
?>
<?php
$args = array(
    'post_type' => 'game',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
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
<?php endif;
wp_reset_query(); ?>
<?php if (have_rows('product_item')): $count = 0; $popup_count = 0; ?>
    <section class='inner-product'>
        <?php while (have_rows('product_item')): the_row();
            $big_image = get_sub_field('big_image');
            $title = get_sub_field('title');
            $subtitle = get_sub_field('subtitle');
            $text = get_sub_field('text');
            $download_link = get_sub_field('download_link');
            $buy_link = get_sub_field('buy_link');
            $bg_color = get_sub_field('bg_color');
            $count++;
            ?>
            <div class='item-product' style="background-color: <?php echo $bg_color ? $bg_color : '#fb616f' ?>;">
                <div class='spacer-lg-4 spacer-sm-2'></div>
                <div class='container-full'>
                    <div class='item-product__row'>
                        <div class='pictures'>
                            <div class='pictures__view'>
                                <?php if ($big_image): ?><img data-src='<?php echo $big_image['url']; ?>'
                                                              alt="<?php echo $big_image['alt']; ?>"><?php endif; ?>
                                <button class="btn item-product__bt open-popup"
                                        data-rel="big-image-<?php echo $count; ?>"></button>
                            </div>
                            <?php if (have_rows('characters')): ?>

                                <div class='collection'>
                                    <?php while (have_rows('characters')): the_row();
                                        $character_name = get_sub_field('character_name');
                                        $character_text = get_sub_field('character_text');
                                        $character_image = get_sub_field('character_image');
                                        ?>
                                        <div class='collection__item open-popup'
                                             data-rel="product-popup-<?php echo $count; ?>">
                                            <div class='image'>
                                                <img data-src='<?php echo $character_image['url']; ?>'
                                                     alt="<?php echo $character_image['alt']; ?>">
                                            </div>
                                            <div class='text title-coll'><span><?php echo $character_name; ?></span>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            <div class='info-text__mob-btn'>
                                <?php if ($download_link): ?><a href='<?php echo $download_link; ?>'
                                                                class='btn btn-primary btn-block'><?php esc_html_e('Download Collection Checklist!', 'finders') ?></a><?php endif; ?>
                                <?php if ($buy_link): ?><a href='<?php echo $buy_link; ?>'
                                                           class='btn btn-primary btn-block' target="_blank"><?php esc_html_e('Buy Product', 'finders') ?></a><?php endif; ?>
                            </div>
                        </div>
                        <div class='info-text'>
                            <?php if ($title): ?><h1 class='title h2'><?php echo $title; ?></h1><?php endif; ?>
                            <?php if ($subtitle): ?>
                                <div class='sub-title h3'><span><?php echo $subtitle; ?></span></div><?php endif; ?>
                            <div class='spacer-lg-4 spacer-sm-2'></div>
                            <?php if ($text): ?>
                                <div class='text color-dark'><?php echo $text; ?></div><?php endif; ?>
                            <div class='spacer-lg-4 spacer-sm-2'></div>
                            <div class='info-text__des-btn'>
                                <?php if ($download_link): ?><a href='<?php echo $download_link; ?>'
                                                                class='btn btn-primary btn-block'><?php esc_html_e('Download Collection Checklist!', 'finders') ?></a><?php endif; ?>
                                <?php if ($buy_link): ?><a href='<?php echo $buy_link; ?>'
                                                           class='btn btn-primary btn-block'><?php esc_html_e('Buy Product', 'finders') ?></a><?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
                <div class='spacer-lg-2'></div>
            </div>
        <?php endwhile; ?>
        
        <!-- Popups -->
        <div class="popup-wrapper">
                <div class="bg-layer"></div>
                <?php while (have_rows('product_item')): the_row();
                    $big_image = get_sub_field('big_image');
                    $title = get_sub_field('title');
                    $subtitle = get_sub_field('subtitle');
                    $text = get_sub_field('text');
                    $download_link = get_sub_field('download_link');
                    $buy_link = get_sub_field('buy_link');
                    $bg_color = get_sub_field('bg_color');
                    $popup_count++;
                ?>
                <div class="popup-content" data-rel="product-popup-<?php echo $popup_count; ?>">
                    <div class="layer-close"></div>
                    <div class="popup-container size-2 product-collection">
                        <div class="popup-align">
                            
                            <div class='spacer-lg-2'></div>
                            <div class="swiper-thumbs">
                                <div class="swiper-entry">
                                    <div class="swiper-container swiper-thumbs-top"
                                         data-options='{"watchSlidesVisibility": true, "simulateTouch": false, "effect": "fade"}'>
                                        <div class="swiper-wrapper">
                                            <?php while (have_rows('characters')): the_row();
                                                $character_name = get_sub_field('character_name');
                                                $character_text = get_sub_field('character_text');
                                                $character_image = get_sub_field('character_image');
                                                ?>
                                                <div class="swiper-slide">
													<div class='title-pop h2'><span><?php echo $character_name; ?></span></div>
                                                    <div class='item-top'>
                                                        <div class='image-top'>
                                                            <img data-src="<?php echo $character_image['url']; ?>"
                                                                 alt="<?php echo $character_image['alt']; ?>">
                                                        </div>
                                                        <div class='text-coll-pop'>
                                                            <div class='text color-dark text-pop'><?php echo $character_text; ?></div>
                                                            <a href="#" class='btn btn-secondary'>360<sup>o</sup> view</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-entry">
                                    <div class="swiper-container swiper-thumbs-bottom"
                                         data-options='{"slidesPerView":5, "spaceBetween":12, "watchSlidesVisibility": true, "watchSlidesProgress": true, "breakpoints": {"755": {"spaceBetween": 6, "slidesPerView":3}} }'>
                                        <div class="swiper-wrapper">
                                            <?php while (have_rows('characters')): the_row();
                                                $character_image = get_sub_field('character_image');
                                                ?>
                                                <div class="swiper-slide">
                                                    <div class='preview-pop'>
                                                        <img src="<?php echo $character_image['url']; ?>"
                                                             alt="<?php echo $character_image['alt']; ?>">
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    </div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>

                            </div>

                        </div>
                        <button class="btn btn-close"></button>
                    </div>
                </div>

                <div class="popup-content" data-rel="big-image-<?php echo $popup_count; ?>">
                    <div class="layer-close"></div>
                    <div class="popup-container size-2 product-collection">
                        <div class="popup-align">
                            <div class='image-gallery'>
                                <img data-src="<?php echo $big_image['url']; ?>"
                                     alt="<?php echo $big_image['alt']; ?>">
                            </div>
                        </div>
                        <button class="btn btn-close"></button>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

        <div class='spacer-lg-10 spacer-md-6'></div>
        <div class='spacer-lg-10 spacer-md-6'></div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>
